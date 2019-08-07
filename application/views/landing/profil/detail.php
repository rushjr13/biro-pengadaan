<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="<?=base_url('profil') ?>"><?=$judul ?></a></li>
        <li><a href="#" class="active"><?=$profil['nama_profil'] ?></a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- Our Services Area -->
<section class="our_services_tow">
    <div class="container">
        <div class="architecture_area services_pages">
            <div class="portfolio_item portfolio_2">
               <div class="grid-sizer-2"></div>
                <div class="single_facilities col-sm-12 painting building painting adversting ">
                    <div class="who_we_area">
                        <div class="subtittle">
                            <h2><?=$profil['nama_profil'] ?></h2>
                        </div>
                        <?php if($profil['tipe']=='text'){ ?>
                            <p class="text-justify"><?=$profil['isi'] ?></p>
                            <a href="<?=base_url('profil/') ?>" class="button_all">Kembali</a>
                        <?php }else{ ?>
                            <div class="text-center">
                                <img src="<?=base_url('assets/admin/img/profil/').$profil['isi'] ?>" class="img img-thumbnail shadow">
                                
                            </div>
                            <a href="<?=base_url('profil/') ?>" class="button_all float-right">Kembali</a>
                        <?php } ?>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Services Area -->