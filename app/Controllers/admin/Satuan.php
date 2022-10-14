<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\SatuanModel;
use CodeIgniter\HTTP\Request;

define('_TITLE', 'Satuan');

class Satuan extends BaseController
{
    private $_m_satuan;
    public function __construct()
    {
        $this->_m_satuan = new SatuanModel();
    }

    public function index()
    {
        $data_satuan = $this->_m_satuan->findAll();
        $data = [
            'title' => _TITLE,
            'data_satuan' => $data_satuan
        ];
        return view('Satuan/index', $data);
    }

    public function create()
    {
        $data_satuan = $this->_m_satuan->findAll();
        $data = [
            'title' => _TITLE,
            'data_satuan' => $data_satuan,
            'validation' => \config\Services::validation()
        ];
        return view('Satuan/create', $data);
    }

    public function save()
    {
        // validasi data
        if (!$this->validate([
            'satuan' => [
                'rules' => 'required|is_unique[satuan.satuan]',
                'label' => 'Satuan',
                'errors' => [
                    'required' => '{field} Harus diisi!',
                    'is_unique' => '{field} Sudah ada!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('/satuan-create')->withInput();
        }

        // masuk ke database
        if ($this->_m_satuan->save(
            [
                'satuan' => $this->request->getVar('satuan'),
            ]
        )) {
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan!');
        } else
            session()->setFlashdata('warning', 'Data gagal ditambahkan!');
        return redirect()->to('/satuan');
    }

    public function edit($id)
    {
        $data_satuan = $this->_m_satuan->find($id);
        $data = [
            'title' => _TITLE,
            'data_satuan' => $data_satuan,
            'validation' => \config\Services::validation()
        ];
        return view('Satuan/update', $data);
    }

    public function update($id)
    {
        $data_satuan = $this->_m_satuan->find($id);
        if ($data_satuan['satuan'] === $this->request->getVar('satuan')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[satuan.satuan]';
        }

        // validasi data
        if (!$this->validate([
            'satuan' => [
                'rules' => $rule,
                'label' => 'Satuan',
                'errors' => [
                    'required' => '{field} Harus diisi!',
                    'is_unique' => '{field} Sudah ada!'
                ]
            ]
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('/satuan-update/' . $id)->withInput();
        }

        // masuk ke database
        if ($this->_m_satuan->save(
            [
                'id' => $id,
                'satuan' => $this->request->getVar('satuan')
            ]
        )) {
            session()->setFlashdata('sukses', 'Data berhasil diupdate!');
        } else
            session()->setFlashdata('warning', 'Data gagal diupdate!');
        return redirect()->to('/satuan');
    }

    public function delete($id)
    {
        if ($this->_m_satuan->delete($id)) {

            session()->setFlashdata('sukses', 'Data berhasil dihapus!');
        } else
            session()->setFlashdata('warning', 'Data gagal dihapus!');
        return redirect()->to('/satuan');
    }
}
