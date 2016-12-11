<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_jurnal">Input Jurnal</h4>
      </div>

      <form name="jurnal" action="<?= $this->url->get('Jurnal/input') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal">
          </div>
          <div class="form-group">
            <label>Kantor</label>
            <select name="kantor" class="form-control">
              <option value="">Pilih Kantor</option>
              <option value="GALATAMA 1" selected="true">Galatama 1</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Jurnal ..."></textarea>
          </div>
          <table>
            <tbody id="parent_jurnal">
              <tr>
                <td width="50%" height="40">
                  <select class="form-control" name="account[]">
                    <?= $this->Helpers->tagAccount() ?>
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
                    <?= $this->Helpers->tagAccount() ?>
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
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>