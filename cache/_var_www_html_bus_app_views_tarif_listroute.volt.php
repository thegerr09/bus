<?php $area = $this->Helpers->area(); ?>
<?php foreach ($area as $key => $value) { ?>
<tr>
  <td colspan="2" align="center" class="bg-info"><b><?= Phalcon\Text::upper($value) ?></b></td>
</tr>
<?php foreach ($route as $r) { ?>
<?php if ($r->area == $key) { ?>
<tr class="cursor" id="delR<?= $r->id ?>" data-toggle="collapse" data-target="#delRA<?= $r->id ?>" aria-expanded="false" aria-controls="delRA<?= $r->id ?>">
  <td><?= $r->asal ?></td>
  <td><?= $r->tujuan ?></td>
</tr>
<tr class="collapse" id="delRA<?= $r->id ?>">
  <td colspan="2" align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahRoute" onclick="updateRoute('<?= $r->id ?>')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delRoute" onclick="deleteRoute('<?= $r->id ?>', '<?= $r->asal ?> / <?= $r->tujuan ?>')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
    </button>
  </td>
</tr>
<?php } ?>
<?php } ?>
<?php } ?>