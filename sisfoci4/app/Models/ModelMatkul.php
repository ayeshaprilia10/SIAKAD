<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMatkul extends Model{
    public function allData(){
        return $this->db->table('aye_matkul')
        ->orderBy('id_matkul', 'DESC')
        ->get()->getResultArray();
    }

    public function allDataMatkul($id_prodi){
        return $this->db->table('aye_matkul')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('aye_matkul')->insert($data);
    }

    public function edit($data){
        $this->db->table('aye_matkul')
        ->where('id_matkul', $data['id_matkul'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('aye_matkul')
        ->where('id_matkul', $data['id_matkul'])
        ->delete($data);
    }
}