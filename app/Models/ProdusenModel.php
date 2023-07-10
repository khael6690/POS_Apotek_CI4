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
}
