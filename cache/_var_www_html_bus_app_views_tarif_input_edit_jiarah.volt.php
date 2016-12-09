<div class="modal fade" id="tambahJiarah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_jiarah">Tambah Route Jiarah</h4>
      </div>

      <form name="jiarah" action="<?= $this->url->get('Tarif/InputOverlandJiarah/jiarah') ?>" method="POST" data-remote="data-remote">
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
            <label>Harga</label>
            <input type="text" name="harga" data-harga-jiarah class="form-control" placeholder="Harga"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Jiarah</button>
        </div>
      </form>

    </div>
  </div>
</div>