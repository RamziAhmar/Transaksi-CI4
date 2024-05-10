<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    public function __construct()
    {
        $this->barang = new BarangModel();
    }
    public function index()
    {
        $data = [
            'active' => 'barang',
            'judul' => 'Master Data'
        ];
        return view('barang', $data);
    }
    public function detail(int $id)
    {
        return $this->response->setJSON($this->barang->find($id));
    }
}
