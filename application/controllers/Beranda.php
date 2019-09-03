<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		$data['judul'] = "Beranda";
		$data['program'] = $this->Admin_model->program();
		$data['kegiatan'] = $this->Admin_model->kegiatan();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('template/landing/footer', $data);
	}
}