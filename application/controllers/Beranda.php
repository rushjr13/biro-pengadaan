<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();

		// KHUSUS
		$data['judul'] = "Beranda";
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('template/landing/footer', $data);
	}
}