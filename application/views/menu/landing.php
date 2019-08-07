<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
    	<?php foreach ($menulanding as $ml): ?>
			<a class="list-group-item list-group-item-action" id="list-<?=$ml['url_ml']?>-list" data-toggle="list" href="#list-<?=$ml['url_ml']?>" role="tab" aria-controls="<?=$ml['url_ml']?>"><?=$ml['nama_ml'] ?></a>
    	<?php endforeach ?>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show" id="list-profil" role="tabpanel" aria-labelledby="list-profil">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">
					Profil
				</div>
				<div class="card-body">
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<div class="list-group">
								<?php foreach ($profil as $pr): ?>
									<a href="<?=base_url('menu/landing/profil/').$pr['id_profil'] ?>" class="list-group-item list-group-item-action"><?=$pr['nama_profil'] ?></a>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="card-footer text-muted">
					2 days ago
				</div> -->
			</div>
		</div>
		<div class="tab-pane fade show" id="list-layanan" role="tabpanel" aria-labelledby="list-layanan">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">
					Layanan
				</div>
				<div class="card-body row">
					<div class="col-md-6">
						<div class="card border-success shadow">
							<div class="card-header bg-success text-white">
								Utama
							</div>
							<div class="card-body">
								<div class="list-group">
									<?php foreach ($layanan_utama as $lu): ?>
										<a href="<?=base_url('menu/landing/layanan/').$lu['id_layanan'] ?>" class="list-group-item list-group-item-action list-group-item-success"><?=$lu['nama_layanan'] ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card border-warning shadow">
							<div class="card-header bg-warning text-dark">
								Pendukung
							</div>
							<div class="card-body">
								<div class="list-group">
									<?php foreach ($layanan_pendukung as $lp): ?>
										<a href="<?=base_url('menu/landing/layanan/').$lp['id_layanan'] ?>" class="list-group-item list-group-item-action list-group-item-warning"><?=$lp['nama_layanan'] ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade show" id="list-galeri" role="tabpanel" aria-labelledby="list-galeri">Galeri</div>
		<div class="tab-pane fade show" id="list-kontak" role="tabpanel" aria-labelledby="list-kontak">Kontak</div>
    </div>
  </div>
</div>