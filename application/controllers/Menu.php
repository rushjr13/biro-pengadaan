<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->Admin_model->cek_masuk();
    }

	public function index()
	{
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();

		// KHUSUS
		$data['judul'] = "Dashboard";
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function submenu()
	{
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();

		// KHUSUS
		$data['judul'] = "Sub Menu";
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function landing($hal=null, $id=null)
	{
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();

		// KHUSUS
		if($hal==null){
			$data['judul'] = "Landing";
			$data['menulanding'] = $this->Admin_model->menulanding();
			$data['profil'] = $this->Admin_model->profil();
			$data['layanan_utama'] = $this->Admin_model->layanan_utama();
			$data['layanan_pendukung'] = $this->Admin_model->layanan_pendukung();
			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('menu/landing', $data);
			$this->load->view('template/dashboard/footer', $data);
		}else if($hal=='profil'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada profil yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/landing');
			}else{
				$this->form_validation->set_rules('isi', 'Bidang Ini', 'required',[
					'required' => 'Bidang Ini Harus Diisi!'
				]);
				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Landing";
					$data['subjudul'] = "Profil";
					$data['menulanding'] = $this->Admin_model->menulanding();
					$data['profil'] = $this->Admin_model->profil($id);
					$this->load->view('template/dashboard/header', $data);
					$this->load->view('template/dashboard/sidebar', $data);
					$this->load->view('template/dashboard/topbar', $data);
					$this->load->view('menu/landing/profil', $data);
					$this->load->view('template/dashboard/footer', $data);
				}else{
					$tipe = $this->input->post('tipe');
					$nama_profil = $this->input->post('nama_profil');
					if($tipe=='text'){
						$isi = $this->input->post('isi');
						$this->db->set('isi', $isi);
						$this->db->where('id_profil', $id);
						$this->db->update('profil');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info"></i> Profil <strong>'.$nama_profil.'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('menu/landing/profil/'.$id);
					}else{
						// Cek gambar yang diupload
						$gambar_upload = $_FILES['gambar']['name'];

						if($gambar_upload){
							$config['allowed_types']	= 'jpg|jpeg|png';
							$config['upload_path']		= './assets/admin/img/profil/';
							$this->load->library('upload', $config);
							if($this->upload->do_upload('gambar')){
								$gambar_lama = $this->input->post('gambar_lama');
								unlink(FCPATH.'assets/admin/img/profil/'.$gambar_lama);
								$gambar_baru = $this->upload->data('file_name');
								$data = ['isi'=>$gambar_baru];
							} else {
								echo $this->upload->display_errors();
							}
							$this->db->set($data);
							$this->db->where('id_profil', $id);
							$this->db->update('profil');

							$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																	  <i class="fa fa-fw fa-info-circle"></i> Profil <strong>'.$nama_profil.'</strong> telah diperbarui!
																	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	    <span aria-hidden="true">&times;</span>
																	  </button>
																	</div>');
							redirect('menu/landing/profil/'.$id);
						}

					}
				}
			}
		}else if($hal=='layanan'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada layanan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/landing');
			}else{
				$this->form_validation->set_rules('isi', 'Bidang Ini', 'required',[
					'required' => 'Bidang Ini Harus Diisi!'
				]);
				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Landing";
					$data['subjudul'] = "Layanan";
					$data['menulanding'] = $this->Admin_model->menulanding();
					$data['layanan'] = $this->Admin_model->layanan_detail($id);
					$data['pengaduan'] = $this->Admin_model->pengaduan();
					$this->load->view('template/dashboard/header', $data);
					$this->load->view('template/dashboard/sidebar', $data);
					$this->load->view('template/dashboard/topbar', $data);
					$this->load->view('menu/landing/layanan', $data);
					$this->load->view('template/dashboard/footer', $data);
				}else{
					$nama_layanan = $this->input->post('nama_layanan');
					$isi = $this->input->post('isi');
					$this->db->set('isi', $isi);
					$this->db->where('id_layanan', $id);
					$this->db->update('layanan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info"></i> Layanan <strong>'.$nama_layanan.'</strong> telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing/layanan/'.$id);
				}
			}
		}
	}
}