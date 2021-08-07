<?php

namespace App\Controllers;

class Antrian extends BaseController
{
    public function __construct()
    {
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Antrian'
        ];
        tampilan('antrian/index', $data);
    }
    public function ambil()
    {
        $data = [
            'judul' => 'Ambil Antrian'
        ];
        tampilan('antrian/ambil', $data);
    }
}
