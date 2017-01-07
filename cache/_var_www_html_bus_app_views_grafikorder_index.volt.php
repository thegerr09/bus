<style>
.clear,.dataTables_scroll{clear:both}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:#fff}.dataTables_length{width:40%;float:left}.dataTables_filter{width:50%;float:right;text-align:right}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable td.focus,table.dataTable th.focus{outline:#1ABB9C solid 2px!important;outline-offset:-1px}.dataTables_scrollBody{-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.dataTables_empty{text-align:center}.example_alt_pagination div.dataTables_info{width:40%}td {color:#555;}hr{margin-top:4px;margin-bottom:3px;}.cursor{cursor:pointer;}.cursor:hover{color:#f4f4f4;}td{font-size:13px}.table-bordered > tbody > tr > td:hover {background-color: #eaeaea;}
</style>
<section class="content-header animated fadeIn">
  <h1>Grafik Order</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">grafik order</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Order</h3>
          <div class="box-tools pull-right" style="margin-top:2px; width: 200px;">
            <form action="<?= $this->url->get('GrafikOrder/list') ?>">
              <div class="form-group-sm">
                <input type="month" name="filter" class="form-control" value="<?= date('Y-m') ?>" onchange="filter_month(this)">
              </div>
            </form>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <td align="center" style="vertical-align: middle; background-color: #ffffff; z-index: 1000;"><b>TANGGAl</b></td>
                  <?php foreach ($bus as $head) { ?>
                  <td align="center"><b><?= Phalcon\Text::upper($head->ukuran) ?><br><?= Phalcon\Text::upper($head->nomor_polisi) ?></b></td>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach (range(0, $dayInMonth) as $i) { ?>
                <tr>
                  <td align="right" style="<?= $colored[$i] ?> z-index: 1000; vertical-align: middle;" height="40"><?= $listDate[$i] ?></td>
                  <?php foreach ($bus as $body) { ?>
                  <td <?= $this->Helpers->viewGrafik($filterDate[$i], $body->id, $body->ukuran) ?>></td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="box-footer">
          <table>
            <tr>
              <td style="border:1px solid #ccc;" height="25" width="25"></td>
              <td width="170">&nbsp; Belum Di Booking</td>
              <td class="bg-yellow" width="25"></td>
              <td width="170">&nbsp; booking sudah dp</td>
              <td class="bg-red" width="25"></td>
              <td width="170">&nbsp; booking belum dp</td>
              <td class="bg-blue" width="25"></td>
              <td width="170">&nbsp; dalam perjalanan</td>
              <td class="bg-green" width="25"></td>
              <td width="170">&nbsp; Sudah Kembali</td>
            </tr>
          </table>
          <table style="margin-top:10px;">
            <tr>
              <td align="center" width="25">
                <div style="border:1px solid #ccc; border-radius: 3px; height: 25px; padding-top: 3px;">
                  <i class="fa fa-print"></i>
                </div>
              </td>
              <td width="170">&nbsp; Print Nota Booking</td>
              <td align="center" width="25">
                <div style="border:1px solid #ccc; border-radius: 3px; height: 25px; padding-top: 3px;" class="bg-green">
                  <i class="fa fa-print"></i>
                </div>
              </td>
              <td width="170">&nbsp; Print SPT dan Pengeluaran</td>
              <td align="center" width="25">
                <div style="border:1px solid #ccc; border-radius: 3px; height: 25px; padding-top: 3px;" class="bg-teal">
                  <i class="fa fa-print"></i>
                </div>
              </td>
              <td width="170">&nbsp; Print Invoice Pelunasan</td>
              <td align="center" width="25">
                <div style="border-radius: 4px; height: 25px; padding-top: 3px;" class="bg-yellow">
                  <i class="fa fa-bars"></i>
                </div>
              </td>
              <td width="170">&nbsp; Lihat Detail</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->
<div class="modal fade" id="Booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_booking">Input Booking</h4>
      </div>

      <form name="booking" action="<?= $this->url->get('Booking/input') ?>" method="POST" data-remote="data-remote">
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
                    <?= $this->Helpers->tagSetting('pembayaran', 'Methode Pembayaran', '') ?>
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
                    <?= $this->Helpers->tagSetting('paket', 'Pilih Paket', '') ?>
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
                      <?= $this->Helpers->tagSetting('area', 'Pilih Area', '') ?>
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
                    <?= $this->Helpers->tagSetting('Booking', 'Booking Dari', '') ?>
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

            <div id="biaya_tambahan" style="display: none;">
              <span style="padding-left: 14px; font-size: 18px;">BIAYA TAMBAHAN</span>
              <hr style="padding-bottom:10px;">
            </div>

            <div class="col-md-6 col-xs-12" id="charge" style="display: none;">
              <label>Extra Charge</label>
              <table>
                <tbody id="list_charge"></tbody>
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

            <div class="col-md-6 col-xs-12" id="overtime" style="display: none;">
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

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <textarea name="note" rows="3" class="form-control" placeholder="Catatan ...."></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group pull-left">
            <a href=""></a>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="CarBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Mobil Kembali</h4>
      </div>

      <form name="carBack" action="<?= $this->url->get('ListOrder/carBack') ?>" method="POST" data-remote="data-remote">
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
      </div>
    </div>
  </div>
</div>
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

<!-- include JS -->
<script>
$(document).ready(function() {
  var table = $('#example').DataTable( {
    scrollY:        "400px",
    dom:            't',
    scrollX:        true,
    scrollCollapse: true,
    paging:         false,
    lengthChange:   false,
    ordering:       false,
    columnDefs: [
          { "width": "160px", "targets": [0]  },
          <?php $lenght = $this->length($bus); ?>
          <?php foreach (range(1, $lenght) as $table) { ?>
          { "width": "200px", "targets": [<?= $table ?>]  },
          <?php } ?>
      ]
  });
  new $.fn.dataTable.FixedColumns( table, {
    leftColumns: 1,
  });
});

$('input[type="radio"].flat-blue').iCheck({
  radioClass: 'iradio_flat-blue'
});

function checkBooking(tglm, tglk) {
  $.ajax({
    type: 'POST',
    url: 'GrafikOrder/checkBooking/',
    dataType:'json',
    data: 'start='+tglm+'&back='+tglk,
    success: function(response){
      console.log(response);
    }
  });
}

(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var action    = array_url[last];

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: form.serialize(),
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Booking',     'page_booking');
        update_page('Driver',      'page_driver');
        update_page('CoDriver',    'page_co_driver');
        update_page('Bus',         'page_bus');
        update_page('GrafikOrder', 'page_grafik_order');
        update_page('Jurnal',      'page_jurnal');
        clear_form(1);
        if (action == 'cencle'){
          $('#Cencle').modal('hide');
        }
        list();
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('GrafikOrder/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      var handleDataTableButtons = function() {
        if ($("#example").length) {
          $("#example").DataTable({
            dom: "Bfrtip",
          paging:       false,
            lengthChange: false,
            ordering:   false,
            buttons: [
              {
                extend: "copy",
                className: "btn-sm"
              },
              {
                extend: "csv",
                className: "btn-sm"
              },
              {
                extend: "excel",
                className: "btn-sm"
              },
              {
                extend: "pdfHtml5",
                className: "btn-sm"
              },
              {
                extend: "print",
                className: "btn-sm"
              },
            ],
            responsive: true
          });
        }
      };

      TableManageButtons = function() {
        "use strict";
        return {
          init: function() {
            handleDataTableButtons();
          }
        };
      }();
      TableManageButtons.init();
    }
  });
}

