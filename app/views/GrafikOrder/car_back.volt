<div class="modal fade" id="CarBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Mobil Kembali</h4>
      </div>

      <form name="carBack" action="{{ url('ListOrder/carBack') }}" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-list"></i>
                  </span>
                  <input type="text" name="lama_overtime" data-dp class="form-control" placeholder="Lama Overtime (Hari)"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="charge" data-dp class="form-control" placeholder="Charge" disabled> 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="biaya_overtime" data-dp class="form-control" placeholder="Biaya Overtime"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="total_pengeluaran" data-dp class="form-control" placeholder="Pengeluaran" onchange="hitungChargeBack()"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="sisa_charge" class="form-control" placeholder="Sisa / Bon"> 
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="note" class="form-control" placeholder="Catatan mobil kembali ..."></textarea>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>