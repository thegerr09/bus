<table id="example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Action</th>
      <th>Controller</th>
      <th>Action</th>
      <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
      <th><?= $ug->usergroup ?></th>
      <?php } ?>
      <th>Except</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($acl as $x) { ?>
    <tr id="del<?= $x->id ?>">
      <td><?= $no ?></td>
      <td>
        <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Update" onclick="update_acl('<?= $x->id ?>', '<?= $x->controller ?>', '<?= $x->action ?>')"></i> |
        <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted('<?= $x->id ?>', '<?= $x->controller ?>')"></i> |
        <i class="fa fa-power-off cursor text-green" style="font-size:18px;"></i> |
        <span class="label bg-green">Active</span>
      </td>
      <td><?= $x->controller ?></td>
      <td><?php if ($x->action != null) { ?><?= $x->action ?><?php } else { ?>{default index}<?php } ?></td>
      <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
      <td align="center">
        <label class="usergroup">
          <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>,<?= $ug->id ?>"
          <?php if ($this->isIncluded($ug->id, $this->AclAction->acl_usergroup($x->usergroup))) { ?>checked<?php } ?>>
        </label>
      </td>
      <?php } ?>
      <td style="padding: 0px;"><div ondblclick="return except(this)" style="padding: 10px;" acl="<?= $x->id ?>"><?= $x->except ?></div></td>
    </tr>
    <?php $no = $no + 1; ?>
    <?php } ?>
  </tbody>
</table>