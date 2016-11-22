<table id="example" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>List Driver</th>
    </tr>
  </thead>
  <tbody>
    {% set no = 1 %}
    {% for x in driver %}
    <tr>
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
                <i class="fa fa-edit cursor"></i> | 
                <i class="fa fa-trash cursor"></i> | 
                <i class="fa fa-list cursor"></i> | 
                <i class="fa fa-power-off text-green cursor"></i> | 
                <span class="label bg-green">active</span>
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