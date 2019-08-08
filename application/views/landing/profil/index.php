<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->
<!-- Our Services Area -->
<!-- <section class="our_services_tow">
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
                                <?=$pr['isi'] ?>
                                <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                            <?php }else{ ?>
                                <?=$pr['nama_profil'] ?>
                                <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                            <?php } ?>
                        </div>
                        <hr class="border-dark">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section> -->
<!-- End Our Services Area -->

<!-- Building Construction Area -->
<section class="building_construction_area">
    <div class="container">
        <div class="row building_construction_row">
            <?= $this->session->flashdata('info'); ?>
            <?php foreach ($profil as $pr): ?>
                <div class="col-md-6 constructing_right">
                    <div class="contact_us2">
                        <h4><?=strtoupper($pr['nama_profil']) ?></h4>
                        <?php if($pr['tipe']=='text'){ ?>
                            <?php
                                $num_char = 150;
                                $isi = strip_tags($pr['isi']);
                                $cut_text = substr($isi, 0, $num_char);
                                if ($isi{$num_char - 1} != ' ') { // jika huruf ke 50 (50 - 1 karena index dimulai dari 0) buka  spasi
                                    $new_pos = strrpos($cut_text, ' '); // cari posisi spasi, pencarian dari huruf terakhir
                                    $cut_text = substr($isi, 0, $new_pos);
                                }
                                echo $cut_text . '...';
                            ?>
                            <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                        <?php }else{ ?>
                            <?=$pr['nama_profil'] ?>
                            <a href="<?=base_url('profil/detail/').$pr['id_profil'] ?>" class="button_all">Selengkapnya</a>
                        <?php } ?>
                    </div>
                <br>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- End Building Construction Area -->