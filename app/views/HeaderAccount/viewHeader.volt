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
          <h3 class="box-title">List Header</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#TambahHeader" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="header" class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="30">NO</td>
                  <td align="center" width="60">ACTION</td>
                  <td align="center">NAMA HEADER</td>
                  <td align="center">GROUP</td>
                  <td align="center">JENIS</td>
                </tr>
              </thead>
              <tbody id="list_header">
                {% set no = 1 %}
                {% for h in header %}
                <tr id="delHeader{{ h.id }}">
                  <td align="center">{{ no }}</td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahHeader" onclick="update_header({{ h.id }}, '{{ h.header }}', '{{ h.group }}', '{{ h.jenis }}', 'header')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteHeader" onclick="deleted({{ h.id }},'{{ h.header }}', 'header')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td>{{ h.header }}</td>
                  <td>{{ h.group }}</td>
                  <td>{{ h.jenis }}</td>
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
{% include "HeaderAccount/input_edit_header.volt" %}
{% include "HeaderAccount/deleted_header.volt" %}

<!-- js -->
{% include "HeaderAccount/js.volt" %}