<?php if($layanan['kategori']==1){ ?>
	<div class="card shadow border-primary mb-4">
		<div class="card-header bg-primary text-white">
			<?=$subjudul ?> - <?=$layanan['nama_layanan'] ?>
		</div>
		<form action="<?=base_url('menu/landing/layanan/').$layanan['id_layanan'] ?>" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group">
					<input type="hidden" name="nama_layanan" id="nama_layanan" value="<?=$layanan['nama_layanan'] ?>">
					<textarea class="form-control ckeditor" id="ckeditor" name="isi" rows="20"><?=$layanan['isi'] ?></textarea>
					<?php echo form_error('isi', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
				</div>
				<div class="input-group">
					<?php if($layanan['file']){ ?>
						<div class="input-group-prepend">
							<a href="<?=base_url('assets/admin/img/layanan/').$layanan['file'] ?>" class="btn btn-outline-success" id="layanan" title="<?=$layanan['file'] ?>">Download File</a>
						</div>
					<?php } ?>
					<div class="custom-file">
						<input type="hidden" class="form-control" id="filelama" name="filelama" value="<?=$layanan['file'] ?>">
						<input type="file" class="custom-file-input" id="filelayanan" name="filelayanan" aria-describedby="layanan" >
						<label class="custom-file-label" for="filelayanan" data-browse="Pilih File">Pilih file dengan format <strong>.pdf</strong>!</label>
					</div>
					<div class="input-group-append">
						<button class="btn btn-outline-primary" type="submit" id="layanan">Simpan</button>
						<a href="<?=base_url('menu/landing') ?>" class="btn btn-outline-danger" id="layanan">Kembali</a>
					</div>
				</div>
				<?php if($layanan['file']){ ?>
					<small class="text-info" style="font-style: italic;">
						<i class="fa fa-fw fa-info"></i>Kosongkan jika tidak ingin mengubah file!<br>
					</small>
				<?php } ?>
			</div>
		</form>
	</div>
<?php }else{ ?>
	<div class="card shadow border-primary">
		<div class="card-header bg-primary text-white">
			<?=$layanan['nama_layanan'] ?>
			<a href="<?=base_url('menu/landing') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
		</div>
		<div class="card-body">
			<?php if($layanan['id_layanan']==11){ ?>
				<div class="table-responsive">
					<table class="table table-sm table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-secondary text-white">
						  <tr>
						    <th class="align-middle text-center" width="4%">#</th>
						    <th class="align-middle" width="15%">TANGGAL</th>
						    <th class="align-middle" width="18%">PEMBERI PENGADUAN</th>
						    <th class="align-middle" width="25%">LAYANAN YANG DIADUKAN</th>
						    <th class="align-middle">ISI ADUAN</th>
						    <!-- <th class="align-middle text-center" width="7%">OPSI</th> -->
						  </tr>
						</thead>
						<tbody>

						  <?php $no = 1; foreach ($pengaduan as $adu): ?>
						  <?php 
								date_default_timezone_set('Asia/Makassar');
								$tgl = date('d', $adu['tanggal']);
						        $bln = date('F', $adu['tanggal']);
						        $thn = date('Y', $adu['tanggal']);
						        $hari = date('l', $adu['tanggal']);
						        $jam = date('H', $adu['tanggal']);
						        $menit = date('i', $adu['tanggal']);
						        $detik = date('s', $adu['tanggal']);

						        if($hari=='Sunday'){
						        	$hr='Minggu';
						        } else if($hari=='Monday'){
						        	$hr='Senin';
						        } else if($hari=='Tuesday'){
						        	$hr='Selasa';
						        } else if($hari=='Wednesday'){
						        	$hr='Rabu';
						        } else if($hari=='Thursday'){
						        	$hr='Kamis';
						        } else if($hari=='Friday'){
						        	$hr='Jumat';
						        } else if($hari=='Saturday'){
						        	$hr='Sabtu';
						        }

						        if($bln=='January'){
						            $bulan='Januari';
						        } else if($bln=='February'){
						            $bulan='Februari';
						        } else if($bln=='March'){
						            $bulan='Maret';
						        } else if($bln=='April'){
						            $bulan='April';
						        } else if($bln=='May'){
						            $bulan='Mei';
						        } else if($bln=='June'){
						            $bulan='Juni';
						        } else if($bln=='July'){
						            $bulan='Juli';
						        } else if($bln=='August'){
						            $bulan='Agustus';
						        } else if($bln=='September'){
						            $bulan='September';
						        } else if($bln=='October'){
						            $bulan='Oktober';
						        } else if($bln=='November'){
						            $bulan='November';
						        } else if($bln=='December'){
						            $bulan='Desember';
						        }

								$tanggal_adu = $hr.', '.$tgl.' '.$bulan.' '.$thn;
								$waktu_adu = $jam.':'.$menit.':'.$detik;
						    ?>
						    <tr>
						      <td class="align-middle text-center"><?=$no++ ?></td>
						      <td class="align-middle">
							      	<i class="fa fa-fw fa-calendar-check"></i> <?=$tanggal_adu ?><br>
							      	<i class="fa fa-fw fa-clock"></i> <?=$waktu_adu ?>
						      	</td>
						      <td class="align-middle">
						      	<strong>
						      		<?=$adu['nama'] ?>
					      		</strong>
					      		<br>
						      	<small>
						      		<i class="fa fa-envelope"></i> <?=$adu['email'] ?>
						      		<br>
						      		<i class="fa fa-phone"></i> <?=$adu['telpon'] ?>
						      	</small>
						      </td>
						      <td class="align-middle"><?=$adu['nama_layanan'] ?></td>
						      <td class="align-middle"><?=$adu['isi_aduan'] ?></td>
						      <!-- <td class="align-middle text-center">
						        <?php if($adu['status']=='Pending'){ ?>
						          <button type="button" class="btn btn-sm btn-circle btn-warning" id="status_aduan" data-toggle="modal" data-target="#statusaduanModal" data-id="<?=$adu['id'] ?>" data-status="Proses" data-ket="Memproses" data-tombol="btn btn-sm btn-circle btn-success" data-icon="fa fa-fw fa-retweet" title="Proses Aduan">
						            <i class="fa fa-fw fa-ban"></i>
						          </button>
						        <?php }else if($adu['status']=='Proses'){ ?>
						          <button type="button" class="btn btn-sm btn-circle btn-success" id="status_aduan" data-toggle="modal" data-target="#statusaduanModal" data-id="<?=$adu['id'] ?>" data-status="Selesai" data-ket="Selesaikan" data-tombol="btn btn-sm btn-circle btn-primary" data-icon="fa fa-fw fa-check" title="Selesaikan">
						            <i class="fa fa-fw fa-retweet"></i>
						          </button>
						        <?php }else if($adu['status']=='Selesai'){ ?>
						          <button type="button" class="btn btn-sm btn-circle btn-info" title="Selesai" disabled>
						            <i class="fa fa-fw fa-check"></i>
						          </button>
						        <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$adu['id'] ?>" title="Hapus Aduan">
						          <i class="fa fa-fw fa-trash"></i>
						        </button>
						        <?php } ?>
						      </td> -->
						    </tr>
						  <?php endforeach ?>
						</tbody>
					</table>
				</div>
			<?php }else if($layanan['id_layanan']==12){ ?>
				<div class="table-responsive">
					<table class="table table-sm table-borderless table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-secondary text-white">
						  <tr>
						    <th class="align-middle text-center" width="4%">#</th>
						    <th class="align-middle" width="15%">TANGGAL</th>
						    <th class="align-middle" width="18%">DARI</th>
						    <th class="align-middle">ISI SARAN & KRITIK</th>
						    <!-- <th class="align-middle text-center" width="7%">OPSI</th> -->
						  </tr>
						</thead>
						<tbody>

						  <?php $no = 1; foreach ($kds as $ks): ?>
						  <?php 
								date_default_timezone_set('Asia/Makassar');
								$tgl = date('d', $ks['tanggal']);
						        $bln = date('F', $ks['tanggal']);
						        $thn = date('Y', $ks['tanggal']);
						        $hari = date('l', $ks['tanggal']);
						        $jam = date('H', $ks['tanggal']);
						        $menit = date('i', $ks['tanggal']);
						        $detik = date('s', $ks['tanggal']);

						        if($hari=='Sunday'){
						        	$hr='Minggu';
						        } else if($hari=='Monday'){
						        	$hr='Senin';
						        } else if($hari=='Tuesday'){
						        	$hr='Selasa';
						        } else if($hari=='Wednesday'){
						        	$hr='Rabu';
						        } else if($hari=='Thursday'){
						        	$hr='Kamis';
						        } else if($hari=='Friday'){
						        	$hr='Jumat';
						        } else if($hari=='Saturday'){
						        	$hr='Sabtu';
						        }

						        if($bln=='January'){
						            $bulan='Januari';
						        } else if($bln=='February'){
						            $bulan='Februari';
						        } else if($bln=='March'){
						            $bulan='Maret';
						        } else if($bln=='April'){
						            $bulan='April';
						        } else if($bln=='May'){
						            $bulan='Mei';
						        } else if($bln=='June'){
						            $bulan='Juni';
						        } else if($bln=='July'){
						            $bulan='Juli';
						        } else if($bln=='August'){
						            $bulan='Agustus';
						        } else if($bln=='September'){
						            $bulan='September';
						        } else if($bln=='October'){
						            $bulan='Oktober';
						        } else if($bln=='November'){
						            $bulan='November';
						        } else if($bln=='December'){
						            $bulan='Desember';
						        }

								$tanggal_ks = $hr.', '.$tgl.' '.$bulan.' '.$thn;
								$waktu_ks = $jam.':'.$menit.':'.$detik;
						    ?>
						    <tr>
						      <td class="align-middle text-center"><?=$no++ ?></td>
						      <td class="align-middle">
						      	<i class="fa fa-fw fa-calendar-check"></i> <?=$tanggal_ks ?><br>
						      	<i class="fa fa-fw fa-clock"></i> <?=$waktu_ks ?>
						      </td>
						      <td class="align-middle">
						      	<strong>
						      		<?=$ks['nama'] ?>
					      		</strong>
					      		<br>
						      	<small>
						      		<i class="fa fa-envelope"></i> <?=$ks['email'] ?>
						      		<br>
						      		<i class="fa fa-phone"></i> <?=$ks['telpon'] ?>
						      	</small>
						      </td>
						      <td class="align-middle"><?=$ks['isi_ks'] ?></td>
						      <!-- <td class="align-middle text-center">
						        <?php if($ks['status']=='Pending'){ ?>
						          <button type="button" class="btn btn-sm btn-circle btn-warning" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$ks['id'] ?>" data-status="Respon" data-ket="Respon" data-tombol="btn btn-sm btn-circle btn-success" data-icon="fa fa-fw fa-retweet" title="Proses Aduan">
						            <i class="fa fa-fw fa-ban"></i>
						          </button>
						        <?php }else if($ks['status']=='Respon'){ ?>
						          <button type="button" class="btn btn-sm btn-circle btn-success" id="status" title="Selesaikan">
						            <i class="fa fa-fw fa-check"></i>
						          </button>
						        <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$ks['id'] ?>" title="Hapus Kritik & Saran">
						          <i class="fa fa-fw fa-trash"></i>
						        </button>
						        <?php } ?>
						      </td> -->
						    </tr>
						  <?php endforeach ?>
						</tbody>
					</table>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>

<!-- Modal Status Pengaduan-->
<div class="modal fade" id="statusaduanModal" tabindex="-1" role="dialog" aria-labelledby="statusaduanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusaduanModalLabel">Status Aduan Publik</h5>
      </div>
      <form id="formstatusaduan" action="" method="post">
        <div class="modal-body">
          <p id="isi">Keterangan</p>
          <input class="form-control" type="text" id="id" name="id">
          <input class="form-control" type="text" id="status" name="status">
          <input class="form-control" type="text" id="ket" name="ket">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary" id="tblstatusaduan" title="Status"><i id="icontblstatusaduan" class="fa fa-fw fa-user"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#status_aduan", function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        var ket = $(this).data('ket');
        var tombol = $(this).data('tombol');
        var icon = $(this).data('icon');
        $("#statusaduanModal #id").val(id);
        $("#statusaduanModal #status").val(status);
        $("#statusaduanModal #ket").val(ket);
        $("#statusaduanModal #isi").html("Anda ingin "+ket+" aduan publik ini?");
        $("#statusaduanModal #formstatusaduan").attr("action","<?php echo base_url() ?>menu/landing/layanan/"+id);
        $("#statusaduanModal #tblstatusaduan").attr("title",ket);
        $("#statusaduanModal #tblstatusaduan").attr("class",tombol);
        $("#statusaduanModal #icontblstatusaduan").attr("class",icon);
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var pilih = $(this).data('pilih');
        $("#hapusModal #id").val(id);
        $("#hapusModal #nama").val(nama);
        $("#hapusModal #pilih").val(pilih);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>admin/pemilih/hapus");
    });

</script>