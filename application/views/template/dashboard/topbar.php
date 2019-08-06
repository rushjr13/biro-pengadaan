    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <marquee class="text-primary"><strong>Selamat Datang di Sistem Informasi <?=$pengaturan['nama_web'] ?></strong></marquee>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Tanggal -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-calendar-check fa-fw"></i>
                <small class="text-primary"><strong><?=$hari_sekarang.', '.$tgl_sekarang ?></strong></small>
              </a>
            </li>

            <!-- Nav Item - Waktu -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clock fa-fw"></i>
                <small class="text-primary"><strong><span id="txt"></span>
                  <?php
                    date_default_timezone_set('Asia/Makassar');
                    $a = date ("H");
                    if (($a>=1) && ($a<=11)){
                      $saat = "Pagi";
                    } else if(($a>11) && ($a<=15)) {
                      $saat = "Siang";
                    } else if (($a>15) && ($a<=18)) {
                      $saat = "Sore";
                    } else {
                      $saat = "Malam";
                    }
                    echo ' '.$saat;
                  ?>
                </strong></small>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$pengguna_masuk['nama_lengkap'] ?></span>
                <?php if($pengguna_masuk['foto']){ ?>
                    <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/pengguna/').$pengguna_masuk['foto'] ?>">
                <?php }else{ ?>
                  <?php if($pengguna_masuk['jk']=="Laki-Laki"){ ?>
                    <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/user_l.png') ?>">
                  <?php }else{ ?>
                    <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/user_p.png') ?>">
                  <?php } ?>
                <?php } ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('profil') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$judul ?></h1>
          </div>
          <?= $this->session->flashdata('info'); ?>