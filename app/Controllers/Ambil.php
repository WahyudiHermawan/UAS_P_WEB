<?php

namespace App\Controllers;

use App\Models\PelayananModel;
use App\Models\AntrianModel;

class Ambil extends BaseController
{
    public function __construct()
    {
        helper('sn');
        $this->Pmodel = new PelayananModel;
        $this->Amodel = new AntrianModel;
    }
    public function index()
    {
        
        $data = [
            'judul' => 'Ambil Antrian',
            'pelayanan' => $this->Pmodel->getAllData()
            
            
        ];
        tampilan('ambil/index', $data);
    }
    public function noantrian($id)
    {
        $data = [
            'judul' => 'No Antrian',
            'pelayanan' => $this->Pmodel->getAllData($id),
            'noantrian' => $this->Amodel->noantrian()
        ];

        tampilan('ambil/noantrian', $data);
    }
    public function ambilno()
    {
        $date = date('Ymd');
        $no_antrian = $this->Amodel->noantrian();
        $data = [
            'tanggal' => $date,
            'no_antrian' => $no_antrian
        ];

        $this->Amodel->tambah($data);
        return redirect()->to(base_url('/ambil/index'));
    }
    
}
