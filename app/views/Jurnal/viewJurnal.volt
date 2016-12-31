{% if check == 'berisi' %}
<tbody id="parent_jurnal">
  <tr>
    <td width="50%" height="40">
      <select class="form-control" name="account[]">
        {{ Helpers.tagAccount(child[0].account) }}
      </select>
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)" value="{{ child[0].debet }}">
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)" value="{{ child[0].kredit }}">
    </td>
    <td width="1%"></td>
    <td width="5%" align="right">
      <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
        <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
      </button>
    </td>
  </tr>
</tbody>
<tbody id="child_jurnal">
  {% set debet = child[0].debet %}
  {% set kredit = child[0].kredit %}
  {% set long = child|length - 1 %}
  {% for i in 1..long %}
  <tr>
    <td width="50%" height="40">
      <select class="form-control" name="account[]">
        {{ Helpers.tagAccount(child[i].account) }}
      </select>
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)" value="{{ child[i].debet }}">
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)" value="{{ child[i].kredit }}">
    </td>
    <td width="1%"></td>
    <td width="5%" align="right">
      <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
        <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
      </button>
    </td>
  </tr>
  {% set debet = debet + child[i].debet %}
  {% set kredit = kredit + child[i].kredit %}
  {% endfor %}
</tbody>
<tr>
  <td width="50%" height="40">
    <button type="button" class="btn btn-success btn-sm btn-flat" id="tambah_jurnal">
      <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Tambah"></i> Tambah
    </button>
  </td>
  <td width="1%"></td>
  <td width="21%">
    <input type="text" name="total_debet" data-debetKredit class="form-control" placeholder="Total Debet" value="{{ debet }}">
  </td>
  <td width="1%"></td>
  <td width="21%">
    <input type="text" name="total_kredit" data-debetKredit class="form-control" placeholder="Total Kredit" value="{{ kredit }}">
  </td>
  <td width="1%"></td>
  <td width="5%" align="right"></td>
</tr>
{% else %}
<tbody id="parent_jurnal">
  <tr>
    <td width="50%" height="40">
      <select class="form-control" name="account[]">
        {{ Helpers.tagAccount() }}
      </select>
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)">
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)">
    </td>
    <td width="1%"></td>
    <td width="5%" align="right">
      <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
        <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
      </button>
    </td>
  </tr>
</tbody>
<tbody id="child_jurnal">
  <tr>
    <td width="50%" height="40">
      <select class="form-control" name="account[]">
        {{ Helpers.tagAccount() }}
      </select>
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)">
    </td>
    <td width="1%"></td>
    <td width="21%">
      <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)">
    </td>
    <td width="1%"></td>
    <td width="5%" align="right">
      <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
        <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
      </button>
    </td>
  </tr>
</tbody>
<tr>
  <td width="50%" height="40">
    <button type="button" class="btn btn-success btn-sm btn-flat" id="tambah_jurnal">
      <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Tambah"></i> Tambah
    </button>
  </td>
  <td width="1%"></td>
  <td width="21%">
    <input type="text" name="total_debet" data-debetKredit class="form-control" placeholder="Total Debet">
  </td>
  <td width="1%"></td>
  <td width="21%">
    <input type="text" name="total_kredit" data-debetKredit class="form-control" placeholder="Total Kredit">
  </td>
  <td width="1%"></td>
  <td width="5%" align="right"></td>
</tr>
{% endif %}
<script>
var no = 1;
$("#tambah_jurnal").click(function(){
  var charge = $('#parent_jurnal').html();
  $("#child_jurnal").append(charge);
});

function removerTrChild(that) {
  var data = $(that).parent().parent();
  var id   = data.parent().attr('id');

  if (id == 'parent_jurnal') {
    return false;
  } else {
    data.remove();
  }
}
</script>