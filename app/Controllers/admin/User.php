<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Password;
use App\Models\UsersModel;

define('_TITLE', 'User');

class User extends BaseController
{
    private $_m_users, $_m_user, $_m_group;
    public function __construct()
    {
        $this->_m_group = new GroupModel();
        $this->_m_users = new UserModel();
        $this->_m_user = new UsersModel();
    }


    public function index()
    {
        $data_users = $this->_m_users->findAll();
        // dd($this->_m_user->getUser());
        $data = [
            'title' => _TITLE,
            'data_users' => $data_users
        ];
        return view('User/index', $data);
    }

    public function detail()
    {
        $id = $this->request->getGetPost('id');
        $data_users = $this->_m_user->getUser($id);
        $data = [
            'title' => _TITLE,
            'data_users' => $data_users
        ];
        return view('User/detail', $data);
    }

    public function create()
    {
        $data_group = $this->_m_group->orderBy('name')->findAll();
        $data = [
            'title' => _TITLE,
            'data_group' => $data_group,
            'validation' => \config\Services::validation()
        ];
        return view('User/create', $data);
    }

    public function save()
    {
        // validasi data
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
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
            'password' => [
                'rules' => 'required',
                'label' => 'Password',
                'errors' => [
                    'required' => '{field} Harus diisi!'
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'label' => 'Password Konfirmasi',
                'errors' => [
                    'required' => '{field} Harus diisi!',
                    'matches' => '{field} Tidak sama dengan password!'
                ]
            ],
        ])) {
            // dd(\config\Services::validation()->getErrors());
            return redirect()->to('user-create')->withInput();
        }

        // masuk ke database
        if ($this->_m_users->withGroup($this->request->getVar('group'))->save(
            [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'fullname' => $this->request->getVar('fullname'),
                'password_hash' => Password::hash($this->request->getVar('password')),
                'active' => 1
            ]
        )) {
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan!');
            return redirect()->to('/user');
        } else
            session()->setFlashdata('warning', 'Data gagal ditambahkan!');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        // dd($id);
        $data_user = $this->_m_user->find($id);
        $gambar_lama = $data_user['user_image'];
        if ($gambar_lama != 'default.png') {
            unlink(WRITEPATH . '../assets/upload/user/' . $gambar_lama);
            unlink(WRITEPATH . '../assets/upload/user/thumbs/' . $gambar_lama);
        }
        if ($this->_m_user->delete($id)) {

            session()->setFlashdata('sukses', 'Data berhasil dihapus!');
        } else session()->setFlashdata('warning', 'Data gagal dihapus!');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data_user = $this->_m_user->getUser($id);
        $data_group = $this->_m_group->orderBy('name')->findAll();
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
            'data_group' => $data_group,
            'validation' => \config\Services::validation()
        ];
        return view('User/update', $data);
    }

    public function update($id)
    {
        $data_user = $this->_m_user->getUser($id);
        // masuk ke database
        $this->_m_group->removeUserFromGroup($id, $data_user['id']);
        if ($this->_m_group->addUserToGroup($id, $this->request->getVar('group'))) {

            session()->setFlashdata('sukses', 'Data berhasil diupdate!');
        } else
            session()->setFlashdata('warning', 'Data gagal diupdate!');
        return redirect()->to('/user');
    }

    public  function resetpass($id = null)
    {
        // dd($id);
        if ($this->_m_user->save([
            'id' => $id,
            'password_hash' => Password::hash("12345678")
        ])) {

            session()->setFlashdata('sukses', 'Password berhasil direset!');
        } else
            session()->setFlashdata('warning', 'Password gagal direset!');
        return redirect()->to('/user');
    }

    public function setaktif($id = null)
    {
        // dd($id);
        $aktif = $this->_m_user->find($id);
        if ($aktif['active'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        if ($this->_m_user->save([
            'id' => $id,
            'active' => $status
        ])) {

            session()->setFlashdata('sukses', 'Status berhasil diubah!');
        } else
            session()->setFlashdata('warning', 'Status gagal diubah!');
        return redirect()->to('/user');
    }

    public function setuser()
    {
        $data_user = $this->_m_users->find(user_id());
        // dd($data_users);
        $data = [
            'title' => _TITLE,
            'data_user' => $data_user,
            'validation' => \config\Services::validation()
        ];
        return view('setuser/index', $data);
    }

    public function saveset($id = null)
    {
        // validasi data
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
        // proses upload gambar
        // dd($this->request->getFile('user_image'));
        $gambar = $this->request->getFile('user_image');
        if ($gambar->getError() === 4) //tidak ada file yg diupload
        {
            $namafile = user()->user_image;
        } else {
            $gambar   = $this->request->getFile('user_image');
            $gambar_lama = user()->user_image;
            $namafile = $gambar->getRandomName();
            if ($gambar_lama != 'default.png') {
                unlink(WRITEPATH . '../public/assets/upload/user/' . $gambar_lama);
                unlink(WRITEPATH . '../public/assets/upload/user/thumbs/' . $gambar_lama);
            }
            $gambar->move(WRITEPATH . '../public/assets/upload/user/', $namafile);
            // Create thumb
            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/assets/upload/user/' . $namafile)
                ->fit(100, 100, 'center')
                ->save(WRITEPATH . '../public/assets/upload/user/thumbs/' . $namafile);
        }
        // masuk ke database
        if ($this->_m_users->save(
            [
                'id' => $id,
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'user_image' => $namafile,
                'fullname' => $this->request->getVar('fullname')
            ]
        )) {
            session()->setFlashdata('sukses', 'Data berhasil diubah!');
            return redirect()->to('setuser');
        } else
            session()->setFlashdata('warning', 'Data gagal diubah!');
        return redirect()->to('setuser');
    }

    public function changesave($id = null)
    {

        if ($this->request->isAJAX()) {

            $data_user = $this->_m_users->find(user_id());
            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'oldpass' => [
                    'rules' => 'required',
                    'label' => 'Password',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'label' => 'Password',
                    'errors' => [
                        'required' => '{field} Harus diisi!'
                    ]
                ],
                'pass_confirm' => [
                    'rules' => 'required|matches[password]',
                    'label' => 'Password Konfirmasi',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'matches' => '{field} Tidak sama dengan password!'
                    ]
                ],
            ])) {
                $msg = [
                    'error' => [
                        'oldpass' => $validation->getError('oldpass'),
                        'password' => $validation->getError('password'),
                        'pass_confirm' => $validation->getError('pass_confirm')

                    ]
                ];
                return $this->response->setJSON($msg);
            }

            if (Password::verify($this->request->getVar('oldpass'), $data_user->password_hash)) {
                if ($this->_m_users->save([
                    'id' => user_id(),
                    'password_hash' => Password::hash($this->request->getVar('password'))
                ])) {

                    $msg = [
                        'success' =>  'Password berhasil diupdate!'
                    ];

                    return $this->response->setJSON($msg);
                }
            } else {
                $msg = [
                    'error' => [
                        'oldpass' => 'Password lama yang anda masukan salah!'
                    ]
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
