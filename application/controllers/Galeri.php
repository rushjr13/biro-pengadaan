<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		$data['judul'] = "Galeri";
		$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/galeri/index', $data);
		$this->load->view('template/landing/footer', $data);
	}

	public function detail($id=null)
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulanding();

		// KHUSUS
		if($id==null){
			$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-danger" disabled>Tidak ada galeri yang dipilih!<br><br></div>');
			redirect('galeri');
		}else{
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email salah!'
			]);
			$this->form_validation->set_rules('telpon', 'Nomor Telepon/HP', 'required',[
				'required' => 'Nomor Telepon/HP Harus Diisi!'
			]);
			$this->form_validation->set_rules('isi_komentar', 'Isi', 'required',[
				'required' => 'Masukkan Komentar Anda!'
			]);
			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Galeri";
				$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan($id);
				$data['komentar_galeri'] = $this->Admin_model->komentar_galeri($id);
				$data['jlh_komentar_galeri'] = $this->Admin_model->jlh_komentar_galeri($id);
				$hit = $data['galeri_kegiatan']['hit'];
				$this->db->set('hit', $hit+1);
				$this->db->where('id_gk', $id);
				$this->db->update('galeri_kegiatan');
				$this->load->view('template/landing/header', $data);
				$this->load->view('template/landing/navbar', $data);
				$this->load->view('landing/galeri/detail', $data);
				$this->load->view('template/landing/footer', $data);
			}else{
				$nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
				$email = htmlspecialchars($this->input->post('email'));
				$telpon = htmlspecialchars($this->input->post('telpon'));
				$isi_komentar = htmlspecialchars($this->input->post('isi_komentar'));

				$data = [
					'id_gk'=>$id,
					'nama_lengkap'=>$nama_lengkap,
					'email'=>$email,
					'telpon'=>$telpon,
					'isi_komentar'=>$isi_komentar,
					'tgl_komentar'=>time()
				];

				$this->db->insert('komentar_galeri', $data);
				$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-success" disabled>Komentar Anda telah dikirim! Terima Kasih atas partisipasi Anda.<br><br></div>');
				redirect('galeri/detail/'.$id);
			}
		}
	}
}