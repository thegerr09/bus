<?php $no = 1; ?>
<?php foreach ($account as $a) { ?>
<tr>
  <td><?= $no ?></td>
  <td>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahHeader" onclick="update(<?= $a->id ?>, '<?= $a->account ?>', '<?= $a->name_header ?>', 'account')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteHeader" onclick="deleted(<?= $a->id ?>,'<?= $a->account ?>', 'account')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td><?= $a->account ?></td>
  <td><?= $a->name_header ?></td>
</tr>
<?php $no = $no + 1; ?>
<?php } ?>