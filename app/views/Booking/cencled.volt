<div class="modal fade" id="Cencle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Batal Booking</h4>
      </div>

      <form name="cencle" action="{{ url('Booking/cencle') }}" method="POST" data-remote="data-remote">
        <input type="hidden" name="id" value="">
        <div class="modal-body">
          <p>Apakan anda yakin kode <span id="cencle_booking" class="text-danger"></span>
          membatalkan booking ?? jika iya msukan alasannya ???</p>
          <div class="form-group">
            <textarea class="form-control" name="note" placeholder="Text alasan gagal booking ..." rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-danger">Cencle Booking</button>
        </div>
      </form>

    </div>
  </div>
</div>