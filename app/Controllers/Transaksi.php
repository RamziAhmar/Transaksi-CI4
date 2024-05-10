<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiModel;
use App\Models\CustomerModel;
use App\Models\BarangModel;

class Transaksi extends BaseController
{   
    public function index()
    {
        $this->customerModel = new CustomerModel();
        $this->itemModel = new BarangModel();

        $data = [
            'active' => 'transaksi',
            'judul' => 'Transaksi'
        ];
        $data['customers'] = $this->customerModel->findAll();
        $data['items'] = $this->itemModel->findAll();

        return view('transaksi', $data);
    }
}
