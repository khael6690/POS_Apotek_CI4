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
            if (user()->username === $this->request->getVar('username')) {
                $rule = 'required';
            } else {
                $rule = 'required|is_unique[users.username]';
            }
            if (!$this->validate([
                'username' => [
                    'rules' => $rule,
                    'label' => 'Username',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'is_unique' => '{field} Sudah digunakan!'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'label' => 'Email',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'user_image' => [
                    'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                    'label' => 'gambar',
                    'errors' => [
                        'max_size' => '{field} ukuran gambar tidak boleh lebih 1mb!',
                        'is_image' => 'File yang dipilih bukan gambar!',
                        'mime_in' => 'File yang dipilih bukan gambar!'
                    ]
                ]
            ])) {
                // dd(\config\Services::validation()->getErrors());
                return redirect()->to('setuser')->withInput();
            }
        }
    }
}
