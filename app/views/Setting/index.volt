<style>
.cursor{
  font-size: 18px;
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Setting</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">setting</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Setting</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="30">No.</th>
                  <th width="16%">Action</th>
                  <th width="20%">Name</th>
                  <th>Settings</th>
                </tr>
              </thead>
              <tbody id="list_view">
                {% set no = 1 %}
                {% for x in setting %}
                <tr>
                  <td>{{ no }}</td>
                  <td>
                    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update('{{ x.id }}', '{{ x.name }}', '{{ x.setting }}')"></i> | 
                    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete"></i> | 
                    <i class="fa fa-power-off cursor text-green"></i> |
                    <span class="label bg-green">active</span>
                  </td>
                  <td>{{ x.name }}</td>
                  <td>{{ x.setting }}</td>
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

<!-- include popup -->
{% include "Setting/input_edit.volt" %}

<!-- include JS -->
{% include "Setting/js.volt" %}