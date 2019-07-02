<?= $this->session->flashdata('info'); ?>
<form class="user" action="<?=base_url('auth/daftar') ?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" autofocus>
  </div>
  <div class="form-group">
    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
  </div>
  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
    </div>
    <div class="col-sm-6">
      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-user btn-block">
    Buat Akun
  </button>
</form>
<hr>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/lupa_sandi') ?>">Lupa Kata Sandi?</a>
</div>
<div class="text-center">
  <a class="small" href="<?=base_url('auth') ?>">Sudah Punya Akun? Masuk!</a>
</div>