function next(id) {
  var form = $('form[name="booking"]');
  form.attr('action', '<?= $this->url->get('Booking/next/') ?>'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .removeClass('btn-primary')
      .addClass('btn-danger')
      .text('Lanjut Sewa');
  form.find('select[name="driver"]').attr('required', 'required').parent().parent().show();
  form.find('select[name="co_driver"]').attr('required', 'required').parent().parent().show();
  form.find('input[name="pelunasan"]').attr('required', 'required').parent().parent().show();
  form.find('input[name="cost"]').attr('required', 'required');
  $('#cost').show();
  $('#charge').show();
  $('#biaya_tambahan').show();
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]')
        .not('[name="modal"]')
        .val(value);
      });
      $('#label_booking').text('Lanjut Sewa kode booking "'+response.kode+'" ?');
      if (response.paket == 'regular') {
        $('#regular').collapse('show');
        $('#jiarah').collapse('hide');
        areaa_selected(response.area, response.route);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        routee_selected(response.route, response.lokasi);
        costView(response.kode, response.cost);
        costCharge(response.kode);
      } else if (response.paket == 'jiarah') {
        $('#regular').collapse('hide');
        $('#jiarah').collapse('show');
        route_jiarah(response.route_jiarah);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        costView(response.kode, response.cost);
        costCharge(response.kode);
      }
    }
  });
}

