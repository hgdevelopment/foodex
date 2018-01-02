/* Calculate total */
$('#paid_amount').keyup(function(e)
{
    var total_amount1 = $("#total_amount").val();
    var paid_amount = $("#paid_amount").val();
    var balance_amount1 = $("#balance_amount").val();
    var total_paid_amount =$("#total_paid_amount").val();
    var payment_mode = $("#payment_mode" ).val();
    var payment_type = $("#payment_type" ).val();
    var remaining_bal =(parseFloat(total_amount1 - total_paid_amount));

  if(payment_type=='partial')
  {
     if(balance_amount1!=0)
    {
        var remaining_amount1 =parseFloat(remaining_bal - paid_amount);
        $("#balance").val(remaining_amount1);
        if(parseFloat(remaining_bal)<parseFloat(paid_amount))
        {

            $("#paid_amount").val(remaining_bal);
            $("#balance").val(0);
             return false;
        }
    }
    else{

        var remaining_amount1 =parseFloat(total_amount1 - paid_amount);
        $("#balance").val(remaining_amount1);
        if(parseFloat(total_amount1)<parseFloat(paid_amount))
        {
            $("#paid_amount").val(total_amount1);
            $("#balance").val(0);
             return false;
        }
    }

  }

else{
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
        $('#transaction_no').val(0);
        $('#reference_no').val(0);
        $('#cheque_no').val(0);
        $('#account_no').val(0);
        $('#card').val(0);
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
        $('#cheque_no').val(0);
        $('#account_no').val(0);
        $('#card').val(0);
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
        $('#cheque_no').val(0);
        $('#account_no').val(0);
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
        $('#transaction_no').val(0);
        $('#account_no').val(0);
        $('#card').val(0);
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
        $('#cheque_no').val(0);
        $('#card').val(0);
    }


    var total_amount=$('#total_amount').val();
    var paid_amount1=$('#paid_amount1').val();
    var pay_type = $('#payment_type').val();
    var total_paid_amount =$("#total_paid_amount").val();
    var card=$('#card').val();
        if(pay_type=='partial')
        {
                $('#balance').val(parseFloat(total_amount)-parseFloat(total_paid_amount));
        }
        else
        {
        $('#balance').val(total_amount-(parseFloat(paid_amount1)+parseFloat(card)));
        }
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
        $("#normal").prop('disabled', false);
    }
    else if(pay_type=="partial")
    {
        $("#display_mode" ).show();
        $("#3").prop('disabled', true);
        $("#6").prop('disabled', true);
        $("#7").prop('disabled', true);
        $("#normal").prop('disabled', true);
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


