<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProdusenModel;
use CodeIgniter\HTTP\Request;

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
        $data_produsen = $this->_m_produsen->findAll();
        $data = [
            'title' => _TITLE,
            'data_produsen' => $data_produsen,
            'validation' => \config\Services::validation()
        ];
        return view('Produsen/create', $data);
    }

    public function save()
    {
        // validasi data
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[produsen.nama]',
                'label' => 'Produsen',
                'errors' => [
                    'required' => 'Nama {field} Harus diisi!',
                    'is_unique' => 'Nama {field} Sudah ada!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('/produsen-create')->withInput();
        }

        // masuk ke database
        if ($this->_m_produsen->save(
            [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'telp' => $this->request->getVar('telp')
            ]
        )) {
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan!');
            return redirect()->to('/produsen');
        } else
            session()->setFlashdata('warning', 'Data gagal ditambahkan!');
    }

    public function edit($id)
    {
        $data_produsen = $this->_m_produsen->find($id);
        $data = [
            'title' => _TITLE,
            'data_produsen' => $data_produsen,
            'validation' => \config\Services::validation()
        ];
        return view('Produsen/update', $data);
    }

    public function update($id)
    {
        $data_produsen = $this->_m_produsen->find($id);
        if ($data_produsen['nama'] === $this->request->getVar('nama')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[produsen.nama]';
        }

        // validasi data
        if (!$this->validate([
            'nama' => [
                'rules' => $rule,
                'label' => 'Produsen',
                'errors' => [
                    'required' => 'Nama {field} Harus diisi!',
                    'is_unique' => 'Nama {field} Sudah ada!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('/produsen-update/' . $id)->withInput();
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
            session()->setFlashdata('sukses', 'Data berhasil diupdate!');
            return redirect()->to('/produsen');
        } else
            session()->setFlashdata('warning', 'Data gagal diupdate!');
    }

    public function delete($id)
    {
        if ($this->_m_produsen->delete($id)) {

            session()->setFlashdata('sukses', 'Data berhasil dihapus!');
        } else
            session()->setFlashdata('warning', 'Data gagal dihapus!');
        return redirect()->to('/produsen');
    }
}
