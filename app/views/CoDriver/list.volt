<table id="example" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>List Co. Driver</th>
    </tr>
  </thead>
  <tbody>
    {% set no = 1 %}
    {% for x in codriver %}
    <tr id="del{{ x.id }}">
      <td>
        <div class="col-md-1">
          {{ image('img/codriver/' ~ x.image, 'class':'img-rounded', 'width':'80') }}
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