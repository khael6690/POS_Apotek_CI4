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
            return $this->select('obat.id_obat, obat.nama as nama_obat, produsen.nama, obat.harga')
                ->join('produsen', 'obat.produsen = produsen.id_produsen')
                ->join('stok', 'stok.id_obat = obat.id_obat')
                ->join('satuan', 'obat.satuan = satuan.id', 'LEFT');
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
        return $this->select('obat.id_obat, obat.nama as nama_obat, produsen.nama AS produsen, stok.stok as jumlah')
            ->join('produsen', 'obat.produsen = produsen.id_produsen')
            ->join('stok', 'stok.id_obat = obat.id_obat')
            ->join('satuan', 'obat.satuan = satuan.id', 'LEFT')
            ->where('stok.stok >', 0);
    }

    public function getProduk()
    {
        return $this->select('obat.id_obat, obat.nama as nama_obat, produsen.nama AS produsen, obat.harga, obat.discount, stok.stok as jumlah')
            ->join('produsen', 'obat.produsen = produsen.id_produsen')
            ->join('stok', 'stok.id_obat = obat.id_obat')
            ->join('satuan', 'obat.satuan = satuan.id', 'LEFT')
            ->where('stok.stok >', 0);
    }
}
