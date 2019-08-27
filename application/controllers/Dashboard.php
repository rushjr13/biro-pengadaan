<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['judul'] = "Beranda";
		$this->load->view('template/dashboard/header', $data);
		$this->load->view('template/dashboard/sidebar', $data);
		$this->load->view('template/dashboard/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/dashboard/footer', $data);
	}

	public function pengaturan()
	{
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();

		// KHUSUS
		$this->form_validation->set_rules('nama_web', 'Nama Website', 'required',[
			'required' => 'Nama Website Harus Diisi!'
		]);
		$this->form_validation->set_rules('alias', 'Alias', 'required',[
			'required' => 'Alias Harus Diisi!'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required',[
			'required' => 'URL Harus Diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Kantor', 'required',[
			'required' => 'Alamat Kantor Harus Diisi!'
		]);
		$this->form_validation->set_rules('telpon', 'No. Telepon Kantor', 'required',[
			'required' => 'No. Telepon Kantor Harus Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required' => 'Email Harus Diisi!',
			'valid_email' => 'Email Tidak Benar!'
		]);
		$this->form_validation->set_rules('jam_kerja', 'Jam Pelayanan', 'required',[
			'required' => 'Jam Pelayanan Harus Diisi!'
		]);
		$this->form_validation->set_rules('map', 'URL Google Map', 'required',[
			'required' => 'URL Google Map Harus Diisi!'
		]);
		$this->form_validation->set_rules('info', 'Informasi Kontak', 'required',[
			'required' => 'Informasi Kontak Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Pengaturan";
			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('dashboard/pengaturan', $data);
			$this->load->view('template/dashboard/footer', $data);
		}else{
			$nama_web = $this->input->post('nama_web');
			$alias = $this->input->post('alias');
			$url = $this->input->post('url');
			$alamat = $this->input->post('alamat');
			$telpon = $this->input->post('telpon');
			$email = $this->input->post('email');
			$jam_kerja = $this->input->post('jam_kerja');
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$twitter = $this->input->post('twitter');
			$map = $this->input->post('map');
			$info = $this->input->post('info');

			$data = [
				'nama_web'=>$nama_web,
				'alias'=>$alias,
				'url'=>$url,
				'alamat'=>$alamat,
				'telpon'=>$telpon,
				'email'=>$email,
				'jam_kerja'=>$jam_kerja,
				'facebook'=>$facebook,
				'instagram'=>$instagram,
				'twitter'=>$twitter,
				'map'=>$map,
				'info'=>$info,
			];

			// Cek logo yang diupload
			$logo_upload = $_FILES['logo']['name'];

			if($logo_upload){
				$config['allowed_types']	= 'png';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/admin/img/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('logo')){
					$logo_lama = $this->input->post('logo_lama');
					if($logo_lama!='logo.png'){
						unlink(FCPATH.'assets/admin/img/'.$logo_lama);
					}
					$logo_baru = $this->upload->data('file_name');
					$this->db->set('logo', $logo_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			// Cek icon yang diupload
			$icon_upload = $_FILES['icon']['name'];

			if($icon_upload){
				$config['allowed_types']	= 'png';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/admin/img/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('icon')){
					$icon_lama = $this->input->post('icon_lama');
					if($icon_lama!='icon2.png'){
						unlink(FCPATH.'assets/admin/img/'.$icon_lama);
					}
					$icon_baru = $this->upload->data('file_name');
					$this->db->set('icon', $icon_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set($data);
			$this->db->where('id', 'atur');
			$this->db->update('pengaturan');

			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pengaturan telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('dashboard/pengaturan');
		}
	}

	public function pengguna($opsi=null, $id=null)
	{
		// UMUM
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['daftarpengguna'] = $this->Admin_model->daftarpengguna($id_pengguna);

		// KHUSUS
		if($opsi==null){
			$data['judul'] = "Pengguna";
			$this->load->view('template/dashboard/header', $data);
			$this->load->view('template/dashboard/sidebar', $data);
			$this->load->view('template/dashboard/topbar', $data);
			$this->load->view('dashboard/pengguna/index', $data);
			$this->load->view('template/dashboard/footer', $data);
		}else if($opsi=='tambah'){
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email Tidak Benar!'
			]);
			$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[pengguna.username]',[
				'required' => 'Nama Pengguna Harus Diisi!',
				'is_unique' => 'Nama Pengguna Sudah Ada!'
			]);
			$this->form_validation->set_rules('password', 'Kata Sandi', 'required|min_length[6]',[
				'required' => 'Kata Sandi Harus Diisi!',
				'min_length' => 'Kata Sandi Terlalu Pendek. Minimal 6 Karakter!'
			]);
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
				'required' => 'Jenis Kelamin Harus Dipilih!'
			]);
			$this->form_validation->set_rules('id_level', 'Level Pengguna', 'required',[
				'required' => 'Level Pengguna Harus Dipilih!'
			]);
			$this->form_validation->set_rules('status', 'Status', 'required',[
				'required' => 'Status Harus Dipilih!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = "Pengguna";
				$data['subjudul'] = "Tambah Pengguna Aplikasi";
				$data['level'] = $this->Admin_model->level();
				$this->load->view('template/dashboard/header', $data);
				$this->load->view('template/dashboard/sidebar', $data);
				$this->load->view('template/dashboard/topbar', $data);
				$this->load->view('dashboard/pengguna/tambah', $data);
				$this->load->view('template/dashboard/footer', $data);
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$email = $this->input->post('email');
				$jk = $this->input->post('jk');
				$id_level = $this->input->post('id_level');
				$status = $this->input->post('status');
				$tgl_daftar = $this->input->post('tgl_daftar');

				// Cek foto yang diupload
				$foto_upload = $_FILES['foto']['name'];

				if($foto_upload){
					$config['allowed_types']	= 'jpg|jpeg|png';
					$config['max_size']			= '1024';
					$config['upload_path']		= './assets/admin/img/pengguna/';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('foto')){
						$foto = $this->upload->data('file_name');
						$data = [
							'username'=>$username,
							'password'=>$password,
							'nama_lengkap'=>$nama_lengkap,
							'email'=>$email,
							'jk'=>$jk,
							'id_level'=>$id_level,
							'status'=>$status,
							'foto'=>$foto,
							'tgl_daftar'=>$tgl_daftar
						];
					} else {
						echo $this->upload->display_errors();
					}
				}else{
					$data = [
						'username'=>$username,
						'password'=>$password,
						'nama_lengkap'=>$nama_lengkap,
						'email'=>$email,
						'jk'=>$jk,
						'id_level'=>$id_level,
						'status'=>$status,
						'foto'=>'user.png',
						'tgl_daftar'=>$tgl_daftar
					];
				}

				$this->db->insert('pengguna',$data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengguna <strong>'.$nama_lengkap.'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}
		}else if($opsi=='ubah'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Tidak ada pengguna yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}else{
				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
					'required' => 'Nama Lengkap Harus Diisi!'
				]);
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
					'required' => 'Email Harus Diisi!',
					'valid_email' => 'Email Tidak Benar!'
				]);
				$this->form_validation->set_rules('username', 'Nama Pengguna', 'required',[
					'required' => 'Nama Pengguna Harus Diisi!'
				]);
				$this->form_validation->set_rules('password', 'Kata Sandi', 'required|min_length[6]',[
					'required' => 'Kata Sandi Harus Diisi!',
					'min_length' => 'Kata Sandi Terlalu Pendek. Minimal 6 Karakter!'
				]);
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
					'required' => 'Jenis Kelamin Harus Dipilih!'
				]);
				$this->form_validation->set_rules('id_level', 'Level Pengguna', 'required',[
					'required' => 'Level Pengguna Harus Dipilih!'
				]);
				$this->form_validation->set_rules('status', 'Status', 'required',[
					'required' => 'Status Harus Dipilih!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['judul'] = "Pengguna";
					$data['subjudul'] = "Ubah Pengguna Aplikasi";
					$data['level'] = $this->Admin_model->level();
					$data['pengguna'] = $this->Admin_model->pengguna($id);
					$this->load->view('template/dashboard/header', $data);
					$this->load->view('template/dashboard/sidebar', $data);
					$this->load->view('template/dashboard/topbar', $data);
					$this->load->view('dashboard/pengguna/ubah', $data);
					$this->load->view('template/dashboard/footer', $data);
				}else{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$nama_lengkap = $this->input->post('nama_lengkap');
					$email = $this->input->post('email');
					$jk = $this->input->post('jk');
					$id_level = $this->input->post('id_level');
					$status = $this->input->post('status');
					$tgl_daftar = $this->input->post('tgl_daftar');

					$data = [
						'username'=>$username,
						'password'=>$password,
						'nama_lengkap'=>$nama_lengkap,
						'email'=>$email,
						'jk'=>$jk,
						'id_level'=>$id_level,
						'status'=>$status,
						'tgl_daftar'=>$tgl_daftar,
					];

					// Cek foto yang diupload
					$foto_upload = $_FILES['foto']['name'];

					if($foto_upload){
						$config['allowed_types']	= 'jpg|jpeg|png';
						$config['max_size']			= '1024';
						$config['upload_path']		= './assets/admin/img/pengguna/';
						$this->load->library('upload', $config);
						if($this->upload->do_upload('foto')){
							$foto_lama = $this->input->post('foto_lama');
							if($foto_lama!='user.png'){
								unlink(FCPATH.'assets/admin/img/pengguna/'.$foto_lama);
							}
							$foto_baru = $this->upload->data('file_name');
							$this->db->set('foto', $foto_baru);
						} else {
							echo $this->upload->display_errors();
						}
					}

					$this->db->set($data);
					$this->db->where('id_pengguna', $id);
					$this->db->update('pengguna');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Pengguna <strong>'.$nama_lengkap.'</strong> telah diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('dashboard/pengguna');
				}
			}
		}else if($opsi=='hapus'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Tidak ada pengguna yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}else{
				$nama_lengkap = $this->input->post('nama');
				$foto = $this->input->post('foto');

				if($foto!='user.png'){
					unlink(FCPATH.'assets/admin/img/pengguna/'.$foto);
				}

				$this->db->where('id_pengguna', $id);
				$this->db->delete('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengguna <strong>'.$nama_lengkap.'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}
		}else if($opsi=='status'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Tidak ada pengguna yang dipilih!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}else{
				$nama_lengkap = $this->input->post('nama');
				$status = $this->input->post('status');
				$judul = $this->input->post('judul');

				$this->db->set('status', $status);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pengguna <strong>'.$nama_lengkap.'</strong> telah di-<strong>'.$judul.'</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('dashboard/pengguna');
			}
		}
	}
}