<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoketModel;
use App\Models\PelayananModel;

class Loket extends BaseController
{
    public function __construct()
    {
        $this->model = new LoketModel;
        $this->pmodel = new PelayananModel;
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Data Loket',
            'loket' => $this->model->getAllData(),
            'pelayanan' => $this->pmodel->getAllData(),
        ];
        // Load view
        tampilan('loket/index',$data);
        // echo view('templates/v_header', $data);
        // echo view('templates/v_sidebar');
        // echo view('templates/v_topbar');
        // echo view('loket/index', $data);
        // echo view('templates/v_footer');
    }
    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama' => [
                    'label' => 'Nama loket',
                    'rules' => 'required|is_unique[loket.nama]'
                ],
                'keterangan' => [
                    'label' => 'Ketrangan loket',
                    'rules' => 'required'
                ],
                'pelayanan' => [
                    'label' => 'Pelayanan loket',
                    'rules' => 'required'
                ]
            ]);
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                // $data = [
                //     'judul' => 'Data Loket',
                //     'loket' => $this->model->getAllData()
                // ];
                // echo view('templates/v_header', $data);
                // echo view('templates/v_sidebar');
                // echo view('templates/v_topbar');
                // echo view('loket/index', $data);
                // echo view('templates/v_footer');
                return redirect()->to(base_url('/loket'));
            } else {
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'pelayanan_id' => $this->request->getPost('pelayanan')
                ];

                // Insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('/loket'));
                }
            }
        } else {
            return redirect()->to(base_url('/loket'));
        }
    }
    public function hapus($id)
    {
        $this->model->hapus($id);

        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to(base_url('/loket'));
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $db_nama = $this->model->getAllData($id)['nama'];

            if($nama === $db_nama){
                $val = $this->validate([
                    'nama' => [
                        'label' => 'Nama loket',
                        'rules' => 'required'
                    ],
                    'keterangan' => [
                        'label' => 'Ketrangan loket',
                        'rules' => 'required'
                    ],
                    'pelayanan' => [
                        'label' => 'Pelayanan loket',
                        'rules' => 'required'
                    ]
                ]);
            }else{
                $val = $this->validate([
                    'nama' => [
                        'label' => 'Nama loket',
                        'rules' => 'required|is_unique[loket.nama]'
                    ],
                    'keterangan' => [
                        'label' => 'Keterangan loket',
                        'rules' => 'required'
                    ],
                    'pelayanan' => [
                        'label' => 'Pelayanan loket',
                        'rules' => 'required'
                    ]
                ]);
            }
            
            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                // $data = [
                //     'judul' => 'Data Loket',
                //     'loket' => $this->model->getAllData()
                // ];
                // echo view('templates/v_header', $data);
                // echo view('templates/v_sidebar');
                // echo view('templates/v_topbar');
                // echo view('loket/index', $data);
                // echo view('templates/v_footer');
                return redirect()->to(base_url('/loket'));
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'pelayanan_id' => $this->request->getPost('pelayanan')
                ];

                // Insert data
                $this->model->ubah($data, $id);
               
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to(base_url('/loket'));
                
            }
        } else {
            return redirect()->to(base_url('/loket'));
        }
    }
}
