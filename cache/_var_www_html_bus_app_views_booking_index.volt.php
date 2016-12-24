<style>
.clear,.dataTables_scroll{clear:both}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:#fff}.dataTables_length{width:40%;float:left}.dataTables_filter{width:50%;float:right;text-align:right}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable td.focus,table.dataTable th.focus{outline:#1ABB9C solid 2px!important;outline-offset:-1px}.dataTables_scrollBody{-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.dataTables_empty{text-align:center}.example_alt_pagination div.dataTables_info{width:40%}td {color:#555;}hr{margin-top:4px;margin-bottom:3px;}.cursor{cursor:pointer;}
</style>
<section class="content-header animated fadeIn">
  <h1>Booking</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">booking</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Booking</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <th width="160">Action</th>
                  <th width="160">Booking</th>
                  <th width="160">Waktu Sewa</th>
                  <th width="210">Penyewa</th>
                  <th width="200">Kendaraan</th>
                  <th width="190">Biaya</th>
                </tr>
              </thead>
              <tbody id="list_view">
                <?php foreach ($booking as $x) { ?>
                <tr id="del<?= $x->id ?>" <?php if ($x->success == 'Y') { ?> class="bg-success" <?php } elseif ($x->batal == 'Y') { ?> class="bg-danger" <?php } elseif ($x->dp > 0) { ?> class="bg-info" <?php } ?>>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Detail" onclick="detail(<?= $x->id ?>)"
                    <?php if ($x->success == 'Y' || $x->batal == 'Y') { ?> disabled <?php } ?>>
                      <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit(<?= $x->id ?>)"
                    <?php if ($x->success == 'Y' || $x->batal == 'Y') { ?> disabled <?php } ?>>
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->kode ?>')"
                    <?php if ($x->success == 'Y') { ?> disabled <?php } ?>>
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>&nbsp;
                    <a class="btn btn-default btn-xs" href="GrafikOrder/printBooking/<?= $x->id ?>" target="_blank" 
                    <?php if ($x->success == 'Y' || $x->batal == 'Y') { ?> disabled <?php } ?>>
                      <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
                    </a>&nbsp;
                    <hr>
                    <?php if ($x->success == 'Y') { ?> 
                      <span class="label bg-green"><i class="fa fa-check"></i> SUDAH SEWA</span>
                    <?php } elseif ($x->batal == 'Y') { ?>
                      <span class="label bg-red"><i class="fa fa-remove"></i> BATAL SEWA</span>
                    <?php } else { ?>
                      <span class="label bg-green cursor" data-toggle="modal" data-target="#Tambah" onclick="next(<?= $x->id ?>)">
                        <span data-toggle="tooltip" data-placement="top" title="Lanjut Sewa"><i class="fa fa-check"></i> SEWA</span>
                      </span>&nbsp;
                      <span class="label bg-red cursor" data-toggle="modal" data-target="#Cencle" onclick="cencled(<?= $x->id ?>, '<?= $x->kode ?>')">
                        <span data-toggle="tooltip" data-placement="top" title="Batal Sewa"><i class="fa fa-remove"></i> BATAL</span>
                      </span>
                    <?php } ?>
                  </td>
                  <td>
                    <span class="label bg-blue">kode</span> : <b><?= $x->kode ?></b>
                    <hr>
                    <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : <?= $x->tanggal_booking ?>
                  </td>
                  <td>
                    <span class="label bg-blue">start</span> : <?= $x->tanggal_mulai ?>
                    <hr>
                    <span class="label bg-blue">back</span> : <?= $x->tanggal_kembali ?>
                  </td>
                  <td>
                    <span class="label bg-blue">nama</span> : <?= $x->nama ?>
                    <hr>
                    <span class="label bg-blue" style="padding-right: 15px;">telp</span> : <?= $x->telpon ?>
                  </td>
                  <td>
                    <span class="label bg-blue" style="padding-right: 27px;">type bus</span> : <?= $x->type_bus ?>
                    <hr>
                    <span class="label bg-blue">nomor polisi</span> : <?= $this->Helpers->nomorPolisi($x->bus) ?>
                  </td>
                  <td>
                    <span class="label bg-blue">tarif</span> : 
                    Rp. <span class="pull-right"><?= $this->Helpers->number($x->tarif) ?>,-</span>
                    <hr>
                    <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                    Rp. <span class="pull-right"><?= $this->Helpers->number($x->dp) ?>,-</span>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
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
                <div class="input-group" >
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
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="driver" class="form-control">
                    <option value="">Pilih Driver</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="co_driver" class="form-control">
                    <option value="">Pilih Co. Driver</option>
                  </select>
                </div>
              </div>
              <div class="collapse" id="modal_driver">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-money"></i>
                    </span>
                    <input type="text" name="modal" data-modalDriver class="form-control" placeholder="Modal Driver">
                  </div>
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

              <div class="collapse in" id="regular">
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
                    <select name="lokasi" class="form-control" onchange="lokasii()">
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
                    <select name="route_jiarah" class="form-control" onclick="lokasii()">
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
              <div class="form-group">
                <table width="100%">
                  <tr>
                    <td style="border:1px solid #ccc;" height="25" width="25"></td>
                    <td>&nbsp; stand by</td>
                    <td class="bg-teal" width="25"></td>
                    <td>&nbsp; di booking</td>
                    <td class="bg-yellow" width="25"></td>
                    <td>&nbsp; di jalan</td>
                    <td class="bg-red" width="25"></td>
                    <td>&nbsp; rusak</td>
                  </tr>
                </table>
              </div>
              <div class="form-group" id="note_modal" style="display:none;">
                <i><b>NOTE : </b> Jangan lupa untuk mengisi form modal driver setelah memilih Driver dan Co Driver !!!</i>
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
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
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
<div class="modal fade" id="Cencle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Batal Booking</h4>
      </div>

      <form name="cencle" action="<?= $this->url->get('Booking/cencle') ?>" method="POST" data-remote="data-remote">
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

<!-- include JS -->
<script>
$(document).ready(function() {
var handleDataTableButtons = function() {
  if ($("#example").length) {
    $("#example").DataTable({
      dom: "Bfrtip",
      ordering: false,
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
});

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
        update_page('Booking',  'page_booking');
        update_page('Driver',   'page_driver');
        update_page('CoDriver', 'page_co_driver');
        update_page('Bus',      'page_bus');
        update_page('GrafikOrder', 'page_grafik_order');
        clear_form(response.close);
        if (action == 'cencle'){
          $('#Cencle').modal('hide');
        }
        list();
      }
    });
 
    e.preventDefault();
  });

})();

