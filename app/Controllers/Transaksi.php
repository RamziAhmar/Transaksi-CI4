<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiModel;
use App\Models\CustomerModel;
use App\Models\BarangModel;

class Transaksi extends BaseController
{   
    protected $customerModel;
    protected $itemModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->itemModel = new BarangModel();
    }
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

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $transaction = $this->transaction->insert($data);
        $dataDetail  = [];

        foreach ($data['product_id'] as $key => $productId) {
            $dataDetail[] = [
                'transaction_id' => $transaction,
                'product_id'     => $productId,
                'qty'            => $data['qty'][$key],
                'price'          => $data['price'][$key],
                'amount'         => $data['amount'][$key],
            ];
        }

        $this->transactionDetail->insertBatch($dataDetail);

        sendTelegramNotification('User ' . session()->get('username') . ' menambahkan Transaksi ' . $data['no_transaction']);

        return redirect()->route('Transaction::index')->with('message', 'Sukses tambah data');
    }
}
