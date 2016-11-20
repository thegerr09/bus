<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
.usergroup{
  cursor: pointer;
  color: #807c7c;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Users</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
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
                  <td align="center" width="16%">
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
                <?php $no = 1; ?>
                {% for x in users %}
                <tr id="del{{ x.id }}">
                  <td align="center"><?php echo $no++; ?></td>
                  <td style="vertical-align:middle;">
                    <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Tambah" onclick="update({{ x.id }})"></i> |
                    <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted({{ x.id }}, '{{ x.username }}')"></i> |
                    {% if x.active == 'Y' %}
                    <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'N', 'red')"></i> |
                    <span class="label bg-green" id="label_status{{ x.id }}">active</span>
                    {% else %}
                    <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'Y', 'green')"></i> |
                    <span class="label bg-red" id="label_status{{ x.id }}">not active</span>
                    {% endif %}
                  </td>
                  <td>{{ x.name }}</td>
                  <td>{{ x.username }}</td>
                  <td>
                    {{ x.email }}
                  </td>
                  <td align="center">
                    {{ x.handphone }}
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

<!-- popup -->
{% include "Users/popup_input_edit.volt" %}
{% include "Users/delete.volt" %}

<!-- js -->
{% include "Users/js.volt" %}