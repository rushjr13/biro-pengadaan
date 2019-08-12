<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="<?=base_url('layanan') ?>"><?=$judul ?></a></li>
        <li><a href="#" class="active"><?=$layanan['nama_layanan'] ?></a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- All contact Info -->
<section class="all_contact_info">
    <div class="container">
        <div class="row contact_row">
            <div class="col-12 contact_info">
                <?php if($layanan['kategori']==1){ ?>
                    <h2><?=$layanan['nama_layanan'] ?></h2>
					<?php if($layanan['file']){ ?>
						<a href="<?=base_url('assets/admin/img/layanan/').$layanan['file'] ?>" class="button_download" title="<?=$layanan['file'] ?>"><i class="fa fa -fw fa-download"></i> Download File</a>
					<?php } ?>
					<?=$layanan['isi'] ?>
                    <a href="<?=base_url('layanan/') ?>" class="button_all">Kembali</a>
				<?php }else{ ?>
					<div class="row contact_info send_message">
						<div class="col-md-3">&nbsp;</div>
						<div class="col-md-6">
		                    <h2><?=$layanan['nama_layanan'] ?></h2>
		                    <?php if($layanan['id_layanan']==11){ ?>
			                    <form class="form-inline contact_box" action="<?=base_url('layanan/detail/').$layanan['id_layanan'] ?>" method="post">
			                        <?php echo form_error('nama', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=set_value('nama') ?>">
			                        <?php echo form_error('telpon', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="telpon" name="telpon" placeholder="No.Telepon / HP" value="<?=set_value('telpon') ?>">
			                        <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Alamat Email" value="<?=set_value('email') ?>">
			                        <?php echo form_error('id_layanan', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <select type="text" class="form-control input_box" id="id_layanan" name="id_layanan">
			                        	<option value="">Jenis Layanan Yang Di Adukan</option>
			                        	<?php foreach ($layanan_utama as $lu): ?>
				                        	<option value="<?=$lu['id_layanan'] ?>"><?=$lu['nama_layanan'] ?></option>
			                        	<?php endforeach ?>
			                        </select>
			                        <?php echo form_error('isi', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <textarea class="form-control input_box" id="isi" name="isi" placeholder="Masukkan Aduan Anda"><?=set_value('isi') ?></textarea>
			                        <div class="row">
			                        	<div class="col-md-6">
					                        <button type="submit" class="btn btn-default">Kirim</button>
			                        	</div>
			                        	<div class="col-md-6 text-right">
					                        <a href="<?=base_url('layanan') ?>" class="btn btn-danger">Kembali</a>
			                        	</div>
			                        </div>
			                    </form>
		                    <?php }else if($layanan['id_layanan']==12){ ?>
		                    	<form class="form-inline contact_box" action="<?=base_url('layanan/detail/').$layanan['id_layanan'] ?>" method="post">
			                        <?php echo form_error('nama', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=set_value('nama') ?>">
			                        <?php echo form_error('telpon', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="telpon" name="telpon" placeholder="No.Telepon / HP" value="<?=set_value('telpon') ?>">
			                        <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Alamat Email" value="<?=set_value('email') ?>">
			                        <?php echo form_error('isi', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
			                        <textarea class="form-control input_box" id="isi" name="isi" placeholder="Masukkan Kritik dan/atau Saran Anda"><?=set_value('isi') ?></textarea>
			                        <div class="row">
			                        	<div class="col-md-6">
					                        <button type="submit" class="btn btn-default">Kirim</button>
			                        	</div>
			                        	<div class="col-md-6 text-right">
					                        <a href="<?=base_url('layanan') ?>" class="btn btn-danger">Kembali</a>
			                        	</div>
			                        </div>
			                    </form>
		                    <?php } ?>
						</div>
						<div class="col-md-3">&nbsp;</div>
	                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- End All contact Info -->