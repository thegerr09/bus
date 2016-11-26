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