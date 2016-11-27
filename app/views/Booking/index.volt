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
{% include "Booking/input_edit.volt" %}
{% include "Booking/deleted.volt" %}

<!-- include JS -->
{% include "Booking/js.volt" %}