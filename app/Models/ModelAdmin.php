<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model{
    public function jml_fakultas(){
        return $this->db->table('aye_fakultas')
        ->countAll();
    }

    public function jml_prodi(){
        return $this->db->table('aye_prodi')
        ->countAll();
    }

    public function jml_matkul(){
        return $this->db->table('aye_matkul')
        ->countAll();
    }

    public function jml_dosen(){
        return $this->db->table('aye_dosen')
        ->countAll();
    }

    public function jml_mhs(){
        return $this->db->table('aye_mhs')
        ->countAll();
    }

    public function jml_admin(){
        return $this->db->table('aye_user')
        ->countAll();
    }
}