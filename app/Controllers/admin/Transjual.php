<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ObatModel;
use App\Models\ProfileModel;
use App\Models\SaleDetailModel;
use App\Models\SaleModel;

define('_TITLE', 'Transaksi Jual');

class Transjual extends BaseController
{
    private $_m_obat, $_cart, $_m_customer, $_m_sale, $_m_sale_detail, $_m_profile;
    public function __construct()
    {
        $this->_m_profile = new ProfileModel();
        $this->_m_sale = new SaleModel();
        $this->_m_sale_detail = new SaleDetailModel();
        $this->_m_customer = new CustomerModel();
        $this->_cart = \Config\Services::cart();
        $this->_m_obat = new ObatModel();
    }

    public function index()
    {
        // dd($this->_cart->contents());
        $this->_cart->destroy();
        $produk = $this->_m_obat->getStok();
        $customer = $this->_m_customer->findAll();
        $data = [
            'title' => _TITLE,
            'produk' => $produk,
            'customer' => $customer
        ];
        return view('transjual/index', $data);
    }

    public function getProduk()
    {
        if ($this->request->isAJAX()) {
            $produk = $this->_m_obat->getStok();
            $json = [
                'data' => $produk,
                'status' => true
            ];
            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function add_cart($id = null)
    {
        if ($this->request->isAJAX()) {
            if ($id === null) {
                $this->_cart->insert(array(
                    'id'      => $this->request->getVar('obat_id'),
                    'qty'     => 1,
                    'price'   => $this->request->getVar('harga'),
                    'name'    => $this->request->getVar('nama'),
                    'options' => array(
                        'discount' => $this->request->getVar('discount')
                    )
                ));

                return $this->show_cart();
            } elseif ($id !== null) {
                $produk = $this->_m_obat->getObat($id);
                if ($produk !== null && $produk['jumlah'] != 0) {
                    $this->_cart->insert(array(
                        'id'      => $produk['id_obat'],
                        'qty'     => 1,
                        'price'   => $produk['harga'],
                        'name'    => $produk['nama_obat'],
                        'options' => array(
                            'discount' => $produk['discount']
                        )
                    ));

                    return $this->show_cart();
                } elseif ($produk !== null && $produk['jumlah'] == 0) {
                    $json = [
                        'status' => false,
                        'data' =>  $produk['nama_obat'],
                        'msg' => 'Stok sudah habis!'
                    ];

                    return $this->response->setJSON($json);
                } else {
                    $json = [
                        'status' => false,
                        'data' =>  $id,
                        'msg' => 'Data tidak ditemukan!'
                    ];

                    return $this->response->setJSON($json);
                }
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function show_cart()
    {
        $data = $this->_cart->contents();
        if ($data != null) {
            $item = [
                'data' => $data
            ];

            $isi = view('transjual/items', $item);

            $json = [
                'status' => true,
                'data' =>  $isi,
                'msg' => 'Success'
            ];
        } else {
            $json = [
                'status' => false,
                'data' =>  null,
                'msg' => 'Data tidak ditemukan!'
            ];
        }

        return $this->response->setJSON($json);
    }

    public function delete_cart($rowid)
    {
        if ($this->request->isAJAX()) {

            $this->_cart->remove($rowid);

            return $this->show_cart();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_cart($rowid)
    {
        if ($this->request->isAJAX()) {
            $this->_cart->update(array(
                'rowid'   => $rowid,
                'qty'     => $this->request->getVar('qty')
            ));
            return $this->show_cart();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function total()
    {
        $total = 0;
        foreach ($this->_cart->contents() as $items) {
            $discount = ($items['options']['discount'] / 100)  * $items['subtotal'];
            $total += $items['subtotal'] - $discount;
        }
        return $total;
    }

    public function getTotal()
    {
        if ($this->request->isAJAX()) {
            $total = number_to_currency($this->total(), 'IDR', 'id_ID', 2);
            return $this->response->setJSON($total);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getDiskon()
    {
        if ($this->request->isAJAX() && $this->_cart->contents()) {
            $total = $this->total();
            $diskon = ($this->request->getPost('diskon') / 100) * $total;
            $totbayar = $total - $diskon;
            $totbayar === 0 ? $totbayar = 0 : $totbayar;
            $json = [
                'totbayar' => $totbayar,
                'status' => true
            ];
            return $this->response->setJSON($json);
        } elseif ($this->request->isAJAX() && !$this->_cart->contents()) {
            $json = [
                'totbayar' => null,
                'status' => false
            ];
            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getKembalian()
    {
        if ($this->request->isAJAX() && $this->_cart->contents()) {

            $nominal = $this->request->getPost('nominal');
            $totbayar = $this->request->getPost('totbayar');
            $totbayar === null && $nominal === null ? $kembalian = null :
                $kembalian = $nominal - $totbayar;

            $json = [
                'status' => true,
                'kembalian' => $kembalian
            ];

            return $this->response->setJSON($json);
        } elseif ($this->request->isAJAX() && !$this->_cart->contents()) {
            $json = [
                'status' => false,
                'kembalian' => null,
                'msg' => 'Tidak ada transaksi!'

            ];
            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function pay()
    {
        if ($this->request->isAJAX()) {
            if (!$this->_cart->contents()) {
                $response = [
                    'status' => false,
                    'title' => 'Transaksi gagal',
                    'msg' => 'Tidak ada transaksi!'
                ];
                return $this->response->setJSON($response);
            } else {
                //ada transaksi
                $totbayar = $this->request->getVar('totbayar');
                $nominal = $this->request->getVar('nominal');

                if ($nominal < $totbayar) {
                    //nominal tidak cukup
                    $response = [
                        'status' => false,
                        'title' => 'Transaksi gagal',
                        'msg' => 'Nominal tidak mencukupi!'
                    ];
                    return $this->response->setJSON($response);
                } else {
                    //nominal cukup
                    $saleid = $this->request->getVar('sale_id');
                    $customer = $this->request->getVar('customer');
                    $discountval = $this->request->getVar('diskon');
                    $this->_m_sale->save([
                        'sale_id' => $saleid,
                        'userid' => user_id(),
                        'customerid' => $customer,
                        'discount' => $discountval
                    ]);

                    foreach ($this->_cart->contents() as $items) {
                        $discount = ($items['options']['discount'] / 100)  * $items['subtotal'];
                        $this->_m_sale_detail->save([
                            'sale_id' => $saleid,
                            'id_obat' => $items['id'],
                            'amount' => $items['qty'],
                            'price' => $items['price'],
                            'discount' => $discount,
                            'total_price' => $items['subtotal'] - $discount
                        ]);
                    }
                    // response sukses
                    $response = [
                        'status' => true,
                        'title' => 'Transaksi berhasil',
                        'msg' => 'Pembayaran selesai!'
                    ];
                    return $this->response->setJSON($response);
                }
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function reset()
    {
        if ($this->request->isAJAX()) {
            $this->_cart->destroy();
            $json = [
                'status' => true
            ];
            return $this->response->setJSON($json);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function laporan()
    {
        $laporan = $this->_m_sale->getLaporan();
        $data = [
            'title' => 'Laporan Penjualan',
            'result' => $laporan
        ];
        return view('laporan/penjualan', $data);
    }

    public function lapdetail()
    {
        $id = $this->request->getGetPost('id');
        $data_sale = $this->_m_sale->getLaporan($id);
        $data_detail = $this->_m_sale_detail->getDetail($id);
        $data_profile = $this->_m_profile->findAll();

        $data = [
            'title' => 'Laporan Penjualan',
            'sale' => $data_sale,
            'detail' => $data_detail,
            'profile' => $data_profile
        ];
        return view('laporan/detail_jual', $data);
    }

    public function printdetail($id)
    {
        $data_sale = $this->_m_sale->getLaporan($id);
        $data_detail = $this->_m_sale_detail->getDetail($id);
        $data_profile = $this->_m_profile->findAll();

        $data = [
            'title' => 'Laporan Penjualan',
            'sale' => $data_sale,
            'detail' => $data_detail,
            'profile' => $data_profile
        ];
        return view('laporan/print_detail', $data);
    }
}
