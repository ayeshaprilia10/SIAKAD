<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model{
    public function login_user($username, $password){
        return $this->db->table('aye_user')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_mhs($username, $password){
        return $this->db->table('aye_mhs')->where([
            'nim' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }
    
    public function login_dsn($username, $password){
        return $this->db->table('aye_dosen')->where([
            'nidn' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }
}