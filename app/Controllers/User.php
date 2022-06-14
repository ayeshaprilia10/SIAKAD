<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelUser = new ModelUser();
    }
	public function index()
	{
		$data = [
			'title' => ' User',
            'user' => $this->ModelUser->allData(),
			'isi'	=> 'admin/v_user'
		];
		return view('layout/v_wrapper', $data);
	}

    public function add(){
        if($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!!',
                    'max_size' => 'Maksimal size 1MB',
                    'mime_in' => 'Ekstensi harus PNG, JPG, JPEG'
                ]
            ],
        ])){
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            $foto->move('foto', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('user'));
        }
        else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user){
        if($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
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
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Maksimal size 1MB',
                    'mime_in' => 'Ekstensi harus PNG, JPG, JPEG'
                ]
            ],
        ])){
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            }
            else{
                $user = $this->ModelUser->detail_data($id_user);
                if($user['foto'] != ""){
                    unlink('foto/'.$user['foto']);
                }
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                $foto->move('foto', $nama_file);
                $this->ModelUser->edit($data);
            }
            session()->setFlashdata('pesan', 'Data berhasil diganti!');
            return redirect()->to(base_url('user'));
        }
        else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user){
        $user = $this->ModelUser->detail_data($id_user);
        if($user['foto'] != ""){
            unlink('foto/'.$user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!!');
        return redirect()->to(base_url('user'));
    }
}