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
  <h1>Driver</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">driver</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Driver</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>List Driver</th>
                </tr>
              </thead>
              <tbody>
                {% set no = 1 %}
                {% for x in driver %}
                <tr id="del{{ x.id }}">
                  <td>
                    <div class="col-md-1">
                      {{ image('img/driver/' ~ x.image, 'class':'img-rounded', 'width':'80') }}
                    </div>
                    <div class="col-md-7">
                      <span><b>{{ x.nama|upper }}</b></span>
                      <table>
                        <tr>
                          <td valign="top" width="45px"><small>Alamat</small></td>
                          <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
                          <td valign="top" ><small>{{ x.alamat }}</small></td>
                        </tr>
                        <tr>
                          <td valign="top" ><small>No. Telp</small></td>
                          <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
                          <td valign="top" ><small>{{ x.telpon }}</small></td>
                        </tr>
                        <tr>
                          <td colspan="3" height="25">
                            <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update({{ x.id }})"></i> | 
                            <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted({{ x.id }}, '{{ x.nama }}')"></i> | 
                            <!-- <i class="fa fa-list cursor"></i> |  -->
                            {% if x.active == 'Y' %}
                            <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'N', 'red')"></i> |
                            <span class="label bg-green" id="label_status{{ x.id }}">active</span>
                              {% if x.status == 1 %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-purple">Sudah Dibooking</span></span>
                              {% elseif x.status == 2 %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
                              {% else %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-blue">Free</span></span>
                              {% endif %}
                            {% else %}
                            <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'Y', 'green')"></i> |
                            <span class="label bg-red" id="label_status{{ x.id }}">not active</span>
                              {% if x.status == 1 %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-purple">Sudah Dibooking</span></span>
                              {% elseif x.status == 2 %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
                              {% else %}
                              <span id="kondisi{{ x.id }}">| <span class="label bg-blue">Free</span></span>
                              {% endif %}
                            {% endif %}
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <div class="chart">
                        <canvas id="salesChart{{ no }}" style="height: 80px;"></canvas>
                      </div>
                    </div>
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
</section>

<!-- popup -->
{% include "Driver/input_edit.volt" %}
{% include "Driver/delete.volt" %}

<!-- include Js -->
{% include "Driver/js.volt" %}