<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use App\Models\ProdusenModel;
use App\Models\SatuanModel;
use \Hermawan\DataTables\DataTable;

define('_TITLE', 'Obat');

class Obat extends BaseController
{
    private $_m_obat, $_m_produsen, $_m_satuan;
    public function __construct()
    {
        $this->_m_obat = new ObatModel();
        $this->_m_produsen = new ProdusenModel();
        $this->_m_satuan = new SatuanModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('Obat/index', $data);
    }

    public function viewdata()
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->getObat();

            $data = [
                'data_obat' => $data_obat
            ];

            $msg = [
                'data' => view('obat/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->_m_obat->getObat();

            return DataTable::of($builder)
                ->addNumbering()
                ->add('action', function ($row) {
                    return
                        '<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detail" onclick="detail(' . $row->id_obat . ')"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning text-white btn-sm" onclick="edit(' . $row->id_obat . ')"><i class="fas fa-edit"></i></button>
                        <button type="submit" class="btn btn-danger btn-sm text-white" onclick="hapus(' . $row->id_obat . ',\'' . $row->nama_obat . '\')"><i class="fas fa-trash"></i></button>';
                }, 'last')
                ->hide('id_obat')
                ->format('harga', function ($value) {
                    return 'Rp. ' . number_format($value, 2, '.', ',');
                })
                ->toJson();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        $id = $this->request->getPost('id');
        $data_obat = $this->_m_obat->getObat($id);
        $data = [
            'title' => _TITLE,
            'data_obat' => $data_obat
        ];
        return view('Obat/detail', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data_satuan = $this->_m_satuan->orderBy('satuan')->findAll();
            $data_produsen = $this->_m_produsen->orderBy('nama')->findAll();
            $data = [
                'title' => _TITLE,
                'data_produsen' => $data_produsen,
                'data_satuan' => $data_satuan
            ];

            $msg = [
                'data' => view('Obat/create', $data)
            ];

            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {

            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required|is_unique[obat.nama]',
                    'label' => 'Nama Obat',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'is_unique' => '{field} Sudah digunakan!'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'label' => 'Harga',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'img' => [
                    'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                    'label' => 'gambar',
                    'errors' => [
                        'max_size' => 'Ukuran {field} tidak boleh lebih 1mb!',
                        'is_image' => 'File yang dipilih bukan gambar!',
                        'mime_in' => 'File yang dipilih bukan gambar!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'harga' => $validation->getError('harga'),
                        'img' => $validation->getError('img')
                    ]
                ];
                return $this->response->setJSON($msg);
            }
            // proses upload gambar
            $gambar = $this->request->getFile('img');
            if ($gambar->getError() === 4) //tidak ada file yg diupload
            {
                $namafile = 'default.png';
            } else {
                $gambar   = $this->request->getFile('img');
                $namafile = $gambar->getRandomName();
                $gambar->move('assets/upload/obat/', $namafile);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile('assets/upload/obat/' . $namafile)
                    ->fit(100, 100, 'center')
                    ->save('assets/upload/obat/thumbs/' . $namafile);
            }
            // masuk ke database
            if ($this->_m_obat->save(
                [
                    'nama' => $this->request->getVar('nama'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'img' => $namafile,
                    'satuan' => $this->request->getVar('satuan'),
                    'produsen' => $this->request->getVar('produsen'),
                    'harga' => $this->request->getVar('harga'),
                ]
            )) {
                $msg = [
                    'success' =>  'Data berhasil ditambahkan!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->getObat($id);
            $data_satuan = $this->_m_satuan->orderBy('satuan')->findAll();
            $data_produsen = $this->_m_produsen->orderBy('nama')->findAll();
            $data = [
                'title' => _TITLE,
                'data_obat' => $data_obat,
                'data_satuan' => $data_satuan,
                'data_produsen' => $data_produsen
            ];

            $msg = [
                'data' => view('Obat/update', $data)
            ];

            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->getObat($id);
            if ($data_obat['nama_obat'] === $this->request->getVar('nama')) {
                $rule = 'required';
            } else {
                $rule = 'required|is_unique[obat.nama]';
            }
            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'nama' => [
                    'rules' => $rule,
                    'label' => 'Nama Obat',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'is_unique' => '{field} Sudah digunakan!'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'label' => 'Harga',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'img' => [
                    'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                    'label' => 'gambar',
                    'errors' => [
                        'max_size' => 'ukuran {field} tidak boleh lebih 1mb!',
                        'is_image' => 'File yang dipilih bukan gambar!',
                        'mime_in' => 'File yang dipilih bukan gambar!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'harga' => $validation->getError('harga'),
                        'img' => $validation->getError('img')
                    ]
                ];
                return $this->response->setJSON($msg);
            }
            // proses upload gambar
            $gambar = $this->request->getFile('img');
            if ($gambar->getError() === 4) //tidak ada file yg diupload
            {
                $namafile = $data_obat['img'];
            } else {
                $gambar   = $this->request->getFile('img');
                $namafile = $gambar->getRandomName();
                $gambar_lama = $data_obat['img'];
                if ($gambar_lama != 'default.png') {
                    unlink('assets/upload/obat/' . $gambar_lama);
                    unlink('assets/upload/obat/thumbs/' . $gambar_lama);
                }
                $gambar->move('assets/upload/obat/', $namafile);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile('assets/upload/obat/' . $namafile)
                    ->fit(100, 100, 'center')
                    ->save('assets/upload/obat/thumbs/' . $namafile);
            }
            if ($this->_m_obat->save(
                [
                    'id_obat' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'img' => $namafile,
                    'satuan' => $this->request->getVar('satuan'),
                    'produsen' => $this->request->getVar('produsen'),
                    'harga' => $this->request->getVar('harga'),
                ]
            )) {
                $msg = [
                    'success' =>  'Data berhasil diupdate!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->where(['id_obat' => $id])->first();
            $gambar_lama = $data_obat['img'];
            if ($gambar_lama != 'default.png') {
                unlink('assets/upload/obat/' . $gambar_lama);
                unlink('assets/upload/obat/thumbs/' . $gambar_lama);
            }
            if ($this->_m_obat->delete($id)) {
                $msg = [
                    'success' =>  'Data berhasil dihapus!'
                ];

                return $this->response->setJSON($msg);
            } else {
                $msg = [
                    'error' =>  'Data gagal dihapus!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
