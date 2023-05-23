<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyModel extends Model
{
    protected $table            = 'buy';
    protected $primaryKey       = 'buyid';
    protected $protectFields    = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['buyid', 'userid', 'obatid', 'qty'];
}
