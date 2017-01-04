<?php $no = 1; ?>
<?php foreach ($header as $h) { ?>
<tr id="delHeader<?= $h->id ?>">
  <td align="center"><?= $no ?></td>
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahHeader" onclick="update_header(<?= $h->id ?>, '<?= $h->header ?>', '<?= $h->group ?>', '<?= $h->jenis ?>', 'header')">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteHeader" onclick="deleted(<?= $h->id ?>,'<?= $h->header ?>', 'header')">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td><?= $h->header ?></td>
  <td><?= $h->group ?></td>
  <td><?= $h->jenis ?></td>
</tr>
<?php $no = $no + 1; ?>
<?php } ?>