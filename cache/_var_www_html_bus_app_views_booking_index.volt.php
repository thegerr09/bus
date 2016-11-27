<style>
.clear,.dataTables_scroll{clear:both}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:#fff}.dataTables_length{width:40%;float:left}.dataTables_filter{width:50%;float:right;text-align:right}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable td.focus,table.dataTable th.focus{outline:#1ABB9C solid 2px!important;outline-offset:-1px}.dataTables_scrollBody{-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.dataTables_empty{text-align:center}.example_alt_pagination div.dataTables_info{width:40%}td {color:#555;}.fontawe{size:16px;}hr{margin-top:4px;margin-bottom:3px;}
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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <table id="example" class="table table-bordered table-hover">
            <thead class="bg-blue">
              <tr>
                <th width="160">Action</th>
                <th width="160">Booking</th>
                <th width="160">Waktu Sewa</th>
                <th width="230">Penyewa</th>
                <th width="180">Kendaraan</th>
                <th width="190">Biaya</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td align="center">
                  <button type="button" class="btn btn-warning btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Detail">
                    <i class="fa fa-list"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-primary btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-danger btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-default btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fa fa-print"></i>
                  </button>&nbsp;
                  <hr>
                  <span class="label bg-green"><i class="fa fa-check"></i> SEWA</span>
                  <span class="label bg-red"><i class="fa fa-remove"></i> BATAL</span>
                </td>
                <td>
                  <span class="label bg-blue">kode</span> : <b>BNKPS06Q</b>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : 23 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">start</span> : 23 Nov 2016
                  <hr>
                  <span class="label bg-blue">back</span> : 26 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">nama</span> : Saipul HIdayat Theger
                  <hr>
                  <span class="label bg-blue" style="padding-right: 15px;">telp</span> : 085768249362
                </td>
                <td>
                  <span class="label bg-blue" style="padding-right: 10px;">type bus</span> : Medium
                  <hr>
                  <span class="label bg-blue">kapasitas</span> : 30 Orang
                </td>
                <td>
                  <span class="label bg-blue">tarif</span> : 
                  Rp. <span class="pull-right">1.000.000,-</span>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                  Rp. <span class="pull-right">200.000,-</span>
                </td>
              </tr>
              <tr class="bg-info">
                <td align="center">
                  <button type="button" class="btn btn-warning btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Detail">
                    <i class="fa fa-list"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-primary btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-danger btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-default btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fa fa-print"></i>
                  </button>&nbsp;
                  <hr>
                  <span class="label bg-green"><i class="fa fa-check"></i> SEWA</span>
                  <span class="label bg-red"><i class="fa fa-remove"></i> BATAL</span>
                </td>
                <td>
                  <span class="label bg-blue">kode</span> : <b>BNKPS06Q</b>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : 23 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">start</span> : 23 Nov 2016
                  <hr>
                  <span class="label bg-blue">back</span> : 26 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">nama</span> : Saipul HIdayat Theger
                  <hr>
                  <span class="label bg-blue" style="padding-right: 15px;">telp</span> : 085768249362
                </td>
                <td>
                  <span class="label bg-blue" style="padding-right: 10px;">type bus</span> : Medium
                  <hr>
                  <span class="label bg-blue">kapasitas</span> : 30 Orang
                </td>
                <td>
                  <span class="label bg-blue">tarif</span> : 
                  Rp. <span class="pull-right">1.000.000,-</span>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                  Rp. <span class="pull-right">200.000,-</span>
                </td>
              </tr>
              <tr class="bg-success">
                <td align="center">
                  <button type="button" class="btn btn-warning btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Detail">
                    <i class="fa fa-list"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-primary btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Edit" disabled>
                    <i class="fa fa-edit"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-danger btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-default btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fa fa-print"></i>
                  </button>&nbsp;
                  <hr>
                  <span class="label bg-green"><i class="fa fa-check"></i>LANJUT SEWA</span>
                </td>
                <td>
                  <span class="label bg-blue">kode</span> : <b>BNKPS06Q</b>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : 23 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">start</span> : 23 Nov 2016
                  <hr>
                  <span class="label bg-blue">back</span> : 26 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">nama</span> : Saipul HIdayat Theger
                  <hr>
                  <span class="label bg-blue" style="padding-right: 15px;">telp</span> : 085768249362
                </td>
                <td>
                  <span class="label bg-blue" style="padding-right: 10px;">type bus</span> : Medium
                  <hr>
                  <span class="label bg-blue">kapasitas</span> : 30 Orang
                </td>
                <td>
                  <span class="label bg-blue">tarif</span> : 
                  Rp. <span class="pull-right">1.000.000,-</span>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                  Rp. <span class="pull-right">200.000,-</span>
                </td>
              </tr>
              <tr class="bg-danger">
                <td align="center">
                  <button type="button" class="btn btn-warning btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Detail">
                    <i class="fa fa-list"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-primary btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Edit" disabled>
                    <i class="fa fa-edit"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-danger btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-default btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fa fa-print"></i>
                  </button>&nbsp;
                  <hr>
                  <span class="label bg-red"><i class="fa fa-remove"></i> BATAL BOOKING</span>
                </td>
                <td>
                  <span class="label bg-blue">kode</span> : <b>BNKPS06Q</b>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : 23 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">start</span> : 23 Nov 2016
                  <hr>
                  <span class="label bg-blue">back</span> : 26 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">nama</span> : Saipul HIdayat Theger
                  <hr>
                  <span class="label bg-blue" style="padding-right: 15px;">telp</span> : 085768249362
                </td>
                <td>
                  <span class="label bg-blue" style="padding-right: 10px;">type bus</span> : Medium
                  <hr>
                  <span class="label bg-blue">kapasitas</span> : 30 Orang
                </td>
                <td>
                  <span class="label bg-blue">tarif</span> : 
                  Rp. <span class="pull-right">1.000.000,-</span>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                  Rp. <span class="pull-right">200.000,-</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Input Acl</h4>
      </div>

      <!-- <form name="group" action="<?= $this->url->get('Booking/input') ?>" method="POST" data-remote="data-remote"> -->
        <div class="modal-body">
          <div class="row">

            <!-- left -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_booking" class="form-control" placeholder="Tanggal Booking">
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
                  <input type="text" name="telpon" class="form-control" placeholder="Nomor Telpon"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_start" class="form-control" placeholder="Tanggal Mulai"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_back" class="form-control" placeholder="Tanggal Kembali"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="tarif" class="form-control" placeholder="Tarif"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="dp" class="form-control" placeholder="DP / Uang Muka"> 
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
                  <select name="paket" class="form-control" onchange="paket(this)">
                    <?= $this->Helpers->tagSetting('paket', 'Pilih Paket', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-map"></i>
                  </span>
                  <select name="area" class="form-control" onchange="paket(this)">
                    <?= $this->Helpers->tagSetting('area', 'Pilih Area', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" name="telpon" class="form-control" placeholder="Nomor Telpon"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_start" class="form-control" placeholder="Tanggal Mulai"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_back" class="form-control" placeholder="Tanggal Kembali"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="tarif" class="form-control" placeholder="Tarif"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="dp" class="form-control" placeholder="DP / Uang Muka"> 
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      <!-- </form> -->

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

function paket(that) {
	var val = $(that).val();
	console.log(val);
}
</script>