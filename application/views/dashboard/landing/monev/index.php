<?php
	$total_anggaran = 0;
	$total_realisasi = 0;
	foreach ($kegiatan as $giat) {
		$total_anggaran += $giat['anggaran'];
		$total_realisasi += $giat['realisasi'];
	}
?>
<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
			<a class="list-group-item list-group-item-action active" id="list-program-list" data-toggle="list" href="#list-program" role="tab" aria-controls="program">Program</a>
			<a class="list-group-item list-group-item-action" id="list-kegiatan-list" data-toggle="list" href="#list-kegiatan" role="tab" aria-controls="kegiatan">Kegiatan</a>
			<a class="list-group-item list-group-item-action" id="list-tarsasi-list" data-toggle="list" href="#list-tarsasi" role="tab" aria-controls="tarsasi">Target & Realisasi</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">

			<!-- PROGRAM -->
			<div class="tab-pane fade show active" id="list-program" role="tabpanel" aria-labelledby="list-program">
				<div class="card shadow border-primary mb-5">
					<div class="card-header bg-primary text-white">
						Program
						<button class="btn btn-sm btn-circle btn-primary float-right" id="tambahprogram" data-toggle="modal" data-target="#tambahprogramModal" title="Tambah Program"><i class="fa fa-fw fa-plus"></i></button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
								<tbody>
								  <?php $no = 1; foreach ($program as $pr): ?>
									  <?php
										  $aa=0;
										  $ra=0;
									  	$this->db->select('*');
							            $this->db->from('kegiatan');
							            $this->db->where('id_program', $pr['id_program']);
							            $this->db->order_by('id_kegiatan', 'ASC');
							            $kega = $this->db->get()->result_array();
							            foreach ($kega as $ka) {
							            	$aa += $ka['anggaran'];
							            	$ra += $ka['realisasi'];
							            }
									  ?>
								    <tr>
								      <td class="align-middle text-center" width="3%"><?=$no++ ?></td>
								      <td class="align-middle"><?=$pr['nama_program'] ?></td>
								      <td class="align-middle text-right">Rp. <?=number_format($aa,2,',','.') ?></td>
								      <td class="align-middle text-center" width="8%">
								      	<button class="btn btn-sm btn-circle btn-info" id="ubahprogram" data-toggle="modal" data-target="#ubahprogramModal" data-id="<?=$pr['id_program'] ?>" data-nama="<?=$pr['nama_program'] ?>" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
								      	<button class="btn btn-sm btn-circle btn-danger" id="hapusprogram" data-toggle="modal" data-target="#hapusprogramModal" data-id="<?=$pr['id_program'] ?>" data-nama="<?=$pr['nama_program'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
								      </td>
								    </tr>
								  <?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer text-primary">
						Total Pagu Anggaran
						<span class="float-right font-weight-bold">Rp. <?=number_format($total_anggaran,2,',','.') ?></span>
					</div>
				</div>
			</div>
			<!-- PROGRAM -->

			<!-- KEGIATAN -->
			<div class="tab-pane fade show" id="list-kegiatan" role="tabpanel" aria-labelledby="list-kegiatan">
				<div class="card shadow border-primary mb-5">
					<div class="card-header bg-primary text-white">
						Kegiatan
						<button class="btn btn-sm btn-circle btn-primary float-right" id="tambahkegiatan" data-toggle="modal" data-target="#tambahkegiatanModal" title="Tambah Kegiatan"><i class="fa fa-fw fa-plus"></i></button>
					</div>
					<div class="card-body">
					  <?php foreach ($program as $pr): ?>
						  <?php
							  $ab=0;
							  $rb=0;
						  	$this->db->select('*');
		            $this->db->from('kegiatan');
		            $this->db->where('id_program', $pr['id_program']);
		            $this->db->order_by('id_kegiatan', 'ASC');
		            $keg = $this->db->get()->result_array();
		            foreach ($keg as $kb) {
		            	$ab += $kb['anggaran'];
		            	$rb += $kb['realisasi'];
		            }
						  ?>
						<div class="card border-info shadow mb-3">
							<div class="card-header bg-info text-white">
								<?=$pr['nama_program'] ?>
								<span class="float-right">Rp. <?=number_format($ab,2,',','.') ?></span>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
										<tbody>
										  <?php $no = 1; foreach ($keg as $kg): ?>
										    <tr>
										      <td class="align-middle text-center" width="3%"><?=$no++ ?></td>
										      <td class="align-middle"><?=$kg['nama_kegiatan'] ?></td>
										      <td class="align-middle text-right">Rp. <?=number_format($kg['anggaran'],2,',','.') ?></td>
										      <td class="align-middle text-center" width="8%">
										      	<a href="<?=base_url('landing/monev/kegiatan/ubah/').$kg['id_kegiatan'] ?>" class="btn btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
										      	<button class="btn btn-sm btn-circle btn-danger" id="hapuskegiatan" data-toggle="modal" data-target="#hapuskegiatanModal" data-id="<?=$kg['id_kegiatan'] ?>" data-nama="<?=$kg['nama_kegiatan'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
										      </td>
										    </tr>
										  <?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
				  <?php endforeach ?>
					</div>
					<div class="card-footer text-primary">
						Total Pagu Anggaran
						<span class="float-right font-weight-bold">Rp. <?=number_format($total_anggaran,2,',','.') ?></span>
					</div>
				</div>
			</div>
			<!-- KEGIATAN -->

			<!-- TARGET DAN REALISASI -->
			<div class="tab-pane fade show" id="list-tarsasi" role="tabpanel" aria-labelledby="list-tarsasi">
				<div class="card shadow border-primary mb-5">
					<div class="card-header bg-primary text-white">
						Target Dan Realisasi Program Kegiatan
					</div>
					<div class="card-body">
					  <?php foreach ($program as $pr): ?>
						  <?php
							  $ab=0;
							  $rb=0;
						  	$this->db->select('*');
		            $this->db->from('kegiatan');
		            $this->db->where('id_program', $pr['id_program']);
		            $this->db->order_by('id_kegiatan', 'ASC');
		            $keg = $this->db->get()->result_array();
		            foreach ($keg as $kb) {
		            	$ab += $kb['anggaran'];
		            	$rb += $kb['realisasi'];
		            }
						  ?>
						<div class="card border-info shadow mb-3">
							<div class="card-header bg-info text-white">
								<?=$pr['nama_program'] ?>
								<span class="float-right">Rp. <?=number_format($ab,2,',','.') ?></span>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr class="bg-dark text-white">
												<th class="align-middle text-center">#</th>
												<th class="align-middle">Kegiatan</th>
												<th class="align-middle text-right">Anggaran</th>
												<th class="align-middle text-right">Realisasi</th>
												<th class="align-middle text-center">TF</th>
												<th class="align-middle text-center">RF</th>
												<th class="align-middle text-center">TK</th>
												<th class="align-middle text-center">RK</th>
												<th class="align-middle text-center">OPSI</th>
											</tr>
										</thead>
										<tbody>
										  <?php $no = 1; foreach ($keg as $kg): ?>
										    <tr>
										      <td class="align-middle text-center" width="3%"><?=$no++ ?></td>
										      <td class="align-middle"><?=$kg['nama_kegiatan'] ?></td>
										      <td class="align-middle text-right">Rp. <?=number_format($kg['anggaran'],2,',','.') ?></td>
										      <td class="align-middle text-right">Rp. <?=number_format($kg['realisasi'],2,',','.') ?></td>
										      <td class="align-middle text-center"><?=$kg['tf'] ?>%</td>
										      <td class="align-middle text-center"><?=$kg['rf'] ?>%</td>
										      <td class="align-middle text-center"><?=$kg['tk'] ?>%</td>
										      <td class="align-middle text-center"><?=$kg['rk'] ?>%</td>
										      <td class="align-middle text-center" width="5%">
										      	<a href="<?=base_url('landing/monev/kegiatan/realisasi/').$kg['id_kegiatan'] ?>" class="btn btn-sm btn-circle btn-info" title="Input"><i class="fa fa-fw fa-pencil-alt"></i></a>
										      </td>
										    </tr>
										  <?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
				  <?php endforeach ?>
					</div>
					<div class="card-footer text-primary">
						Total Pagu Anggaran
						<span class="float-right font-weight-bold">Rp. <?=number_format($total_anggaran,2,',','.') ?></span>
						<hr>
						Total Realisasi Keuangan
						<span class="float-right font-weight-bold">Rp. <?=number_format($total_realisasi,2,',','.') ?></span>
					</div>
				</div>
			</div>
			<!-- TARGET DAN REALISASI -->

    </div>
  </div>
