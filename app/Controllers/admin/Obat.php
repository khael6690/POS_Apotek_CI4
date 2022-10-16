<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use App\Models\ProdusenModel;
use App\Models\SatuanModel;
use CodeIgniter\HTTP\Request;

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
        $data_obat = $this->_m_obat->getObat();
        // dd($data_obat);
        $data = [
            'title' => _TITLE,
            'data_obat' => $data_obat
        ];
        return view('Obat/index', $data);
    }

    public function detail()
    {
        $id = $this->request->getGetPost('id');
        $data_obat = $this->_m_obat->getObat($id);
        $data = [
            'title' => _TITLE,
            'data_obat' => $data_obat
        ];
        return view('Obat/detail', $data);
    }

    public function create()
    {
        $data_satuan = $this->_m_satuan->orderBy('satuan')->findAll();
        $data_produsen = $this->_m_produsen->orderBy('nama')->findAll();
        $data = [
            'title' => _TITLE,
            'data_produsen' => $data_produsen,
            'data_satuan' => $data_satuan,
            'validation' => \config\Services::validation()
        ];
        return view('Obat/create', $data);
    }

    public function save()
    {
        // validasi data
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
                    'max_size' => '{field} ukuran gambar tidak boleh lebih 1mb!',
                    'is_image' => 'File yang dipilih bukan gambar!',
                    'mime_in' => 'File yang dipilih bukan gambar!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('obat-create')->withInput();
        }
        // proses upload gambar
        // dd($this->request->getFile('img'));
        $gambar = $this->request->getFile('img');
        if ($gambar->getError() === 4) //tidak ada file yg diupload
        {
            $namafile = 'default.png';
        } else {
            $gambar   = $this->request->getFile('img');
            $namafile = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../assets/upload/obat/', $namafile);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../assets/upload/obat/' . $namafile)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../assets/upload/obat/thumbs/' . $namafile);
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
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan!');
            return redirect()->to('obat');
        } else
            session()->setFlashdata('warning', 'Data gagal ditambahkan!');
    }

    public function edit($id = null)
    {
        $data_obat = $this->_m_obat->getObat($id);
        $data_satuan = $this->_m_satuan->orderBy('satuan')->findAll();
        $data_produsen = $this->_m_produsen->orderBy('nama')->findAll();
        $data = [
            'title' => _TITLE,
            'data_obat' => $data_obat,
            'data_satuan' => $data_satuan,
            'data_produsen' => $data_produsen,
            'validation' => \config\Services::validation()
        ];
        return view('Obat/update', $data);
    }

    public function update($id)
    {
        $data_obat = $this->_m_obat->getObat($id);
        if ($data_obat['nama_obat'] === $this->request->getVar('nama')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[obat.nama]';
        }
        // validasi data
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
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('obat-update/' . $id)->withInput();
        }
        // proses upload gambar
        // dd($this->request->getFile('img'));
        $gambar = $this->request->getFile('img');
        if ($gambar->getError() === 4) //tidak ada file yg diupload
        {
            $namafile = $data_obat['img'];
        } else {
            $gambar   = $this->request->getFile('img');
            $namafile = $gambar->getRandomName();
            $gambar_lama = $data_obat['img'];
            if ($gambar_lama != 'default.png') {
                unlink(WRITEPATH . '../assets/upload/obat/' . $gambar_lama);
                unlink(WRITEPATH . '../assets/upload/obat/thumbs/' . $gambar_lama);
            }
            $gambar->move(WRITEPATH . '../assets/upload/obat/', $namafile);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../assets/upload/obat/' . $namafile)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../assets/upload/obat/thumbs/' . $namafile);
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
            session()->setFlashdata('sukses', 'Data berhasil diperbaharui!');
        } else session()->setFlashdata('warning', 'Data gagal diperbaharui!');
        return redirect()->to('obat');
    }

    public function delete($id)
    {
        // dd($id);
        $data_obat = $this->_m_obat->where(['id_obat' => $id])->first();
        $gambar_lama = $data_obat['img'];
        if ($gambar_lama != 'default.png') {
            unlink(WRITEPATH . '../assets/upload/obat/' . $gambar_lama);
            unlink(WRITEPATH . '../assets/upload/obat/thumbs/' . $gambar_lama);
        }
        if ($this->_m_obat->delete($id)) {
            session()->setFlashdata('sukses', 'Data berhasil dihapus!');
        } else session()->setFlashdata('warning', 'Data gagal dihapus!');
        return redirect()->to('obat');
    }
}
