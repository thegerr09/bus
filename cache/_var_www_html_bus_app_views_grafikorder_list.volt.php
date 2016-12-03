<table id="example" class="table table-bordered">
  <thead>
    <tr>
      <td align="center" style="vertical-align: middle;" rowspan="2" width="150"><b>TANGGAl</b></td>
      <?php $lenght = $this->length($bus); ?>
      <td colspan="<?= $lenght + 1 ?>" align="center"><b>LIST BUS</b></td>
    </tr>
    <tr>
      <?php foreach ($bus as $head) { ?>
      <td align="center"><b><?= Phalcon\Text::upper($head->ukuran) ?><br><?= Phalcon\Text::upper($head->nomor_polisi) ?></b></td>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach (range(0, $dayInMonth) as $i) { ?>
    <tr>
      <td><?= $listDate[$i] ?></td>
      <?php foreach ($bus as $body) { ?>
      <td <?= $this->Helpers->viewGrafik($filterDate[$i], $body->id) ?>></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>