<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		$data['judul'] = "Profil";
		$data['profil'] = $this->Admin_model->profil();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/profil/index', $data);
		$this->load->view('template/landing/footer', $data);
	}

	public function detail($id=null)
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		if($id==null){
			$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-danger" disabled>Tidak ada profil yang dipilih!<br><br></div>');
			redirect('profil');
		}else{
			$data['judul'] = "Profil";
			$data['profil'] = $this->Admin_model->profil($id);
			$this->load->view('template/landing/header', $data);
			$this->load->view('template/landing/navbar', $data);
			$this->load->view('landing/profil/detail', $data);
			$this->load->view('template/landing/footer', $data);
		}
	}
}