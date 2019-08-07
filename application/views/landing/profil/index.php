<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->
<!-- Our Services Area -->
<section class="our_services_tow">
    <div class="container">
        <div class="architecture_area services_pages">
                <?= $this->session->flashdata('info'); ?>
            <div class="portfolio_item portfolio_2">
                <div class="grid-sizer-2"></div>
                <?php foreach ($profil as $pr): ?>
                    <div class="single_facilities col-sm-6 painting building painting adversting">
                        <div class="who_we_area">
                            <div class="subtittle">
                                <h2><?=$pr['nama_profil'] ?></h2>
                            </div>
                            <?php if($pr['tipe']=='text'){ ?>
                                <p class="text-justify"><?=$pr['isi'] ?></p>
                                <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                            <?php }else{ ?>
                                <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                            <?php } ?>
                        </div>
                        <hr class="border-dark">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- End Our Services Area -->