function carback(kode) {
  var form = $('form[name="booking"]');
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .removeClass('btn-danger')
      .addClass('btn-primary')
      .text('Mobil Kembali');
  form.find('select[name="driver"]').attr('required', 'required').parent().parent().show();
  form.find('select[name="co_driver"]').attr('required', 'required').parent().parent().show();
  form.find('input[name="pelunasan"]').attr('required', 'required').parent().parent().show();
  form.find('input[name="cost"]').attr('required', 'required');
  $('#cost').show();
  $('#charge').show();
  $('#overtime').show();
  $('#biaya_tambahan').show();
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('ListOrder/detail/') ?>'+kode,
    dataType:'json',
    success: function(response){
      form.attr('action', '<?= $this->url->get('ListOrder/carBack/') ?>'+response.id);
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]')
        .not('[name="modal"]')
        .val(value);
      });
      $('#label_booking').text('Mobil kembali kode booking "'+response.kode+'" ?');
      if (response.paket == 'regular') {
        $('#regular').collapse('show');
        $('#jiarah').collapse('hide');
        areaa_selected(response.area, response.route);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        routee_selected(response.route, response.lokasi);
        costView(response.kode, response.cost);
        costCharge(response.kode);
      } else if (response.paket == 'jiarah') {
        $('#regular').collapse('hide');
        $('#jiarah').collapse('show');
        route_jiarah(response.route_jiarah);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        costView(response.kode, response.cost);
        costCharge(response.kode);
      }
    }
  });
}

$('#tanggal_booking').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});
$('#tanggal_start').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});
$('#tanggal_back').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});

$('[data-filter]').datetimepicker({
  viewMode: 'months',
  format: 'YYYY-MM'
});

$("[data-telp]").inputmask({mask: "99999999999999", placeholder: "",});
$("[data-tarif]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-dp]").inputmask({mask: "9999999999", placeholder: "",});

function pakett(that) {
  var val = $(that).val();
  if (val == 'regular') {
    $('#regular').collapse('show');
    $('#jiarah').collapse('hide');
  } else if (val == 'jiarah') {
    route_jiarah();
    $('#regular').collapse('hide');
    $('#jiarah').collapse('show');
  } else {
    $('#regular').collapse('hide');
    $('#jiarah').collapse('hide');
    $('#overland').collapse('hide');
  }
}

function areaa(that) {
  var val  = $(that).val();
  var data = Object.keys(<?= $this->Helpers->areaJson() ?>);
  for (var i = 0; i < data.length; i++) {
    if (data[i] == val) {
      $.ajax({
        type: 'POST',
        url: '<?= $this->url->get('Booking/data/') ?>'+4,
        dataType:'html',
        data: 'area='+val,
        success: function(response){
          $('select[name="route"]').html(response);
          var html = '<option value="">Booking Dari</option><option value="agen">Agen</option><option value="umum">Umum</option>';
          $('select[name="type_booking"]').html(html);
        }
      });
      break;
    }
  }
}

function areaa_selected(area, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+4,
    dataType:'html',
    data: 'area='+area+'&selected='+selected,
    success: function(response){
      $('select[name="route"]').html(response);
    }
  });
}

