<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

define('_TITLE', 'Setting');

class Setting extends BaseController
{
    private $_profile;

    public function __construct()
    {
        $this->_profile = new ProfileModel();
    }

    public function index()
    {
        $data_profile = $this->_profile->find('191');
        // dd($data_profile);
        $data = [
            'title' => _TITLE,
            'data_profile' => $data_profile,
            'validation' => \config\Services::validation()
        ];

        return view('setting/index', $data);
    }

    public function save($id = null)
    {
        if ($id !== null) {
            $data_profile = $this->_profile->find($id);
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'label' => 'Nama',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'label' => 'Email',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'kota' => [
                    'rules' => 'required',
                    'label' => 'Kota',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ], 'alamat' => [
                    'rules' => 'required',
                    'label' => 'Alamat',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ], 'telp' => [
                    'rules' => 'required',
                    'label' => 'Nomor Telfon',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ]
            ])) {
                // dd(\config\Services::validation()->getErrors());
                return redirect()->to('setting')->withInput();
            }
            if ($this->_profile->save(
                [
                    'id' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'email' => $this->request->getVar('email'),
                    'kota' => $this->request->getVar('kota'),
                    'alamat' => $this->request->getVar('alamat'),
                    'telp' => $this->request->getVar('telp')
                ]
            )) {
                session()->setFlashdata('sukses', 'Data berhasil diubah!');
                return redirect()->to('setting');
            }
        } else
            session()->setFlashdata('warning', 'Data gagal diubah!');
        return redirect()->to('setting');
    }
}
