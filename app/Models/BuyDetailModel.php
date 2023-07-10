<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyDetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'buy_detail';
    protected $allowedFields    = ['buyid', 'id_obat', 'amount', 'price', 'discount', 'total_price'];

    public function getDetail($id)
    {
        return $this->select('buy_detail.*, o.nama')
            ->join('obat o', 'o.id_obat = buy_detail.id_obat')
            ->where('buy_detail.buyid', $id)->findAll();
    }
}
