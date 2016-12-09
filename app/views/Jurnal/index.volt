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
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="table" class="table table-bordered">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="50">NO</td>
                  <td align="center" width="80">ACTION</td>
                  <td align="center" width="150">TANGGAL</td>
                  <td align="center" width="120">NO. JURNAL</td>
                  <td align="center">KETERANGAN</td>
                  <td align="center" width="200">KANTOR</td>
                </tr>
              </thead>
              <tbody id="list_view">
                <tr>
                  <td align="center">1</td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                    </button>
                  </td>
                  <td align="center">
                    31 December 2016
                  </td>
                  <td align="center">
                    109873BNMKJ
                  </td>
                  <td></td>
                  <td align="center">
                    GALATAMA 1 SEMARANG
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Include popup -->
{% include "Jurnal/input_edit.volt" %}

<!-- Include JS -->
{% include "Jurnal/js.volt" %}