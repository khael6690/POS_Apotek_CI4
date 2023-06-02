<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class ObatModel extends Model
{
    protected  $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'deskripsi', 'satuan', 'produsen', 'harga', 'img'];

    public function getObat($id = null)
    {
        if ($id === null) {
            $this->select('obat.nama as nama_obat, obat.img, obat.satuan, obat.harga, obat.discount, obat.deskripsi, obat.id_obat, stok.stok as jumlah, produsen.nama, satuan.satuan as satuan_obat')
                ->join('produsen', 'obat.produsen = produsen.id_produsen')
                ->join('stok', 'stok.id_obat = obat.id_obat')
                ->join('satuan', 'obat.satuan = satuan.id', 'LEFT');
            return $this->get()->getResultArray();
        } else {
            $this->select('obat.nama as nama_obat, obat.id_obat, obat.img, obat.satuan, obat.harga, obat.discount, obat.deskripsi, obat.produsen, stok.stok as jumlah, produsen.nama, satuan.satuan as satuan_obat ')
                ->join('produsen', 'obat.produsen = produsen.id_produsen')
                ->join('stok', 'stok.id_obat = obat.id_obat')
                ->join('satuan', 'obat.satuan = satuan.id', 'LEFT');
            $this->where('obat.id_obat', $id);
            return $this->first();
        }
    }

    public function getStok()
    {
        $this->select('obat.nama as nama_obat, obat.id_obat, obat.img, obat.satuan, obat.harga, obat.discount, obat.deskripsi, obat.produsen, stok.stok as jumlah, produsen.nama, satuan.satuan as satuan_obat ')
            ->join('produsen', 'obat.produsen = produsen.id_produsen')
            ->join('stok', 'stok.id_obat = obat.id_obat')
            ->join('satuan', 'obat.satuan = satuan.id', 'LEFT');
        $this->where('stok.stok >', 0);
        return $this->get()->getResultArray();
    }
}
