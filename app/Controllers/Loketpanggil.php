<?php

namespace App\Controllers;

class Loketpanggil extends BaseController
{
    public function __construct()
    {
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Loket Panggil'
        ];
        tampilan('loketpanggil/index', $data);
    }
}
