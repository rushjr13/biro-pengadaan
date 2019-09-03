<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

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
		$data['judul'] = "Monev";
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('dashboard/landing/index', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function monev($hal=null, $opsi=null, $id=null)
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
			$data['judul'] = "Monev";
			$data['program'] = $this->Admin_model->program();
			$data['kegiatan'] = $this->Admin_model->kegiatan();
			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('dashboard/landing/monev/index', $data);
			$this->load->view('template/dashboard/footer', $data);
		} else if($hal=='program'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada opsi program yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/monev');
			}else if($opsi=='tambah'){
				$nama_program = htmlspecialchars($this->input->post('nama_program'));
				$data = ['nama_program'=>$nama_program];
				$this->db->insert('program', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info"></i> Program <strong>'.$nama_program.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/monev/');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada program yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev');
				}else{
					$nama_program = htmlspecialchars($this->input->post('nama_program'));
					$this->db->set('nama_program', $nama_program);
					$this->db->where('id_program', $id);
					$this->db->update('program');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info"></i> Program <strong>'.$nama_program.'</strong> telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev/');
				}
			}else if($opsi=='hapus'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada program yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev');
				}else{
					$nama_program = htmlspecialchars($this->input->post('nama_program'));
					$this->db->where('id_program', $id);
					$this->db->delete('program');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info"></i> Program <strong>'.$nama_program.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev/');
				}
			}
		} else if($hal=='kegiatan'){
			if($opsi==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Tidak ada opsi kegiatan yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/monev');
			}else if($opsi=='tambah'){
				$id_program = htmlspecialchars($this->input->post('id_program'));
				$nama_kegiatan = htmlspecialchars($this->input->post('nama_kegiatan'));
				$anggaran = $this->input->post('anggaran');
				$data = [
					'id_program'=>$id_program,
					'nama_kegiatan'=>$nama_kegiatan,
					'anggaran'=>$anggaran,
					'realisasi'=>0,
					'tf'=>0,
					'rf'=>0,
					'tk'=>0,
					'rk'=>0,
				];
				$this->db->insert('kegiatan', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info"></i> Kegiatan <strong>'.$nama_kegiatan.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/monev/');
			}else if($opsi=='ubah'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada kegiatan yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev');
				}else{
					$this->form_validation->set_rules('id_program', 'Program', 'required',[
						'required' => 'Program Harus Dipilih!'
					]);
					$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required',[
						'required' => 'Nama Kegiatan Harus Diisi!'
					]);
					$this->form_validation->set_rules('anggaran', 'Anggaran', 'required',[
						'required' => 'Anggaran Harus Diisi!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Monev";
						$data['subjudul'] = "Ubah Kegiatan";
						$data['program'] = $this->Admin_model->program();
						$data['kegiatan'] = $this->Admin_model->kegiatan($id);
						$this->load->view('template/dashboard/header', $data);
						$this->load->view('template/dashboard/sidebar', $data);
						$this->load->view('template/dashboard/topbar', $data);
						$this->load->view('dashboard/landing/monev/ubahkegiatan', $data);
						$this->load->view('template/dashboard/footer', $data);
					}else{
						$id_program = $this->input->post('id_program');
						$nama_kegiatan = htmlspecialchars($this->input->post('nama_kegiatan'));
						$anggaran = $this->input->post('anggaran');

						$data = [
							'id_program'=>$id_program,
							'nama_kegiatan'=>$nama_kegiatan,
							'anggaran'=>$anggaran
						];
						$this->db->set($data);
						$this->db->where('id_kegiatan', $id);
						$this->db->update('kegiatan');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info"></i> Kegiatan <strong>'.$nama_kegiatan.'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('landing/monev/');
					}
				}
			}else if($opsi=='hapus'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada kegiatan yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev');
				}else{
					$nama_program = htmlspecialchars($this->input->post('nama_program'));
					$this->db->where('id_kegiatan', $id);
					$this->db->delete('kegiatan');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info"></i> Kegiatan <strong>'.$nama_kegiatan.'</strong> telah dihapus!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev/');
				}
			}else if($opsi=='realisasi'){
				if($id==null){
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Tidak ada kegiatan yang dipilih!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('landing/monev');
				}else{
					$this->form_validation->set_rules('realisasi', 'Realisasi', 'required|integer',[
						'required' => 'Realisasi Harus Diisi!',
						'integer' => 'Realisasi Hanya Angka Tanpa Tanda Baca!'
					]);
					$this->form_validation->set_rules('tf', 'Target Fisik', 'required|numeric',[
						'required' => 'Target Fisik Harus Diisi!',
						'numeric' => 'Target Fisik Hanya Angka Dengan Tanda Baca!'
					]);
					$this->form_validation->set_rules('rf', 'Realisasi Fisik', 'required|numeric',[
						'required' => 'Realisasi Fisik Harus Diisi!',
						'numeric' => 'Realisasi Fisik Hanya Angka Dengan Tanda Baca!'
					]);
					$this->form_validation->set_rules('tk', 'Target Keuangan', 'required|numeric',[
						'required' => 'Target Keuangan Harus Diisi!',
						'numeric' => 'Target Keuangan Hanya Angka Dengan Tanda Baca!'
					]);
					$this->form_validation->set_rules('rk', 'Realisasi Keuangan', 'required|numeric',[
						'required' => 'Realisasi Keuangan Harus Diisi!',
						'numeric' => 'Realisasi Keuangan Hanya Angka Dengan Tanda Baca!'
					]);

					if ($this->form_validation->run() == FALSE){
						$data['judul'] = "Monev";
						$data['subjudul'] = "Target & Realisasi Kegiatan";
						$data['kegiatan'] = $this->Admin_model->kegiatan($id);
						$this->load->view('template/dashboard/header', $data);
						$this->load->view('template/dashboard/sidebar', $data);
						$this->load->view('template/dashboard/topbar', $data);
						$this->load->view('dashboard/landing/monev/tarsasikegiatan', $data);
						$this->load->view('template/dashboard/footer', $data);
					}else{
						$nama_kegiatan = $this->input->post('nama_kegiatan');
						$realisasi = $this->input->post('realisasi');
						$tf = $this->input->post('tf');
						$rf = $this->input->post('rf');
						$tk = $this->input->post('tk');
						$rk = $this->input->post('rk');

						$data = [
							'realisasi'=>$realisasi,
							'tf'=>$tf,
							'rf'=>$rf,
							'tk'=>$tk,
							'rk'=>$rk
						];
						$this->db->set($data);
						$this->db->where('id_kegiatan', $id);
						$this->db->update('kegiatan');
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info"></i> Target & Realisasi Kegiatan <strong>'.$nama_kegiatan.'</strong> telah diperbarui!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('landing/monev/');
					}
				}
			}
		}
	}
}