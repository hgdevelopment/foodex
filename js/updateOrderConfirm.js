
/* Add Row */
$( "#add_values_order" ).click(function() 
{
	$("#product_name_error").html("");
	$("#product_quantity_error").html("");
    $("#batch_no_name_error").html("");
	product_name = $("#product_name").val();
    batch_no = $("#batch_no").val();
    
	quantity = $("#quantity").val();
	if(product_name == null || product_name == "")
	{
		$("#product_name_error").append("Select Product");
		return false;
	}
    if(batch_no == null || batch_no == "" || batch_no == "null")
    {
        $("#batch_no_name_error").append("Select Batch Number");
        return false;
    }
	if(quantity == "")
	{
		$("#product_quantity_error").append("Enter Quantity");
		return false;
	}


	var inc_val=$("#inc_val").val();
	inc_val++;
	$("#inc_val").val(inc_val);
	

    var product_name = $("#product_name option:selected").text();
    var product_id = $("#product_name option:selected").val();
    var batch_no = $("#batch_no").val();
    var product_quantity = $("#quantity").val();
	var product_price = $("#price").val();
    var product_gst = $("#gst").val();
    var discount_per = $("#discount_per").val();
    var discount_amt = $("#discount_amt").val();
	var product_total = $("#total").val();
	var free_product = $("#free_product").val();
    var bill_number = $("#bill_no").val();
    var sales_id = $("#sales_id").val();

    var page=$('#url').val();


	$.ajax({
            type: "get",
            url: page+"/product/updateCongirmproduct/new",
            data:{product_name:product_name,product_id:product_id,batch_no:batch_no,product_quantity:product_quantity,product_price:product_price,
                product_gst:product_gst,discount_per:discount_per,discount_amt:discount_amt,product_total:product_total,free_product:free_product,
                sales_id:sales_id,bill_number:bill_number},
            success: function(data){
                 swal("Done!", "Update Amount !!!", "success");
                setTimeout(function() {
              window.location.href = page+"/admin/updateOrderConfirm/"+sales_id
            }, 2000);
               
            }
        })
    

	totalvalue = $("#gt").val();
	totalvalue = Number(totalvalue);
	grand = parseFloat(totalvalue) + parseFloat(product_total);
	grand = parseFloat(grand).toFixed(2);
	$("#gt").val(grand);
	$('#grand_total').html(grand);

	$("#product_name").val('');
    $("#product_name").html('');
    $('#batch_no').val("null").trigger("change");
	$("#quantity").val('');
	$("#price").val('');
	$("#gst").val('');
    $("#discount_per").val('');
    $("#discount_amt").val('');
    $("#total").val('');
	$("#free_product").val('');
    var product_name1 =$("#product_name1").val();

});
/* Delete Row */
function del(id)
{
	product_total = $("#total"+id).val();
	totalvalue = $("#gt").val();
	totalvalue = Number(totalvalue);
	grand = parseFloat(totalvalue) -  parseFloat(product_total);
	grand = parseFloat(grand).toFixed(2);
	$("#gt").val(grand);
	$('#grand_total').html(grand);
	$("#"+id).remove();
    var product_name1 =$("#product_name1").val();

    if(product_name1==undefined)
    {
        $("#payment").hide();
    }
    else{
        $("#payment").show();
    }
}

/* Calculate total */
$('#quantity,#discount_per').keyup(function(e)
{
  
  var billing_price = $("#price").val();
  var discount = $("#discount_per").val();
  var quantity = $("#quantity").val();
  var total_quantity = parseFloat(quantity  * billing_price);
  var discount_amount =  parseFloat(((total_quantity * discount)/100));
  var total = parseFloat(total_quantity) - parseFloat(discount_amount);
  var total_amount=Math.round(total);
  $("#total").val(total_amount);
});
/* Calculate Tax Amount */
$('#gst').keyup(function(e)
{
  
    var basic_cost = $("#basic_cost").val();
    var discount = $("#discount_per").val();
    var quantity = $("#quantity").val();
    var gst = $("#gst").val();
    var gst_amount =  parseFloat((basic_cost)* gst/100);
    // alert(gst_amount);
    // alert(basic_cost);
    var billing_price1 = (parseFloat(basic_cost) + parseFloat(gst_amount));
    var billing_amount=Math.round(billing_price1);
    var total_quantity = parseFloat(quantity  * billing_amount);
    var discount_amount =  parseFloat((total_quantity * discount)/100);
    var total = parseFloat(total_quantity) - parseFloat(discount_amount);
    var total_amount=Math.round(total);
    $("#total").val(total_amount);
  $("#price").val(billing_amount);
});

