<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Pelanggan</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">pelanggan</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Pelanggan</h3>
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
                  <td align="center" width="30">
                    <b>NO</b>
                  </td>
                  <td align="center" width="100">
                    <b>ACTION</b>
                  </td>
                  <td align="center" width="220">
                    <b>NAMA PELANGGAN</b>
                  </td>
                  <td align="center" width="150">
                    <b>TELPON</b>
                  </td>
                  <td align="center">
                    <b>ALAMAT</b>
                  </td>
                </tr>
              </thead>
              <tbody id="list_view">
                <tr>
                  <td align="center">1</td>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-xs">
                      <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- include modal -->
{% include "Pelanggan/input_edit.volt" %}

<!-- include JS -->
{% include "Pelanggan/js.volt" %}