<!-- Modal -->
<div class="modal fade" id="formAddPertemuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('pertemuan/addPertemuan', array('class' => 'form-horizontal')) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Pertemuan pada Proyek</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label for="judulPertemuan" class="col-sm-3 control-label">Judul Pertemuan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="judulPertemuan" name="judul" placeholder="Judul Pertemuan" />
                </div>
            </div>
            <div class="form-group">
              <label for="waktuPertemuan" class="col-sm-3 control-label">Waktu Pertemuan</label>
                <div class="col-sm-8">
                  <input type="datetime-local" class="form-control" id="waktuPertemuan" name="waktu" />
                </div>
            </div>
            <div class="form-group">
              <label for="deskripsiPertemuan" class="col-sm-3 control-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="deskripsiPertemuan" name="deskripsi" placeholder="Jelaskan detil pertemuan ini..." ></textarea>
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