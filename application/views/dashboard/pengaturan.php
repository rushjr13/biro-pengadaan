<div class="card shadow mb-5">
  <div class="card-header">
    <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-umum-tab" data-toggle="tab" href="#nav-umum" role="tab" aria-controls="nav-umum" aria-selected="true">Umum</a>
      <a class="nav-item nav-link" id="nav-infokontak-tab" data-toggle="tab" href="#nav-infokontak" role="tab" aria-controls="nav-infokontak" aria-selected="false">Info Kontak</a>
      <a class="nav-item nav-link" id="nav-media-tab" data-toggle="tab" href="#nav-media" role="tab" aria-controls="nav-media" aria-selected="false">Media</a>
    </div>
  </div>
  <form action="<?=base_url('dashboard/pengaturan') ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-umum" role="tabpanel" aria-labelledby="nav-umum-tab">
          <div class="row">
            <div class="col-md-4">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Website
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_web">Nama Website</label>
                    <input type="text" class="form-control" id="nama_web" name="nama_web" placeholder="Nama Website" value="<?=$pengaturan['nama_web'] ?>">
                    <?php echo form_error('nama_web', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="alias">Alias</label>
                    <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias" value="<?=$pengaturan['alias'] ?>">
                    <?php echo form_error('alias', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="url">Link / URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Link / URL" value="<?=$pengaturan['url'] ?>">
                    <small id="url" class="form-text text-muted"><a href="<?=$pengaturan['url'] ?>" target="_blank"><?=$pengaturan['url'] ?></a></small>
                    <?php echo form_error('url', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Kantor
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"><?=$pengaturan['alamat'] ?></textarea>
                    <?php echo form_error('alamat', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="telpon">No. Telepon</label>
                    <input type="text" class="form-control" id="telpon" name="telpon" placeholder="No. Telepon" value="<?=$pengaturan['telpon'] ?>">
                    <?php echo form_error('telpon', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?=$pengaturan['email'] ?>">
                    <?php echo form_error('email', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="jam_kerja">Jam Pelayanan</label>
                    <input type="text" class="form-control" id="jam_kerja" name="jam_kerja" placeholder="Jam Kerja" value="<?=$pengaturan['jam_kerja'] ?>">
                    <?php echo form_error('jam_kerja', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Sosial Media
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="<?=$pengaturan['facebook'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="<?=$pengaturan['instagram'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter" value="<?=$pengaturan['twitter'] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-infokontak" role="tabpanel" aria-labelledby="nav-infokontak-tab">
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Map
                </div>
                <div class="card-body">
                  <div class="embed-responsive embed-responsive-21by9 mb-3 shadow-sm">
                    <iframe class="embed-responsive-item" src="<?=$pengaturan['map'] ?>" allowfullscreen></iframe>
                  </div>
                  <div class="form-group">
                    <label for="map">URL Google Map</label>
                    <textarea class="form-control" id="map" name="map" placeholder="URL Google Map"><?=$pengaturan['map'] ?></textarea>
                    <?php echo form_error('map', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Informasi Kontak
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <textarea class="form-control ckeditor" id="ckeditor" name="info" placeholder="Informasi Kontak"><?=$pengaturan['info'] ?></textarea>
                    <?php echo form_error('info', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-media" role="tabpanel" aria-labelledby="nav-media-tab">
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Logo
                </div>
                <div class="card-body">
                  <div class="mx-auto text-center" style="width: 300px;">
                    <img src="<?=base_url('assets/admin/img/').$pengaturan['logo'] ?>" class="img-fluid img-thumbnail" width="100%" alt="Responsive image">
                    <small class="text-muted"><?=$pengaturan['logo'] ?></small>
                  </div>
                  <div class="custom-file mt-3">
                    <input type="file" class="custom-file-input" id="logo" name="logo">
                    <input type="hidden" class="form-control" id="logo_lama" name="logo_lama" value="<?=$pengaturan['logo'] ?>">
                    <label class="custom-file-label" for="logo" data-browse="Pilih Logo">Pilih logo dengan format <strong>.png</strong>!</label>
                    <small id="logo" class="form-text text-info" style="font-style: italic;"><i class="fa fa-fw fa-info"></i>Kosongkan jika tidak ingin mengubah logo!</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card shadow border-secondary">
                <div class="card-header bg-secondary text-white">
                  Ikon
                </div>
                <div class="card-body">
                  <div class="mx-auto text-center" style="width: 200px;">
                    <img src="<?=base_url('assets/admin/img/').$pengaturan['icon'] ?>" class="img-fluid img-thumbnail" width="100%" alt="Responsive image">
                    <small class="text-muted"><?=$pengaturan['icon'] ?></small>
                  </div>
                  <div class="custom-file mt-3">
                    <input type="file" class="custom-file-input" id="icon" name="icon">
                    <input type="hidden" class="form-control" id="icon_lama" name="icon_lama" value="<?=$pengaturan['icon'] ?>">
                    <label class="custom-file-label" for="icon" data-browse="Pilih Icon">Pilih icon dengan format <strong>.png</strong>!</label>
                    <small id="icon" class="form-text text-info" style="font-style: italic;"><i class="fa fa-fw fa-info"></i>Kosongkan jika tidak ingin mengubah icon!</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="text-right">
        <button type="reset" class="btn btn-sm btn-circle btn-secondary" title="Batal"><i class="fa fa-fw fa-times"></i></button>
        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
      </div>
    </div>
  </form>
</div>