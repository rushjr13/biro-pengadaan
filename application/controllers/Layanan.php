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
			$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-danger" disabled>Tidak ada layanan yang dipilih!</div><br><br>');
			redirect('layanan');
		}else{
			if($id==11){
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
				$this->form_validation->set_rules('id_layanan', 'Jenis Layanan', 'required',[
					'required' => 'Jenis Layanan Harus Dipilih!'
				]);
				$this->form_validation->set_rules('isi', 'Masukkan', 'required',[
					'required' => 'Masukkan Aduan Anda!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Layanan";
					$data['layanan'] = $this->Admin_model->layanan_detail($id);
					$data['layanan_utama'] = $this->Admin_model->layanan_utama();
					$this->load->view('template/landing/header', $data);
					$this->load->view('template/landing/navbar', $data);
					$this->load->view('landing/layanan/detail', $data);
					$this->load->view('template/landing/footer', $data);
				}else{
					$nama = $this->input->post('nama');
					$telpon = $this->input->post('telpon');
					$email = $this->input->post('email');
					$id_layanan = $this->input->post('id_layanan');
					$isi = $this->input->post('isi');

					$data = [
						'nama'=>$nama,
						'telpon'=>$telpon,
						'email'=>$email,
						'id_layanan'=>$id_layanan,
						'isi_aduan'=>$isi,
						'tanggal'=>time(),
						'status'=>'Pending'
					];
					$this->db->insert('pengaduan', $data);
					$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-success" disabled>Aduan Anda telah dikirim! Terima Kasih atas partisipasi Anda.<br><br></div>');
					redirect('layanan');
				}
			}else if($id==12){
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
				$this->form_validation->set_rules('isi', 'Masukkan', 'required',[
					'required' => 'Masukkan Kritik dan atau Saran Anda!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Layanan";
					$data['layanan'] = $this->Admin_model->layanan_detail($id);
					$data['layanan_utama'] = $this->Admin_model->layanan_utama();
					$this->load->view('template/landing/header', $data);
					$this->load->view('template/landing/navbar', $data);
					$this->load->view('landing/layanan/detail', $data);
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
						'isi_ks'=>$isi,
						'tanggal'=>time(),
						'status'=>'Pending'
					];
					$this->db->insert('kds', $data);
					$this->session->set_flashdata('info', '<div class="text-center"><button class="btn btn-success" disabled>Saran dan atau Kritik Anda telah dikirim! Terima Kasih atas partisipasi Anda.<br><br></div>');
					redirect('layanan');
				}
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
}