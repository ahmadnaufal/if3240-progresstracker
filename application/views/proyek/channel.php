<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" style="margin-bottom: 20px;" data-toggle="modal" data-target="#formAddChannel">
			<span class="glyphicon glyphicon-plus"></span> Tambah Channel Baru
		</button>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="media">
			<div class="media-left media-middle">
			    <span class="tanggal">3</span><br>
			    Pesan
			</div>
			<div class="media-body">
			    <h4 class="media-heading">Channel Khusus UI</h4>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="media">
			<div class="media-left media-middle">
			    <span class="tanggal">20</span><br>
			    Pesan
			</div>
			<div class="media-body">
			    <h4 class="media-heading">Backend Development</h4>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('channel/form-modal.php') ?>

