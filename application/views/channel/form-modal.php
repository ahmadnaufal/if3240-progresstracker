<!-- Modal -->
<div class="modal fade" id="formAddChannel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('channel/addChannel', array('class' => 'form-horizontal')) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Channel pada Proyek</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label for="namaChannel" class="col-sm-3 control-label">Nama Channel</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="namaChannel" name="nama_channel" placeholder="Nama Channel" />
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