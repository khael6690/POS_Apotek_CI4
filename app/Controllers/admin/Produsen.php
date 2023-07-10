<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProdusenModel;
use Hermawan\DataTables\DataTable;

define('_TITLE', 'Produsen');

class Produsen extends BaseController
{
    private $_m_produsen;
    public function __construct()
    {
        $this->_m_produsen = new ProdusenModel();
    }

    public function index()
    {
        $data_produsen = $this->_m_produsen->findAll();
        // dd($data_produsen);
        $data = [
            'title' => _TITLE,
            'data_produsen' => $data_produsen
        ];
        return view('Produsen/index', $data);
    }

    public function viewdata()
    {
        if ($this->request->isAJAX()) {
            $data_produsen = $this->_m_produsen->findAll();
            $data = [
                'title' => _TITLE,
                'data_produsen' => $data_produsen
            ];

            $msg = [
                'data' => view('Produsen/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->_m_produsen->select('id_produsen,nama,alamat');

            return DataTable::of($builder)
                ->addNumbering()
                ->add('action', function ($row) {
                    return
                        '<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-detail" onclick="detail(' . $row->id_produsen . ')"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning text-white btn-sm" onclick="edit(' . $row->id_produsen . ')"><i class="fas fa-edit"></i></button>
                        <button type="submit" class="btn btn-danger btn-sm text-white" onclick="hapus(' . $row->id_produsen . ',\'' . $row->nama . '\',\'' . site_url('produsen/') . '\')"><i class="fas fa-trash"></i></button>';
                }, 'last')
                ->hide('id_produsen')
                ->toJson();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        $id = $this->request->getGetPost('id');
        $data_produsen = $this->_m_produsen->find($id);
        $data = [
            'title' => _TITLE,
            'data_produsen' => $data_produsen
        ];
        return view('Produsen/detail', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => _TITLE
            ];

            $msg = [
                'data' => view('Produsen/create', $data)
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
                    'rules' => 'required|is_unique[produsen.nama]',
                    'label' => 'Nama',
                    'errors' => [
                        'required' => '{field} Produsen harus diisi!',
                        'is_unique' => '{field} Produsen sudah ada!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // masuk ke database
            if ($this->_m_produsen->insert(
                [
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'telp' => $this->request->getVar('telp')
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

    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $data_produsen = $this->_m_produsen->find($id);
            $data = [
                'title' => _TITLE,
                'data_produsen' => $data_produsen
            ];

            $msg = [
                'data' => view('Produsen/update', $data)
            ];

            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $data_produsen = $this->_m_produsen->find($id);
            if ($data_produsen['nama'] === $this->request->getVar('nama')) {
                $rule = 'required';
            } else {
                $rule = 'required|is_unique[produsen.nama]';
            }

            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'nama' => [
                    'rules' => $rule,
                    'label' => 'Nama',
                    'errors' => [
                        'required' => '{field} Produsen harus diisi!',
                        'is_unique' => '{field} Produsen sudah ada!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // masuk ke database
            if ($this->_m_produsen->save(
                [
                    'id_produsen' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'telp' => $this->request->getVar('telp')
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
            if ($this->_m_produsen->delete($id)) {

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
