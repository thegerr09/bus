<?php $no = 1; ?>
<?php foreach ($jurnal as $x) { ?>
<tr>
  <td align="center"><?= $no ?></td>
  <td align="center">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Detail" onclick="detail(<?= $x->id ?>)">
      <i class="fa fa-bars" data-toggle="tooltip" data-placement="top" title="Detail"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit(<?= $x->id ?>)">
      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
    </button>&nbsp;
    <button type="button" class="btn btn-danger btn-xs">
      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
    </button>&nbsp;
    <a href="Jurnal/printOne/<?= $x->id ?>" class="btn btn-default btn-xs" target="_blank">
      <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
    </a>
  </td>
  <td align="center">
    <?= $this->Helpers->dateChange($x->tanggal) ?>
  </td>
  <td align="center">
    <?= $x->kode_jurnal ?>
  </td>
  <td>
    <?= Phalcon\Text::upper($x->keterangan) ?>
  </td>
  <td align="center">
    <?= $x->kantor ?>
  </td>
</tr>
<?php $no = $no + 1; ?>
<?php } ?>