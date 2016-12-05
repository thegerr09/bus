<div class="modal fade" id="delJiarah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Jiarah </h4>
      </div>

      <form name="delJiarah" action="{{ url('Tarif/deleteOverlandJiarah/jiarah') }}" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Jiarah "<span id="deleteJiarah" class="text-danger"></span>" ??</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>