<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
    	<?php foreach ($menulanding as $ml): ?>
			<a class="list-group-item list-group-item-action" id="list-<?=$ml['url_ml']?>-list" data-toggle="list" href="#list-<?=$ml['url_ml']?>" role="tab" aria-controls="<?=$ml['url_ml']?>"><?=$ml['nama_ml'] ?></a>
    	<?php endforeach ?>
			<a class="list-group-item list-group-item-action" id="list-slider-list" data-toggle="list" href="#list-slider" role="tab" aria-controls="slider">Slider</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">

    	<!-- PROFIL -->
		<div class="tab-pane fade show" id="list-profil" role="tabpanel" aria-labelledby="list-profil">
			<div class="card shadow border-primary mb-5">
				<div class="card-header bg-primary text-white">
					Profil
				</div>
				<div class="card-body">
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<div class="list-group">
								<?php foreach ($profil as $pr): ?>
									<a href="<?=base_url('menu/landing/profil/').$pr['id_profil'] ?>" class="list-group-item list-group-item-action"><?=$pr['nama_profil'] ?></a>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="card-footer text-muted">
					2 days ago
				</div> -->
			</div>
		</div>
		<!-- PROIL -->

		<!-- LAYANAN -->
		<div class="tab-pane fade show" id="list-layanan" role="tabpanel" aria-labelledby="list-layanan">
			<div class="card shadow border-primary mb-5">
				<div class="card-header bg-primary text-white">
					Layanan
				</div>
				<div class="card-body row">
					<div class="col-md-6">
						<div class="card border-success shadow">
							<div class="card-header bg-gradient-success text-white">
								Utama
							</div>
							<div class="card-body">
								<div class="list-group">
									<?php foreach ($layanan_utama as $lu): ?>
										<a href="<?=base_url('menu/landing/layanan/').$lu['id_layanan'] ?>" class="list-group-item list-group-item-action list-group-item-success"><?=$lu['nama_layanan'] ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card border-warning shadow">
							<div class="card-header bg-gradient-warning text-white">
								Pendukung
							</div>
							<div class="card-body">
								<div class="list-group">
									<?php foreach ($layanan_pendukung as $lp): ?>
										<a href="<?=base_url('menu/landing/layanan/').$lp['id_layanan'] ?>" class="list-group-item list-group-item-action list-group-item-warning"><?=$lp['nama_layanan'] ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- LAYANAN -->

		<!-- GALERI -->
		<div class="tab-pane fade show" id="list-galeri" role="tabpanel" aria-labelledby="list-galeri">
			<div class="card shadow border-primary mb-5">
				<div class="card-header bg-primary text-white">
					Galeri Kegiatan
					<button class="btn btn-sm btn-circle btn-primary float-right" id="tambahgaleri" data-toggle="modal" data-target="#tambahgaleriModal" title="Tambah Galeri Kegiatan"><i class="fa fa-fw fa-plus"></i></button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
					<table class="table table-sm table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-secondary text-white">
						  <tr>
						    <th class="align-middle text-center" width="4%">#</th>
						    <th class="align-middle" width="5%">TANGGAL</th>
						    <th class="align-middle" width="18%">JUDUL</th>
						    <th class="align-middle">URAIAN KEGIATAN</th>
						    <th class="align-middle text-center" width="6%">DOKUMENTASI</th>
						    <th class="align-middle text-center" width="3%">OPSI</th>
						  </tr>
						</thead>
						<tbody>

						  <?php $no = 1; foreach ($galeri_kegiatan as $gk): ?>
						  <?php 
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
						    <tr>
						      <td class="align-middle text-center"><?=$no++ ?></td>
						      <td class="align-middle"><?=$tanggal_gk ?></td>
						      <td class="align-middle"><?=$gk['judul_gk'] ?> </td>
						      <td class="align-middle"><?=$gk['uraian'] ?></td>
						      <td class="align-middle text-center">
						      	<?php
						      		$this->db->where('id_gk', $gk['id_gk']);
							        $jlh_dk = $this->db->get('dok_kegiatan')->num_rows();
						      	?>
						      	<a href="<?=base_url('menu/landing/galeri/dokumentasi/').$gk['id_gk'] ?>" class="btn btn-success" title="<?=$jlh_dk ?> Dokumentasi"><?=$jlh_dk ?> Dokumentasi</a>
						      </td>
						      <td class="align-middle text-center">
						      	<button class="btn btn-sm btn-circle btn-info" id="ubahgaleri" data-toggle="modal" data-target="#ubahgaleriModal" data-id="<?=$gk['id_gk'] ?>" data-tgl="<?=$gk['tgl_gk'] ?>" data-judul="<?=$gk['judul_gk'] ?>" data-uraian="<?=$gk['uraian'] ?>" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
						      	<button class="btn btn-sm btn-circle btn-danger" id="hapusgaleri" data-toggle="modal" data-target="#hapusgaleriModal" data-id="<?=$gk['id_gk'] ?>" data-judul="<?=$gk['judul_gk'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
						      </td>
						    </tr>
						  <?php endforeach ?>
						</tbody>
					</table>
				</div>
				</div>
				<!-- <div class="card-footer text-muted">
					2 days ago
				</div> -->
			</div>
		</div>
		<!-- GALERI -->

		<!-- KONTAK -->
		<div class="tab-pane fade show" id="list-kontak" role="tabpanel" aria-labelledby="list-kontak">
			<div class="card shadow border-primary mb-5">
				<div class="card-header bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							Kontak / Hubungi Kami
						</div>
						<div class="col-md-4 text-right">
							<a href="<?=base_url('dashboard/pengaturan') ?>" class="btn btn-circle btn-sm btn-primary" title="Ubah"><i class="fa fa-edit"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row justify-content-md-center">
						<div class="col-md-5">
							<div class="card shadow border-info mb-3">
								<div class="card-header bg-gradient-info text-white">
									Informasi Kontak
								</div>
								<div class="card-body">
									<div class="overflow-auto text-justify"><?=$pengaturan['info'] ?></div>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="card shadow border-success mb-3">
								<div class="card-header bg-gradient-success text-white">
									Kontak
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label for="telpon" class="col-sm-3 col-form-label">Telepon</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext font-weight-bold" id="telpon" name="telpon" value="<?=$pengaturan['telpon'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-sm-3 col-form-label">E-Mail</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext font-weight-bold" id="email" name="email" value="<?=$pengaturan['email'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="jam_kerja" class="col-sm-3 col-form-label">Jam Kerja</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext font-weight-bold" id="jam_kerja" name="jam_kerja" value="<?=$pengaturan['jam_kerja'] ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="card shadow border-warning mb-3">
								<div class="card-header bg-gradient-warning text-white">
									Sosial Media
								</div>
								<div class="card-body">
									<span class="font-weight-bold"><i class="fab fa-fw fa-facebook-f fa-1x text-primary"></i> <?=$pengaturan['facebook'] ?></span>
									<br>
									<br>
									<span class="font-weight-bold"><i class="fab fa-fw fa-instagram fa-1x text-danger"></i> <?=$pengaturan['instagram'] ?></span>
									<br>
									<br>
									<span class="font-weight-bold"><i class="fab fa-fw fa-twitter fa-1x text-info"></i> <?=$pengaturan['twitter'] ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="card shadow border-danger">
						<div class="card-header bg-gradient-danger text-white">
							Map
						</div>
						<div class="card-body">
							<div class="embed-responsive embed-responsive-21by9">
								<iframe class="embed-responsive-item" src="<?=$pengaturan['map'] ?>" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="card-footer text-muted">
					2 days ago
				</div> -->
			</div>
		</div>
		<!-- KONTAK -->

		<!-- SLIDER -->
		<div class="tab-pane fade show" id="list-slider" role="tabpanel" aria-labelledby="list-slider">
			<div class="card shadow border-primary mb-5">
				<div class="card-header bg-primary text-white">
					<div class="row">
						<div class="col-md-8">
							Gambar Slider Landing Page
						</div>
						<div class="col-md-4 text-right">
							<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahsliderModal"><i class="fa fa-fw fa-plus"></i></button>
						</div>
					</div>
				</div>
				<div class="card-body row">
					<?php if($slider){ ?>
							<?php foreach ($slider as $sl): ?>
								<div class="col-md-3">
									<div class="card shadow text-white mb-3">
								    <img src="<?=base_url('assets/landing/images/slider/').$sl['file'] ?>" class="card-img" alt="<?=$sl['nama'] ?>">
									  <div class="card-img-overlay">
									    <h5 class="card-title"><?=$sl['nama'] ?></h5>
									  	<button class="btn btn-sm btn-circle btn-danger" id="hapusslider" data-toggle="modal" data-target="#hapussliderModal" data-id="<?=$sl['id'] ?>" data-nama="<?=$sl['nama'] ?>" data-file="<?=$sl['file'] ?>" title="Hapus Slider"><i class="fa fa-fw fa-trash"></i></button>
									  </div>
									</div>
								</div>
							<?php endforeach ?>
					<?php }else{ ?>
						<div class="col-12">
							<div class="alert alert-secondary text-center" role="alert">Tidak ada data yang tersedia!</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- SLIDER -->
    </div>
  </div>
</div>

<!-- Modal Tambah Galeri-->
<div class="modal fade" id="tambahgaleriModal" tabindex="-1" role="dialog" aria-labelledby="tambahgaleriModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahgaleriModalLabel">Tambah Galeri Kegiatan</h5>
      </div>
      <form action="<?=base_url('menu/landing/galeri/tambah') ?>" method="post">
	      <div class="modal-body">
				  <div class="form-group row">
				    <label for="tgl_gk" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control" name="tgl_gk" id="tgl_gk" value="<?=date('Y-m-d') ?>" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="judul_gk" class="col-sm-2 col-form-label">Judul Kegiatan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="judul_gk" name="judul_gk" placeholder="Judul Kegiatan" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="uraian">Uraian Kegiatan</label>
				    <textarea class="form-control" id="uraian" name="uraian" rows="5" placeholder="Uraian Kegiatan" required></textarea>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Ubah Galeri-->
<div class="modal fade" id="ubahgaleriModal" tabindex="-1" role="dialog" aria-labelledby="ubahgaleriModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahgaleriModalLabel">Ubah Galeri Kegiatan</h5>
      </div>
      <form id="formubahgaleri" action="<?=base_url('menu/landing/galeri/ubah') ?>" method="post">
	      <div class="modal-body">
				  <div class="form-group row">
				    <label for="tgl_gk" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control" name="tgl_gk" id="tgl_gk" required>
				      <input type="hidden" class="form-control" name="id_gk" id="id_gk" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="judul_gk" class="col-sm-2 col-form-label">Judul Kegiatan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="judul_gk" name="judul_gk" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="uraian">Uraian Kegiatan</label>
				    <textarea class="form-control" id="uraian" name="uraian" rows="5" required></textarea>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-save"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Hapus Galeri-->
<div class="modal fade" id="hapusgaleriModal" tabindex="-1" role="dialog" aria-labelledby="hapusgaleriModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusgaleriModalLabel">Hapus Galeri Kegiatan</h5>
      </div>
      <form id="formhapusgaleri" action="<?=base_url('menu/landing/galeri/hapus') ?>" method="post">
	      <div class="modal-body">
	      	<p id="ket">Keterangan</p>
		      <input type="text" class="form-control" name="id_gk" id="id_gk" required>
		      <input type="text" class="form-control" id="judul_gk" name="judul_gk" required>>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Tambah Slider-->
<div class="modal fade" id="tambahsliderModal" tabindex="-1" role="dialog" aria-labelledby="tambahsliderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahsliderModalLabel">Tambah Gambar Slider</h5>
      </div>
      <form id="formtambahslider" action="<?=base_url('menu/landing/galeri/tambahslider') ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<div class="form-group row">
				    <label for="nama_slider" class="col-sm-3 col-form-label">Nama Slider</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nama_slider" name="nama_slider" placeholder="Nama Slider" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="file_slider" class="col-sm-3 col-form-label">File Slider</label>
				    <div class="col-sm-9">
						  <div class="custom-file">
							  <input type="file" class="custom-file-input" id="file_slider" name="file_slider" required>
							  <label class="custom-file-label" for="file_slider" data-browse="Pilih File">Pilih file dengan format <strong>.jpg, .jpeg, .png, .pdf</strong>!</label>
							</div>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Hapus Galeri-->
<div class="modal fade" id="hapussliderModal" tabindex="-1" role="dialog" aria-labelledby="hapussliderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapussliderModalLabel">Hapus Gambar Slider</h5>
      </div>
      <form id="formhapusslider" action="<?=base_url('menu/landing/galeri/hapusslider') ?>" method="post">
	      <div class="modal-body">
	      	<p id="ket">Keterangan</p>
		      <input type="text" class="form-control" name="id_slider" id="id_slider" required>
		      <input type="text" class="form-control" id="nama_slider" name="nama_slider" required>
		      <input type="text" class="form-control" id="file_slider" name="file_slider" required>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/admin/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#ubahgaleri", function() {
        var id = $(this).data('id');
        var tgl = $(this).data('tgl');
        var judul = $(this).data('judul');
        var uraian = $(this).data('uraian');
        $("#ubahgaleriModal #id_gk").val(id);
        $("#ubahgaleriModal #tgl_gk").val(tgl);
        $("#ubahgaleriModal #judul_gk").val(judul);
        $("#ubahgaleriModal #uraian").val(uraian);
        $("#ubahgaleriModal #formubahgaleri").attr("action","<?php echo base_url() ?>menu/landing/galeri/ubah");
    });

    $(document).on("click", "#hapusgaleri", function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        $("#ubahgaleriModal #id_gk").val(id);
        $("#ubahgaleriModal #judul_gk").val(judul);
        $("#ubahgaleriModal #ket").val(judul);
        $("#ubahgaleriModal #formubahgaleri").attr("action","<?php echo base_url() ?>menu/landing/galeri/ubah");
    });

    $(document).on("click", "#hapusslider", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#hapussliderModal #id_slider").val(id);
        $("#hapussliderModal #nama_slider").val(nama);
        $("#hapussliderModal #file_slider").val(file);
        $("#hapussliderModal #ket").val('Anda ingin menghapus slider '+nama+'?');
        $("#hapussliderModal #formhapusslider").attr("action","<?php echo base_url() ?>menu/landing/galeri/hapusslider/"+id);
    });

</script>