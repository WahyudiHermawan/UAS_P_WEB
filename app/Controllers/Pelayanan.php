<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PelayananModel;

class Pelayanan extends BaseController
{
    public function __construct()
    {
        $this->model = new PelayananModel;
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Data Pelayanan',
            'pelayanan' => $this->model->getAllData()
        ];
        // Load view
        tampilan('pelayanan/index', $data);
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
                    'label' => 'Nama pelayanan',
                    'rules' => 'required|is_unique[pelayanan.nama]'
                ],
                'keterangan' => [
                    'label' => 'Ketrangan pelayanan',
                    'rules' => 'required'
                ],
                'kode' => [
                    'label' => 'Kode',
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
                return redirect()->to(base_url('/pelayanan'));
            } else {
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode' => $this->request->getPost('kode')
                ];

                // Insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('/pelayanan'));
                }
            }
        } else {
            return redirect()->to(base_url('/pelayanan'));
        }
    }
    public function hapus($id)
    {
        $this->model->hapus($id);

        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to(base_url('/pelayanan'));
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $db_nama = $this->model->getAllData($id)['nama'];

            if ($nama === $db_nama) {
                $val = $this->validate([
                    'nama' => [
                        'label' => 'Nama pelayanan',
                        'rules' => 'required'
                    ],
                    'keterangan' => [
                        'label' => 'Keterangan pelayanan',
                        'rules' => 'required'
                    ],
                    'kode' => [
                        'label' => 'kode pelayanan',
                        'rules' => 'required'
                    ]
                ]);
            } else {
                $val = $this->validate([
                    'nama' => [
                        'label' => 'Nama pelayanan',
                        'rules' => 'required|is_unique[pelayanan.nama]'
                    ],
                    'keterangan' => [
                        'label' => 'Keterangan pelayanan',
                        'rules' => 'required'
                    ],
                    'kode' => [
                        'label' => 'kode pelayanan',
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
                return redirect()->to(base_url('/pelayanan'));
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'kode' => $this->request->getPost('kode')
                ];

                // Insert data
                $this->model->ubah($data, $id);

                session()->setFlashdata('message', 'Diubah');
                return redirect()->to(base_url('/pelayanan'));
            }
        } else {
            return redirect()->to(base_url('/pelayanan'));
        }
    }
}
