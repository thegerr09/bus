<style>
.clear,.dataTables_scroll{clear:both}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:#fff}.dataTables_length{width:40%;float:left}.dataTables_filter{width:50%;float:right;text-align:right}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable td.focus,table.dataTable th.focus{outline:#1ABB9C solid 2px!important;outline-offset:-1px}.dataTables_scrollBody{-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.dataTables_empty{text-align:center}.example_alt_pagination div.dataTables_info{width:40%}td {color:#555;}hr{margin-top:4px;margin-bottom:3px;}.cursor{cursor:pointer;}.cursor:hover{color:#f4f4f4;}td{font-size:13px}
}
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
            <form action="{{ url('GrafikOrder/list') }}">
              <div class="form-group-sm">
                <input type="month" name="filter" class="form-control" value="{{ date('Y-m') }}" onchange="filter_month(this)">
              </div>
            </form>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <td align="center" style="vertical-align: middle;" rowspan="2" width="100"><b>TANGGAl</b></td>
                  {% set lenght = bus|length %}
                  <td colspan="{{ lenght + 1 }}" align="center"><b>LIST BUS</b></td>
                </tr>
                <tr>
                  {% for head in bus %}
                  <td align="center"><b>{{ head.ukuran|upper }}<br>{{ head.nomor_polisi|upper }}</b></td>
                  {% endfor %}
                </tr>
              </thead>
              <tbody>
                {% for i in 0..dayInMonth %}
                <tr>
                  <td align="center">{{ listDate[i] }}</td>
                  {% for body in bus %}
                  <td {{ Helpers.viewGrafik(filterDate[i], body.id, body.ukuran) }}>{{ Helpers.viewGrafikName(filterDate[i], body.id) }}</td>
                  {% endfor %}
                </tr>
                {% endfor %}
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
{% include "GrafikOrder/Booking.volt" %}
{% include "GrafikOrder/car_back.volt" %}
{% include "GrafikOrder/detail.volt" %}

<!-- include JS -->
{% include "GrafikOrder/js.volt" %}