<div class="modal fade" id="Deleted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_deleted"></h4>
      </div>

      <div class="modal-body">
        <p>Apakah anda yakin akan menghaus jurnal ini ???</p>
      </div>

      <div class="modal-footer">
        <div class="pull-left">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-remove"></i> cancle
          </button>
        </div>
        <form name="deleted" method="POST" data-delete="data-delete">
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i> Deleted
          </button>
        </form>
      </div>
    
    </div>
  </div>
</div>