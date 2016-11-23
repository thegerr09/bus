<?php $no = 1; ?>
<?php foreach ($setting as $x) { ?>
<tr>
  <td><?= $no ?></td>
  <td>
    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah"></i> | 
    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete"></i> | 
    <i class="fa fa-power-off cursor text-green"></i> |
    <span class="label bg-green">active</span>
  </td>
  <td><?= $x->name ?></td>
  <td><?= $x->setting ?></td>
</tr>
<?php $no = $no + 1; ?>
<?php } ?>