<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


	// Tanggal Indonesia Berdasarkan Fungsi date() - 2019-12-13
    function tgl_indo($tanggal){
		date_default_timezone_set('Asia/Makassar');
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);

        if($bln=='01'){
            $bulan='Januari';
        } else if($bln=='02'){
            $bulan='Februari';
        } else if($bln=='03'){
            $bulan='Maret';
        } else if($bln=='04'){
            $bulan='April';
        } else if($bln=='05'){
            $bulan='Mei';
        } else if($bln=='06'){
            $bulan='Juni';
        } else if($bln=='07'){
            $bulan='Juli';
        } else if($bln=='08'){
            $bulan='Agustus';
        } else if($bln=='09'){
            $bulan='September';
        } else if($bln=='10'){
            $bulan='Oktober';
        } else if($bln=='11'){
            $bulan='November';
        } else if($bln=='12'){
            $bulan='Desember';
        }

        return $tgl.' '.$bulan.' '.$thn;
    }

    // Hari Indonesia Berdasarkan Fungsi date() - l
    function hari($hari){

        if($hari=='Sunday'){
        	$hr='Minggu';
        } else if($hari=='Monday'){
        	$hr='Senin';
        } else if($hari=='Tuesday'){
        	$hr='Selasa';
        } else if($hari=='Wednesday'){
        	$hr='Rabu';
        } else if($hari=='Thursday'){
        	$hr='Kamis';
        } else if($hari=='Friday'){
        	$hr='Jumat';
        } else if($hari=='Saturday'){
        	$hr='Sabtu';
        }
        return $hr;
    }

    // Tanggal Indonesia Berdasarkan Fungsi time() - 1560990566
    function tgl_indo2($tanggal){
		date_default_timezone_set('Asia/Makassar');
        $tgl = date('d', $tanggal);
        $bln = date('F', $tanggal);
        $thn = date('Y', $tanggal);

        if($bln=='January'){
            $bulan='Januari';
        } else if($bln=='February'){
            $bulan='Februari';
        } else if($bln=='March'){
            $bulan='Maret';
        } else if($bln=='April'){
            $bulan='April';
        } else if($bln=='May'){
            $bulan='Mei';
        } else if($bln=='June'){
            $bulan='Juni';
        } else if($bln=='July'){
            $bulan='Juli';
        } else if($bln=='August'){
            $bulan='Agustus';
        } else if($bln=='September'){
            $bulan='September';
        } else if($bln=='October'){
            $bulan='Oktober';
        } else if($bln=='November'){
            $bulan='November';
        } else if($bln=='December'){
            $bulan='Desember';
        }

        return $tgl.' '.$bulan.' '.$thn;
    }

    // Hari Indonesia Berdasarkan Fungsi time() - l
    function hari2($hari){
    	date_default_timezone_set('Asia/Makassar');
        $tgl = date('l', $tanggal);

        if($hari=='Sunday'){
        	$hr='Minggu';
        } else if($hari=='Monday'){
        	$hr='Senin';
        } else if($hari=='Tuesday'){
        	$hr='Selasa';
        } else if($hari=='Wednesday'){
        	$hr='Rabu';
        } else if($hari=='Thursday'){
        	$hr='Kamis';
        } else if($hari=='Friday'){
        	$hr='Jumat';
        } else if($hari=='Saturday'){
        	$hr='Sabtu';
        }
        return $hr;
    }

	// CEK PENGGUNA MASUK
	function cek_masuk(){
		if(!$this->session->userdata('id_user_masuk')){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-ban"></i> Akses Ditolak! Anda Harus Masuk Dulu!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('auth');
		}
	}

	// PENGATURAN
	function pengaturan(){
		$this->db->where('id', 'atur');
		return $this->db->get('pengaturan')->row_array();
	}

	// DETAIL PENGGUNA
    function pengguna($id_pengguna){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('level', 'level.id_level = pengguna.id_level');
        $this->db->where('pengguna.id_pengguna', $id_pengguna);
        return $this->db->get()->row_array();
    }

    // DAFTAR PENGGUNA
    function daftarpengguna($id_pengguna){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('level', 'level.id_level = pengguna.id_level');
        $this->db->order_by('pengguna.status', 'DESC');
        $this->db->order_by('pengguna.tgl_daftar', 'ASC');
        $this->db->where('pengguna.id_pengguna !=', $id_pengguna);
        return $this->db->get()->result_array();
    }

    // LEVEL
    function level($id_level=null){
        if($id_level==null){
            return $this->db->get('level')->result_array();
        } else {
            return $this->db->get_where('level', ['id_level'=>$id_level])->row_array();
        }
    }

	// CEK PENGGUNA
	function cek_pengguna($email){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('email', $email);
		return $this->db->get();
	}

	// MENU
	function menu($id_menu=null){
		if($id_menu==null){
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->order_by('id_menu', 'ASC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('menu');
			$this->db->where('menu.id_menu', $id_menu);
			return $this->db->get()->row_array();
		}
	}

	// SUB MENU
	function submenu($id_submenu=null){
		if($id_submenu==null){
			$this->db->select('*');
			$this->db->from('submenu');
			$this->db->join('menu', 'menu.id_menu = submenu.id_menu');
			$this->db->order_by('submenu.id_menu', 'ASC');
			$this->db->order_by('submenu.id_submenu', 'ASC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('submenu');
			$this->db->join('menu', 'menu.id_menu = submenu.id_menu');
			$this->db->where('submenu.id_submenu', $id_submenu);
			return $this->db->get()->row_array();
		}
	}

	// PEMBERITAHUAN
	function pemberitahuan($id_pemberitahuan=null){
		if($id_pemberitahuan==null){
			$this->db->select('*');
			$this->db->from('pemberitahuan');
			$this->db->join('pengguna', 'pengguna.id_pengguna = pemberitahuan.id_pengguna');
			$this->db->order_by('pemberitahuan.id_pemberitahuan', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('pemberitahuan');
			$this->db->join('pengguna', 'pengguna.id_pengguna = pemberitahuan.id_pengguna');
			$this->db->where('pemberitahuan.id_pemberitahuan', $id_pemberitahuan);
			return $this->db->get()->row_array();
		}
	}

    // MENU LANDING
    function menulanding($id_ml=null){
        if($id_ml==null){
            $this->db->select('*');
            $this->db->from('menu_landing');
            $this->db->order_by('id_ml', 'ASC');
            $this->db->where('status_ml', 1);
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('menu_landing');
            $this->db->where('menu_landing.id_ml', $id_ml);
            return $this->db->get()->row_array();
        }
    }

    // MENU LANDING
    function menulandingaktif(){
        $this->db->select('*');
        $this->db->from('menu_landing');
        $this->db->where('status_ml', 1);
        $this->db->order_by('id_ml', 'ASC');
        return $this->db->get()->result_array();
    }

    // PROFIL
    function profil($id_profil=null){
        if($id_profil==null){
            $this->db->select('*');
            $this->db->from('profil');
            $this->db->order_by('id_profil', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('profil');
            $this->db->where('id_profil', $id_profil);
            return $this->db->get()->row_array();
        }
    }

    // GALERI LENGKAP
    function galeri_lengkap($id=null){
        if($id==null){
            $this->db->select('*');
            $this->db->from('galeri_lengkap');
            $this->db->join('pengguna', 'pengguna.id_pengguna = galeri_lengkap.id_pengguna');
            $this->db->order_by('galeri_lengkap.id', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('galeri_lengkap');
            $this->db->join('pengguna', 'pengguna.id_pengguna = galeri_lengkap.id_pengguna');
            $this->db->where('galeri_lengkap.id', $id);
            return $this->db->get()->row_array();
        }
    }

    // GALERI LENGKAP
    function galeri_limit($id){
        $this->db->select('*');
        $this->db->from('galeri_lengkap');
        $this->db->join('pengguna', 'pengguna.id_pengguna = galeri_lengkap.id_pengguna');
        $this->db->where('galeri_lengkap.id !=', $id);
        $this->db->order_by('galeri_lengkap.id', 'DESC');
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    // KOMENTAR GALERI
    function komentar_galeri($id){
        $this->db->select('*');
        $this->db->from('komentar_galeri');
        $this->db->where('komentar_galeri.id_galeri', $id);
        $this->db->order_by('komentar_galeri.id_kg', 'DESC');
        return $this->db->get()->result_array();
    }

    // JUMLAH KOMENTAR GALERI
    function jlh_komentar_galeri($id){
        $this->db->where('id_galeri', $id);
        return $this->db->get('komentar_galeri')->num_rows();
    }

    // GALERI KEGIATAN
    function galeri_kegiatan($id_gk=null){
        if($id_gk==null){
            $this->db->select('*');
            $this->db->from('galeri_kegiatan');
            $this->db->order_by('galeri_kegiatan.id_gk', 'DESC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('galeri_kegiatan');
            $this->db->where('galeri_kegiatan.id_gk', $id_gk);
            return $this->db->get()->row_array();
        }
    }

    // MONEV
    function monev(){
        $this->db->where('id', 'ksi');
        return $this->db->get('monev')->row_array();
    }

    // OBROLAN
    function obrolan_pengguna($id=null){
        $this->db->select('*');
        $this->db->from('obrolan');
        $this->db->join('pengguna', 'pengguna.id_pengguna = obrolan.id_pengirim');
        $this->db->order_by('obrolan.id_obrolan', 'ASC');
        $this->db->where('obrolan.id_pengirim !=', $id);
        return $this->db->get()->result_array();
    }

    function obrolan_id($id=null){
        $this->db->select('*');
        $this->db->from('obrolan');
        $this->db->join('pengguna', 'pengguna.id_pengguna = obrolan.id_pengirim');
        $this->db->order_by('obrolan.id_obrolan', 'DESC');
        $this->db->where('obrolan.id_obrolan', $id);
        return $this->db->get()->row_array();
    }

    // MISI
    function misi($id_misi=null){
        if($id_misi==null){
            $this->db->select('*');
            $this->db->from('misi');
            $this->db->order_by('misi.id_misi', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('misi');
            $this->db->where('misi.id_misi', $id_misi);
            return $this->db->get()->row_array();
        }
    }

    // SIAPA KAMI
    function siapa_kami(){
        $this->db->where('id', 'siapa');
        return $this->db->get('siapa_kami')->row_array();
    }

    // VISI
    function visi(){
        $this->db->where('id', 'visi');
        return $this->db->get('visi')->row_array();
    }

    // PEGAWAI
    function pegawai($id_pegawai=null){
        if($id_pegawai==null){
            $this->db->select('*');
            $this->db->from('pegawai');
            $this->db->order_by('pegawai.id_pegawai', 'ASC');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('pegawai');
            $this->db->where('pegawai.id_pegawai', $id_pegawai);
            return $this->db->get()->row_array();
        }
    }

}