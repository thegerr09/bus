<style>
td {
  color: #555;
}

.fontawe{
  size: 16px;
}

hr {
  margin-top: 4px;
  margin-bottom: 3px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Booking</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">booking</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Booking</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <table id="example" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="160">Action</th>
                <th width="160">Booking</th>
                <th width="160">Waktu Sewa</th>
                <th width="230">Penyewa</th>
                <th width="180">Kendaraan</th>
                <th width="190">Biaya</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td align="center">
                  <button type="button" class="btn btn-warning btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Detail">
                    <i class="fa fa-list"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-primary btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-danger btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>&nbsp;
                  <button type="button" class="btn btn-default btn-xs fontawe" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fa fa-print"></i>
                  </button>&nbsp;
                  <hr>
                  <span class="label bg-green"><i class="fa fa-check"></i> SEWA</span>
                  <span class="label bg-red"><i class="fa fa-remove"></i> BATAL</span>
                </td>
                <td>
                  <span class="label bg-blue">kode</span> : <b>BNKPS06Q</b>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 18px;">tgl</span> : 23 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">start</span> : 23 Nov 2016
                  <hr>
                  <span class="label bg-blue">back</span> : 26 Nov 2016
                </td>
                <td>
                  <span class="label bg-blue">nama</span> : Saipul HIdayat Theger
                  <hr>
                  <span class="label bg-blue" style="padding-right: 15px;">telp</span> : 085768249362
                </td>
                <td>
                  <span class="label bg-blue" style="padding-right: 10px;">type bus</span> : Medium
                  <hr>
                  <span class="label bg-blue">kapasitas</span> : 30 Orang
                </td>
                <td>
                  <span class="label bg-blue">tarif</span> : 
                  Rp. <span class="pull-right">1.000.000,-</span>
                  <hr>
                  <span class="label bg-blue" style="padding-right: 14px;">dp</span> : 
                  Rp. <span class="pull-right">200.000,-</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->



<!-- include JS -->
<script>
// $(document).ready(function() {
// 	var table = $('#example').DataTable( {
// 		scrollY:        "310px",
// 		scrollX:        true,
// 		scrollCollapse: true,
// 		paging:         false,
//       	lengthChange: 	false,
//         ordering: 		  false,
// 		columnDefs: [
// 	        { "width": "150px",  "targets": [0] },
// 	        { "width": "150px", "targets": [1] },
// 	        { "width": "150px", "targets": [2] },
// 	        { "width": "150px", "targets": [3] },
// 	        { "width": "150px",  "targets": [4] },
// 	        { "width": "150px",  "targets": [5] },
// 	        { "width": "150px",  "targets": [6] }
//     	]
// 	});
// 	new $.fn.dataTable.FixedColumns( table, {
// 		leftColumns: 1,
// 	});
// });
$(document).ready(function() {
var handleDataTableButtons = function() {
  if ($("#example").length) {
    $("#example").DataTable({
      dom: "Bfrtip",
      buttons: [
        {
          extend: "copy",
          className: "btn-sm"
        },
        {
          extend: "csv",
          className: "btn-sm"
        },
        {
          extend: "excel",
          className: "btn-sm"
        },
        {
          extend: "pdfHtml5",
          className: "btn-sm"
        },
        {
          extend: "print",
          className: "btn-sm"
        },
      ],
      responsive: true
    });
  }
};

TableManageButtons = function() {
  "use strict";
  return {
    init: function() {
      handleDataTableButtons();
    }
  };
}();
TableManageButtons.init();
});
</script>