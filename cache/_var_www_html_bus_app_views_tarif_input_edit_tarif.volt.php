<div class="modal fade" id="tambahTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_tarif">Tambah Tarif</h4>
      </div>

      <form name="tarif" action="<?= $this->url->get('Tarif/inputTarif') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Area</label>
            <select class="form-control" onclick="searchRoute(this)">
             <?= $this->Helpers->tagSetting('area', 'Pilih Area', '') ?>
            </select>
          </div>
          <div class="form-group collapse route_id">
            <label>Route</label>
            <select name="route_id" class="form-control" id="route_list">
              
            </select>
          </div>
          <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location"> 
          </div>
          <div class="form-group">
            <label>Tarif Medium Agen</label>
            <input type="text" name="med_agen" data-med-agen class="form-control" placeholder="Tarif Medium Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Big Agen</label>
            <input type="text" name="big_agen" data-big-agen class="form-control" placeholder="Tarif Big Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Medium Agen</label>
            <input type="text" name="med_umum" data-med-umum class="form-control" placeholder="Tarif Medium Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Big Agen</label>
            <input type="text" name="big_umum" data-big-umum class="form-control" placeholder="Tarif Big Agen"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Tarif</button>
        </div>
      </form>

    </div>
  </div>
</div>