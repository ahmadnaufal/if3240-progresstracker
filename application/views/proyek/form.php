
<div class="main-content">
	<div class="content-header">
		<h1>Tambah Proyek Baru</h1>
	</div>
	<div class="content-body">
		<div class="col-md-8">
			<?= form_open('proyek/addProyek', array('class' => 'form-horizontal')) ?>
				<div class="form-group">
					<label for="namaProyek" class="col-sm-3 control-label">Judul Proyek</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="namaProyek" name="nama_proyek" placeholder="Judul Proyek" />
				    </div>
				</div>
				<div class="form-group">
					<label for="deskripsiProyek" class="col-sm-3 control-label">Deskripsi Proyek</label>
				    <div class="col-sm-9">
				      <textarea class="form-control" id="deskripsiProyek" name="deskripsi" placeholder="Ceritakan detil tentang Proyek tersebut!"></textarea>
				    </div>
				</div>
				<div class="form-group">
					<label for="emailKlien" class="col-sm-3 control-label">Email Klien</label>
				    <div class="col-sm-9">
				      <input type="email" class="form-control" id="emailKlien" name="email" placeholder="E-mail Klien yang akan didaftarkan" />
				    </div>
				</div>

				<hr>
				<button type="submit" class="btn btn-primary pull-right">Daftarkan</button>
			</form>
		</div>
	</div>
</div>
