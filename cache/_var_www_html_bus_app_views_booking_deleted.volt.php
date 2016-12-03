<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Booking</h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Booking/delete') ?>" method="POST" data-delete="data-delete">
        <input type="hidden" name="id" value="">
        <div class="modal-body">
          <p>Apakan anda yakin kode <span id="cencle_booking" class="text-danger"></span>
          akan di hapus ???</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-danger">Delete Booking</button>
        </div>
      </form>

    </div>
  </div>
</div>