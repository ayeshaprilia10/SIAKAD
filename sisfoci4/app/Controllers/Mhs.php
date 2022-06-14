<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelKrs;

class Mhs extends BaseController
{
	public function __construct(){
        // helper('form');
        $this->ModelKrs = new ModelKrs();
        // $this->ModelProdi = new ModelProdi();
    }

	public function index()
	{
		$data = [
			'title' => ' Mahasiswa',
			'mhs'	=> $this->ModelKrs->DataMahasiswa(),
			'isi'	=> 'v_dashboard_mhs'
		];
		return view('layout/v_wrapper', $data);
	}
}
