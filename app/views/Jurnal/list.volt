{% set no = 1 %}
{% for x in jurnal %}
<tr>
  <td align="center">{{ no }}</td>
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
    </button>
  </td>
  <td align="center">
    {{ Helpers.dateChange(x.tanggal) }}
  </td>
  <td align="center">
    {{ x.kode_jurnal }}
  </td>
  <td>
    {{ x.keterangan|upper }}
  </td>
  <td align="center">
    {{ x.kantor }}
  </td>
</tr>
{% set no = no + 1 %}
{% endfor %}