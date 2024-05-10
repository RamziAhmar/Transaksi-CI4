<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'active' => 'dashboard',
            'judul' => 'Dashboard'
        ];
        return view('dashboard', $data);
    }
}
