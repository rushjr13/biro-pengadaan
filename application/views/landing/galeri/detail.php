<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="<?=base_url('galeri') ?>"><?=$judul ?></a></li>
        <li><a href="#" class="active"><?=$galeri_kegiatan['judul_gk'] ?></a></li>
    </ol>
</section>
<!-- End Banner area -->
<?php
$this->db->select('*');
$this->db->from('dok_kegiatan');
$this->db->where('id_gk', $galeri_kegiatan['id_gk']);
$this->db->order_by('id_dk', 'ASC');
$this->db->limit(1);
$dk = $this->db->get()->row_array();
?>
<?php 
date_default_timezone_set('Asia/Makassar');
$tgl = substr($galeri_kegiatan['tgl_gk'], 8, 2);
$bln = substr($galeri_kegiatan['tgl_gk'], 5, 2);
$thn = substr($galeri_kegiatan['tgl_gk'], 0, 4);

if($bln=='01'){
  $bulan='Jan';
} else if($bln=='02'){
  $bulan='Feb';
} else if($bln=='03'){
  $bulan='Mar';
} else if($bln=='04'){
  $bulan='Apr';
} else if($bln=='05'){
  $bulan='Mei';
} else if($bln=='06'){
  $bulan='Jun';
} else if($bln=='07'){
  $bulan='Jul';
} else if($bln=='08'){
  $bulan='Agst';
} else if($bln=='09'){
  $bulan='Sep';
} else if($bln=='10'){
  $bulan='Okt';
} else if($bln=='11'){
  $bulan='Nov';
} else if($bln=='12'){
  $bulan='Des';
}

$tanggal_gk = $tgl.' '.$bulan.' '.$thn;
?>
<!-- blog area -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    <img src="<?=base_url('assets/admin/img/dok_keg/').$dk['dokumentasi'] ?>" alt="">
                    <div class="col-xs-1 p0">
                       <div class="blog_date">
                           <a href="#"><?=$tgl ?></a>
                            <a href="#"><?=$bulan ?></a>
                            <a href="#"><?=$thn ?></a>
                       </div>
                    </div>
                    <div class="col-xs-11 blog_content">
                        <a class="blog_heading" href="#"><?=$galeri_kegiatan['judul_gk'] ?></a>
                        <a class="blog_admin" href="#"><i class="fa fa-user" aria-hidden="true"></i>Administrator</a>
                        <ul class="like_share">
                            <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i><?=$jlh_komentar_galeri ?></a></li>
                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$galeri_kegiatan['hit']+1 ?></a></li>
                        </ul>
                        <p class="text-justify"><?=$galeri_kegiatan['uraian'] ?></p>
                        <div class="tag">
                            <h4>DOKUMENTASI KEGIATAN</h4>
                            <?php
                                $this->db->select('*');
                                $this->db->from('dok_kegiatan');
                                $this->db->where('id_gk', $galeri_kegiatan['id_gk']);
                                $this->db->order_by('id_dk', 'ASC');
                                $dok_kegiatan = $this->db->get()->result_array();
                            ?>
                            <?php foreach ($dok_kegiatan as $dkeg): ?>
                                <img src="<?=base_url('assets/admin/img/dok_keg/').$dkeg['dokumentasi'] ?>" alt="">
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="client_text">
                    </div>
                    <div class="comment_area">
                        <h3><?=$jlh_komentar_galeri ?> Komentar</h3>
                        <?php foreach ($komentar_galeri as $kg): ?>
                            <?php 
                                date_default_timezone_set('Asia/Makassar');
                                $tgl = date('d', $kg['tgl_komentar']);
                                $bln = date('F', $kg['tgl_komentar']);
                                $thn = date('Y', $kg['tgl_komentar']);
                                $hari = date('l', $kg['tgl_komentar']);
                                $jam = date('H', $kg['tgl_komentar']);
                                $menit = date('i', $kg['tgl_komentar']);
                                $detik = date('s', $kg['tgl_komentar']);

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

                                $tanggal_komentar = $hr.', '.$tgl.' '.$bulan.' '.$thn;
                                $waktu_komentar = $jam.':'.$menit.':'.$detik;
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?=base_url('assets/admin/img/user.png') ?>" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a class="media-heading" href="#"><?=$kg['nama_lengkap'] ?></a>
                                    <h5><?=$tanggal_komentar." - ".$waktu_komentar ?></h5>
                                    <p class="text-justify"><?=$kg['isi_komentar'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="post_comment">
                        <h3>Buat Komentar</h3>
                        <?= $this->session->flashdata('info'); ?>
                        <form class="comment_box" action="<?=base_url('galeri/detail/').$galeri_kegiatan['id_gk'] ?>" method="post">
                           <div class="col-md-12">
                               <h4>Nama</h4>
                               <?php echo form_error('nama_lengkap', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                               <input type="text" class="form-control input_box" id="nama_lengkap" name="nama_lengkap" value="<?=set_value('nama_lengkap') ?>">
                           </div>
                           <div class="col-md-6">
                               <h4>Email</h4>
                               <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                               <input type="text" class="form-control input_box" id="email" name="email" value="<?=set_value('email') ?>">
                           </div>
                           <div class="col-md-6">
                               <h4>Telepon</h4>
                               <?php echo form_error('telpon', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                               <input type="text" class="form-control input_box" id="telpon" name="telpon" value="<?=set_value('telpon') ?>">
                           </div>
                           <div class="col-md-12">
                               <h4>Komentar Anda</h4>
                               <?php echo form_error('isi_komentar', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                               <textarea class="form-control input_box" id="isi_komentar" name="isi_komentar"><?=set_value('isi_komentar') ?></textarea>
                               <button type="submit">Kirim</button>
                           </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4 widget_area">
                    <div class="resent">
                        <h3>GALERI LAINNYA</h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('galeri_kegiatan');
                            $this->db->where('id_gk !=', $galeri_kegiatan['id_gk']);
                            $this->db->order_by('tgl_gk', 'DESC');
                            $galeri_lain = $this->db->get()->result_array();
                        ?>
                        <?php foreach ($galeri_lain as $gl): ?>
                            <?php
                                $this->db->select('*');
                                $this->db->from('dok_kegiatan');
                                $this->db->where('id_gk', $gl['id_gk']);
                                $this->db->order_by('id_dk', 'ASC');
                                $this->db->limit(1);
                                $dl = $this->db->get()->row_array();
                            ?>
                            <?php 
                                date_default_timezone_set('Asia/Makassar');
                                $tgl = substr($gl['tgl_gk'], 8, 2);
                                $bln = substr($gl['tgl_gk'], 5, 2);
                                $thn = substr($gl['tgl_gk'], 0, 4);

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

                                $tanggal_gl = $tgl.' '.$bulan.' '.$thn;
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?=base_url('galeri/detail/').$gl['id_gk'] ?>">
                                        <img class="media-object" src="<?=base_url('assets/admin/img/dok_keg/').$dl['dokumentasi'] ?>" width="100" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="<?=base_url('galeri/detail/').$gl['id_gk'] ?>"><?=$gl['judul_gk'] ?></a>
                                    <h6><?=$tanggal_gl ?></h6>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog area -->
