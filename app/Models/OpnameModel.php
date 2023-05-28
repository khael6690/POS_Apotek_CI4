<?php

namespace App\Models;

use CodeIgniter\Model;

class OpnameModel extends Model
{
    protected $table            = 'stok_opname';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_opname', 'id_obat', 'jumlah', 'keterangan'];
    protected $useTimestamps = true;


    public function getDataOpname($id = null)
    {
        if ($id = null) {
            $this->select('obat.nama as nama_obat, opname.id_obat, opname.keterangan, opname.jumlah')
                ->join('obat', 'obat.id_obat = opname.id_obat', 'LEFT');
            return $this->get()->getResultArray();
        } else {
            $this->select('obat.nama as nama_obat, opname.id_obat, opname.keterangan, opname.jumlah')
                ->join('obat', 'obat.id_obat = opname.id_obat', 'RIGHT');
            $this->where('obat.id_obat', $id);
            return $this->get()->getResultArray();
        }
    }
}
