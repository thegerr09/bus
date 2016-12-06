{% set no = 1 %}
{% for h in header %}
<tr>
  <td align="center">{{ no }}</td>
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td>{{ h.header }}</td>
  <td>{{ h.jenis }}</td>
</tr>
{% set no = no + 1 %}
{% endfor %}