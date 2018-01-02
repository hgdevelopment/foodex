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
            <h2 class="text-themecolor m-b-0 m-t-0">Stock Request - {{$data->transfer_code}}</h2>
        </div>
    </div>
    <form method="post" action="#" id="form_stock_confirm"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="p-20">
                              <table class="" id="stock_request_send" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Request No</th>
                                                    <th>: {{$data->transfer_code}}</th>
                                                    <th>Status</th>
                                                    <th>: @if($data->status=='pending')
                                                        <label class="label label-warning">{{ucfirst($data->status)}}</label>
                                                        @elseif($data->status=='confirm')
                                                        <label class="label label-success">{{ucfirst($data->status)}}</label>
                                                        @elseif($data->status=='cancel')
                                                        <label class="label label-danger">{{ucfirst($data->status)}}</label>
                                                        @elseif($data->status=='stock')
                                                        <label class="label label-primary">{{ucfirst($data->status)}}</label>
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Request By</th>
                                                    <th>: {{$data->employee_name}}</th>
                                                    <th>Branch</th>
                                                    <th>: {{$data->branch_name}}</th>
                                                </tr>
                                            </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="p-20">
                                 <h5>Requested Product</h5>
                                        <table class="table" id="stock_request_send" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Product No</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_products as $element)                                                
                                                <tr>
                                                    <td>{{$element->product_number}}</td>
                                                    <td>{{$element->product_name}}</td>
                                                    <td>{{$element->product_qty}}</td>
                                                    <td>
                                                        @if($element->status==0)
                                                        <label class="label label-warning">Pending</label>
                                                        @elseif($element->status==1)
                                                        <label class="label label-success">Confirm</label>
                                                        @elseif($element->status==2)
                                                        <label class="label label-danger">Cancel</label>
                                                        @endif
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                 @if( ($data->status=='confirm' || $data->status=='stock') && $data->requested_from_branch==\Auth::guard('admin')->user()->branch)
                                 <hr style="width:100%;" />
                                    <div class="p-20">
                                 <h5>Confirmed Product</h5>
                                  @if(count($data_product_confirm)>0)
                                        <table class="table" id="stock_request_send" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Product No</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_product_confirm as $element)                                                
                                                <tr>
                                                    <td>{{$element->product_number}}</td>
                                                    <td>{{$element->product_name}}</td>
                                                    <td>{{$element->product_qty}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                               @endif
                        </div>
                    </div>
                @if($data->status=='pending' && $data->requested_to_branch==\Auth::guard('admin')->user()->branch)
                    <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-block">                            
                            <div class="row">
                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">                                         
                                            <a href="{{URL::to('/')}}/admin/stock/request/confirm/{{$id}}" class="btn btn-success pull-right" style="margin-right:2%" >Confirm</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @elseif($data->status=='confirm' && $data->requested_from_branch==\Auth::guard('admin')->user()->branch)
                 <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-block">                            
                            <div class="row">
                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">                                         
                                            <input type="button" data-id="{{$id}}" data-status="{{$data->status}}"  class="btn btn-success pull-right add-stock" style="margin-right:2%" value="Add Stock" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endif
            </div>
   
        </div>
    </form>
</div>
@endsection
@section('jquery')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script src="{{ URL::asset('js/purchase/purchase_order.js')}}"></script>
<script>
    $(function(){
        $('.add-stock').click(function(e){
          e.preventDefault();
           $.ajax({
                            url: '{{URL::to('/') }}/admin/stock/request/confirm/instock',
                            method: 'POST',
                            data: {
                                'request_id':$(this).attr('data-id'),
                                'request_status':$(this).attr('data-status'),
                                '_token':'{{csrf_token()}}'
                            },
                            success: function(data){
                              if(data.result){
                                swal({ title: "Stock Added!",
                                            text: "success!",
                                            type: "success" 
                                            }).then(function() {
                                               location.reload();
                                               });
                                
                              }else{
                                sweetAlert("Oops...",'' , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            }
                        });
        });
    });
</script>

@endsection