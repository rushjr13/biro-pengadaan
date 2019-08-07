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
						<embed src="<?=base_url('assets/admin/img/layanan/').$layanan['file'] ?>" type="application/pdf" width="100%" height="650" />
					<?php }else{ ?>
						<div class="row contact_info send_message">
							<div class="col-md-3">&nbsp;</div>
							<div class="col-md-6">
			                    <h2><?=$layanan['nama_layanan'] ?></h2>
			                    <form class="form-inline contact_box" action="<?=base_url('layanan/detail/').$layanan['id_layanan'] ?>" method="post">
			                        <input type="text" class="form-control input_box" id="nama" name="nama" placeholder="Nama Lengkap" required>
			                        <input type="text" class="form-control input_box" id="telpon" name="telpon" placeholder="No.Telepon / HP">
			                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Alamat Email">
			                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Subject">
			                        <select type="text" class="form-control input_box" id="id_layanan" name="id_layanan">
			                        	<option value="">Jenis Layanan Yang Di Adukan</option>
			                        	<?php foreach ($layanan_utama as $lu): ?>
				                        	<option value="<?=$lu['id_layanan'] ?>"><?=$lu['nama_layanan'] ?></option>
			                        	<?php endforeach ?>
			                        </select>
			                        <textarea class="form-control input_box" id="isi" name="isi" placeholder="Masukkan Aduan Anda"></textarea>
			                        <button type="submit" class="btn btn-default">Kirim</button>
			                    </form>
							</div>
							<div class="col-md-3">&nbsp;</div>
		                </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->