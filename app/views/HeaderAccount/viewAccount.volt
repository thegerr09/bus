<section class="content-header animated fadeIn">
  <h1>Header Account</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Akuntansi</li>
    <li class="active">header account</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Account</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#TambahAccount" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="account" class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="40">NO</td>
                  <td align="center" width="70">ACTION</td>
                  <td align="center">NAMA ACCOUNT</td>
                  <td align="center">HEADER</td>
                  <td align="center">TIPE</td>
                </tr>
              </thead>
              <tbody id="list_account">
                {% set no = 1 %}
                {% for a in account %}
                <tr id="delAccount{{ a.id }}">
                  <td>{{ no }}</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahAccount" onclick="update_account({{ a.id }}, '{{ a.account }}', '{{ a.id_header }}', '{{ a.name_header }}', '{{ a.tipe }}')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteAccount" onclick="deleted({{ a.id }},'{{ a.account }}', 'account')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td>{{ a.account }}</td>
                  <td>{{ a.name_header }}</td>
                  <td>{{ a.tipe }}</td>
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
</section>

<!-- popup -->
{% include "HeaderAccount/input_edit_account.volt" %}
{% include "HeaderAccount/deleted_account.volt" %}

<!-- js -->
{% include "HeaderAccount/js.volt" %}