function routee(that) {
  var val = $(that).val();
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+5,
    dataType:'html',
    data: 'lokasi='+val+'&selected=not&paket=regular',
    success: function(response){
      $('select[name="lokasi"]').html(response);
      var html = '<option value="">Booking Dari</option><option value="agen">Agen</option><option value="umum">Umum</option>';
      $('select[name="type_booking"]').html(html);
    }
  });
}

function routee_selected(route, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+5,
    dataType:'html',
    data: 'lokasi='+route+'&selected='+selected+'&paket=regular',
    success: function(response){
      $('select[name="lokasi"]').html(response);
    }
  });
}

function route_jiarah(selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+5,
    dataType:'html',
    data: 'selected='+selected+'&paket=jiarah',
    success: function(response){
      $('select[name="route_jiarah"]').html(response);
    }
  });
}

function lokasii(id) {
  if (id == 'medium') {
    var html = '<option value="">Pilih Type Bus</option><option value="medium" selected>Medium</option><option value="big">Big</option>';
  } else if (id == 'big') {
    var html = '<option value="">Pilih Type Bus</option><option value="medium">Medium</option><option value="big" selected>Big</option>';
  } else {
    var html = '<option value="">Pilih Type Bus</option><option value="medium">Medium</option><option value="big">Big</option>';
  }
  $('select[name="type_bus"]').html(html);
}

function typee_bus(that) {
  var val = $(that).val();
  bus(val);

  var html = '<option value="">Booking Dari</option><option value="agen">Agen</option><option value="umum">Umum</option>';
  $('select[name="type_booking"]').html(html);
}

function bus(ukuran, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+3,
    dataType:'html',
    data: 'ukuran='+ukuran+'&selected='+selected,
    success: function(response){
      $('select[name="bus"]').html(response);
    }
  });
}

function get_harga(that) {
  var val      = $(that).val();
  var paket    = $('select[name="paket"]').val();
  var type_bus = $('select[name="type_bus"]').val();

  if (paket == 'regular') {
    var lokasi = $('select[name="lokasi"]').val();
  } else if (paket == 'jiarah') {
    var lokasi = $('select[name="route_jiarah"]').val();
  }

  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+6,
    dataType:'html',
    data: 'id='+lokasi+'&key='+type_bus+'_'+val+'&paket='+paket,
    success: function(response){
      $('input[name="tarif"]').val(response);
    }
  });
}

function driver(id, selected) {
  if (id == 1) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="driver"]').html(response);
      }
    });
  } else if(id == 2) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="co_driver"]').html(response);
      }
    });
  }
}

function clear_form(id) {
  $('#label_booking').text('Tambah Booking');

  var form = $('form[name="booking"]');

  $('#modal_driver').collapse('hide');
  form.find('select[name="driver"]').removeAttr('required').parent().parent().hide();
  form.find('select[name="co_driver"]').removeAttr('required').parent().parent().hide();
  form.find('input[name="pelunasan"]').removeAttr('required').parent().parent().hide();

  form.find('[name]').val('');
  form.find('input[name="cost"]').removeAttr('required');

  form.attr('action', '<?= $this->url->get('Booking/input') ?>');

  form.find('button[type="submit"]')
      .removeClass('btn-primary')
      .removeClass('btn-danger')
      .addClass('btn-success')
      .text('Save');

  driver(1);
  driver(2);
  lokasii();
  pakett();
  $('#cost').hide();
  $('#charge').hide();
  $('#overtime').hide();
  $('#biaya_tambahan').hide();

  $('#child_charge').html('');

  if (id == 1) {
    $('#Booking').modal('hide');
  }
}

function close_action(tgl, id, ukuran) {
  lokasii(ukuran);
  bus(ukuran, id)
  $('body').removeAttr('style');
  $('form[name="booking"]').find('input[name="tanggal_mulai"]').val(tgl);
  $('form[name="booking"]').find('input[name="tanggal_booking"]').val('<?= date('Y-m-d') ?>');
}

