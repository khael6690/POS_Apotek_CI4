<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected  $table = 'sale';
    protected $useTimestamps = true;
    protected $allowedFields = ['sale_id', 'userid', 'customerid', 'discount'];

    public function getLaporan($id = null)
    {
        if ($id === null) {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.userid, date(s.created_at) tgl_transaksi, s.discount, u.username, u.fullname, s.customerid, c.nama nama_customer, c.alamat,  c.telp, c.email, SUM(sd.total_price) total')
                ->join('sale s', 'sd.sale_id = s.sale_id')
                ->join('users u', 'u.id=s.userid')
                ->join('customer c', 'c.id = s.customerid', 'left')
                ->groupBy('s.sale_id')
                ->orderBy('tgl_transaksi', 'DESC')
                ->get()->getResultArray();
        } else {
            return $this->db->table('sale_detail as sd')
                ->select('s.sale_id, s.userid, date(s.created_at) tgl_transaksi, s.discount, u.username, u.fullname, s.customerid, c.nama nama_customer, c.alamat,  c.telp, c.email, SUM(sd.total_price) total')
                ->join('sale s', 'sd.sale_id = s.sale_id')
                ->join('users u', 'u.id=s.userid')
                ->join('customer c', 'c.id = s.customerid', 'left')
                ->where('s.sale_id', $id)
                ->groupBy('s.sale_id')
                ->orderBy('tgl_transaksi', 'DESC')
                ->get()->getResultArray();
        }
    }


    public function getRows()
    {
        $this->select('*')
            ->where('MONTH(sale.created_at) = MONTH(CURDATE())')
            ->get();
        return $this->countAllResults();
    }

    public function saleGrafik()
    {
        $this->select('DATE_FORMAT(sale.created_at, "%b") AS tgl, SUM(sd.total_price) AS total')
            ->join('sale_detail sd', 'sd.sale_id = sale.sale_id', 'RIGHT')
            ->where('YEAR(sale.created_at) = YEAR(CURDATE())')
            ->groupBy('tgl')
            ->orderBy('tgl', 'DESC');
        return $this->get()->getResultArray();
    }
}
