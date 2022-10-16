<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table            = 'stoks';
    protected $primaryKey       = 'id_stok';
    protected $allowedFields    = ['stok'];

    // Dates
    protected $useTimestamps = true;
}
