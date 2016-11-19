<table id="example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Action</th>
      <th>Controller</th>
      <th>Action</th>
      {% for ug in AclAction.usergroup() %}
      <th>{{ ug.usergroup }}</th>
      {% endfor %}
      <th>Except</th>
    </tr>
  </thead>
  <tbody>
    {% set no = 1 %}
    {% for x in acl %}
    <tr id="del{{ x.id }}">
      <td>{{ no }}</td>
      <td>
        <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Update" onclick="update_acl('{{ x.id }}', '{{ x.controller }}', '{{ x.action }}')"></i> |
        <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted('{{ x.id }}', '{{ x.controller }}')"></i> |
        <i class="fa fa-power-off cursor text-green" style="font-size:18px;"></i> |
        <span class="label bg-green">Active</span>
      </td>
      <td>{{ x.controller }}</td>
      <td>{% if x.action != null %}{{ x.action }}{% else %}{default index}{% endif %}</td>
      {% for ug in AclAction.usergroup() %}
      <td align="center">
        <label class="usergroup">
          <input type="checkbox" class="flat-blue check" value="{{ x.id }},{{ ug.id }}"
          {% if ug.id in AclAction.acl_usergroup(x.usergroup) %}checked{% endif %}>
        </label>
      </td>
      {% endfor %}
      <td style="padding: 0px;"><div ondblclick="return except(this)" style="padding: 10px;" acl="{{ x.id }}">{{ x.except }}</div></td>
    </tr>
    {% set no = no + 1 %}
    {% endfor %}
  </tbody>
</table>