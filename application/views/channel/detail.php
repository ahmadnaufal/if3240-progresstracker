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
</div>