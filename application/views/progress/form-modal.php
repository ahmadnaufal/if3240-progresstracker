<!-- Modal -->
<div class="modal fade" id="formAddProgress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('progress/addProgress', array('class' => 'form-horizontal')) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Progress Kegiatan</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label for="persentase" class="col-sm-3 control-label">Persentase</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="persentase" name="persentase" placeholder="" />
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