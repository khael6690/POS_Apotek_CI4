<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class ProdusenModel extends Model
{
    protected  $table = 'produsen';
    protected $primaryKey = 'id_produsen';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat', 'telp'];

    // public function getProdusen($id = null)
    // {
    //     if ($id === null) {
    //         $this->select('obat.nama as nama_obat, obat.stok, obat.harga, obat.deskripsi, obat.id_obat, produsen.*')
    //             ->join('obat', 'obat.produsen = produsen.id_produsen');
    //         return $this->get()->getResultArray();
    //     } else {
    //         $this->select('obat.nama as nama_obat, obat.stok, obat.harga, obat.deskripsi, produsen.*')
    //             ->join('obat', 'obat.produsen = produsen.id_produsen');
    //         $this->where(['id_produsen' => $id]);
    //         return $this->first();
    //     }
    // }
}