/* Calculate total */
$('#paid_amount').keyup(function(e)
{
  var total_amount1 = $("#total_amount").val();
  var paid_amount = $("#paid_amount").val();
  var payment_mode = $("#payment_mode" ).val();


  if(payment_mode=="both"){
 
    var remaining_amount =parseFloat(total_amount1 - paid_amount);
     $("#card").val(remaining_amount);
     $("#balance").val(0);
    if(parseFloat(total_amount1)<parseFloat(paid_amount))
    {
        $("#paid_amount").val(total_amount1);
        $("#card").val(0);
         return false;
    }
  }
  else if(parseFloat(total_amount1)<parseFloat(paid_amount))
  {

    $("#paid_amount").val(total_amount1);
     $("#balance").val(0);
     return false;
  }
else{
      var balance_amount = parseFloat(total_amount1 - paid_amount);
     $("#balance").val(balance_amount);
}
 
  if(balance_amount=""){
    $("#balance").val(0);
  }
});

/* Select Payment Mode */
function payment_mode_change() 
{

    var value = $('#payment_mode option:selected').val();
    var total = $('#grand_total').html();

    if(value == "cash")
    {
        
        $('#card_div').hide();
    	$("#cash_paid_div").show();
    	$('#cash_div').show();
        $('#balance_div').show();
    	$('#transaction_div').hide();
    	$('#cheque_div').hide();
    	$('#account_div').hide();
        $('#reference_div').hide();
        $('#total_amount').val(total);
        $('#paid_cash').html("By Cash");
    }
    if(value == "card")
    {
        $('#card_div').hide();
        $('#transaction_div').show();
        $('#reference_div').show();
        $("#cash_paid_div").show();
        $('#balance_div').show();
    	$('#cash_div').show();
    	$('#cheque_div').hide();
    	$('#account_div').hide();
        $('#total_amount').val(total);
        $('#paid_cash').html("By Card");
    }
    if(value == "both")
    {
    	$('#card_div').show();
    	$("#cash_paid_div").show();
    	$('#cash_div').show();
    	$('#transaction_div').show();
        $('#reference_div').show();
    	$('#cheque_div').hide();
        $('#balance_div').hide();
    	$('#account_div').hide();
        $('#total_amount').val(total);
        $('#paid_cash').html("By Cash");
        $("#balance").val(0);
    }
    if(value == "credit" || value == "charity")
    {
    	$('#card_div').hide();
    	$("#cash_paid_div").hide();
    	$('#cash_div').hide();
    	$('#transaction_div').hide();
    	$('#cheque_div').hide();
    	$('#account_div').hide();
        $('#reference_div').hide();
        $('#balance_div').hide();
        $('#total_amount').val(total);
        if(value == "credit")
        $("#balance").val(total);
        if(value == "charity")
        $("#balance").val(0);
    }
    if(value == "cheque")
    {
    	$('#card_div').hide();
    	$("#cash_paid_div").show();
        $('#balance_div').show();
    	$('#cash_div').show();
    	$('#transaction_div').hide();
    	$('#cheque_div').show();
        $('#reference_div').show();
    	$('#account_div').hide();
        $('#total_amount').val(total);
        $('#paid_cash').html("Paid Amount");
    }
    if(value == "online")
    {
    	$('#card_div').hide();
        $('#balance_div').show();
    	$("#cash_paid_div").show();
    	$('#cash_div').show();
    	$('#transaction_div').show();
        $('#reference_div').show();
    	$('#cheque_div').hide();
    	$('#account_div').show();
        $('#total_amount').val(total);
        $('#paid_cash').html("Paid Amount");
    }


var total_amount=$('#total_amount').val();
var paid_amount=$('#paid_amount').val();
var card=$('#card').val();

    $('#balance').val(total_amount-(parseFloat(paid_amount)+parseFloat(card)));
}


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

function check_mode(){

    var pay_type= $("#payment_type").val();

    if(pay_type=="normal")
    {
        $("#display_mode" ).show();
        $("#3").prop('disabled', false);
        $("#6").prop('disabled', false);
        $("#7").prop('disabled', false);
    }
    else if(pay_type=="partial")
    {
        $("#display_mode" ).show();
        $("#3").prop('disabled', true);
        $("#6").prop('disabled', true);
        $("#7").prop('disabled', true);
    }
    else{
        $("#display_mode" ).hide();
    }

 var edit =$("#edit").val();
    if(edit>0)
    {
       $("#edit").val('0'); 
        payment_mode_change();
    }
}

check_mode();


