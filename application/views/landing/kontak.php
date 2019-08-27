<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->
<!-- Map -->
    <div class="contact_map">
        <iframe src="<?=$pengaturan['map'] ?>"></iframe>
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <?= $this->session->flashdata('info'); ?>
                <div class="col-sm-6 contact_info">
                    <h2>Informasi Kontak</h2>
                    <p class="text-justify"><?=$pengaturan['info'] ?></p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">Alamat</a>
                            <a href="#">Jam Kerja</a>
                            <a href="#">Telepon</a>
                            <a href="#">Email</a>
                            <?php if($pengaturan['facebook']){ ?>
                                <a href="#">Facebook</a>
                            <?php } ?>
                            <?php if($pengaturan['instagram']){ ?>
                                <a href="#">Instagram</a>
                            <?php } ?>
                            <?php if($pengaturan['twitter']){ ?>
                                <a href="#">Twitter</a>
                            <?php } ?>
                        </div>
                        <div class="address">
                            <strong>
                                <a href="#"><?=$pengaturan['alamat'] ?></a>
                                <a href="#"><?=$pengaturan['jam_kerja'] ?></a>
                                <a href="#"><?=$pengaturan['telpon'] ?></a>
                                <a href="#"><?=$pengaturan['email'] ?></a>
                                <?php if($pengaturan['facebook']){ ?>
                                    <a href="#">@<?=$pengaturan['facebook'] ?></a>
                                <?php } ?>
                                <?php if($pengaturan['instagram']){ ?>
                                    <a href="#">@<?=$pengaturan['instagram'] ?></a>
                                <?php } ?>
                                <?php if($pengaturan['twitter']){ ?>
                                    <a href="#">@<?=$pengaturan['twitter'] ?></a>
                                <?php } ?>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Kirim Pesan Kepada Kami</h2>
                    <form class="form-inline contact_box" action="<?=base_url('kontak') ?>" method="post">
                        <?php echo form_error('nama', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="nama" name="nama" placeholder="Nama Lengkap *" value="<?=set_value('nama') ?>">
                        <?php echo form_error('telpon', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="telpon" name="telpon" placeholder="No. Telepon/HP *" value="<?=set_value('telpon') ?>">
                        <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Email *" value="<?=set_value('email') ?>">
                        <?php echo form_error('perihal', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="perihal" name="perihal" placeholder="Perihal *" value="<?=set_value('perihal') ?>">
                        <?php echo form_error('isi', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <textarea class="form-control input_box" id="isi" name="isi" placeholder="Masukkan Pesan Anda *"><?=set_value('isi') ?></textarea>
                        <button type="submit" class="btn btn-default">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
