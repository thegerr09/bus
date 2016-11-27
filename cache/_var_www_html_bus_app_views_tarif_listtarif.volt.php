<?php foreach ($tarif as $x) { ?>
<tr>
  <td align="center">
    <button type="button" class="btn btn-primary btn-xs">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>
    <button type="button" class="btn btn-danger btn-xs">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
    </button>
  </td>
  <td><?= $x->asal ?></td>
  <td><?= $x->tujuan ?></td>
  <td><?= $x->location ?></td>
  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->med_agen) ?>,-</span></td>
  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->big_agen) ?>,-</span></td>
  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->med_umum) ?>,-</span></td>
  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->big_umu) ?>,-</span></td>
</tr>
<?php } ?>