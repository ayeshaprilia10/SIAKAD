<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
	public function __construct(){
        // helper('form');
        $this->ModelAdmin = new ModelAdmin();
        // $this->ModelProdi = new ModelProdi();
    }

	public function index()
	{
		$data = [
			'title' => ' Admin',
			'jml_fakultas' => $this->ModelAdmin->jml_fakultas(),
			'jml_prodi' => $this->ModelAdmin->jml_prodi(),
			'jml_matkul' => $this->ModelAdmin->jml_matkul(),
			'jml_dosen' => $this->ModelAdmin->jml_dosen(),
			'jml_mhs' => $this->ModelAdmin->jml_mhs(),
			'jml_admin' => $this->ModelAdmin->jml_admin(),
			'isi'	=> 'v_admin'
		];
		return view('layout/v_wrapper', $data);
	}
}
