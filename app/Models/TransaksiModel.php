<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi_header';

    protected $primaryKey = 'id_transaksi_header';
    
    protected $allowedFields = ['id_customer', 'nomor_transaksi', 'tanggal_transaksi', 'total', 'diskon', 'ppn', 'grand_total'];

}
