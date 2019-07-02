<?= $this->session->flashdata('info'); ?>
<form class="user" action="<?=base_url('auth') ?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email..." autofocus value="<?=set_value('email') ?>">
    <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
  </div>
  <div class="form-group">
    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
    <?php echo form_error('password', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
  </div>
  <button type="submit" class="btn btn-primary btn-user btn-block">
    Masuk
  </button>
</form>
<hr>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/lupa_sandi') ?>">Lupa Kata Sandi?</a>
</div>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/daftar') ?>">Buat Akun!</a>
</div>