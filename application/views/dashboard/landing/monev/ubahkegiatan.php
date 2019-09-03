<div class="row justify-content-md-center">
	<div class="col-md-7">
		<div class="card shadow border-info">
			<div class="card-header bg-info text-white">
				<?=$subjudul ?>
			</div>
			<form action="<?=base_url('landing/monev/kegiatan/ubah/').$kegiatan['id_kegiatan'] ?>" method="post">
				<div class="card-body">
					<div class="form-group row">
				    <label for="id_program" class="col-sm-2 col-form-label">Program</label>
				    <div class="col-sm-10">
				      <select class="form-control" id="id_program" name="id_program">
					      <option value="">-- Pilih Program --</option>
					      <?php foreach ($program as $pr): ?>
						      <option value="<?=$pr['id_program'] ?>" <?php if($pr['id_program']==$kegiatan['id_program']){echo 'selected';} ?>><?=$pr['nama_program'] ?></option>
					      <?php endforeach ?>
					    </select>
					    <?php echo form_error('id_program', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?=$kegiatan['nama_kegiatan'] ?>" autofocus>
				      <?php echo form_error('nama_kegiatan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="anggaran" class="col-sm-2 col-form-label">Anggaran (Rp)</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control" id="anggaran" name="anggaran" placeholder="Anggaran (Rp)" value="<?=$kegiatan['anggaran'] ?>">
				      <?php echo form_error('anggaran', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>
				<div class="card-footer text-right">
					<a href="<?=base_url('landing/monev') ?>" class="btn btn-sm btn-circle btn-secondary" title="Batal"><i class="fa fa-fw fa-times"></i></a>
					<button type="submit" class="btn btn-sm btn-circle btn-info" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>