<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required',[
			'required' => 'Nama Lengkap Harus Diisi!'
		]);
		$this->form_validation->set_rules('telpon', 'No. Telepon/HP', 'required',[
			'required' => 'No. Telepon/HP Harus Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required' => 'Email Harus Diisi!',
			'valid_email' => 'Email Tidak Valid!'
		]);
		$this->form_validation->set_rules('perihal', 'Perihal Pesan', 'required',[
			'required' => 'Perihal Pesan Harus Diisi!'
		]);
		$this->form_validation->set_rules('isi', 'Masukkan', 'required',[
			'required' => 'Masukkan Pesan Anda!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Hubungi Kami";
			$this->load->view('template/landing/header', $data);
			$this->load->view('template/landing/navbar', $data);
			$this->load->view('landing/kontak', $data);
			$this->load->view('template/landing/footer', $data);
		}else{
			$nama = $this->input->post('nama');
			$telpon = $this->input->post('telpon');
			$email = $this->input->post('email');
			$isi = $this->input->post('isi');

			$data = [
				'nama'=>$nama,
				'telpon'=>$telpon,
				'email'=>$email,
				'isi_pesan'=>$isi,
				'tanggal'=>time(),
				'status'=>'Pending'
			];
			$this->db->insert('pesan', $data);
			$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-success" disabled>Pesan Anda telah dikirim! Kami akan segera merespon pesan Anda.<br>Terima kasih <strong>'.$nama.'</strong>.</button><br><br></div>');
			redirect('kontak');
		}
	}
}