{% for o in overland %}
<tr id="delO{{ o.id }}">
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahTarif" onclick="updateOverlandJiarah({{ o.id }})">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delTarif" onclick="deleteOverlandJiarah({{ o.id }}, '{{ o.location }}')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td>{{ o.asal }}</td>
  <td>{{ o.tujuan }}</td>
  <td>{{ o.hari }}</td>
  <td>Rp. <span class="pull-right">{{ Helpers.number(o.medium_agen) }},-</span></td>
  <td>Rp. <span class="pull-right">{{ Helpers.number(o.big_agen) }},-</span></td>
  <td>Rp. <span class="pull-right">{{ Helpers.number(o.medium_umum) }},-</span></td>
  <td>Rp. <span class="pull-right">{{ Helpers.number(o.big_umum) }},-</span></td>
</tr>
{% endfor %}