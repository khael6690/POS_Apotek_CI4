<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\BuyModel;
use App\Models\ProfileModel;
use App\Models\OpnameModel;

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
            $data_obat = $this->_m_obat->getObat();

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

    public function stok_masuk()
    {
        $data = [
            'title' => "Stok masuk"
        ];

        return view('stok/stok_in', $data);
    }

    public function viewdataMasuk()
    {
        if ($this->request->isAJAX()) {
            $data_stok = $this->_m_buy->getAll();
            $data = [
                'datastok' => $data_stok
            ];
            $msg = [
                'data' => view('stok/data_in', $data)
            ];
            return $this->response->setJSON($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
