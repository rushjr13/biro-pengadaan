<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		$data['judul'] = "Layanan";
		$data['layanan_utama'] = $this->Admin_model->layanan_utama();
		$data['layanan_pendukung'] = $this->Admin_model->layanan_pendukung();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/layanan/index', $data);
		$this->load->view('template/landing/footer', $data);
	}

	public function detail($id=null)
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		if($id==null){
			$this->session->set_flashdata('info', '<div class="text-danger text-center font-weight-bold">Tidak ada layanan yang dipilih!</div>');
			redirect('layanan');
		}else{
			$data['judul'] = "Layanan";
			$data['layanan'] = $this->Admin_model->layanan_detail($id);
			$data['layanan_utama'] = $this->Admin_model->layanan_utama();
			$this->load->view('template/landing/header', $data);
			$this->load->view('template/landing/navbar', $data);
			$this->load->view('landing/layanan/detail', $data);
			$this->load->view('template/landing/footer', $data);
		}
	}
}