<table id="example" class="table table-bordered">
  <thead>
    <tr>
      <td align="center" style="vertical-align: middle;" rowspan="2" width="100"><b>TANGGAl</b></td>
      {% set lenght = bus|length %}
      <td colspan="{{ lenght + 1 }}" align="center"><b>LIST BUS</b></td>
    </tr>
    <tr>
      {% for head in bus %}
      <td align="center"><b>{{ head.ukuran|upper }}<br>{{ head.nomor_polisi|upper }}</b></td>
      {% endfor %}
    </tr>
  </thead>
  <tbody>
    {% for i in 0..dayInMonth %}
    <tr>
      <td align="center">{{ listDate[i] }}</td>
      {% for body in bus %}
      <td {{ Helpers.viewGrafik(filterDate[i], body.id) }}></td>
      {% endfor %}
    </tr>
    {% endfor %}
  </tbody>
</table>