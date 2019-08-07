<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->
<!-- Building Construction Area -->
<section class="building_construction_area">
    <div class="container">
        <div class="row building_construction_row">
            <?= $this->session->flashdata('info'); ?>
            <div class="col-sm-8 constructing_right">
                <h2>Layanan Utama</h2>
                <ul class="painting">
                    <?php foreach ($layanan_utama as $lu): ?>
                        <li><a href="<?=base_url('layanan/detail/').$lu['id_layanan'] ?>"><?=$lu['nama_layanan'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-sm-4 constructing_right">
                <h2>Layanan Pendukung</h2>
                <ul class="painting">
                    <?php foreach ($layanan_pendukung as $lp): ?>
                        <li><a href="<?=base_url('layanan/detail/').$lp['id_layanan'] ?>"><?=$lp['nama_layanan'] ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="contact_us">
                    <h4>Hubungi Kami</h4>
                    <a href="#" class="contac_namber"><?=$pengaturan['telpon'] ?></a>
                    <a href="#" class="contac_namber"><?=$pengaturan['email'] ?></a>
                    <p><?=$pengaturan['alamat'] ?></p>
                    <a href="<?=base_url('kontak') ?>" class="button_all">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Building Construction Area -->