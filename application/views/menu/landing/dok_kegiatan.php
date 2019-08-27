<div class="card shadow border-primary">
	<div class="card-header bg-primary text-white">
		<?=$subjudul." ".$galeri_kegiatan['judul_gk'] ?>
		<a href="<?=base_url('menu/landing') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
		<button class="btn btn-sm btn-circle btn-primary float-right" id="tambah" data-toggle="modal" data-target="#tambahModal" data-id="<?=$galeri_kegiatan['id_gk'] ?>" data-judul="<?=$galeri_kegiatan['judul_gk'] ?>" title="Tambah Dokumentasi Kegiatan"><i class="fa fa-fw fa-plus"></i></button>
	</div>
	<div class="card-body">
		<?php if($jlh_dk==0){ ?>
			<div class="alert alert-dark text-center" role="alert">
			  Belum ada dokumentasi untuk kegiatan ini!
			</div>
		<?php }else{ ?>
			<div class="row justify-content-md-center">
				<?php foreach ($dok_kegiatan as $dk): ?>
					<div class="col-md-2">
						<div class="bg-white shadow text-center p-1">
							<img src="<?=base_url('assets/admin/img/dok_keg/').$dk['dokumentasi'] ?>" class="img-fluid rounded " alt="Responsive image">
							<button type="button" class="btn btn-sm btn-block btn-danger mt-2" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$dk['id_dk'] ?>" data-gk="<?=$dk['id_gk'] ?>" data-judul="<?=$galeri_kegiatan['judul_gk'] ?>" data-dokumentasi="<?=$dk['dokumentasi'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i> Hapus</button>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php } ?>
	</div>
</div>

<?php 
	date_default_timezone_set('Asia/Makassar');
	$tgl = substr($galeri_kegiatan['tgl_gk'], 8, 2);
  $bln = substr($galeri_kegiatan['tgl_gk'], 5, 2);
  $thn = substr($galeri_kegiatan['tgl_gk'], 0, 4);

  if($bln=='01'){
      $bulan='Januari';
  } else if($bln=='02'){
      $bulan='Februari';
  } else if($bln=='03'){
      $bulan='Maret';
  } else if($bln=='04'){
      $bulan='April';
  } else if($bln=='05'){
      $bulan='Mei';
  } else if($bln=='06'){
      $bulan='Juni';
  } else if($bln=='07'){
      $bulan='Juli';
  } else if($bln=='08'){
      $bulan='Agustus';
  } else if($bln=='09'){
      $bulan='September';
  } else if($bln=='10'){
      $bulan='Oktober';
  } else if($bln=='11'){
      $bulan='November';
  } else if($bln=='12'){
      $bulan='Desember';
  }

	$tanggal_gk = $tgl.' '.$bulan.' '.$thn;
?>

<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Dokumentasi Kegiatan</h5>
      </div>
      <form id="formtambah" action="<?=base_url('menu/landing/galeri/tambahdokumentasi/').$galeri_kegiatan['id_gk'] ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<div class="form-group row">
				    <label for="judul_gk" class="col-sm-3 col-form-label">Judul Kegiatan</label>
				    <div class="col-sm-9">
				      <input type="text" readonly class="form-control-plaintext" id="judul_gk" name="judul_gk" value="<?=$galeri_kegiatan['judul_gk'] ?>">
				      <input type="hidden" class="form-control-plaintext" id="id_gk" name="id_gk" value="<?=$galeri_kegiatan['id_gk'] ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tgl_gk" class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
				    <div class="col-sm-9">
				      <input type="text" readonly class="form-control-plaintext" id="tgl_gk" name="tgl_gk" value="<?=$tanggal_gk ?>">
				    </div>
				  </div>
				  <div class="custom-file">
					  <input type="file" class="custom-file-input" id="dok" name="dok" required>
					  <label class="custom-file-label" for="dok" data-browse="Pilih File">Pilih file dengan format <strong>.jpg, .jpeg, .png, .pdf</strong>!</label>
					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Dokumentasi Kegiatan</h5>
      </div>
      <form id="formhapus" action="<?=base_url('menu/landing/galeri/hapusdokumentasi/') ?>" method="post">
	      <div class="modal-body text-center">
	      	<p id="ket">Keterangan</p>
		      <input type="hidden" class="form-control" name="id_dk" id="id_dk" required>
		      <input type="hidden" class="form-control" name="id_gk" id="id_gk" required>
		      <input type="hidden" class="form-control" id="judul_gk" name="judul_gk" required>
		      <input type="hidden" class="form-control" id="dokumentasi" name="dokumentasi" required>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/admin/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var gk = $(this).data('gk');
        var judul = $(this).data('judul');
        var dokumentasi = $(this).data('dokumentasi');
        $("#hapusModal #id_dk").val(id);
        $("#hapusModal #id_gk").val(gk);
        $("#hapusModal #judul_gk").val(judul);
        $("#hapusModal #dokumentasi").val(dokumentasi);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus dokumentasi ini dari kegiatan "+judul+"?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>menu/landing/galeri/hapusdokumentasi/"+id);
    });

</script>