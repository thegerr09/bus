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
                {% for x in booking %}
                <tr id="del{{ x.id }}" {% if x.success == 'Y' %} class="bg-success" {% elseif x.batal == 'Y' %} class="bg-danger" {% elseif x.dp > 0 %} class="bg-info" {% endif %}>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Detail" onclick="detail({{ x.id }})"
                    {% if x.success == 'Y'  or x.batal == 'Y' %} disabled {% endif %}>
                      <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick=" clear_form(); edit({{ x.id }});"
                    {% if x.success == 'Y' or x.batal == 'Y' %} disabled {% endif %}>
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete" onclick="deleted({{ x.id }}, '{{ x.kode }}')"
                    {% if x.success == 'Y' %} disabled {% endif %}>
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>&nbsp;
                    <a class="btn btn-default btn-xs" href="GrafikOrder/printBooking/{{ x.id }}" target="_blank" 
                    {% if x.success == 'Y' or x.batal == 'Y' %} disabled {% endif %}>
                      <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
                    </a>&nbsp;
                    <hr>
                    {% if x.success == 'Y' %} 
                      <span class="label bg-green"><i class="fa fa-check"></i> SUDAH SEWA</span>
                    {% elseif x.batal == 'Y' %}
                      <span class="label bg-red"><i class="fa fa-remove"></i> BATAL SEWA</span>
                    {% else %}
                      <span class="label bg-green cursor" data-toggle="modal" data-target="#Tambah" onclick="next({{ x.id }})">
                        <span data-toggle="tooltip" data-placement="top" title="Lanjut Sewa"><i class="fa fa-check"></i> SEWA</span>
                      </span>&nbsp;
                      <span class="label bg-red cursor" data-toggle="modal" data-target="#Cencle" onclick="cencled({{ x.id }}, '{{ x.kode }}')">
                        <span data-toggle="tooltip" data-placement="top" title="Batal Sewa"><i class="fa fa-remove"></i> BATAL</span>
                      </span>
                    {% endif %}
                  </td>
                  <td>
                    <span class="label bg-blue">kode</span> : <b>{{ x.kode }}</b>
                    <hr>
                    <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : {{ x.tanggal_booking }}
                  </td>
                  <td>
                    <span class="label bg-blue">start</span> : {{ x.tanggal_mulai }}
                    <hr>
                    <span class="label bg-blue">back</span> : {{ x.tanggal_kembali }}
                  </td>
                  <td>
                    <span class="label bg-blue">nama</span> : {{ x.nama }}
                    <hr>
                    <span class="label bg-blue" style="padding-right: 15px;">telp</span> : {{ x.telpon }}
                  </td>
                  <td>
                    <span class="label bg-blue" style="padding-right: 27px;">type bus</span> : {{ x.type_bus }}
                    <hr>
                    <span class="label bg-blue">nomor polisi</span> : {{ Helpers.nomorPolisi(x.bus) }}
                  </td>
                  <td>
                    <span class="label bg-blue">tarif</span> : 
                    Rp. <span class="pull-right">{{ Helpers.number(x.tarif) }},-</span>
                    <hr>
                    <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                    Rp. <span class="pull-right">{{ Helpers.number(x.dp) }},-</span>
                  </td>
                </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->
{% include "Booking/input_edit.volt" %}
{% include "Booking/deleted.volt" %}
{% include "Booking/cencled.volt" %}
{% include "Booking/detail.volt" %}

<!-- include JS -->
{% include "Booking/js.volt" %}