<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="detail_booking"></h4>
      </div>

      <div class="modal-body">
        <div class="row">

          <!-- left -->
          <div class="col-md-6 col-xs-12">
            <h5>BOOKING</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 20px;">Kode Booking</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td><b id="kode"></b></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green">Tanggal Booking</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="tanggal_booking"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 24px;">Type Booking</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="type_booking"></td>
              </tr>
            </table>
            <hr>
            <h5>TANGGAL SEWA</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 25px;">Tanggal Mulai</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="tanggal_mulai"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 10px;">Tanggal Kembali</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="tanggal_kembali"></td>
              </tr>
            </table>
            <hr>
            <h5>PELANGGAN</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 7px;">Nama Pelanggan</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="nama"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 22px;">Nomor Telpon</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="telpon"></td>
              </tr>
            </table>
            <hr>
            <h5>PEMBAYARAN</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 38px;">Uang Muka</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="dp"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 73px;">Tarif</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="tarif"></td>
              </tr>
            </table>
          </div>

          <!-- right -->
          <div class="col-md-6 col-xs-12">
            <h5>KENDARAAN</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green">Type Kendaraan</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="type_bus"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 22px;">Nomor Polisi</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 18px;">Kondisi Mobil</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td></td>
              </tr>
            </table>
            <hr>
            <h5>DRIVER</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 53px;">Driver</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="driver"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 37px;">Co Driver</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="coDriver"></td>
              </tr>
            </table>
            <hr>
            <h5>ROUTE PERJALANAN</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 60px;">Asal</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 49px;">Tujuan</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td></td>
              </tr>
            </table>
            <hr>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <div class="pull-left">
          <a class="btn btn-default" id="print"><i class="fa fa-print"></i> print</a>
        </div>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>