function filter_month(that) {
  var val = $(that).val();
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('GrafikOrder/list') ?>',
    dataType:'html',
    data: 'filter='+val,
    success: function(response){
      $('#list_view').html(response);
      var handleDataTableButtons = function() {
        if ($("#example").length) {
          $("#example").DataTable({
            dom: "Bfrtip",
          paging:       false,
            lengthChange: false,
            ordering:   false,
            buttons: [
              {
                extend: "copy",
                className: "btn-sm"
              },
              {
                extend: "csv",
                className: "btn-sm"
              },
              {
                extend: "excel",
                className: "btn-sm"
              },
              {
                extend: "pdfHtml5",
                className: "btn-sm"
              },
              {
                extend: "print",
                className: "btn-sm"
              },
            ],
            responsive: true
          });
        }
      };

      TableManageButtons = function() {
        "use strict";
        return {
          init: function() {
            handleDataTableButtons();
          }
        };
      }();
      TableManageButtons.init();
    }
  });
}

$("#tambah_charge").click(function(){
  var cost = $('#parent_charge').html();
  $("#child_charge").append(cost);
});

function removerTrCharge(that) {
  var data = $(that).parent().parent().parent();
  var id   = data.parent().attr('id');

  if (id == 'parent_charge') {
    return false;
  } else {
    data.remove();
  }
}

function checkboxPercent(that) {
  var data = $(that).parent().parent().parent().parent().parent();
  var satuan = data.find('input[name="satuan[]"]').val();
  var percent = data.find('input[type="checkbox"]');
  var harga_satuan = data.find('input[name="harga_satuan[]"]').val();

  if (satuan != null && harga_satuan != null) {
    if(percent.is(':checked')) {
      var result = satuan / 100 * harga_satuan;
      data.find('input[name="jumlah[]"]').val(result);
    } else {
      var result = satuan * harga_satuan;
      data.find('input[name="jumlah[]"]').val(result);
    }
  }
}

function hitungJumlah(that) {
  var data = $(that).parent().parent().parent().parent();
  var satuan = data.find('input[name="satuan[]"]').val();
  var percent = data.find('input[type="checkbox"]');
  var harga_satuan = data.find('input[name="harga_satuan[]"]').val();

  if (satuan != null && harga_satuan != null) {
    if(percent.is(':checked')) {
      var result = satuan / 100 * harga_satuan;
      data.find('input[name="jumlah[]"]').val(result);
    } else {
      var result = satuan * harga_satuan;
      data.find('input[name="jumlah[]"]').val(result);
    }
  }
}

function hitung() {
  var values = [];
  $("input[name='jumlah[]']").each(function() {
      values.push($(this).val());
  });

  n   = values.length,
  sum = 0;
  while(n--)
  sum += parseFloat(values[n]) || 0;

  $("input[name='cost']").val(sum);
}

function hitungCharge() {
  var values = [];
  $("input[name='biaya_charge[]']").each(function() {
      values.push($(this).val());
  });

  n   = values.length,
  sum = 0;
  while(n--)
  sum += parseFloat(values[n]) || 0;

  $("input[name='charge']").val(sum);
}

function costView(kode, cost) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('GrafikOrder/viewCost') ?>',
    dataType:'html',
    data: 'kode='+kode+'&cost='+cost,
    success: function(response){
      $('#viewCost').html(response);
    }
  });
}

function costCharge(kode) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('GrafikOrder/viewCharge') ?>',
    dataType:'html',
    data: 'kode='+kode,
    success: function(response){
      $('#list_charge').html(response);
    }
  });
}

function detail(kode) {
  var detail = $('#Detail');
  $('#label_detail').text('Detail Kode Booking '+kode);
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('ListOrder/detail/') ?>'+kode,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        if (value == '' || value == null) {
          detail.find('#'+key).text('-');
        } else {
          detail.find('#'+key).text(value);
        }
      });
      driver_name(1, response.driver);
      driver_name(2, response.co_driver);
    }
  });
}

function driver_name(id, selected) {
  if (id == 1) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected+'&bentuk=1',
      success: function(response){
        $('#Detail').find('#driver').text(response);
      }
    });
  } else if(id == 2) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected+'&bentuk=1',
      success: function(response){
        $('#Detail').find('#coDriver').text(response);
      }
    });
  }
}
</script>
