<div class="modal fade" id="Booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_booking">Input Booking</h4>
      </div>

      <form name="booking" action="{{ url('Booking/input') }}" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">

            <!-- left -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group date">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_booking" id="tanggal_booking" class="form-control" placeholder="Tanggal Booking">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" name="telpon" data-telp class="form-control" placeholder="Nomor Telpon"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_mulai" id="tanggal_start" class="form-control" placeholder="Tanggal Mulai"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_kembali" id="tanggal_back" class="form-control" placeholder="Tanggal Kembali"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="tarif" data-tarif class="form-control" placeholder="Tarif"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="dp" data-dp class="form-control" placeholder="DP / Uang Muka"> 
                </div>
              </div>
              <div class="form-group" style="display:none;">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="pelunasan" data-modalDriver class="form-control" placeholder="Pelunasan">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-credit-card"></i>
                  </span>
                  <select name="metode_pembayaran" class="form-control">
                    {{ Helpers.tagSetting('pembayaran', 'Methode Pembayaran', '') }}
                  </select>
                </div>
              </div>
            </div>

            <!-- right -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-cubes"></i>
                  </span>
                  <select name="paket" class="form-control" onchange="pakett(this)">
                    {{ Helpers.tagSetting('paket', 'Pilih Paket', '') }}
                  </select>
                </div>
              </div>

              <div class="collapse" id="regular">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <select name="area" class="form-control" onchange="areaa(this)">
                      {{ Helpers.tagSetting('area', 'Pilih Area', '') }}
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-o"></i>
                    </span>
                    <select name="route" class="form-control" onchange="routee(this)">
                      <option value="">Pilih Route</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="lokasi" class="form-control">
                      <option value="">Pilih Lokasi</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="collapse" id="jiarah">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="route_jiarah" class="form-control">
                      <option value="">Pilih Route Jiarah</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-map-pin"></i>
                  </span>
                  <input type="text" name="lokasi_jemput" class="form-control" placeholder="Lokasi Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-road"></i>
                  </span>
                  <input type="number" name="jarak_jemput" class="form-control" placeholder="Jarak Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="type_bus" class="form-control" onchange="typee_bus(this)">
                    <option value="">Pilih Type Bus</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="bus" class="form-control">
                    <option value="">Pilih Bus</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-book"></i>
                  </span>
                  <select name="type_booking" class="form-control" onchange="get_harga(this)">
                    <option value="">Booking Dari</option>
                    {{ Helpers.tagSetting('Booking', 'Booking Dari', '') }}
                  </select>
                </div>
              </div>
              <div class="form-group" style="display:none;">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="driver" class="form-control">
                    <option value="">Pilih Driver</option>
                  </select>
                </div>
              </div>
              <div class="form-group" style="display:none;">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="co_driver" class="form-control">
                    <option value="">Pilih Co. Driver</option>
                  </select>
                </div>
              </div>
            </div>

            <div id="cost" style="display: none;">
              <span style="padding-left: 14px; font-size: 18px;">BIAYA COST PENGELUARAN</span>
              <hr style="padding-bottom:10px;">

              <div class="col-md-12 col-xs-12" id="viewCost"></div>
            </div>

            <div id="charge" style="display: none;">
              <span style="padding-left: 14px; font-size: 18px;">BIAYA TAMBAHAN</span>
              <hr style="padding-bottom:10px;">

              <div class="col-md-6 col-xs-12">
                <label>Extra Charge</label>
                <table>
                  <tbody id="parent_charge">
                    <tr>
                      <td>
                        <div class="form-group">
                          <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrCharge(this);hitungCharge();">
                            <i class="fa fa-remove"></i>
                          </button>
                        </div>
                      </td>
                      <td width="5"></td>
                      <td>
                        <div class="form-group">
                          <div class="input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-list"></i>
                            </span>
                            <input type="text" name="name_charge[]" class="form-control" placeholder="Uraian Charge">
                          </div>
                        </div>
                      </td>
                      <td width="5"></td>
                      <td>
                        <div class="form-group">
                          <div class="input-group" >
                            <span class="input-group-addon">
                              <i class="fa fa-money"></i>
                            </span>
                            <input type="text" name="biaya_charge[]" data-tarif class="form-control" placeholder="Biaya Charge" onkeyup="hitungCharge()">
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <tbody id="child_charge"></tbody>
                  <tr>
                    <td colspan="3">
                      <div class="form-group">
                        <button type="button" class="btn btn-success btn-flat btn-sm" id="tambah_charge">
                          <i class="fa fa-plus"></i> Tambah
                        </button>
                      </div>
                    </td>
                    <td width="5"></td>
                    <td>
                      <div class="form-group">
                        <div class="input-group" >
                          <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" name="charge" data-tarif class="form-control" placeholder="Total Charge">
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="col-md-6 col-xs-12">
                <label>Overtime dan Total Pengeluaran</label>
                <table>
                  <tr>
                    <td>
                      <div class="form-group">
                        <div class="input-group" >
                          <span class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </span>
                          <input type="text" name="lama_overtime" data-tarif class="form-control" placeholder="Lama Overtime">
                        </div>
                      </div>
                    </td>
                    <td width="5"></td>
                    <td>
                      <div class="form-group">
                        <div class="input-group" >
                          <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" name="biaya_overtime" data-tarif class="form-control" placeholder="Biaya Overtime">
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <div class="input-group" >
                          <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" name="total_pengeluaran" data-tarif class="form-control" placeholder="Total Pengeluatan">
                        </div>
                      </div>
                    </td>
                    <td width="5"></td>
                    <td>
                      <div class="form-group">
                        <div class="input-group" >
                          <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" name="sisa_or_bon" data-tarif class="form-control" placeholder="Sisa / Bon">
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <textarea name="note" rows="3" class="form-control" placeholder="Catatan ...."></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group pull-left">
            <table width="100%">
              <tr>
                <td style="border:1px solid #ccc;" height="25" width="25"></td>
                <td>&nbsp; stand by &nbsp; </td>
                <td class="bg-teal" width="25"></td>
                <td>&nbsp; di booking &nbsp; </td>
                <td class="bg-yellow" width="25"></td>
                <td>&nbsp; di jalan &nbsp; </td>
                <td class="bg-red" width="25"></td>
                <td>&nbsp; rusak &nbsp; </td>
              </tr>
            </table>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>