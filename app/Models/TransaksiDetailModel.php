<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table            = 'transaksi_detail';
    protected $primaryKey       = 'id_transaksi_detail';
    protected $allowedFields    = ['id_transaksi_header', 'nomor', 'id_barang', 'qty', 'harga', 'jumlah'];
}
