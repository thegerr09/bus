<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Users</h1>
  <ol class="breadcrumb">
    <li><a href="{{ url() }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('Data/users') }}">Data</a></li>
    <li class="active">users</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Users</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td align="center" width="50">
                    <b>No</b>
                  </td>
                  <td align="center" width="15%">
                    <b>Action</b>
                  </td>
                  <td align="center">
                    <b>Name</b>
                  </td>
                  <td align="center" width="15%">
                    <b>Username</b>
                  </td>
                  <td align="center" width="22%">
                    <b>Email</b>
                  </td>
                  <td align="center" width="18%">
                    <b>Handphone</b>
                  </td>
                </tr>
              </thead>
              <tbody id="list_view">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- popup -->
{% include "users/popup_input_edit.volt" %}

<!-- js -->
{% include "users/js.volt" %}