{% for x in booking %}
<tr id="del{{ x.id }}" {% if x.success == 'Y' %} class="bg-success" {% elseif x.batal == 'Y' %} class="bg-danger" {% elseif x.dp > 0 %} class="bg-info" {% endif %}>
  <td align="center">
    <button type="button" class="btn btn-warning btn-xs" onclick="detail()">
      <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Detail"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit({{ x.id }})"
    {% if x.success == 'Y' or x.batal == 'Y' %} disabled {% endif %}>
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-danger btn-xs" onclick="deleted()">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-default btn-xs" onclick="print()">
      <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
    </button>&nbsp;
    <hr>
    {% if x.success == 'Y' %} 
      <span class="label bg-green"><i class="fa fa-check"></i> LANJUT SEWA</span>
    {% elseif x.batal == 'Y' %}
      <span class="label bg-red"><i class="fa fa-remove"></i> BATAL SEWA</span>
    {% else %}
      <span class="label bg-green cursor" data-toggle="modal" data-target="#Tambah" onclick="next({{ x.id }})">
        <span data-toggle="tooltip" data-placement="top" title="Lanjut Sewa"><i class="fa fa-check"></i> SEWA</span>
      </span>&nbsp;
      <span class="label bg-red cursor" data-toggle="modal" data-target="#Cencle" onclick="cencled({{ x.id }}, '{{ x.kode }}')">
        <span data-toggle="tooltip" data-placement="top" title="Batal Sewa"><i class="fa fa-remove"></i> BATAL</span>
      </span>
    {% endif %}
  </td>
  <td>
    <span class="label bg-blue">kode</span> : <b>{{ x.kode }}</b>
    <hr>
    <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : {{ x.tanggal_booking }}
  </td>
  <td>
    <span class="label bg-blue">start</span> : {{ x.tanggal_mulai }}
    <hr>
    <span class="label bg-blue">back</span> : {{ x.tanggal_kembali }}
  </td>
  <td>
    <span class="label bg-blue">nama</span> : {{ x.nama }}
    <hr>
    <span class="label bg-blue" style="padding-right: 15px;">telp</span> : {{ x.telpon }}
  </td>
  <td>
    <span class="label bg-blue" style="padding-right: 27px;">type bus</span> : {{ x.type_bus }}
    <hr>
    <span class="label bg-blue">nomor polisi</span> : {{ Helpers.nomorPolisi(x.bus) }}
  </td>
  <td>
    <span class="label bg-blue">tarif</span> : 
    Rp. <span class="pull-right">{{ Helpers.number(x.tarif) }},-</span>
    <hr>
    <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
    Rp. <span class="pull-right">{{ Helpers.number(x.dp) }},-</span>
  </td>
</tr>
{% endfor %}