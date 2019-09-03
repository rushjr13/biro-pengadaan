<div class="row justify-content-md-center">
	<div class="col-md-7">
		<div class="card shadow border-primary">
			<div class="card-header bg-primary text-white">
				Detail Kegiatan
			</div>
			<div class="card-body">
				<div class="form-group row">
			    <label for="nama_program" class="col-sm-2 col-form-label">Program</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control-plaintext" readonly id="nama_program" name="nama_program" value="<?=$kegiatan['nama_program'] ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="nama_kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control-plaintext" readonly id="nama_kegiatan" name="nama_kegiatan" value="<?=$kegiatan['nama_kegiatan'] ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="anggaran" class="col-sm-2 col-form-label">Anggaran (Rp)</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control-plaintext" readonly id="anggaran" name="anggaran" value="Rp. <?=number_format($kegiatan['anggaran'],2,',','.') ?>">
			    </div>
			  </div>
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="card shadow border-info">
			<div class="card-header bg-info text-white">
				<?=$subjudul ?>
			</div>
			<form action="<?=base_url('landing/monev/kegiatan/realisasi/').$kegiatan['id_kegiatan'] ?>" method="post">
				<div class="card-body">
		      <input type="hidden" class="form-control" readonly id="nama_kegiatan" name="nama_kegiatan" value="<?=$kegiatan['nama_kegiatan'] ?>">
					<div class="form-group row">
				    <label for="realisasi" class="col-sm-5 col-form-label">Realisasi Keuangan (Rp)</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control text-center" id="realisasi" name="realisasi" value="<?=$kegiatan['realisasi'] ?>" autofocus>
				      <?php echo form_error('realisasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-2">
				      <input type="text" class="form-control text-center" id="tf" name="tf" value="<?=$kegiatan['tf'] ?>">
				    </div>
				    <label for="tf" class="col-sm-4 col-form-label">Target Fisik (%)</label>
				    <div class="col-sm-2">
				      <input type="text" class="form-control text-center" id="rf" name="rf" value="<?=$kegiatan['rf'] ?>">
				    </div>
				    <label for="rf" class="col-sm-4 col-form-label">Realisasi Fisik (%)</label>
				    <span class="col-12 text-center">
				      <?php echo form_error('tf', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				      <?php echo form_error('rf', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
				    </span>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-2">
				      <input type="text" class="form-control text-center" id="tk" name="tk" value="<?=$kegiatan['tk'] ?>">
				    </div>
				    <label for="tk" class="col-sm-4 col-form-label">Target Keuangan (%)</label>
				    <div class="col-sm-2">
				      <input type="text" class="form-control text-center" id="rk" name="rk" value="<?=$kegiatan['rk'] ?>">
				    </div>
				    <label for="rk" class="col-sm-4 col-form-label">Realisasi Keuangan (%)</label>
				    <span class="col-12 text-center">
				      <?php echo form_error('tk', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
				      <?php echo form_error('rk', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
				    </span>
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