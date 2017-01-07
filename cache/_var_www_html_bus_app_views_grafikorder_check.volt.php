<div class="modal fade" id="ChechBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_check">List Booking</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Booking
            </button>
            <p><br></p>
            <table class="table">
              <thead>
                <tr>
                  <td align="center">
                    <b>NO</b>
                  </td>
                  <td align="center">
                    <b>KODE BOOKING</b>
                  </td>
                  <td align="center">
                    <b>NAMA PEMBOOKING</b>
                  </td>
                  <td align="center">
                    <b>TANGGAL MULAI</b>
                  </td>
                  <td align="center">
                    <b>TANGGAL KEMBALI</b>
                  </td>
                  <td align="center">
                    <b>ACTION</b>
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <button class="btn btn-success btn-sm">
                      <i class="fa fa-check-circle"></i> Lanjut Sewa
                    </button>
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-times-circle"></i> Cencle
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal-footer">

      </div>
    
    </div>
  </div>
</div>