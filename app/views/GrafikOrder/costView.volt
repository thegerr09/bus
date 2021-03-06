<table>
  {% if check is empty %}
  <tbody id="parent_cost">
    <tr>
      <td>
        <div class="form-group">
          <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrChild(this);hitung();">
            <i class="fa fa-remove"></i>
          </button>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-list"></i>
            </span>
            <input type="text" name="name_cost[]" value="BBM" class="form-control" placeholder="Uraian">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="satuan[]" data-tarif class="form-control" placeholder="Satuan" onkeyup="hitungJumlah(this);hitung();">
            <span class="input-group-addon">
              <input type="hidden" name="persen[0]" value="0">
              <input type="checkbox" name="persen[0]" value="%" aria-label="percent" onchange="checkboxPercent(this);hitung();"> %
            </span>
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="harga_satuan[]" data-tarif class="form-control" placeholder="Harga Satuan" onkeyup="hitungJumlah(this);hitung();">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="jumlah[]" data-tarif class="form-control" placeholder="Jumlah">
          </div>
        </div>
      </td>
    </tr>
  </tbody>
  <tbody id="child_cost">
    <tr>
      <td>
        <div class="form-group">
          <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrChild(this);hitung();">
            <i class="fa fa-remove"></i>
          </button>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-list"></i>
            </span>
            <input type="text" name="name_cost[]" value="PREMI" class="form-control" placeholder="Uraian">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="satuan[]" data-tarif class="form-control" placeholder="Satuan" onkeyup="hitungJumlah(this);hitung();">
            <span class="input-group-addon">
              <input type="hidden" name="persen[1]" value="0">
              <input type="checkbox" name="persen[1]" value="%" aria-label="percent" onchange="checkboxPercent(this);hitung();"> %
            </span>
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="harga_satuan[]" data-tarif class="form-control" placeholder="Harga Satuan" onkeyup="hitungJumlah(this);hitung();">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="jumlah[]" data-tarif class="form-control" placeholder="Jumlah" onkeyup="hitung();">
          </div>
        </div>
      </td>
    </tr>
  </tbody>
  {% endif %}
  {% for x in cost %}
  {% if x.cost == 'BBM'  %}
  <tbody id="parent_cost">
    <tr>
      <td>
        <div class="form-group">
          <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrChild(this);hitung();">
            <i class="fa fa-remove"></i>
          </button>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-list"></i>
            </span>
            <input type="text" name="name_cost[]" value="{{ x.cost }}" class="form-control" placeholder="Uraian">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="satuan[]" value="{{ x.satuan }}" data-tarif class="form-control" placeholder="Satuan" onkeyup="hitungJumlah(this);hitung();">
            <span class="input-group-addon">
              <input type="hidden" name="persen[0]" value="0">
              <input type="checkbox" name="persen[0]" value="%" {% if x.persen == '%' %}checked{% endif %} aria-label="percent" onchange="checkboxPercent(this);hitung();"> %
            </span>
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="harga_satuan[]" value="{{ x.harga_satuan }}" data-tarif class="form-control" placeholder="Harga Satuan" onkeyup="hitungJumlah(this);hitung();">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="jumlah[]" value="{{ x.jumlah }}" data-tarif class="form-control" placeholder="Jumlah">
          </div>
        </div>
      </td>
    </tr>
  </tbody>
  {% else %}
  <tbody id="child_cost">
    <tr>
      <td>
        <div class="form-group">
          <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrChild(this);hitung();">
            <i class="fa fa-remove"></i>
          </button>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-list"></i>
            </span>
            <input type="text" name="name_cost[]" value="{{ x.cost }}" class="form-control" placeholder="Uraian">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="satuan[]" value="{{ x.satuan }}" data-tarif class="form-control" placeholder="Satuan" onkeyup="hitungJumlah(this);hitung();">
            <span class="input-group-addon">
              <input type="hidden" name="persen[1]" value="0">
              <input type="checkbox" name="persen[1]" value="%" {% if x.persen == '%' %}checked{% endif %} aria-label="percent" onchange="checkboxPercent(this);hitung();"> %
            </span>
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="harga_satuan[]" value="{{ x.harga_satuan }}" data-tarif class="form-control" placeholder="Harga Satuan" onkeyup="hitungJumlah(this);hitung();">
          </div>
        </div>
      </td>
      <td width="5"></td>
      <td>
        <div class="form-group">
          <div class="input-group" >
            <span class="input-group-addon">
              <i class="fa fa-money"></i>
            </span>
            <input type="text" name="jumlah[]" value="{{ x.jumlah }}" data-tarif class="form-control" placeholder="Jumlah">
          </div>
        </div>
      </td>
    </tr>
  </tbody>
  {% endif %}
  {% endfor %}
  <tr>
    <td colspan="7">
      <div class="form-group">
        <button type="button" class="btn btn-success btn-flat btn-sm" id="tambah_cost">
          <i class="fa fa-plus"></i> Tambah
        </button>
      </div>
    </td>
    <td width="5"></td>
    <td>
      <div class="form-group">
        <div class="input-group" >
          <span class="input-group-addon">
            <i class="fa fa-money"></i>
          </span>
          <input type="text" name="cost" value="{{ total_cost }}" data-tarif class="form-control" placeholder="Total Cost">
        </div>
      </div>
    </td>
  </tr>
</table>
<script>
$("#tambah_cost").click(function(){
  var no     = $("#child_cost").find('[type="checkbox"][name^="persen"]');
  var persen = no.length + 1;
  var cost   = $('#parent_cost').html();
  var child  = $("#child_cost").append(cost);
    child.find('[type="hidden"][name="persen[0]"]').attr('name', 'persen['+persen+']').val('');
    child.find('[type="checkbox"][name="persen[0]"]').attr('name', 'persen['+persen+']').val('%');

  var clear = child.find('[name="persen['+persen+']"]').parent().parent().parent().parent().parent();
      clear.find('[name]').not('[name^=persen]').val('');
});

function removerTrChild(that) {
  var data = $(that).parent().parent().parent();
  var id   = data.parent().attr('id');

  if (id == 'parent_cost') {
    return false;
  } else {
    data.remove();
  }
}
</script>