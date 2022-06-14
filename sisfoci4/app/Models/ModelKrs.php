<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model{
    public function DataMahasiswa(){
        return $this->db->table('aye_mhs')
        ->join('aye_prodi', 'aye_prodi.id_prodi = aye_mhs.id_prodi', 'left')
        ->join('aye_fakultas', 'aye_fakultas.id_fakultas = aye_prodi.id_fakultas', 'left')
        ->where('nim', session()->get('username'))
        ->get()->getRowArray();
    }

    public function matkul_kontrak(){
        return $this->db->table('aye_matkul')
        ->get()->getResultArray();
    }

    public function tambah_mk($data){
        $this->db->table('aye_krs')->insert($data);
    }

    public function kontrak($id_mhs){
        return $this->db->table('aye_krs')
        ->join('aye_matkul', 'aye_matkul.id_matkul = aye_krs.id_matkul', 'left')
        ->where('id_mhs', $id_mhs)
        ->get()->getResultArray();
    }

    public function detailMhs(){
        return $this->db->table('aye_mhs')
        ->where('nim', session()->get('username'))
        ->get()->getRowArray();
    }

    public function delete_data($data){
        $this->db->table('aye_krs')
        ->where('id_krs', $data['id_krs'])
        ->delete($data);
    }
}