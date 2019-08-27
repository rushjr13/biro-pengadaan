<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- blog-2 area -->
<section class="blog_tow_area">
    <div class="container">
       <div class="row blog_tow_row">
            <?php foreach ($galeri_kegiatan as $gk): ?>
                <?php
                    $this->db->select('*');
                    $this->db->from('dok_kegiatan');
                    $this->db->where('id_gk', $gk['id_gk']);
                    $this->db->order_by('id_dk', 'ASC');
                    $this->db->limit(1);
                    $dk = $this->db->get()->row_array();

                    $this->db->where('id_gk', $gk['id_gk']);
                    $jlh_komentar_galeri = $this->db->get('komentar_galeri')->num_rows();   

                    date_default_timezone_set('Asia/Makassar');
                    $tgl = substr($gk['tgl_gk'], 8, 2);
                  $bln = substr($gk['tgl_gk'], 5, 2);
                  $thn = substr($gk['tgl_gk'], 0, 4);

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

                    $tanggal_gk = $tgl.' '.$bulan.' '.$thn;
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="renovation">
                        <img src="<?=base_url('assets/admin/img/dok_keg/').$dk['dokumentasi'] ?>" alt="">
                        <div class="renovation_content">
                            <a class="clipboard" href="<?=base_url('galeri/detail/').$gk['id_gk'] ?>"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                            <a class="tittle" href="<?=base_url('galeri/detail/').$gk['id_gk'] ?>"><?=$gk['judul_gk'] ?></a>
                            <div class="date_comment">
                                <a href="<?=base_url('galeri/detail/').$gk['id_gk'] ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?=$tanggal_gk ?></a>
                                <a href="<?=base_url('galeri/detail/').$gk['id_gk'] ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i><?=$jlh_komentar_galeri ?></a>
                            </div>
                            <p class="text-justify"><?=$gk['uraian'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
       </div>
    </div>
</section>
<!-- End blog-2 area -->