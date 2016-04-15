<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" style="margin-bottom: 20px;" data-toggle="modal" data-target="#formAddChannel">
			<span class="glyphicon glyphicon-plus"></span> Tambah Channel Baru
		</button>
	</div>
</div>

<div class="row">
	<?php $i = 0; foreach ($channel_proyek as $channel) : ?>
	
		<div class="col-sm-6">
			<a href="<?= base_url('proyek/'.$proyek['id'].'/channel/'.$channel['id']) ?>">
				<div class="media">
					<div class="media-left media-middle">
					    <span class="tanggal"><?= $channel['jumlah_pesan'] ?></span><br>
					    Pesan
					</div>
					<div class="media-body">
					    <h4 class="media-heading"><?= $channel['nama_channel'] ?></h4>
					</div>
				</div>
			</a>
		</div>

		<?php if (++$i % 2 == 0) : ?>
			</div>
			<div class="row">
		<?php endif; ?>

	<?php endforeach; ?>
</div>

<?php
	$this->load->view('channel/form-modal.php', $proyek);
?>

