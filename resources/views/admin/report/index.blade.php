@extends('admin.layout.puredrops') 
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"> Reports</h3>
		</div>
	</div>
	@if (Session()->has('message'))
	<div class="alert alert-success"> 
		<i class="ti-product"></i> 
		{{Session()->get('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
	</div>
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<form class=" m-t-40" action="{{URL::to('/') }}/admin/report" method="post" data-parsley-validate>
					{{csrf_field() }}
						<div class="row">
							@if(Auth::guard('admin')->user()->userType=='OI' || Auth::guard('admin')->user()->userType=='VN')
							<div class="col-md-2">
								<label for="product_brand">Branch</label>
								<select class="form-control p-0" id="branch" required name="branch">
									<option value="">Select Branch</option>
									@foreach ($branch as $branchs)
										<option value="{{ $branchs->id}}">{{ $branchs->branch_name }}</option>
									@endforeach
								</select>
							</div>
							@else
                            	<input type="hidden" id="branch"  name="branch" value="{{Auth::guard('admin')->user()->branch}}">
							@endif
							<div class="col-md-2">
								<div class="form-group m-b-40">
									<label for="type">Type</label>
									<select  class="form-control" id="type" name="type"  required data-parsley-required-message="Please select report type">
										<option value="">Select</option>
										<option value="cash" @if(isset($request) && $request->type =='cash') {{ 'selected' }} @endif >Cash</option>
										<option value="card" @if(isset($request) && $request->type=='card') {{ 'selected' }} @endif >Card</option>
										<option value="both" @if(isset($request) && $request->type=='both') {{ 'selected' }} @endif >Both</option>
										<option value="charity" @if(isset($request) && $request->type=='charity') {{ 'selected' }} @endif >Charity</option>
										<option value="cheque" @if(isset($request) && $request->type=='cheque') {{ 'selected' }} @endif >Cheque</option>
										<option value="online" @if(isset($request) && $request->type=='online') {{ 'selected' }} @endif >Online</option>
										<option value="credit" @if(isset($request) && $request->type=='credit') {{ 'selected' }} @endif >Credit</option>
										<option value="sales" @if(isset($request) && $request->type=='sales') {{ 'selected' }} @endif >Sales</option>
										<option value="partial" @if(isset($request) && $request->type=='partial') {{ 'selected' }} @endif >Partial</option>
										<option value="ME" @if(isset($request) && $request->type=='ME') {{ 'selected' }} @endif >ME Based</option>
										<option value="master" @if(isset($request) && $request->type=='master') {{ 'selected' }} @endif >ME Master</option>

									</select>
								</div>
							</div>
							<div class="col-md-2" id="me">
								<div class="form-group m-b-40">
									<label for="employee">ME</label>
									<input type="text" class="form-control" id="employee" name="employee"  required data-parsley-required-message="Please type ME" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-b-40">
									<label for="from">From</label>
									<input type="text" class="form-control" id="from" name="from"  required data-parsley-required-message="Please select date" value="{{ $request->from or date('d-m-Y')}}" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-b-40">
									<label for="to">To</label>
									<input type="text" class="form-control" id="to" name="to"  required  data-parsley-required-message="Please select date" value="{{ $request->to or date('d-m-Y')}}">
								</div>
							</div>
							<div class="col-md-1">
									<label>&nbsp;</label>
									<br>
									<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
							</div>

						</div>
{{-- 						<div class="row">
							<div class="col-lg-12 col-xlg-12 col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										
									</div>
								</div>
							</div>
						</div>
 --}}					</form>
				</div>
			</div>
		</div>
	</div>
@isset($reports)
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
				<h4 class="card-title">{{ucfirst($request->type)}} Report {{-- {{ $total_amount }} --}}</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									@if($request->type!="master")
									<th>Date</th>
									<th>Branch</th>
									<th>Bill Number</th>
									@endif


									@if($request->type=="ME" || $request->type=="master")
									<th>ME</th>
									@endif

									@if($request->type=="partial" || $request->type=="ME")
									<th>Payment Mode</th>
									@endif

									@if($request->type!="sales" && $request->type!="master")
									<th>Customer Name</th>
									@endif

									<th>Total Amount</th>

									@if($request->type!="charity" && $request->type!="sales") 

										@if( $request->type=="card" || $request->type=="both" || $request->type=="online" )
										<th>Transaction Number</th>
										@endif

										@if( $request->type!="cash" && $request->type!="credit" && $request->type!="partial"  && $request->type!="ME" && $request->type!="master")
										<th>Reference Number</th>									
										@endif

										@if($request->type=="cheque" && $request->type!="master")
										<th>Cheque Number</th>	
										@endif

										@if($request->type=="online" && $request->type!="master")
										<th>Account Number</th>
										@endif


										@if( $request->type=="both" && $request->type!="master")
										<th>Paid Amount(Card)</th>
										<th>Paid Amount(Cash)</th>
										@endif 

										@if($request->type!="credit")
										<th>Total Paid Amount</th>	
										@endif 

										@if($request->type=="master" || $request->type=="ME" || $request->type=="credit" || $request->type=="partial")
										<th>Balance Amount</th>
										@endif

									@endif

										@if( $request->type=="sales")
										<th>Product Quantity</th>
										@endif
										
								</tr>
							</thead>
							<tbody>
							@php $sl=1;
							$total_paid_amount=0;
							@endphp
							@foreach($reports as $reports)

										@php 
										if($request->type=="both")
											$total_paid_amount=$total_paid_amount + $reports->card_amount + $reports->paid_amount;
											
										elseif( $request->type=='charity' || $request->type=='credit' || $request->type=='sales')
											$total_paid_amount=$total_paid_amount + $reports->total_amount;

										elseif( $request->type=='master')
										{

											$total_amount = \DB::table('sales_orders')->where('sales_orders.me_code',$reports->me_code)
															->groupBy('me_code')
															->sum('total_amount');
											$total_paid_amount=$total_paid_amount  + $reports->card_amount + $reports->paid_amount;;				
										}
										else
											$total_paid_amount=$total_paid_amount + $reports->paid_amount;
										 @endphp

								<tr>
									<td>{{$sl++}}</td>
									@if($request->type!="master")

									<td>{{ date('d-m-Y',strtotime($reports->date))}}</td>

									<td>{{$reports->branch_name}}</td>

									<td>{{$reports->bill_number}}</td>
									@endif

									@if($request->type=="ME" || $request->type=="master")
									<td>{{$reports->me_code}}</td>
									@endif

									@if($request->type=="partial" || $request->type=="ME")
									<td>{{$reports->payment_mode}}@if($reports->status=="partial") {{'( Partial )'}}@endif</td>
									@endif

									@if($request->type!="sales" && $request->type!="master")
									<td>{{$reports->customer_name}}</td>
									@endif
									@if($request->type=="master")
									<td>{{$total_amount}}</td>
									@else
									<td>{{$reports->total_amount}}</td>
									@endif

									@if($request->type!="charity" && $request->type!="sales")

										@if( $request->type=="card" || $request->type=="both" || $request->type=="online" )
										<td>{{$reports->transaction_number}}</td>
										@endif

										@if($request->type!="cash" && $request->type!="credit"  && $request->type!="partial" && $request->type!="ME" && $request->type!="master")
										<td>{{$reports->reference_number}}</td>
										@endif

										@if($request->type=="cheque" && $request->type!="master")
										<td>{{$reports->cheque_number}}</td>	
										@endif


										@if($request->type=="online" && $request->type!="master")
										<td>{{$reports->account_number}}</td>
										@endif

										@if( $request->type=="both" && $request->type!="master")
										<td>{{$reports->card_amount}}</td>	
										<td>{{$reports->paid_amount}}</td>	
										@endif

										@if( $request->type!="both" && $request->type!="credit" && $request->type!="master")
										<td>{{$reports->paid_amount}}</td>
										@endif

										@if( $request->type=="both" || $request->type=="master")
										<td>{{$reports->card_amount + $reports->paid_amount}} </td>
										@endif


										
										@if($request->type=="master")
										<td>{{max($total_amount- ($reports->paid_amount + $reports->card_amount),0)}}</td>
										
										@elseif($request->type=="credit" || $request->type=="partial")
										<td>{{max($reports->total_amount-$total_paid_amount,0)}}</td>
										@elseif($request->type=="ME")
										<td>{{max($reports->balance,0)}}</td>	
										@endif

									@endif

										@if( $request->type=="sales")	
										<td>{{$reports->quantity}}</td>	
										@endif


								</tr>
							@endforeach

								<tr>
									@php
									if( $request->type=='cash')
										$col='6';
									if($request->type=='credit')
										$col='5';

									if( $request->type=='card')
										$col='8';

									if( $request->type=='both' || $request->type=='cheque'|| $request->type=='online')
										$col='10';

									if( $request->type=='online')
										$col='9';

									if( $request->type=='cheque')
										$col='8';

									if( $request->type=='charity')
										$col='5';
									if( $request->type=='sales')
										$col='4';
									if( $request->type=='partial')
										$col='7';
									if( $request->type=='ME')
										$col='8';
									if( $request->type=='master')
										$col='3';
									@endphp
									@if($request->type=='charity' || $request->type=='credit' || $request->type=='sales')
									<td colspan="{{$col}}" style="text-align:right;font-weight:bold;">Total Amount:</td>
									@else
									<td colspan="{{$col}}" style="text-align:right;font-weight:bold;">Total Paid Amount:</td>
									@endif
									<td style="font-weight:bold;">{{$total_paid_amount}}</td>
									@if( $request->type=='master' || $request->type=='credit' || $request->type=='sales' || $request->type=='partial' || $request->type=='ME')<td></td>@endif

								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endisset
</div>
@endsection
@section('jquery')
<script src="{{ URL::asset('js/report.js')}}"></script>
<script type="text/javascript">
      $(document).ready(function()
      {
      	$("#me").attr('required',false).hide();
      	$('#type').on('change', function() 
      {
      if ( this.value == 'ME')
      {
        $("#me").show();
        $('#employee').attr('required',true);       
      }
      else
      {    	
        $("#me").hide();
        $('#employee').attr('required',false);      
      }
       
    });
});
      $("#from").datepicker({format:'dd-mm-yyyy',autoclose: true});

$("#to").datepicker({format:'dd-mm-yyyy',autoclose: true});
</script>
@endsection