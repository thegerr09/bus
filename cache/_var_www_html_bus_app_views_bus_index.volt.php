<style>
.cursor{
  font-size: 18px;
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Bus</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">bus</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>List Bus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="col-md-2" align="center">
                      <?= $this->tag->image(['img/bus/bus1.jpg', 'class' => 'img-rounded', 'width' => '150', 'style' => 'margin-bottom: 10px;']) ?>
                      <i class="fa fa-edit cursor"></i> | 
                      <i class="fa fa-trash cursor"></i> |
                      <i class="fa fa-power-off text-green cursor"></i> | 
                      <span class="label bg-green">active</span>
                    </div>
                    <div class="col-md-10">
                      <h3><b>GALATAMA 1</b></h3>
                      <table class="table">
                        <tr>
                          <td width="90"><b>No Polisi</b></td>
                          <td> : </td>
                          <td>AA 9085 RB</td>
                          <td width="120"><b>Tgl pajak STNK</b></td>
                          <td> : </td>
                          <td>15 Dec 2016</td>
                          <td width="100"><b>KM Skrg</b></td>
                          <td> : </td>
                          <td>1290 KM</td>
                        </tr>
                        <tr>
                          <td><b>No Rangka</b></td>
                          <td> : </td>
                          <td>MHKM1BA3JBK000239</td>
                          <td><b>Tgl KIR</b></td>
                          <td> : </td>
                          <td>15 Dec 2016</td>
                          <td><b>Profit Share</b></td>
                          <td> : </td>
                          <td>20%</td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>