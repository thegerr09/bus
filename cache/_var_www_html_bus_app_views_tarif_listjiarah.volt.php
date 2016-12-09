<?php foreach ($jiarah as $j) { ?>
<tr id="delJ<?= $o->id ?>">
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahRoute" onclick="updateOverlandJiarah('<?= $j->id ?>')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delRoute" onclick="deleteOverlandJiarah('<?= $j->id ?>', '<?= $j->asal ?> / <?= $j->tujuan ?>')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
    </button>
  </td>
  <td><?= $j->asal ?></td>
  <td><?= $j->tujuan ?></td>
  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($j->harga) ?>,-</span></td>
</tr>
<?php } ?>