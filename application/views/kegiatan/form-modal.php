<!-- Modal -->
<div class="modal fade" id="formAddKegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('kegiatan/addKegiatan', array('class' => 'form-horizontal')) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Kegiatan pada Proyek</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label for="namaKegiatan" class="col-sm-3 control-label">Nama Kegiatan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="namaKegiatan" name="nama" placeholder="Nama Kegiatan" />
                </div>
            </div>
            <div class="form-group">
              <label for="waktuMulai" class="col-sm-3 control-label">Waktu Mulai</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="waktuMulai" name="waktu_mulai" />
                </div>
            </div>
            <div class="form-group">
              <label for="waktuSelesai" class="col-sm-3 control-label">Waktu Selesai</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="waktuSelesai" name="waktu_selesai" />
                </div>
            </div>
            <div class="form-group">
              <label for="deskripsiKegiatan" class="col-sm-3 control-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="deskripsiKegiatan" name="deskripsi" placeholder="Jelaskan detil kegiatan ini..." ></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="milestone" class="col-sm-3 control-label">Milestone</label>
                <div class="col-sm-1">
                  <input type="hidden" name="milestone" value="0">
                  <input type="checkbox" class="form-control" id="milestone" name="milestone" value="1"/>
                </div>
            </div>
            <input type="hidden" name="id_proyek" value="<?= $id ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
      </form>
    </div>
  </div>
</div>