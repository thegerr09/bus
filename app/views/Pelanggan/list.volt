{% set no = 1 %}
{% for x in pelanggan %}
<tr id="del{{ x.id }}">
  <td align="center">{{ no }}</td>
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit({{ x.id }})">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Deleted" onclick="dlt({{ x.id }}, '{{ x.nama }}')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Hapus
    </button>
  </td>
  <td>{{ x.nama }}</td>
  <td>{{ x.telp }}</td>
  <td>{{ x.alamat }}</td>
</tr>
{% set no = no + 1 %}
{% endfor %}