<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="<?=base_url('assets/admin/img/').$pengaturan['icon'] ?>" width="25">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="<?=base_url('assets/admin/img/').$pengaturan['logo'] ?>" width="150"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>


      <!-- Heading -->
      <?php foreach ($menu as $mn): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          <?=$mn['nama_menu'] ?>
        </div>
        <?php
          $this->db->where('id_menu', $mn['id_menu']);
          $this->db->order_by('id_submenu', 'ASC');
          $submenu = $this->db->get('submenu')->result_array();
        ?>
        <?php foreach ($submenu as $sm): ?>
          <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link" href="<?=$sm['url'] ?>">
              <i class="fas fa-fw <?=$sm['icon'] ?>"></i>
              <span><?=$sm['nama_submenu'] ?></span></a>
          </li>
        <?php endforeach ?>
      <?php endforeach ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->