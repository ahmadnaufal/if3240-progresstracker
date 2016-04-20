<div class="progress">
	<div class="progress-bar" role="progressbar" aria-valuenow="<?= $overview_progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $overview_progress ?>%;">
    	<?= number_format($overview_progress, 2) ?>%
  	</div>
</div>
<div class="progress-helper">
	<span class="highlight-black"><?= date("j F Y", strtotime($kegiatan_proyek[0]['waktu_mulai'])) ?></span>
	<span class="highlight-black pull-right"><?= date("j F Y", strtotime($kegiatan_proyek[sizeof($kegiatan_proyek) - 1]['waktu_selesai'])) ?></span>
	<p><b>Progress Terakhir:</b> Membuat kodingan prototipe SI</p>
</div>