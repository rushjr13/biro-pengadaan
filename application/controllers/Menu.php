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
		$data['judul'] = "Landing";
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

	public function landing($hal=null, $id=null, $opsi=null)
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
			$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan();
			$data['slider'] = $this->Admin_model->slider();
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
					$data['kds'] = $this->Admin_model->kds();
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
		} else if($hal=='galeri'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada galeri yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/landing');
			}else if($id=='tambah'){
				$tgl_gk = $this->input->post('tgl_gk');
				$judul_gk = $this->input->post('judul_gk');
				$uraian = $this->input->post('uraian');

				$data = [
					'tgl_gk'=>$tgl_gk,
					'judul_gk'=>$judul_gk,
					'uraian'=>$uraian
				];

				$this->db->insert('galeri_kegiatan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info"></i> Galeri Kegiatan <strong>'.$judul_gk.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/landing/');
			} else if($id=='ubah'){
				$id_gk = $this->input->post('id_gk');
				$tgl_gk = $this->input->post('tgl_gk');
				$judul_gk = $this->input->post('judul_gk');
				$uraian = $this->input->post('uraian');

				$data = [
					'tgl_gk'=>$tgl_gk,
					'judul_gk'=>$judul_gk,
					'uraian'=>$uraian
				];

				$this->db->set($data);
				$this->db->where('id_gk', $id_gk);
				$this->db->update('galeri_kegiatan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info"></i> Galeri Kegiatan <strong>'.$judul_gk.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('menu/landing/');
			} else if($id=='dokumentasi'){
				if($opsi==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada galeri yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing');
				}else{
					$data['judul'] = "Landing";
					$data['subjudul'] = "Dokumentasi";
					$data['jlh_dk'] = $this->Admin_model->jlh_dk($opsi);
					$data['dok_kegiatan'] = $this->Admin_model->dok_kegiatan($opsi);
					$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan($opsi);
					$this->load->view('template/dashboard/header', $data);
					$this->load->view('template/dashboard/sidebar', $data);
					$this->load->view('template/dashboard/topbar', $data);
					$this->load->view('menu/landing/dok_kegiatan', $data);
					$this->load->view('template/dashboard/footer', $data);
				}
			} else if($id=='tambahdokumentasi'){
				if($opsi==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada galeri yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing');
				}else{
					$id_gk = $this->input->post('id_gk');
					$judul_gk = $this->input->post('judul_gk');
					// Cek gambar yang diupload
					$dok_upload = $_FILES['dok']['name'];

					if($dok_upload){
						$config['allowed_types']	= 'jpg|jpeg|png|pdf';
						$config['max_size']			= '1024';
						$config['upload_path']		= './assets/admin/img/dok_keg/';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('dok')){
							$dok = $this->upload->data('file_name');
							$data_dok = [
								'id_gk'=>$id_gk,
								'dokumentasi'=>$dok
							];
							$this->db->insert('dok_kegiatan', $data_dok);

							$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																	  <i class="fa fa-fw fa-info-circle"></i> Dokumentasi Kegiatan <strong>'.$judul_gk.'</strong> telah ditambahkan!
																	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	    <span aria-hidden="true">&times;</span>
																	  </button>
																	</div>');
							redirect('menu/landing/galeri/dokumentasi/'.$opsi);
						} else {
							echo $this->upload->display_errors();
						}
					}
				}
			} else if($id=='hapusdokumentasi'){
				if($opsi==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada dokumentasi yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing');
				}else{
					$id_dk = $this->input->post('id_dk');
					$id_gk = $this->input->post('id_gk');
					$judul_gk = $this->input->post('judul_gk');
					$dokumentasi = $this->input->post('dokumentasi');

					unlink(FCPATH.'assets/admin/img/dok_keg/'.$dokumentasi);
					$this->db->where('id_dk', $id_dk);
					$this->db->delete('dok_kegiatan');

					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Dokumentasi Kegiatan <strong>'.$judul_gk.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing/galeri/dokumentasi/'.$id_gk);
				}
			} else if($id=='tambahslider'){
				$nama_slider = $this->input->post('nama_slider');
				// Cek gambar yang diupload
				$file_slider_upload = $_FILES['file_slider']['name'];

				if($file_slider_upload){
					$config['allowed_types']	= 'jpg|jpeg|png';
					$config['upload_path']		= './assets/landing/images/slider/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('file_slider')){
						$file_slider = $this->upload->data('file_name');
						$data_slider = [
							'nama'=>$nama_slider,
							'file'=>$file_slider
						];
						$this->db->insert('slider', $data_slider);

						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Slider telah ditambahkan!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('menu/landing/');
					} else {
						echo $this->upload->display_errors();
					}
				}
			} else if($id=='hapusslider'){
				if($opsi==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada gambar slider yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing');
				}else{
					$id_slider = $this->input->post('id_slider');
					$nama_slider = $this->input->post('nama_slider');
					$file_slider = $this->input->post('file_slider');

					unlink(FCPATH.'assets/landing/images/slider/'.$file_slider);
					$this->db->where('id', $id_slider);
					$this->db->delete('slider');

					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Gambar slider Kegiatan <strong>'.$nama_slider.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu/landing/');
				}
			}
		}
	}
}