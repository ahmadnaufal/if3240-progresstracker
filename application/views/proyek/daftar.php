<div class="panel panel-transparent">
	<div class="panel-heading">
		<h3>Proyek Aktif</h3>
		<a href="<?= base_url('proyek/formAddProyek') ?>" class="btn btn-success pull-right">
			<span class="glyphicon glyphicon-plus"></span> Tambah Proyek Baru
		</a>
	</div>
	<div class="panel-body">
		<div class="row">

			<?php foreach($daftar_proyek as $proyek) :	 ?>

			<div class="col-md-3">
				<a href="<?= base_url('proyek/getProyek/'.$proyek['id']) ?>" class="proyek-card">
					<div class="proyek-title">
						<?= $proyek['nama_proyek'] ?>
					</div>
				</a>
			</div>
			
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="panel panel-transparent">
	<div class="panel-heading">
		<h3>Proyek Nonaktif</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<div class="proyek-card">
					<div class="proyek-title">
						Kuda
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="proyek-card">
					<div class="proyek-title">
						Kuda
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="proyek-card">
					<div class="proyek-title">
						Kuda
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="proyek-card">
					<div class="proyek-title">
						Kuda
					</div>
				</div>
			</div>
		</div>
	</div>
</div>