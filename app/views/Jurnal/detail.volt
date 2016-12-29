<style type="text/css">
  .detail-td {
    font-size: 14px;
  }
</style>

<div class="modal fade" id="PrintAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Print All</h4>
      </div>

      <div class="modal-body">
        <p>ini akan mengeprint dengan range yang di tentukan saat ini </p>
      </div>

      <div class="modal-footer">
        <a id="print" href="Jurnal/printAll/{{ date('Y-m-1') }}/{{ date('Y-m-d') }}" target="_blank" class="btn btn-default btn-block">
          <i class="fa fa-print"></i> Print All Jurnal
        </a>
      </div>
    
    </div>
  </div>
</div>

<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Detail Jurnal</h4></center>
      </div>

      <div class="modal-body">
        <table>
          <tr>
            <td class="detail-td" height="25" valign="top">Tanggal</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td tanggal"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Nomor Jurnal</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td"><b class="kode_jurnal"></b></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Kantor</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td kantor"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Keterangan</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td keterangan"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Total Debet</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td total_debet"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Total Kredit</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td total_kredit"></td>
          </tr>
        </table>
        <p></p>
        <table class="table table-bordered">
          <thead style="background-color: #eee;">
            <tr>
              <td width="50">NO</td>
              <td>ACCOUNT</td>
              <td width="150">DEBET</td>
              <td width="150">KREDIT</td>
            </tr>
          </thead>
          <tbody id="listChildDetail">
            
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
    </div>
  </div>
</div>