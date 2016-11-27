{% for r in route %}
<tr id="delR{{ r.id }}" data-toggle="collapse" data-target="#delRA{{ r.id }}" aria-expanded="false" aria-controls="delRA{{ r.id }}">
  <td>{{ r.asal }}</td>
  <td>{{ r.tujuan }}</td>
</tr>
<tr class="collapse" id="delRA{{ r.id }}">
  <td colspan="2" align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahRoute" onclick="updateRoute('{{ r.id }}', '{{ r.asal }}', '{{ r.tujuan }}')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delRoute" onclick="deleteRoute('{{ r.id }}', '{{ r.asal }} / {{ r.tujuan }}')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
    </button>
  </td>
</tr>
{% endfor %}