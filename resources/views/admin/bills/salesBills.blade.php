@extends('admin.layout.puredrops')
@section('sidebar')
    @include('admin.partial.header')
    @include('admin.partial.aside')
@endsection


@section('body')
<link href="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection{
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.25;
    min-height: 38px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
   
    top: 6px;
    right: 4px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px;
}
.bigdrop{
    /* max-width: 200px !important;*/
}
td ul.dropdown-menu{
    padding:6px;
}
td ul.dropdown-menu li a{
    display: block;
    width:100%;
}
</style>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h2 class="text-themecolor m-b-0 m-t-0">View Sales Bils </h2>
        </div>
    </div>
    <form method="post" action="#" id="form_stock_confirm"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="p-20">
                            <table class="table" id="stock_request_send" style="width: 100%">
                                <thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Billnumber</th>
									<th>Customer Name</th>
									<th>Total Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								@foreach ($view_order as $view_orders)
									<tr>
										<td>{{$sl++}}</td>
										<td>{{date('d-m-Y H:i:s',strtotime($view_orders->created_at))}}</td>
										<td>{{$view_orders->bill_number}}</td>
										<td>{{$view_orders->customer_name}}</td>
										<td>{{$view_orders->total_amount}}</td>
                                        <td>
                                          <a id="print" onclick="print_bill('{{ $view_orders->orderId }}')" href="#" style="cursor: pointer;" title="print"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>



                                          <a href="{{URL::to('/')}}/admin/exchange_product/{{ $view_orders->orderId }}" style="cursor: pointer;" title="Exchange"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i></a>
                                          <a onclick="delete_SalesBill({{ $view_orders->orderId }});" style="cursor: pointer;" title="Delete"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                        </td>
									</tr>
								@endforeach
							</tbody>
						</table>
                        </div>
           	        </div>
                </div>
            </div>
        </div>
    </form>
</div>
<input type="hidden" id="link" value="{{URL::to('/')}}/admin/orderSales/">
@endsection
@section('jquery')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script>
    $(function(){
        $('#stock_request_send').DataTable({
        	 dom: 'Bfrtip',
        	 buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        });
    });

function print_bill(id)
{
var link=$('#link').val();

    window.open(link+id,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=1000');
 setTimeout(function(){ location.reload(); }, 3000);
} 

    function delete_SalesBill(id) 
    {
        var sales_id = $("#sales_id").val();
        swal({
            title: "Delete!!",
            text: "Are You Sure",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Please Enter Reason"
        },
        function(inputValue){
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write reason!");
                return false;
            }
            var reason =inputValue;
            $.ajax({
                url: "{{ URL::to('admin/updateOrderDelete') }}",
                type: "get",
                data: { method: 'get',_token: "{{ csrf_token() }}",id:id,reason:inputValue},
                dataType: "html",
                success: function (data) {
                    // alert(data);

                    swal({title:'Done',text:'Deleted succesfully !',type:'success',timer:'3800'},
                    function () {
                        window.location.reload();
                    });
                },
            });
        });
    }

</script>
@if (session()->has('sweet_alert.title'))
    <script>
       swal('Success','Order Confirm','success');
    </script>
@endif
@endsection