(function() {

  $('form[data-delete]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    // console.log(action);
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

        $('#del'+response.id).fadeOut(700);
        $('#Delete').modal('hide');
        update_page('Booking',  'page_booking');
        update_page('Driver',   'page_driver');
        update_page('CoDriver', 'page_co_driver');
        update_page('Bus',      'page_bus');
        update_page('GrafikOrder', 'page_grafik_order');
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Booking/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function edit(id) {
  var form = $('form[name="booking"]')
  form.attr('action', '<?= $this->url->get('Booking/update/') ?>'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .addClass('btn-primary')
      .text('Save Update');
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]').val(value);
      });
      $('#label_booking').text('Update Data Booking "'+response.kode+'"');
      if (response.paket == 'regular') {
        $('#regular').collapse('show');
        $('#jiarah').collapse('hide');
        areaa_selected(response.area, response.route);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        routee_selected(response.route, response.lokasi);
      } else if (response.paket == 'jiarah') {
        $('#regular').collapse('hide');
        $('#jiarah').collapse('show');
        route_jiarah(response.route_jiarah);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
      }
    }
  });
}

function next(id) {
  var form = $('form[name="booking"]')
  form.attr('action', '<?= $this->url->get('Booking/next/') ?>'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .removeClass('btn-primary')
      .addClass('btn-danger')
      .text('Lanjut Sewa');
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
        $('select[name="driver"]').attr('onchange', 'modal_driver()');
        $('select[name="co_driver"]').attr('onchange', 'modal_driver()');
        modal_driver();
      } else if (response.paket == 'jiarah') {
        $('#regular').collapse('hide');
        $('#jiarah').collapse('show');
        route_jiarah(response.route_jiarah);
        driver(1, response.driver);
        driver(2, response.co_driver);
        lokasii(response.type_bus);
        bus(response.type_bus, response.bus);
        $('select[name="driver"]').attr('onchange', 'modal_driver()');
        $('select[name="co_driver"]').attr('onchange', 'modal_driver()');
        modal_driver();
      }
    }
  });
}

function cencled(id, kode) {
  $('form[name="cencle"]').find('#cencle_booking').text(kode);
  $('form[name="cencle"]').find('input[name="id"]').val(id);
}

function deleted(id, kode) {
  $('form[name="delete"]').find('#delete_booking').text(kode);
  $('form[name="delete"]').find('input[name="id"]').val(id);
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

$("[data-telp]").inputmask({mask: "99999999999999", placeholder: "",});
$("[data-tarif]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-dp]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-modalDriver]").inputmask({mask: "9999999999", placeholder: "",});

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
          $('select[name="type_bus"]').html('<option value="">Pilih Type Bus</option>');
          $('select[name="bus"]').html('<option value="">Pilih Bus</option>');
          $('select[name="lokasi"]').html('<option value="">Pilih Lokasi</option>');
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
      $('select[name="type_bus"]').html('<option value="">Pilih Type Bus</option>');
      $('select[name="bus"]').html('<option value="">Pilih Bus</option>');
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

function modal_driver() {
  var driver    = $('select[name="driver"]').val();
  var co_driver = $('select[name="co_driver"]').val();
  $('#note_modal').show();
  if (driver != '' && co_driver != '') {
    $('#modal_driver').collapse('show');
  } else {
    $('#modal_driver').collapse('hide');
  }
}

function clear_form(id) {
  $('#label_booking').text('Tambah Booking');

  var form = $('form[name="booking"]');

  $('#modal_driver').collapse('hide');
  $('#note_modal').hide();

  form.find('[name]').val('');

  form.attr('action', '<?= $this->url->get('Booking/input') ?>');

  form.find('button[type="submit"]')
      .removeClass('btn-primary')
      .addClass('btn-success')
      .text('Save');

  driver(1);
  driver(2);
  lokasii();

  if (id == 1) {
    $('#Tambah').modal('hide');
  }
}

function detail(id) {
  var modal = $('div#Detail');
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Booking/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      modal.find('#detail_booking').text('Detail kode booking '+response.kode);
      $.each(response, function(key, value) {
        if (value === '') {
          // modal.find(key).text(value.);
        } else {
          if (key === 'dp' || key === 'tarif') {
            modal.find('#'+key).text(toRp(value));
          }else{
            modal.find('#'+key).text(value);
          }
        }
      });
    }
  });
}

function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
}
</script>