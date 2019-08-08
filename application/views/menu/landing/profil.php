<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="card shadow border-primary">
			<div class="card-header bg-primary text-white">
				<?=$subjudul ?> - <?=$profil['nama_profil'] ?>
			</div>
			<?php if($profil['tipe']=="text"){ ?>
				<form method="post" action="<?=base_url('menu/landing/profil/').$profil['id_profil'] ?>">
					<div class="card-body">
						<div class="form-group">
							<input type="hidden" name="tipe" id="tipe" value="text">
							<input type="hidden" name="nama_profil" id="nama_profil" value="<?=$profil['nama_profil'] ?>">
							<textarea class="form-control ckeditor" id="ckeditor" name="isi" rows="10"><?=$profil['isi'] ?></textarea>
							<?php echo form_error('isi', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
					<div class="card-footer text-right">
						<a href="<?=base_url('menu/landing') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
						<button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
					</div>
				</form>
			<?php }else{ ?>
				<form method="post" action="<?=base_url('menu/landing/profil/').$profil['id_profil'] ?>" enctype="multipart/form-data">
					<div class="card-body text-center">
						<img src="<?=base_url('assets/admin/img/profil/').$profil['isi'] ?>" class="img img-fluid img-thumbnail">
						<div class="custom-file mt-3">
							<input type="hidden" name="tipe" id="tipe" value="gambar">
							<input type="hidden" name="isi" id="isi" value="gambar">
							<input type="hidden" name="nama_profil" id="nama_profil" value="<?=$profil['nama_profil'] ?>">
							<input type="hidden" name="gambar_lama" id="gambar_lama" value="<?=$profil['isi'] ?>">
							<input type="file" class="custom-file-input" id="gambar" name="gambar" required>
							<label class="custom-file-label" for="gambar" data-browse="Pilih File">Pilih file gambar dengan format .jpg, .jpeg, .png!</label>
						</div>
					</div>
					<div class="card-footer text-right">
						<a href="<?=base_url('menu/landing') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
						<button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>