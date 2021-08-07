<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table = 'antrian';
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->get();
        } else {
            $this->builder->where('id', $id);
            return $this->builder->get()->getRowArray();
        }
    }
    
    public function noantrian()
    {
        $kode = $this->db->table('antrian')
            ->select('RIGHT(no_antrian,2) as no_antrian',FALSE)
            ->orderBy('no_antrian','DESC')
            ->limit(1)->get()->getRowArray();

        if($kode['no_antrian'] == null){
            $no = 1;
        }else{
            $no = intval($kode['no_antrian']) + 1;
        }
        $no_antrian = str_pad($no, 2, "0", STR_PAD_LEFT);
        return $no_antrian;
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
