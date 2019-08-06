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
            <div class="portfolio_item portfolio_2">
               <div class="grid-sizer-2"></div>
               <?php foreach ($profil as $pr): ?>
                <div class="single_facilities col-sm-6 painting building painting adversting">
                    <div class="who_we_area">
                        <div class="subtittle">
                            <h2><?=$pr['nama_profil'] ?></h2>
                        </div>
                        <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alter-ation in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrass-ing hidden in the middle of text.</p>
                        <p class="text-justify">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                        <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                    </div>
                    <hr class="border-dark">
                </div>
               <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- End Our Services Area -->