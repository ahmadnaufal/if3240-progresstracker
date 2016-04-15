<!-- Modal -->
<div class="modal fade" id="formAddFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open_multipart('file/addFile/'.$id_proyek, array('class' => 'form-horizontal')) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah File pada Kegiatan ini</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label for="namaFile" class="col-sm-3 control-label">File Upload</label>
                <div class="col-sm-8">
                  <input type="file" id="namaFile" name="file" />
                </div>
            </div>
            
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