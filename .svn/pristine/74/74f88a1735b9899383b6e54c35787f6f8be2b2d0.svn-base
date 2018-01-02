
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});

$('.deletbtn').on('click', function(e){
  e.preventDefault();
  var self = $(this);
  swal({

    title: "Are you sure?",
    text: "Products will be deleted!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: true
  },
  function(isConfirm){
    if(isConfirm){
      swal("Deleted!","Products deleted", "success");
      setTimeout(function() {
          self.parents("#delete_form").submit();
      });
    }
  });
});

$('#product_gst').keyup(function(e)
{
  
  var product_basic_cost = $("#basic_cost").val();
  var product_gst = $("#product_gst").val();
  var mrp = parseFloat(product_basic_cost) + parseFloat(((product_basic_cost * product_gst)/100));
  $("#billing_price").val(mrp);
});

