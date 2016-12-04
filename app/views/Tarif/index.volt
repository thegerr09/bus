<style>
.cursor{
  cursor: pointer;
}
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Tarif</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">tarif</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tarif Bus Overland</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahOverland" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td rowspan="2" width="70" align="center" style="vertical-align: middle;">ACTION</td>
                  <td colspan="2" align="center">ROUTE</td>
                  <td rowspan="2" width="70" align="center" style="vertical-align: middle;">HARI</td>
                  <td colspan="4" align="center">TARIF</td>
                </tr>
                <tr>
                  <td>Kota Asal</td>
                  <td>Kota Tujuan</td>
                  <td>Med Agen</td>
                  <td>Big Agen</td>
                  <td>Med Umum</td>
                  <td>Big Umum</td>
                </tr>
              </thead>
              <tbody id="list_overland">
                {% for o in overland %}
                <tr id="delO{{ o.id }}">
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahOverland" onclick="updateOverlandJiarah({{ o.id }})">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delOverland" onclick="deleteOverlandJiarah('{{ o.id }}', '{{ o.asal }} / {{ o.tujuan }}', 'overland')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td>{{ o.asal }}</td>
                  <td>{{ o.tujuan }}</td>
                  <td>{{ o.hari }} Hari</td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(o.medium_agen) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(o.big_agen) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(o.medium_umum) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(o.big_umum) }},-</span></td>
                </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tarif Bus Jiarah</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahJiarah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td rowspan="2" width="150" align="center">ACTION</td>
                  <td align="center">KOTA ASAL</td>
                  <td align="center">KOTA TUJUAN</td>
                  <td width="200" align="center">HARGA</td>
                </tr>
              </thead>
              <tbody id="list_jiarah">
                {% for j in jiarah %}
                <tr id="delJ{{ o.id }}">
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahJiarah" onclick="updateOverlandJiarah('{{ j.id }}')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delJiarah" onclick="deleteOverlandJiarah('{{ j.id }}', '{{ j.asal }} / {{ j.tujuan }}', 'jiarah')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
                    </button>
                  </td>
                  <td>{{ j.asal }}</td>
                  <td>{{ j.tujuan }}</td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(j.harga) }},-</span></td>
                </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Route Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahRoute" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <th>KOTA ASAL</th>
                  <th>KOTA TUJUAN</th>
                </tr>
              </thead>
              <tbody id="list_route">
                {% set area = Helpers.area() %}
                {% for key, value in area %}
                <tr>
                  <td colspan="2" align="center" class="bg-info"><b>{{ value|upper }}</b></td>
                </tr>
                {% for r in route %}
                {% if r.area == key %}
                <tr class="cursor" id="delR{{ r.id }}" data-toggle="collapse" data-target="#delRA{{ r.id }}" aria-expanded="false" aria-controls="delRA{{ r.id }}">
                  <td>{{ r.asal }}</td>
                  <td>{{ r.tujuan }}</td>
                </tr>
                <tr class="collapse" id="delRA{{ r.id }}">
                  <td colspan="2" align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahRoute" onclick="updateRoute('{{ r.id }}')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delRoute" onclick="deleteRoute('{{ r.id }}', '{{ r.asal }} / {{ r.tujuan }}')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
                    </button>
                  </td>
                </tr>
                {% endif %}
                {% endfor %}
                {% endfor %}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tarif Bus Regular</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahTarif" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td rowspan="2" width="70" align="center" style="vertical-align: middle;">ACTION</td>
                  <td colspan="3" align="center">ROUTE</td>
                  <td colspan="4" align="center">TARIF</td>
                </tr>
                <tr>
                  <td>Kota Asal</td>
                  <td>Kota Tujuan</td>
                  <td>Location</td>
                  <td>Med Agen</td>
                  <td>Big Agen</td>
                  <td>Med Umum</td>
                  <td>Big Umum</td>
                </tr>
              </thead>
              <tbody id="list_tarif">
                {% set area = Helpers.area() %}
                {% for key, value in area %}
                <tr>
                  <td colspan="8" align="center" class="bg-info"><b>{{ value|upper }}</b></td>
                </tr>
                {% for x in tarif %}
                {% if x.area == key %}
                <tr id="delT{{ x.id }}">
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahTarif" onclick="updateTarif({{ x.id }})">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delTarif" onclick="deleteTarif({{ x.id }}, '{{ x.location }}')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td>{{ x.asal }}</td>
                  <td>{{ x.tujuan }}</td>
                  <td>{{ x.location }}</td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(x.medium_agen) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(x.big_agen) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(x.medium_umum) }},-</span></td>
                  <td>Rp. <span class="pull-right">{{ Helpers.number(x.big_umu) }},-</span></td>
                </tr>
                {% endif %}
                {% endfor %}
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
{% include "Tarif/input_edit_tarif.volt" %}
{% include "Tarif/input_edit_route.volt" %}
{% include "Tarif/input_edit_jiarah.volt" %}
{% include "Tarif/input_edit_overland.volt" %}
{% include "Tarif/deleted_tarif.volt" %}
{% include "Tarif/deleted_route.volt" %}
{% include "Tarif/deleted_jiarah.volt" %}
{% include "Tarif/deleted_overland.volt" %}

<!-- include JS -->
{% include "Tarif/js.volt" %}