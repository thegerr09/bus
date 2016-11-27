<div class="modal fade" id="tambahRoute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_route">Tambah Route</h4>
      </div>

      <form name="route" action="{{ url('Tarif/inputRoute') }}" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" name="asal" class="form-control" placeholder="Kota Asal">
          </div>
          <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" name="tujuan" class="form-control" placeholder="Kota Tujuan"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Route</button>
        </div>
      </form>

    </div>
  </div>
</div>