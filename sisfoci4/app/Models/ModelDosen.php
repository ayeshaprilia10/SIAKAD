<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model{
    public function allData(){
        return $this->db->table('aye_dosen')
        ->orderBy('id_dosen', 'DESC')
        ->get()->getResultArray();
    }

    public function dataDosen(){
        return $this->db->table('aye_dosen')
        ->where('nidn', session()->get('username'))
        ->get()->getRowArray();
    }

    public function detailData($id_dosen){
        return $this->db->table('aye_dosen')
        ->where('id_dosen', $id_dosen)
        ->get()->getRowArray();
    }

    public function allDatadosen($id_prodi){
        return $this->db->table('aye_dosen')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('aye_dosen')->insert($data);
    }

    public function edit($data){
        $this->db->table('aye_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('aye_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->delete($data);
    }
}