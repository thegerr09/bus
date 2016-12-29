<div class="modal fade" id="TutupBuku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearTutupBuku()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Tutup Buku</h4>
      </div>

      <form name="tutupBuku" action="Jurnal/tutupBuku" method="POST" data-remote>
        <div class="modal-body">
          <div class="form-group">
            <label>Pilih Bulan</label>
            <input type="text" name="tutup_bulan" class="form-control" placeholder="Pilih Bulan" data-jurnal>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-book"></i> Tutup Buku
          </button>
        </div>
      </form>
    
    </div>
  </div>
</div>