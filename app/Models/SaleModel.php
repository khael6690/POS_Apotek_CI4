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
        $this->db->table('sale AS S')
            ->select('*')
            ->where('MONTH(S.created_at) = MONTH(CURDATE())')
            ->get();
        return $this->countAllResults();
    }

    public function saleGrafik()
    {
        return $this->db->table('sale_detail as sd')
            ->select("s.sale_id, s.userid, YEAR(s.created_at) AS tgl, s.discount, u.username, u.fullname, s.customerid, c.nama AS nama_customer, c.alamat, c.telp, c.email, SUM(sd.total_price) AS total")
            ->join('sale s', 'sd.sale_id = s.sale_id')
            ->join('users u', 'u.id = s.userid')
            ->join('customer c', 'c.id = s.customerid')
            ->groupBy('tgl')
            ->orderBy('tgl DESC')
            ->get()
            ->getResultArray();
    }
}
