<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleDetailModel extends Model
{
    protected  $table = 'sale_detail';
    protected $useTimestamps = false;
    protected $allowedFields = ['sale_id', 'id_obat', 'amount', 'price', 'discount', 'total_price'];

    public function getDetail($id)
    {
        return $this->select('sale_detail.*, o.nama')
            ->join('obat o', 'o.id_obat = sale_detail.id_obat')
            ->where('sale_detail.sale_id', $id)->findAll();
    }
}
