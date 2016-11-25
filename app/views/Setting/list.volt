{% set no = 1 %}
{% for x in setting %}
<tr id="del{{ x.id }}">
  <td>{{ no }}</td>
  <td>
    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update('{{ x.id }}', '{{ x.name }}')"></i> | 
    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted('{{ x.id }}', '{{ x.name }}')"></i> | 
    {% if x.active == 'Y' %}
    <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'N', 'red')"></i> |
    <span class="label bg-green" id="label_status{{ x.id }}">active</span>
    {% else %}
    <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status{{ x.id }}" onclick="status_action({{ x.id }}, 'Y', 'green')"></i> |
    <span class="label bg-red" id="label_status{{ x.id }}">not active</span>
    {% endif %}
  </td>
  <td>{{ x.name }}</td>
  <td>{{ x.setting }}</td>
</tr>
{% set no = no + 1 %}
{% endfor %}