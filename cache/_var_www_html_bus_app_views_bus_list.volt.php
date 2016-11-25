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
          <?= $this->tag->image(['img/bus/' . $x->image, 'class' => 'img-rounded', 'width' => '150', 'style' => 'margin-bottom: 10px;']) ?>
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
              <td><?= $x->nomor_polisi ?> KM</td>
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
                <label>
                  <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>" checked>
                  <span class="label bg-green">Kondisi Baik</span>
                </label>
                <?php } else { ?>
                <label>
                  <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>">
                  <span class="label bg-red">Kondisi Rusak</span>
                </label>
                <?php } ?>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12">
          <i class="fa fa-edit cursor"></i> | 
          <i class="fa fa-trash cursor"></i> |
          <i class="fa fa-list cursor"></i> |
          <?php if ($x->active == 'Y') { ?>
          <i class="fa fa-power-off text-green cursor"></i> | 
          <span class="label bg-green">Active</span>
            <?php if ($x->status == 1) { ?>
            <span id="kondisi">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
            <?php } else { ?>
            <span id="kondisi">| <span class="label bg-blue">Free</span></span>
            <?php } ?>
          <?php } else { ?>
          <i class="fa fa-power-off text-red cursor"></i> | 
          <span class="label bg-red">Not Active</span>
          <?php } ?>
        </div>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>