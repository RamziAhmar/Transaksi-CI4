<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Customer extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'customer',
            'judul' => 'Master Data'
        ];
        return view('customer', $data);
    }
}
