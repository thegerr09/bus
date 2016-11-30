<table id="example" class="table table-bordered">
  <thead>
    <tr>
      <th>List Bus</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bus as $x) { ?>
    <tr id="del<?= $x->id ?>">
      <td>
        <div class="col-md-2" align="center">
          <?= $this->tag->image(['img/bus/' . $x->image, 'class' => 'img-rounded', 'width' => '150', 'height' => '150', 'style' => 'margin-bottom: 10px;']) ?>
        </div>
        <div class="col-md-10">
          <h3><b><?= $x->type ?> | <?= $x->merk ?></b></h3>
          <table class="table">
            <tr>
              <td width="120"><b>Tahun Beli</b></td>
              <td> : </td>
              <td><?= $x->tahun_beli ?></td>
              <td width="120"><b>Tanggal Pajak</b></td>
              <td> : </td>
              <td><?= $x->tanggal_pajak ?></td>
              <td width="100"><b>Nomor Polisi</b></td>
              <td> : </td>
              <td><?= $x->nomor_polisi ?></td>
            </tr>
            <tr>
              <td><b>Tahun Perakitan</b></td>
              <td> : </td>
              <td><?= $x->tahun_perakitan ?></td>
              <td><b>Nominal Pajak</b></td>
              <td> : </td>
              <td>Rp. <?php echo number_format($x->nominal_pajak, 0, '.', '.'); ?>,-</td>
              <td><b>Kondisi</b></td>
              <td> : </td>
              <td>
                <div class="form-group">
                <?php if ($x->kondisi == 'N') { ?>
                <label class="usergroup">
                  <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>" checked>
                  <span class="label bg-green" id="status_kondisi<?= $x->id ?>">Kondisi Baik</span>
                </label>
                <?php } else { ?>
                <label class="usergroup">
                  <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>">
                  <span class="label bg-red" id="status_kondisi<?= $x->id ?>">Kondisi Rusak</span>
                </label>
                <?php } ?>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12">
          <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> | 
          <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->nomor_polisi ?>')"></i> |
          <i class="fa fa-list cursor"></i> |
          <?php if ($x->active == 'Y') { ?>
          <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
          <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
            <?php if ($x->status == 1) { ?>
            <span id="kondisi<?= $x->id ?>">| <span class="label bg-purple">Sudah Dibooking</span></span>
            <?php } elseif ($x->status == 2) { ?>
            <span id="kondisi<?= $x->id ?>">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
            <?php } else { ?>
            <span id="kondisi<?= $x->id ?>">| <span class="label bg-blue">Free</span></span>
            <?php } ?>
          <?php } else { ?>
          <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
          <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
            <?php if ($x->status == 1) { ?>
            <span id="kondisi" style="display:none;">| <span class="label bg-purple">Sudah Dibooking</span></span>
            <?php } elseif ($x->status == 2) { ?>
            <span id="kondisi" style="display:none;">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
            <?php } else { ?>
            <span id="kondisi" style="display:none;">| <span class="label bg-blue">Free</span></span>
            <?php } ?>
          <?php } ?>
        </div>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
