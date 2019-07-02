</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <?php if($pengaturan['nama_web']){ ?>
              <span>Copyright &copy; <strong class="text-uppercase"><a href="<?=base_url() ?>"><?=$pengaturan['nama_web'] ?></a></strong> <?=date('Y') ?></span> || 
            <?php } else { ?>
              <span>Copyright &copy; <strong class="text-uppercase"><a href="<?=base_url() ?>">NAMA APLIKASI</a></strong> <?=date('Y') ?></span> || 
            <?php } ?>
            <?php if($pengaturan['facebook']){ ?>
              <span><a href="https://www.facebook.com/<?=$pengaturan['facebook'] ?>" target="_blank" class="btn btn-circle btn-sm btn-primary"><i class="fab fa-fw fa-facebook-f fa-1x"></i></a></span>
            <?php } ?>
            <?php if($pengaturan['instagram']){ ?>
              <span><a href="https://www.instagram.com/<?=$pengaturan['instagram'] ?>" target="_blank" class="btn btn-circle btn-sm btn-danger"><i class="fab fa-fw fa-instagram fa-1x"></i></a></span>
            <?php } ?>
            <?php if($pengaturan['twitter']){ ?>
              <span><a href="https://twitter.com/<?=$pengaturan['twitter'] ?>" target="_blank" class="btn btn-circle btn-sm btn-info"><i class="fab fa-fw fa-twitter fa-1x"></i></a></span>
            <?php } ?>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Tombol "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
          <a class="btn btn-danger" href="<?=base_url('auth/keluar') ?>"><i class="fa fa-fw fa-sign-out-alt"></i> Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/admin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/admin/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/admin/')?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('assets/admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/admin/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('assets/admin/')?>js/demo/chart-pie-demo.js"></script>
  <script src="<?=base_url('assets/admin/')?>js/demo/datatables-demo.js"></script>

  <script>
    $('.file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.file-label').addClass("selected").html(fileName);
    });
  </script>

</body>

</html>