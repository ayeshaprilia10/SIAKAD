<?php

namespace App\Controllers;

// use App\Models\ModelAdmin;
use App\Models\ModelDosen;

class Dsn extends BaseController
{
	public function __construct(){
        // helper('form');
        $this->ModelDosen = new ModelDosen();
        // $this->ModelProdi = new ModelProdi();
    }

	public function index()
	{
		$data = [
			'title' => ' Dosen',
			'dsn'	=> $this->ModelDosen->dataDosen(),
			'isi'	=> 'v_dashboard_dsn'
		];
		return view('layout/v_wrapper', $data);
	}
}
