{% for x in charge %}
<tr>
  <td>
    <div class="form-group">
      <button type="button" class="btn btn-danger btn-flat btn-sm" onclick="removerTrCharge(this);hitungCharge();">
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
        <input type="text" name="name_charge[]" value="{{ x.charge }}" class="form-control" placeholder="Uraian Charge">
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
        <input type="text" name="biaya_charge[]" value="{{ x.biaya }}" data-tarif class="form-control" placeholder="Biaya Charge" onkeyup="hitungCharge()">
      </div>
    </div>
  </td>
</tr>
{% endfor %}