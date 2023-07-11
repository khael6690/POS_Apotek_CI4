<?php

namespace App\Models;

use CodeIgniter\Model;

class OpnameModel extends Model
{
    protected $table            = 'stok_opname';
    protected $primaryKey       = 'id_opname';
    protected $allowedFields    = ['id_opname', 'id_obat', 'jumlah', 'keterangan'];
    protected $useTimestamps = true;


    public function getAll($id = null)
    {
        if ($id === null) {
            return $this->db->table('stok_opname as SO')
                ->select('SO.id_opname, O.nama as obat, SO.jumlah, SO.keterangan, date(SO.updated_at) tgl')
                ->join('obat O', 'O.id_obat = SO.id_obat', 'LEFT')
                ->join('stok S', 'S.id_obat = SO.id_obat', 'LEFT')
                ->groupBy('SO.id_opname');
        } else {
            return $this->db->table('stok_opname as SO')
                ->select('SO.id_opname,SO.id_obat, O.nama as obat, SO.jumlah, SO.keterangan, date(SO.created_at) tgl')
                ->join('obat O', 'O.id_obat = SO.id_obat', 'LEFT')
                ->where('SO.id_opname', $id)
                ->get()->getRowArray();
        }
    }
}
