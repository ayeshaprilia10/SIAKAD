<?php

namespace App\Controllers;

use App\Models\ModelMatkul;
use App\Models\ModelProdi;

class Matkul extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
    }
	public function index()
	{
		$data = [
			'title' => ' Mata Kuliah',
            'prodi' => $this->ModelProdi->allData(),
			'isi'	=> 'admin/matkul/v_matkul'
		];
		return view('layout/v_wrapper', $data);
	}

    public function detail($id_prodi)
	{
		$data = [
			'title' => ' Mata Kuliah',
            'prodi' => $this->ModelProdi->detail_data($id_prodi),
            'matkul' => $this->ModelMatkul->allDataMatkul($id_prodi),
			'isi'	=> 'admin/matkul/v_detail'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add($id_prodi){
		if($this->validate([
            'kode_matkul' => [
                'label' => 'Kode Mata Kuliah',
                'rules' => 'required|is_unique[aye_matkul.kode_matkul]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ],
            'matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'sks' => [
                'label' => 'SKS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
			'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
			'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
        ])){
			$data = [
                'kode_matkul' => $this->request->getPost('kode_matkul'),
                'matkul' => $this->request->getPost('matkul'),
                'sks' => $this->request->getPost('sks'),
				'smt' => $this->request->getPost('sks'),
				'kategori' => $this->request->getPost('kategori'),
				'id_prodi' => $id_prodi,
            ];
            $this->ModelMatkul->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('matkul/detail/'. $id_prodi));
		}
		else{
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('matkul/detail/'. $id_prodi));
		}
	}

	public function delete($id_prodi, $id_matkul){
        $data = [
            'id_matkul' => $id_matkul,
        ];
        $this->ModelMatkul->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!!');
        return redirect()->to(base_url('matkul/detail/'. $id_prodi));
    }
}