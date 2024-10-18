<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\BuyModel;
use App\Models\OpnameModel;
use Hermawan\DataTables\DataTable;

define('_TITLE', 'Stok Barang');
class Stok extends BaseController
{
    private $_m_obat, $_m_stok, $_m_buy, $_m_opname;
    public function __construct()
    {
        $this->_m_opname = new OpnameModel();
        $this->_m_buy = new BuyModel();
        $this->_m_obat = new ObatModel();
        $this->_m_stok = new StokModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('Stok/index', $data);
    }

    public function viewdata()
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->getStok();

            $data = [
                'data_obat' => $data_obat
            ];

            $msg = [
                'data' => view('stok/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->_m_obat->getStok();

            return DataTable::of($builder)
                ->addNumbering()
                ->add('action', function ($row) {
                    return
                        '<button class="btn btn-success btn-sm text-white" onclick="add(' . $row->id_obat . ')"><i class="fas fa-minus"></i></button>';
                }, 'last')
                ->hide('id_obat')
                ->toJson();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function addOpname($id)
    {
        if ($this->request->isAJAX()) {
            $data_obat = $this->_m_obat->getObat($id);

            $data = [
                'data_obat' => $data_obat
            ];

            $msg = [
                'data' => view('stok/create', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function saveOpname()
    {
        if ($this->request->isAJAX()) {
            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'jumlah' => [
                    'rules' => 'required',
                    'label' => 'Jumlah',
                    'errors' => [
                        'required' => '{field} harus diisi!'
                    ]
                ], 'keterangan' => [
                    'rules' => 'required',
                    'label' => 'Keterangan',
                    'errors' => [
                        'required' => '{field} harus diisi!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'jumlah' => $validation->getError('jumlah'),
                        'keterangan' => $validation->getError('keterangan')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // save data opname
            if ($this->_m_opname->save([
                'id_obat' => $this->request->getVar('id_obat'),
                'jumlah' => $this->request->getVar('jumlah'),
                'keterangan' => $this->request->getVar('keterangan')
            ])) {
                $msg = [
                    'success' => 'Data berhasil disimpan!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function viewdataOpname()
    {
        if ($this->request->isAJAX()) {
            $data_opname = $this->_m_opname->getAll();
            $data = [
                'data_opname' => $data_opname
            ];
            $msg = [
                'data' => view('opname/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function dataOpname()
    {
        if ($this->request->isAJAX()) {
            $builder = $this->_m_opname->getAll();

            return DataTable::of($builder)
                ->add('action', function ($row) {
                    return
                        '<button class="btn btn-warning btn-sm text-white" onclick="edit(' . $row->id_opname . ')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm text-white" onclick="hapusOpname(' . $row->id_opname . ',\'' . $row->obat . '\',\'' . site_url('opname-delete/') . '\')"><i class="fas fa-trash"></i></button>';
                }, 'last')
                ->hide('id_opname')
                ->toJson();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function opnameEdit($id)
    {
        if ($this->request->isAJAX()) {
            $data_opname = $this->_m_opname->getAll($id);
            $data = [
                'data_opname' => $data_opname
            ];
            $msg = [
                'data' => view('opname/update', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function opnameUpdate($id)
    {
        if ($this->request->isAJAX()) {
            // validasi data
            $validation = \config\Services::validation();
            if (!$this->validate([
                'jumlah' => [
                    'rules' => 'required',
                    'label' => 'Jumlah',
                    'errors' => [
                        'required' => '{field} harus diisi!'
                    ]
                ], 'keterangan' => [
                    'rules' => 'required',
                    'label' => 'Keterangan',
                    'errors' => [
                        'required' => '{field} harus diisi!'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'jumlah' => $validation->getError('jumlah'),
                        'keterangan' => $validation->getError('keterangan')
                    ]
                ];
                return $this->response->setJSON($msg);
            }

            // save data opname
            if ($this->_m_opname->update($id, [
                'jumlah' => $this->request->getVar('jumlah'),
                'keterangan' => $this->request->getVar('keterangan')
            ])) {
                $msg = [
                    'success' => 'Data berhasil disimpan!'
                ];

                return $this->response->setJSON($msg);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function opnameDelete($id)
    {
        if ($this->request->isAJAX()) {
            if ($this->_m_opname->delete($id)) {

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

    public function stok_masuk()
    {
        $data = [
            'title' => "Stok masuk"
        ];

        return view('stok-masuk/index', $data);
    }

    public function viewdataMasuk()
    {
        if ($this->request->isAJAX()) {
            $data_stok = $this->_m_buy->getAll();
            $data = [
                'datastok' => $data_stok
            ];
            $msg = [
                'data' => view('stok-masuk/data', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
