<?php $no = 1; ?>
<?php foreach ($users as $x) { ?>
<tr>
  <td align="center"><?php echo $no++; ?></td>
  <td align="center" style="vertical-align:middle;">
    <i class="fa fa-edit cursor" style="font-size:18px;"></i> |
    <i class="fa fa-trash cursor" style="font-size:18px;"></i> |
    <i class="fa fa-power-off cursor text-red" style="font-size:18px;"></i> |
    <span class="label bg-red">active</span>
  </td>
  <td><?= $x->name ?></td>
  <td><?= $x->username ?></td>
  <td>
    <?= $x->email ?>
  </td>
  <td align="center">
    <?= $x->handphone ?>
  </td>
</tr>
<?php } ?>