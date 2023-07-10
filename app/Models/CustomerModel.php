<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer';
    protected $allowedFields    = ['nama', 'alamat', 'email', 'telp', 'diskon'];
    // Dates
    protected $useTimestamps = true;
}
