<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyModel extends Model
{
    protected $table            = 'buy';
    protected $useTimestamps = true;
    protected $allowedFields    = ['buyid', 'userid', 'supplier', 'discount'];

    public function getAll($id = null)
    {
        if ($id === null) {
            return $this->db->table('buy_detail as BD')
                ->select('B.buyid,BD.amount AS jumlah,O.nama AS obat , U.fullname AS namaadm, B.supplier, date(B.created_at) tgl')
                ->join('buy B', 'B.buyid = BD.buyid')
                ->join('users U', 'B.userid = U.id')
                ->join('obat O', 'O.id_obat=BD.id_obat', 'LEFT')
                ->groupBy('BD.buyid')
                ->orderBy('tgl', 'DESC')
                ->get()->getResultArray();
        } else {
            return $this->db->table('buy_detail as BD')
                ->select('B.buyid,BD.amount AS jumlah,O.nama AS obat , U.fullname AS namaadm, B.supplier, date(B.created_at) tgl')
                ->join('buy B', 'B.buyid = BD.buyid')
                ->join('users U', 'B.userid = U.id')
                ->join('obat O', 'O.id_obat=BD.id_obat', 'LEFT')
                ->where('BD.buyid', $id)
                ->groupBy('BD.buyid')
                ->orderBy('tgl', 'DESC')
                ->get()->getResultArray();
        }
    }
}
