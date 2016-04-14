
<div class="main-content">

	<?php if ($errormsg = $this->session->flashdata('error')) : ?>
		<div class="alert alert-warning">
			<?= $errormsg ?>
		</div>
	<?php elseif ($msg = $this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<?= $msg ?>
		</div>
	<?php endif; ?>

	<div class="content-header">
		<h1><?= $proyek['nama_proyek'] ?></h1>
		<p><?= $proyek['deskripsi'] ?></p>
	</div>
	<div class="content-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
			<li role="presentation"><a href="#progress" aria-controls="progress" role="tab" data-toggle="tab">Kegiatan & Progress</a></li>
			<li role="presentation"><a href="#pertemuan" aria-controls="pertemuan" role="tab" data-toggle="tab">Pertemuan</a></li>
			<li role="presentation"><a href="#channel" aria-controls="channel" role="tab" data-toggle="tab">Channel</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="overview">
				<?php $this->load->view('proyek/overview.php') ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="progress">
				<?php $this->load->view('proyek/progress.php') ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="pertemuan">
				<?php
					$data['proyek'] = $proyek;
					$data['pertemuan_proyek'] = $pertemuan_proyek;
				 	$this->load->view('proyek/pertemuan.php', $data)
				?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="channel">
				<?php
					$data['proyek'] = $proyek;
					$data['channel_proyek'] = $channel_proyek;
				 	$this->load->view('proyek/channel.php', $data)
				?>
			</div>
		</div>
	</div>
</div>

