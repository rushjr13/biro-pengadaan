<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesalahan extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();

		// KHUSUS
		$data['judul'] = "404 Halaman Tidak Ditemukan";
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('kesalahan', $data);
		$this->load->view('template/landing/footer', $data);
	}
}
