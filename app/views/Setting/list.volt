{% set no = 1 %}
{% for x in setting %}
<tr id="del{{ x.id }}">
  <td>{{ no }}</td>
  <td>
    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update('{{ x.id }}', '{{ x.name }}')"></i> | 
    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted('{{ x.id }}', '{{ x.name }}')"></i> | 
    <i class="fa fa-power-off cursor text-green"></i> |
    <span class="label bg-green">active</span>
  </td>
  <td>{{ x.name }}</td>
  <td>{{ x.setting }}</td>
</tr>
{% set no = no + 1 %}
{% endfor %}