</div>

<!-- Modal Tambah Program-->
<div class="modal fade" id="tambahprogramModal" tabindex="-1" role="dialog" aria-labelledby="tambahprogramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahprogramModalLabel">Tambah Program</h5>
      </div>
      <form action="<?=base_url('landing/monev/program/tambah') ?>" method="post">
	      <div class="modal-body">
				  <div class="form-group row">
				    <label for="nama_program" class="col-sm-2 col-form-label">Nama Program</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="Nama Program" required>
				    </div>
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

<!-- Modal Ubah Program-->
<div class="modal fade" id="ubahprogramModal" tabindex="-1" role="dialog" aria-labelledby="ubahprogramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahprogramModalLabel">Ubah Program</h5>
      </div>
      <form id="formubahprogram" action="" method="post">
	      <div class="modal-body">
				  <div class="form-group row">
				    <label for="nama_program" class="col-sm-2 col-form-label">Nama Program</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="Nama Program" required>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-save"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Hapus Program-->
<div class="modal fade" id="hapusprogramModal" tabindex="-1" role="dialog" aria-labelledby="hapusprogramModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusprogramModalLabel">Hapus Program</h5>
      </div>
      <form id="formhapusprogram" action="" method="post">
	      <div class="modal-body text-center">
	      	<p id="ket">Keterangan</p>
		      <input type="hidden" class="form-control" id="nama_program" name="nama_program" required>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
			</form>
    </div>
  </div>
