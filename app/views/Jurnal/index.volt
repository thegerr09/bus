<style>
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Jurnal</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Akuntansi</li>
    <li class="active">Jurnal</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Jurnal</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3" style="margin-bottom:0px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TutupBuku">
                <i class="fa fa-book"></i> Tutup Buku
              </button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PrintAll">
                <i class="fa fa-print"></i> Print
              </button>
            </div>
            <div class="col-md-6" align="center">
              <p id="date_title">
                <b>{{ date('01 F Y') }} - {{ date('d F Y') }}</b><br>
                <!-- <small class="text-danger">Jurnal dari range di atas ada yang belum di tutup buku</small> -->
              </p>
            </div>
            <div class="col-md-3" style="margin-bottom:10px;">
              <div class="form-group">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="{{ date('m/01/Y') }} - {{ date('m/d/Y') }}" class="form-control pull-right" id="reservation">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="table" class="table table-bordered">
                  <thead class="bg-blue">
                    <tr>
                      <td align="center" width="40">NO</td>
                      <td align="center" width="140">ACTION</td>
                      <td align="center" width="120">TANGGAL</td>
                      <td align="center" width="80">NO. JURNAL</td>
                      <td align="center">KETERANGAN</td>
                      <td align="center" width="100">KANTOR</td>
                    </tr>
                  </thead>
                  <tbody id="list_view">
                    {% set no = 1 %}
                    {% for x in jurnal %}
                    <tr id="del{{ x.id }}">
                      <td align="center">{{ no }}</td>
                      <td align="center">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Detail" onclick="detail({{ x.id }})">
                          <i class="fa fa-bars" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                        </button>&nbsp;
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit({{ x.id }})">
                          <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                        </button>&nbsp;
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Deleted" onclick="deleted_jurnal('{{ x.id }}', '{{ x.kode_jurnal }}')">
                          <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                        </button>&nbsp;
                        <a href="Jurnal/printOne/{{ x.id }}" class="btn btn-default btn-xs" target="_blank">
                          <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
                        </a>
                      </td>
                      <td align="center">
                        {{ Helpers.dateChange(x.tanggal) }}
                      </td>
                      <td align="center">
                        {{ x.kode_jurnal }}
                      </td>
                      <td>
                        {{ x.keterangan|upper }}
                      </td>
                      <td align="center">
                        {{ x.kantor }}
                      </td>
                    </tr>
                    {% set no = no + 1 %}
                    {% endfor %}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Include popup -->
{% include "Jurnal/input_edit.volt" %}
{% include "Jurnal/deleted.volt" %}
{% include "Jurnal/detail.volt" %}
{% include "Jurnal/TutupBuku.volt" %}

<!-- Include JS -->
{% include "Jurnal/js.volt" %}
