<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ObatModel;
use App\Models\StokModel;
use App\Models\BuyModel;
use App\Models\ProfileModel;

define('_TITLE', 'Stok Barang');
class Stok extends BaseController
{
    private $_m_obat, $_m_stok, $_m_buy;
    public function __construct()
    {
        $this->_m_buy = new BuyModel();
        $this->_m_obat = new ObatModel();
        $this->_m_stok = new StokModel();
    }
    
    public function index()
    {
       $produk = $this->_m_obat->getStok();
       $buy = $this->_m_buy->findAll();
       $data = [
        'title' => _TITLE,
        'produk' => $produk,
        'buy' =>$buy
       ]
    }
}
