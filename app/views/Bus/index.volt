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
          <div class="table-responsive" id="list_view">
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
                      {{ image('img/bus/' ~ x.image , 'class':'img-rounded', 'width':'150', 'height':'150', 'style':'margin-bottom: 10px;') }}
                    </div>
                    <div class="col-md-10">
                      <h3><b>{{ x.type }} | {{ x.merk }}</b></h3>
                      <table class="table">
                        <tr>
                          <td width="120"><b>Tahun Beli</b></td>
                          <td> : </td>
                          <td>{{ x.tahun_beli }}</td>
                          <td width="120"><b>Tanggal Pajak</b></td>
                          <td> : </td>
                          <td>{{ x.tanggal_pajak }}</td>
                          <td width="100"><b>Nomor Polisi</b></td>
                          <td> : </td>
                          <td>{{ x.nomor_polisi }} KM</td>
                        </tr>
                        <tr>
                          <td><b>Tahun Perakitan</b></td>
                          <td> : </td>
                          <td>{{ x.tahun_perakitan }}</td>
                          <td><b>Nominal Pajak</b></td>
                          <td> : </td>
                          <td>Rp. <?php echo number_format($x->nominal_pajak, 0, '.', '.'); ?>,-</td>
                          <td><b>Kondisi</b></td>
                          <td> : </td>
                          <td>
                            <div class="form-group">
                            {% if x.kondisi == 'N' %}
                            <label>
                              <input type="checkbox" class="flat-blue check" value="{{ x.id }}" checked>
                              <span class="label bg-green">Kondisi Baik</span>
                            </label>
                            {% else %}
                            <label>
                              <input type="checkbox" class="flat-blue check" value="{{ x.id }}">
                              <span class="label bg-red">Kondisi Rusak</span>
                            </label>
                            {% endif %}
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <i class="fa fa-edit cursor"></i> | 
                      <i class="fa fa-trash cursor"></i> |
                      <i class="fa fa-list cursor"></i> |
                      {% if x.active == 'Y' %}
                      <i class="fa fa-power-off text-green cursor"></i> | 
                      <span class="label bg-green">Active</span>
                        {% if x.status == 1 %}
                        <span id="kondisi">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
                        {% else %}
                        <span id="kondisi">| <span class="label bg-blue">Free</span></span>
                        {% endif %}
                      {% else %}
                      <i class="fa fa-power-off text-red cursor"></i> | 
                      <span class="label bg-red">Not Active</span>
                      {% endif %}
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