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

	<?php
		$id_proyek = $this->uri->segment(2,0);
	?>
	
	<div class="content-header centered">
		<a href="<?= base_url('proyek/'.$id_proyek) ?>" class="btn btn-success pull-right">Kembali Ke Overview Proyek</a><br>
		<h1>Channel: <?= $channel['nama_channel'] ?></h1>
	</div>
	<div class="content-body" id="kontenChannel">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<?php foreach($daftar_pesan as $pesan) : ?>

					<div class="media pesan-channel">
						<div class="media-left">
						    <span class="username-pesan"><?= $pesan['username_pengguna'] ?></span><?php if ($this->session->userdata('logged_in')['username'] == $pesan['username_pengguna']) echo " (anda)" ?><br>
						    <span class="email-pesan"><?= $pesan['email_pengguna'] ?></span>
						</div>
						<div class="media-body">
						    <p><?= $pesan['konten'] ?></p>
							<div class="media-footer">
								Dikirim pada <b><?= date("j F Y", strtotime($pesan['timestamp'])) ?></b> pukul <b><?= date("H:i:s", strtotime($pesan['timestamp'])) ?></b>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

				<?= form_open('pesan/addPesan') ?>
					<h3>Tinggalkan Pesan Baru!</h3>
					<div class="form-group">
						<textarea class="form-control" name="konten" id="kontenPesan" cols="30" rows="10" placeholder="Tinggalkan pesan untuk channel ini..."></textarea>
					</div>
					<input type="hidden" id="idChannel" name="id_channel" value="<?= $channel['id'] ?>">
					<input type="hidden" id="idProyek" name="id_proyek" value="<?= $id_proyek ?>">
					<button class="btn btn-primary pull-right" type="submit">Kirim Pesan</button>
				</form>
			</div>
		</div>
	</div>

</div>