<style>
#except:hover{
  cursor: pointer;
  background-color: rgba(209,197,197,0.25);
}
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
  <h1>Access Control List</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">acl</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Acl</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body" id="list_view">
          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Action</th>
                <th>Controller</th>
                <th>Action</th>
                {% for ug in AclAction.usergroup() %}
                <th>{{ ug.usergroup }}</th>
                {% endfor %}
                <th>Except</th>
              </tr>
            </thead>
            <tbody>
              {% set no = 1 %}
              {% for x in acl %}
              <tr id="del{{ x.id }}">
                <td>{{ no }}</td>
                <td>
                  <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Update" onclick="update_acl('{{ x.id }}', '{{ x.controller }}', '{{ x.action }}')"></i> |
                  <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted('{{ x.id }}', '{{ x.controller }}')"></i> |
                  <i class="fa fa-power-off cursor text-green" style="font-size:18px;"></i> |
                  <span class="label bg-green">Active</span>
                </td>
                <td>{{ x.controller }}</td>
                <td>{% if x.action != null %}{{ x.action }}{% else %}{default index}{% endif %}</td>
                {% for ug in AclAction.usergroup() %}
                <td align="center">
                  <label class="usergroup">
                    <input type="checkbox" class="flat-blue check" value="{{ x.id }},{{ ug.id }}"
                    {% if ug.id in AclAction.acl_usergroup(x.usergroup) %}checked{% endif %}>
                  </label>
                </td>
                {% endfor %}
                <td style="padding: 0px;"><div ondblclick="return except(this)" style="padding: 10px;" acl="{{ x.id }}">{{ x.except }}</div></td>
              </tr>
              {% set no = no + 1 %}
              {% endfor %}
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include JS -->
{% include "Acl/tambah.volt" %}
{% include "Acl/update.volt" %}
{% include "Acl/delete.volt" %}

<!-- include JS -->
{% include "Acl/js.volt" %}