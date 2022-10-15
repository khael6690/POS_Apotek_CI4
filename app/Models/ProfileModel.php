<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'profile';
    protected $allowedFields    = ['nama', 'alamat', 'kota', 'telp', 'email'];
    protected $useTimestamps = true;
}
