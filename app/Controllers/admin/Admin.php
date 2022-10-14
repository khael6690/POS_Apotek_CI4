<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

define('_TITLE', 'Dashboard');

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => _TITLE,
        ];
        return view('page', $data);
    }
}
