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
	
	<div class="content-header centered">
		<a href="<?= base_url() ?>" class="btn btn-success pull-right">Kembali Ke Overview Proyek</a><br>
		<h1>Channel: <?= $channel['nama_channel'] ?></h1>
	</div>
	<div class="content-body" id="kontenChannel">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="media pesan-channel">
					<div class="media-left">
					    <span class="username-pesan">Ganteng</span><br>
					    <span class="email-pesan">Ganteng</span>
					</div>
					<div class="media-body">
					    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, velit illum blanditiis nesciunt quibusdam sunt explicabo, consectetur harum quod rerum tempore doloremque cumque expedita illo optio unde cum, repellendus similique.</p>
					</div>
				</div>

				<div class="media pesan-channel">
					<div class="media-left">
					    <span class="username-pesan">Ganteng</span><br>
					    <span class="email-pesan">Ganteng</span>
					</div>
					<div class="media-body">
					    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum earum quis deleniti eum itaque nobis nisi eligendi incidunt impedit modi, suscipit aliquam placeat accusamus, consectetur asperiores at consequuntur! Explicabo, velit.</p>
					</div>
				</div>

				<?= form_open('pesan/addPesan') ?>
					<h3>Tinggalkan Pesan Baru!</h3>
					<div class="form-group">
						<textarea class="form-control" name="konten" id="kontenPesan" cols="30" rows="10" placeholder="Tinggalkan pesan untuk channel ini..."></textarea>
					</div>
					<button class="btn btn-primary pull-right" type="submit">Kirim Pesan</button>
				</form>
			</div>
		</div>
	</div>

</div>