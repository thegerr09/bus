<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_detail"></h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h5>BOOKING</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 17px;">Kode Booking</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="kode"></td>
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
                  <label class="label bg-green" style="padding-right: 19px;">Type Booking</label>
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
                  <label class="label bg-green" style="padding-right: 19px;">Tanggal Mulai</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="tanggal_mulai"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green">Tanggal Kembali</label>
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
                  <label class="label bg-green">Nama Pelanggan</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="nama"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 18px;">Nomor Telpon</label>
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
                  <label class="label bg-green" style="padding-right: 32px;">Uang Muka</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="dp"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 34px;">Pelunasan</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="pelunasan"></td>
              </tr>
            </table>
            <hr>
          </div>
          <div class="col-md-6">
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
            <h5>BIAYA TAMBAHAN</h5>
            <table>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 20px;">Extra Charge</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="charge"></td>
              </tr>
              <tr>
                <td height="23">
                  <label class="label bg-green" style="padding-right: 40px;">Overtime</label>
                </td>
                <td>&nbsp; : &nbsp;</td>
                <td id="biaya_overtime"></td>
              </tr>
            </table>
            <hr>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>