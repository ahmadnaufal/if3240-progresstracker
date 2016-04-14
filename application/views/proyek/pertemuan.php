<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" style="margin-bottom: 20px;" data-toggle="modal" data-target="#formAddPertemuan">
			<span class="glyphicon glyphicon-plus"></span> Tambah Pertemuan
		</button>
	</div>
</div>

<div class="row">

	<?php foreach ($pertemuan_proyek as $pertemuan) : ?>

		<?php
			$tanggal = date("j", strtotime($pertemuan['waktu']));
			$bulan = date("F", strtotime($pertemuan['waktu']));
			$tahun = date("Y", strtotime($pertemuan['waktu']));
		?>

		<div class="col-sm-6">
			<div class="media">
				<div class="media-left media-middle">
				    <span class="tanggal"><?= $tanggal ?></span><br>
				    <?= $bulan ?><br>
				    <?= $tahun ?>
				</div>
				<div class="media-body">
				    <h4 class="media-heading"><?= $pertemuan['judul'] ?></h4>
				    <?= $pertemuan['deskripsi'] ?>
				</div>
			</div>
		</div>

	<?php endforeach; ?>

</div>

<?php
	$this->load->view('pertemuan/form-modal.php', $proyek);
?>

