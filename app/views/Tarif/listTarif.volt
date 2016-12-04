{% set area = Helpers.area() %}
{% for key, value in area %}
<tr>
  <td colspan="8" align="center" class="bg-info">{{ value }}</td>
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