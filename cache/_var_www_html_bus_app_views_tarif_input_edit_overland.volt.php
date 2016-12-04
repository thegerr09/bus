<div class="modal fade" id="tambahOverland" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_overland">Tambah Route Overland</h4>
      </div>

      <form name="overland" action="<?= $this->url->get('Tarif/InputOverlandJiarah/overland') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" name="asal" class="form-control" placeholder="Kota Asal">
          </div>
          <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" name="tujuan" class="form-control" placeholder="Kota Tujuan"> 
          </div>
          <div class="form-group">
            <label>Hari</label>
            <input type="number" name="hari" class="form-control" placeholder="Hari"> 
          </div>
          <div class="form-group">
            <label>Medium Agen</label>
            <input type="text" name="medium_agen" data-med-agen class="form-control" placeholder="Medium Agen"> 
          </div>
          <div class="form-group">
            <label>Big Agen</label>
            <input type="text" name="big_agen" data-med-agen class="form-control" placeholder="Big Agen"> 
          </div>
          <div class="form-group">
            <label>Medium Umum</label>
            <input type="text" name="medium_umum" data-med-agen class="form-control" placeholder="Medium Umum"> 
          </div>
          <div class="form-group">
            <label>Big Umum</label>
            <input type="text" name="big_umum" data-med-agen class="form-control" placeholder="Big Umum"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Overland</button>
        </div>
      </form>

    </div>
  </div>
</div>