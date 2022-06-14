<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model{
    public function allData(){
        return $this->db->table('aye_prodi')
        ->join('aye_fakultas', 'aye_fakultas.id_fakultas = aye_prodi.id_fakultas', 'left')
        ->orderBy('aye_fakultas.id_fakultas', 'ASC')
        ->get()->getResultArray();
    }

    public function detail_data($id_prodi){
        return $this->db->table('aye_prodi')
        ->join('aye_fakultas', 'aye_fakultas.id_fakultas = aye_prodi.id_fakultas', 'left')
        ->where('id_prodi', $id_prodi)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('aye_prodi')->insert($data);
    }

    public function edit($data){
        $this->db->table('aye_prodi')
        ->where('id_prodi', $data['id_prodi'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('aye_prodi')
        ->where('id_prodi', $data['id_prodi'])
        ->delete($data);
    }
}