<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

define('_TITLE', 'Customers');

class Customers extends BaseController
{
    private $_m_customers;
    public function __construct()
    {
        $this->_m_customers = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('Customers/index', $data);
    }

    public function viewdata()
    {
        if ($this->request->isAJAX()) {
            $data_customers = $this->_m_customers->findAll();
            $data = [
                'title' => _TITLE,
                'data_customers' => $data_customers
            ];

            $msg = [
                'data' => view('Customers/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        $id = $this->request->getPost('id');
        $data_customers = $this->_m_customers->find($id);
        $data = [
            'title' => _TITLE,
            'data_customers' => $data_customers
        ];
        return view('Customers/detail', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => _TITLE
            ];

            $msg = [
                'data' => view('Customers/create', $data)
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
                    'rules' => 'required',
                    'label' => 'Nama',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'label' => 'Alamat',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[customer.email]|valid_email',
                    'label' => 'Email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'valid_email' => '{field} tidak valid!',
                        'is_unique' => '{field} sudah terdaftar!'
                    ]
                ],
                'telp' => [
                    'rules' => 'required',
                    'label' => 'No Telfon',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'diskon' => [
                    'rules' => 'required',
                    'label' => 'Diskon',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'alamat' => $validation->getError('alamat'),
                        'email' => $validation->getError('email'),
                        'telp' => $validation->getError('telp'),
                        'diskon' => $validation->getError('diskon')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            if ($this->_m_customers->save(
                [
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telp' => $this->request->getVar('telp'),
                    'diskon' => $this->request->getVar('diskon'),
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
            $data_customers = $this->_m_customers->find($id);
            $data = [
                'title' => _TITLE,
                'data_customers' => $data_customers
            ];

            $msg = [
                'data' => view('Customers/update', $data)
            ];

            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $data_customers = $this->_m_customers->find($id);
            if ($data_customers['email'] === $this->request->getVar('email')) {
                $rule = 'required';
            } else {
                $rule = 'required|is_unique[customer.email]';
            }

            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'label' => 'Nama',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'label' => 'Alamat',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'email' => [
                    'rules' => $rule,
                    'label' => 'Email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'valid_email' => '{field} tidak valid!',
                        'is_unique' => '{field} sudah terdaftar!'
                    ]
                ],
                'telp' => [
                    'rules' => 'required',
                    'label' => 'No Telfon',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'diskon' => [
                    'rules' => 'required',
                    'label' => 'Diskon',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
            ])) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'alamat' => $validation->getError('alamat'),
                        'email' => $validation->getError('email'),
                        'telp' => $validation->getError('telp'),
                        'diskon' => $validation->getError('diskon')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // masuk ke database
            if ($this->_m_customers->save(
                [
                    'id' => $id,
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telp' => $this->request->getVar('telp'),
                    'diskon' => $this->request->getVar('diskon'),
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
            if ($this->_m_customers->delete($id)) {

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
