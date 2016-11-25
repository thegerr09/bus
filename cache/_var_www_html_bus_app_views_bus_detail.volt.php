<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_driver">Detail Bus</h4>
      </div>

      <div class="modal-body" id="detail_view">
        <div class="col-md-4" style="border: 1px solid #000;">
          <label>Nomor Polisi</label>
        </div>
        <div class="col-md-4" style="border: 1px solid #000;">d</div>
        <div class="col-md-4" style="border: 1px solid #000;">d</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <div class="pull-left">
          SESSION : <span class="label bg-primary"><?= Phalcon\Text::upper($this->session->get('username')) ?></span>
        </div>
      </div>

    </div>
  </div>
</div>