</div>

<!-- Modal Tambah Kegiatan-->
<div class="modal fade" id="tambahkegiatanModal" tabindex="-1" role="dialog" aria-labelledby="tambahkegiatanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahkegiatanModalLabel">Tambah Kegiatan</h5>
      </div>
      <form action="<?=base_url('landing/monev/kegiatan/tambah') ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group row">
			    <label for="id_program" class="col-sm-2 col-form-label">Program</label>
			    <div class="col-sm-10">
			      <select class="form-control" id="id_program" name="id_program" required>
				      <option value="">-- Pilih Program --</option>
				      <?php foreach ($program as $pr): ?>
					      <option value="<?=$pr['id_program'] ?>"><?=$pr['nama_program'] ?></option>
				      <?php endforeach ?>
				    </select>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="anggaran" class="col-sm-2 col-form-label">Anggaran (Rp)</label>
			    <div class="col-sm-4">
			      <input type="number" class="form-control" id="anggaran" name="anggaran" placeholder="Anggaran (Rp)" required>
			      <small class="text-info ml-2" style="font-style: italic;">Masukkan <strong>Angka Saja</strong> tanpa tanda baca!</small>
			    </div>
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

<!-- Modal Hapus Kegiatan-->
<div class="modal fade" id="hapuskegiatanModal" tabindex="-1" role="dialog" aria-labelledby="hapuskegiatanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapuskegiatanModalLabel">Hapus Kegiatan</h5>
      </div>
      <form id="formhapuskegiatan" action="" method="post">
	      <div class="modal-body text-center">
	      	<p id="ket">Keterangan</p>
		      <input type="hidden" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
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

    $(document).on("click", "#ubahprogram", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#ubahprogramModal #nama_program").val(nama);
        $("#ubahprogramModal #formubahprogram").attr("action","<?php echo base_url() ?>landing/monev/program/ubah/"+id);
    });

    $(document).on("click", "#hapusprogram", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusprogramModal #nama_program").val(nama);
        $("#hapusprogramModal #ket").html('Anda yakin ingin menghapus program <strong>'+nama+'</strong>?');
        $("#hapusprogramModal #formhapusprogram").attr("action","<?php echo base_url() ?>landing/monev/program/hapus/"+id);
    });

    $(document).on("click", "#hapuskegiatan", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapuskegiatanModal #nama_kegiatan").val(nama);
        $("#hapuskegiatanModal #ket").html('Anda yakin ingin menghapus kegiatan <strong>'+nama+'</strong>?');
        $("#hapuskegiatanModal #formhapuskegiatan").attr("action","<?php echo base_url() ?>landing/monev/kegiatan/hapus/"+id);
    });

</script>