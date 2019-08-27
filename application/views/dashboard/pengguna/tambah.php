<?php
  date_default_timezone_set('Asia/Makassar');
    $time = time();
    $tgl = date('d', $time);
    $bln = date('F', $time);
    $thn = date('Y', $time);
    $hari = date('l', $time);

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

    $tgl_daftar = $hr.', '.$tgl.' '.$bulan.' '.$thn;
?>
<div class="row justify-content-md-center">
  <div class="col-8">
    <div class="card border-primary shadow mb-4">
      <div class="card-header bg-primary">
        <h6 class="text-white font-weight-bold align-middle"><?=$subjudul ?></h6>
      </div>
      <form action="<?=base_url('dashboard/pengguna/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=set_value('nama_lengkap') ?>" autofocus>
                    <?php echo form_error('nama_lengkap', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=set_value('email') ?>">
                    <?php echo form_error('email', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" value="<?=set_value('username') ?>">
                    <?php echo form_error('username', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" aria-describedby="tbllihat" value="123456">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="tbllihat" title="Tampilkan"><i class="fa fa-fw fa-eye"></i></button>
                      </div>
                    </div>
                    <small id="password" class="form-text text-info"><i class="fa fa-fw fa-info"></i>Kata Sandi default : <strong>123456</strong></small>
                    <?php echo form_error('password', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card shadow">
                <div class="card-body">
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
                      <div class="col-sm-8">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="jkl" name="jk" class="custom-control-input" value="Laki-laki">
                          <label class="custom-control-label" for="jkl">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="jkp" name="jk" class="custom-control-input" value="Perempuan">
                          <label class="custom-control-label" for="jkp">Perempuan</label>
                        </div>
                        <?php echo form_error('jk', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-4 pt-0">Level Pengguna</legend>
                      <div class="col-sm-8">
                        <?php foreach ($level as $lvl): ?>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="lvl<?=$lvl['id_level'] ?>" name="id_level" class="custom-control-input" value="<?=$lvl['id_level'] ?>">
                            <label class="custom-control-label" for="lvl<?=$lvl['id_level'] ?>"><?=$lvl['nama_level'] ?></label>
                          </div>
                        <?php endforeach ?>
                        <?php echo form_error('id_level', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                      <div class="col-sm-8">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sa" name="status" class="custom-control-input" value="1">
                          <label class="custom-control-label" for="sa">Aktif</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sba" name="status" class="custom-control-input" value="0" checked>
                          <label class="custom-control-label" for="sba">Belum Aktif</label>
                        </div>
                        <?php echo form_error('status', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <label for="tgl_daftar" class="col-sm-4 col-form-label">Tanggal Daftar</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext" id="tgl" name="tgl" value="<?=$tgl_daftar ?>">
                      <input type="hidden" class="form-control" id="tgl_daftar" name="tgl_daftar" value="<?=time() ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto">
                      <label class="custom-file-label" for="foto" data-browse="Pilih">Pilih foto profil dengan format <strong>.jpg, .jpeg, .png</strong>!</label>
                      <small id="password" class="form-text text-info"><i class="fa fa-fw fa-info"></i>Kosongkan jika tidak / belum ingin menambah foto profil!</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <a href="<?=base_url('dashboard/pengguna') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
          <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>