<table id="example" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>List Co. Driver</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($codriver as $x) { ?>
    <tr id="del<?= $x->id ?>">
      <td>
        <div class="col-md-1">
          <?= $this->tag->image(['img/codriver/' . $x->image, 'class' => 'img-rounded', 'width' => '80']) ?>
        </div>
        <div class="col-md-7">
          <span><b><?= Phalcon\Text::upper($x->nama) ?></b></span>
          <table>
            <tr>
              <td valign="top" width="45px"><small>Alamat</small></td>
              <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
              <td valign="top" ><small><?= $x->alamat ?></small></td>
            </tr>
            <tr>
              <td valign="top" ><small>No. Telp</small></td>
              <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
              <td valign="top" ><small><?= $x->telpon ?></small></td>
            </tr>
            <tr>
              <td colspan="3" height="25">
                <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> | 
                <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->nama ?>')"></i> | 
                <!-- <i class="fa fa-list cursor"></i> |  -->
                <?php if ($x->active == 'Y') { ?>
                <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                <?php } else { ?>
                <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                <?php } ?>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-4">
          <div class="chart">
            <canvas id="salesChart<?= $no ?>" style="height: 80px;"></canvas>
          </div>
        </div>
      </td>
    </tr>
    <?php $no = $no + 1; ?>
    <?php } ?>
  </tbody>
</table>