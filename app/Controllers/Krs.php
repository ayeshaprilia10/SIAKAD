<?php

namespace App\Controllers;

// use App\Models\ModelAdmin;
use App\Models\ModelKrs;
use TCPDF;

class Krs extends BaseController
{
	public function __construct(){
        // helper('form');
        $this->ModelKrs = new ModelKrs();
    }

	public function index()
	{
        $mhs = $this->ModelKrs->detailMhs();
		$data = [
			'title' => ' Kartu Rencana Studi',
            'mhs'   => $this->ModelKrs->DataMahasiswa(),
            'kontrak'   => $this->ModelKrs->matkul_kontrak(),
            'data_kontrak'   => $this->ModelKrs->kontrak($mhs['id_mhs']),
			'isi'	=> 'mhs/krs/v_krs'
		];
		return view('layout/v_wrapper', $data);
	}
    public function tambah_mk($id_matkul){
        $mhs = $this->ModelKrs->DataMahasiswa();
        $data = [
            'id_matkul' => $id_matkul,
            'id_mhs' => $mhs['id_mhs']
        ];
        $this->ModelKrs->tambah_mk($data);
        session()->setFlashdata('pesan', 'Mata Kuliah berhasil ditambahkan!');
        return redirect()->to(base_url('krs'));
    }

    public function delete($id_krs){
        $data = [
            'id_krs' => $id_krs,
        ];
        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'Mata Kuliah berhasil di Hapus!');
        return redirect()->to(base_url('krs'));
    }

    public function print(){
        $mhs = $this->ModelKrs->detailMhs();
        $data = [
            'title' => 'Print KRS',
            'mhs'   => $this->ModelKrs->DataMahasiswa(),
            'data_kontrak'   => $this->ModelKrs->kontrak($mhs['id_mhs']),
        ];
        return view('mhs/krs/v_print_krs', $data);
    }

    public function printpdf(){
        $mhs = $this->ModelKrs->detailMhs();
        $data = [
            'title' => 'Print KRS',
            'mhs'   => $this->ModelKrs->DataMahasiswa(),
            'data_kontrak'   => $this->ModelKrs->kontrak($mhs['id_mhs']),
        ];
        $html = view('mhs/krs/v_print_pdf', $data);

        // create new PDF document
        $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('KRS.pdf', 'I');
    }
}
