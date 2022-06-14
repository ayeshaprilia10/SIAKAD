<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }

	public function index()
	{
		$data = [
			'title' => ' Dosen',
            'dosen' => $this->ModelDosen->allData(),
			'isi'	=> 'admin/dosen/v_index'
		];
		return view('layout/v_wrapper', $data);
	}

    public function add()
	{
		$data = [
			'title' => ' Add Dosen',
			'isi'	=> 'admin/dosen/v_add'
		];
		return view('layout/v_wrapper', $data);
	}

    public function insert(){
        if($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required|is_unique[aye_dosen.kode_dosen]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required|is_unique[aye_dosen.nidn]',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'foto_dosen' => [
                'label' => 'Foto Dosen',
                'rules' => 'uploaded[foto_dosen]|max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!!',
                    'max_size' => 'Maksimal size 1MB',
                    'mime_in' => 'Ekstensi harus PNG, JPG, JPEG'
                ]
            ],
        ])){
            $foto_dosen = $this->request->getFile('foto_dosen');
            $nama_file = $foto_dosen->getRandomName();
            $data = array(
                'kode_dosen' => $this->request->getPost('kode_dosen'),
                'nidn' => $this->request->getPost('nidn'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'password' => $this->request->getPost('password'),
                'foto_dosen' => $nama_file,
            );
            $foto_dosen->move('fotodosen', $nama_file);
            $this->ModelDosen->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('dosen'));
        }
        else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/add'));
        }
    }

    public function edit($id_dosen)
	{
		$data = [
			'title' => ' Edit Dosen',
            'dosen' => $this->ModelDosen->detailData($id_dosen),
			'isi'	=> 'admin/dosen/v_edit'
		];
		return view('layout/v_wrapper', $data);
	}

    public function update($id_dosen){
        if($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'foto_dosen' => [
                'label' => 'Foto Dosen',
                'rules' => 'max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Maksimal size 1MB',
                    'mime_in' => 'Ekstensi harus PNG, JPG, JPEG'
                ]
            ],
        ])){
            $foto_dosen = $this->request->getFile('foto_dosen');
            if ($foto_dosen->getError() == 4) {
                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelDosen->edit($data);
            }
            else{
                $dosen = $this->ModelDosen->detailData($id_dosen);
                if($dosen['foto_dosen'] != ""){
                    unlink('fotodosen/'.$dosen['foto_dosen']);
                }
                $nama_file = $foto_dosen->getRandomName();
                $data = array(
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                    'foto_dosen' => $nama_file,
                );
                $foto_dosen->move('fotodosen', $nama_file);
                $this->ModelDosen->edit($data);
            }
            session()->setFlashdata('pesan', 'Data berhasil diganti!');
            return redirect()->to(base_url('dosen'));
        }
        else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit/'.$id_dosen));
        }
    }

    public function delete($id_dosen){
        $dosen = $this->ModelDosen->detailData($id_dosen);
        if($dosen['foto_dosen'] != ""){
            unlink('fotodosen/'.$dosen['foto_dosen']);
        }
        $data = [
            'id_dosen' => $id_dosen,
        ];
        $this->ModelDosen->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!!');
        return redirect()->to(base_url('dosen'));
    }
}
