<section class="content-header animated fadeIn">
  <h1>Buku Besar</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>laporan</li>
    <li class="active">buku besar</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4" align="center">
      <h3>BUKU BESAR</h3>
      <br>
      <form action="Laporan/CetakBukuBesar" method="POST" target="_blank">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" value="{{ date('Y-m-01') }} - {{ date('Y-m-d') }}" class="form-control" placeholder="Tanggal" data-jurnal>
          </div>
        </div>
        <div class="form-group">
          <select name="account" class="form-control">
            {{ Helpers.tagAccount() }}
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn bg-blue btn-block">
            <i class="fa fa-print"></i> Cetak Buku Besar
          </button>
        </div>
      </form>
    </div>
    <div class="col-md-4"></div>

  </div>
</section>
<script>
$('[data-jurnal]').daterangepicker({
  locale: {
    format: 'YYYY-MM-DD'
  }
});
</script>