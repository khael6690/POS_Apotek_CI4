<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class ObatModel extends Model
{
    protected  $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'stok', 'deskripsi', 'satuan', 'produsen', 'harga', 'img'];

    public function getObat($id = null)
    {
        if ($id === null) {
            $this->select('obat.nama as nama_obat, obat.stok, obat.img, obat.satuan, obat.harga, obat.discount, obat.deskripsi, obat.id_obat, produsen.nama, satuan.satuan as satuan_obat')
                ->join('produsen', 'obat.produsen = produsen.id_produsen')
                ->join('satuan', 'obat.satuan = satuan.id');
            return $this->get()->getResultArray();
        } else {
            $this->select('obat.nama as nama_obat, obat.id_obat, obat.img, obat.satuan, obat.stok, obat.harga, obat.discount, obat.deskripsi, obat.produsen, produsen.nama, satuan.satuan as satuan_obat ')
                ->join('produsen', 'obat.produsen = produsen.id_produsen')
                ->join('satuan', 'obat.satuan = satuan.id');
            $this->where(['id_obat' => $id]);
            return $this->first();
        }
    }
}
