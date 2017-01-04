<?php $no = 1; ?>
<?php foreach ($account as $a) { ?>
<tr id="delAccount<?= $a->id ?>">
  <td><?= $no ?></td>
  <td>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahAccount" onclick="update_account(<?= $a->id ?>, '<?= $a->account ?>', '<?= $a->id_header ?>', '<?= $a->name_header ?>', '<?= $a->tipe ?>')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteAccount" onclick="deleted(<?= $a->id ?>,'<?= $a->account ?>', 'account')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td><?= $a->account ?></td>
  <td><?= $a->name_header ?></td>
  <td><?= $a->tipe ?></td>
</tr>
<?php $no = $no + 1; ?>
<?php } ?>