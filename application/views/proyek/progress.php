<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-primary pull-right" style="margin-bottom: 20px;" data-toggle="modal" data-target="#formAddKegiatan">
			<span class="glyphicon glyphicon-plus"></span> Tambah Kegiatan
		</button>
	</div>
</div>

<div class="container">
  <ul class="timeline">
    <?php $i=1; foreach ($kegiatan_proyek as $kegiatan) : ?>
    <?php
      $tanggal_mulai = date("j", strtotime($kegiatan['waktu_mulai']));
      $bulan_mulai = date("F", strtotime($kegiatan['waktu_mulai']));
      $tahun_mulai = date("Y", strtotime($kegiatan['waktu_mulai']));
      $tanggal_selesai = date("j", strtotime($kegiatan['waktu_selesai']));
      $bulan_selesai = date("F", strtotime($kegiatan['waktu_selesai']));
      $tahun_selesai = date("Y", strtotime($kegiatan['waktu_selesai']));
    ?>
    <li <?php if($i % 2 == 0) echo "class=\"timeline-inverted\"" ?> >
      <div class="timeline-badge info"><i class="glyphicon glyphicon-credit-card"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title"><?=$kegiatan['nama_kegiatan'] ?></h4>
          <p>
            <small class="text-muted"><i class="glyphicon glyphicon-time"></i> 
            <?php echo $tanggal_mulai." ".$bulan_mulai." ".$tahun_mulai." - ".$tanggal_selesai." ".$bulan_selesai." ".$tahun_selesai ?>
            </small>
          </p>
        </div>
        <div class="timeline-body">
          <p><?=$kegiatan['deskripsi'] ?></p>
        <hr>
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#" data-toggle="modal" data-target="#formAddProgress">Add Progress</a></li>
              <li><a href="#" data-toggle="modal" data-target="#formAddFile">Upload File</a></li>
            </ul>
          </div>
          <div class="timeline-progress pull-right">
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
          60%
      </div>
      </div>
        </div>
      </div>
    </li>
    
    <?php 
      $i++;
      endforeach;
    ?>
  </ul>
</div>

<?php
  $this->load->view('kegiatan/form-modal.php', $proyek);
  $this->load->view('file/form-modal.php'); 
  $this->load->view('progress/form-modal.php');
?>

