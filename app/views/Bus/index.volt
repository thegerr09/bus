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
  <h1>Bus</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">bus</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th>List Bus</th>
                </tr>
              </thead>
              <tbody>
                {% for x in bus %}
                <tr id="del{{ x.id }}">
                  <td>
                    <div class="col-md-2" align="center">
                      {{ image('img/bus/' ~ x.image , 'class':'img-rounded', 'width':'150', 'style':'margin-bottom: 10px;') }}
                      <i class="fa fa-edit cursor"></i> | 
                      <i class="fa fa-trash cursor"></i> |
                      {% if x.active == 'Y' %}
                      <i class="fa fa-power-off text-green cursor"></i> | 
                      <span class="label bg-green">Active</span>
                      {% else %}
                      <i class="fa fa-power-off text-red cursor"></i> | 
                      <span class="label bg-red">Not Active</span>
                      {% endif %}
                    </div>
                    <div class="col-md-10">
                      <h3><b>{{ x.name_bus }}</b></h3>
                      <table class="table">
                        <tr>
                          <td width="90"><b>No Polisi</b></td>
                          <td> : </td>
                          <td>{{ x.no_polisi }}</td>
                          <td width="120"><b>Tgl pajak STNK</b></td>
                          <td> : </td>
                          <td>{{ x.tgl_stnk }}</td>
                          <td width="100"><b>KM Skrg</b></td>
                          <td> : </td>
                          <td>{{ x.km_skrng }} KM</td>
                        </tr>
                        <tr>
                          <td><b>No Rangka</b></td>
                          <td> : </td>
                          <td>{{ x.no_rangka }}</td>
                          <td><b>Tgl KIR</b></td>
                          <td> : </td>
                          <td>{{ x.tgl_kir }}</td>
                          <td><b>Kondisi</b></td>
                          <td> : </td>
                          <td>
                            {% if x.kondisi == 'N' %}
                            <label class="label bg-green">Bagus</label>
                            {% else %}
                            <label class="label bg-red">Rusak</label>
                            {% endif %}
                          </td>
                        </tr>
                      </table>
                    </div>
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

<!-- include popup -->
{% include "Bus/input_edit.volt" %}

<!-- include JS -->
{% include "Bus/js.volt" %}