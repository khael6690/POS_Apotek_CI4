<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\SatuanModel;
use CodeIgniter\HTTP\Request;
use Hermawan\DataTables\DataTable;

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
        $data = [
            'title' => _TITLE
        ];
        return view('Satuan/index', $data);
    }

    public function viewdata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => _TITLE
            ];

            $msg = [
                'data' => view('Satuan/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->_m_satuan->select('id,satuan');

            return DataTable::of($builder)
                ->addNumbering()
                ->add('action', function ($row) {
                    return
                        '<button class="btn btn-warning text-white btn-sm" onclick="edit(' . $row->id . ')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm text-white" onclick="hapus(' . $row->id . ',\'' . $row->satuan . '\',\'' . site_url('satuan/') . '\')"><i class="fas fa-trash"></i></button>';
                }, 'last')
                ->hide('id')
                ->toJson();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => _TITLE
            ];

            $msg = [
                'data' => view('Satuan/create', $data)
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
                'satuan' => [
                    'rules' => 'required|is_unique[satuan.satuan]',
                    'label' => 'Satuan',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'is_unique' => '{field} Sudah ada!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'satuan' => $validation->getError('satuan')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            if ($this->_m_satuan->save(
                [
                    'satuan' => $this->request->getVar('satuan')
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
            $data_satuan = $this->_m_satuan->find($id);
            $data = [
                'title' => _TITLE,
                'data_satuan' => $data_satuan
            ];

            $msg = [
                'data' => view('Satuan/update', $data)
            ];

            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $data_satuan = $this->_m_satuan->find($id);
            if ($data_satuan['satuan'] === $this->request->getVar('satuan')) {
                $rule = 'required';
            } else {
                $rule = 'required|is_unique[satuan.satuan]';
            }

            // validasi data
            $validation = \config\Services::validation();
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
                $msg = [
                    'error' => [
                        'satuan' => $validation->getError('satuan')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // masuk ke database
            if ($this->_m_satuan->save(
                [
                    'id' => $id,
                    'satuan' => $this->request->getVar('satuan')
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
            if ($this->_m_satuan->delete($id)) {

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
