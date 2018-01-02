@php
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase_order;
use App\Purchase_product;
use App\Sales_product;
use App\damagedproduct;
use App\Transfer_confirm_product;
use App\Unit;
use App\Brand;
use Carbon\Carbon;
use App\branch;
$branches = branch::all();
@endphp

@extends('admin.layout.puredrops')
@section('sidebar')
	@include('admin.partial.header')
	@include('admin.partial.aside')
@endsection

@section('body')
<style type="text/css">
	@-webkit-keyframes blinker 
	{
    from {opacity: 1.0;}
    to {opacity: 0.0;}
    }
	.blink{
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.6s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}
/*table.dataTable tr:nth-child(3n+0)  { background-color: green;  }*/
</style>
<div class="container-fluid">

	<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center"> <h2 class="text-themecolor m-b-0 m-t-0">Product Wise Stock Report</h2> </div>
	</div>

	<div class="container-fluid">
		<form id="form" method="post" action="{{URL::to('/') }}/admin/stockReport" data-parsley-validate="" > 
		<input type="hidden" name="report" value="productwiseReport">
		<input type="hidden" name="print" id="print">
		{{ csrf_field() }}

		<div id="printDiv"> </div>

			<div class="col-lg-12">
				<div class="row">

				@if(Auth::guard('admin')->user()->userType=='OI' || Auth::guard('admin')->user()->userType=='VN')
				
				<label  class="control-label text-right ">Branch :</label>
				<div class="col-lg-2">
					<select class="form-control chosen-select" id="branch" required name="branch" style="width: 100%" onchange="getProducts()" required data-parsley-required-message="Select Branch">

					<option value="">Select Branch</option>
					@foreach ($branches as $branches)
					<option value="{{ $branches->id}}" @if(isset($branch) && $branch==$branches->id) {{ 'selected' }} @endif>{{ $branches->branch_name }}</option>
					@endforeach

					</select>
				</div>

				@else
				<input type="hidden" id="branch"  name="branch" value="{{Auth::guard('admin')->user()->branch}}">
				@endif

					<label class="control-label text-right ">Product</label>

					<div class="col-lg-2">
					@php
					
					@endphp
						<select id="product" name="product[]" class="form-control chosen-select" multiple="" required data-parsley-required-message="Select Products">
						</select>

					</div>

					<label class="control-label text-right ">From :</label>

					<div class="col-lg-1">
					<input type="text"  value="{{ $fdate or date('d-m-Y')}}" name="fdate" id="fdate" class="form-control" readonly>  
					</div>

					<label class="control-label text-right ">To : </label>

					<div class="col-lg-1">
					<input type="text"  value="{{ $tdate or date('d-m-Y')}}" name="tdate" id="tdate" class="form-control" readonly>  
					</div>

					<div class="col-md-1">
					<button type="submit" class="btn btn-primary shake animated"><i class="fa fa-check"></i> Search</button>
					</div>

					<div class="col-md-1 shake animated">
					<button type="button" onclick="print_product_stock_report('print')" class="btn btn-danger"><i class="mdi mdi-printer-settings"></i> Print</button>
					</div>
					
					<div class="col-md-1 shake animated">
					<button type="button" onclick="print_product_stock_report('excel')" class="btn btn-success"><i class="mdi mdi-file-excel"></i> Excel</button>
					</div>
				</div>
			</div>	
		</form>		
	</div>		


	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-block">
						
						<div class="table-responsive">
							<table id="table" class="table table-hover table-striped table-bordered" >
		{{-- ************Product Wise Report*****************   --}}
		{{-- ************************************************** --}}
							<thead>
							<tr>
							<th>Sl No</th>
							<th>Product name</th>
							<th>Product code</th>
							<th>Unit</th>
							<th>Opening stock</th>
							<th>Receive qty</th>
							<th>Item Sold</th>
							<th>Damaged</th>
							<th>Closing stock</th>
							</tr>									
							</thead>

							@if(isset($fdate) && isset($tdate))
							<tbody>
							@php
							$f_date=date('Y-m-d',strtotime($fdate));
							$t_date=date('Y-m-d',strtotime($tdate));
							$user=Auth('admin')->user();

													// DB::connection()->enableQueryLog();
							$products=Product::where('added_branch',$branch)->whereIn('id',$productIds)->orderBy('id','ASC')->get();
																								        // $queries = DB::getQueryLog();
																								        //  var_dump($queries);        
								class Testclass
								{
								    public function opening_product($product_id,$branch,$f_date) 	{ 

									return $opening_product      	= Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
																								->whereDate('created_at','<',$f_date);
								    }

								    public function opening_sales($product_id,$branch,$f_date) 		{ 

									return $opening_sales       	= Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
																								->whereDate('created_at','<',$f_date)
																								->whereIn('status',['0','1','2']);
									}
								    public function opening_damage($product_id,$branch,$f_date) 	{ 

									return $opening_damage       	= 	damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
											 													->whereDate('created_at','<',$f_date);
									}
								    public function opening_transfer($product_id,$branch,$f_date) 	{ 

									return $opening_transfer     	=  Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
																		    					->whereDate('created_at','<',$f_date);
									}
								    public function received($product_id,$branch,$f_date,$t_date) 	{ 

									return $received    		  	=	  Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}

								    public function sold($product_id,$branch,$f_date,$t_date) 		{ 
									return $sold       		  		=  Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date)
																		  						->whereIn('status',['0','1','2']);
									}

								    public function damaged($product_id,$branch,$f_date,$t_date) 	{ 
									return $damaged    		  		=   damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}
								    public function transfer($product_id,$branch,$f_date,$t_date) 	{ 

									return $transfer   		  		=   Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
																		 						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}
								}

									$i=1;
							@endphp

							@foreach($products as $product)

							@php
									$MainQuery=new Testclass();


									$opening_product_qty  =   $MainQuery->opening_product($product->id,$branch,$f_date)->sum('product_qty');

									$opening_sales_qty    =   $MainQuery->opening_sales($product->id,$branch,$f_date)->sum('product_qty');

									$opening_damage_qty   =   $MainQuery->opening_damage($product->id,$branch,$f_date)->sum('product_qty');

									$opening_transfer_qty =   $MainQuery->opening_transfer($product->id,$branch,$f_date)->sum('product_qty');


									$opening_stock=max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);	


									$received_qty		  =   $MainQuery->received($product->id,$branch,$f_date,$t_date)->sum('product_qty');

									$sold_qty 		 	  =   $MainQuery->sold($product->id,$branch,$f_date,$t_date)->sum('product_qty');

									$damaged_qty 		  =   $MainQuery->damaged($product->id,$branch,$f_date,$t_date)->sum('product_qty');

									$transfer_qty 		  =   $MainQuery->transfer($product->id,$branch,$f_date,$t_date)->sum('product_qty');

									$closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

							@endphp
									<tr>
									<td>{{ $i }} <span class="blink"><i class="mdi mdi-cart-plus float-right text-danger h5" style="cursor: pointer;" onclick="showBatches({{ $i }})"></i></span></td>

									<td>{{ $product->product_name }}</td>

									<td>{{ $product->product_number }}</td>

									<td>{{ $product->unit->unit_name }}</td>

									<td>{{ $opening_stock }}</td>

									<td>{{ $received_qty }}</td>

									<td>{{ $sold_qty }}</td>

									<td>{{ $damaged_qty }}</td>

									<td>{{ $closing_stock }}</td>

									</tr>

		<tr class="showBatches" id="showBatches{{ $i }}" style="display: none;">

		{{-- Batch Number wise Report based on that Prduct Id   --}}
		{{-- ************************************************** --}}

		<td colspan="9" >
		<div style="float: left;background: white;font-size: 26px;color: #e67373;"><i class="fa fa-window-close " style="cursor: pointer;" onclick="hideBatches({{ $i }})"></i>
			</div>
		<table  style="float: left"> 
		<thead>
		<th>Batch No</th>
        <th>Opening stock</th>
        <th>Item Sold</th>
        <th>Damaged</th>
        <th>Closing stock</th>
		</thead>
		@php
		$batchs=Purchase_product::join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')->where('purchase_products.product_id',$product->id)->orderBy('purchase_products.order_id','ASC')->get();
		$os=$is=$dm=$cs=0;
		@endphp
		<tbody>
		@foreach($batchs as $batch)

		@php 
			$BatchQuery=new Testclass();

			$batch_product_qty		 =	  $BatchQuery->opening_product($product->id,$branch,$f_date)->where('order_id',$batch->id)->sum('product_qty');

			$batch_sales_qty    	 =	  $BatchQuery->opening_sales($product->id,$branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_damage_qty   	 =	  $BatchQuery->opening_damage($product->id,$branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_transfer_qty 	 =	  $BatchQuery->opening_transfer($product->id,$branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');


			$batch_opening_stock=max($batch_product_qty-($batch_sales_qty+$batch_damage_qty+$batch_transfer_qty),0);	


			$batch_received_qty		  =   $BatchQuery->received($product->id,$branch,$f_date,$t_date)->where('order_id',$batch->id)->sum('product_qty');

			$batch_sold_qty 		  =   $BatchQuery->sold($product->id,$branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_damaged_qty 		  =   $BatchQuery->damaged($product->id,$branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_transfer_qty 	  =   $BatchQuery->transfer($product->id,$branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_closing_stock=max(($batch_opening_stock + $batch_received_qty)-($batch_sold_qty + $batch_damaged_qty + $batch_transfer_qty),0);


			if($batch_opening_stock=='0' && $batch_sold_qty=='0' && $batch_damaged_qty=='0' && $batch_closing_stock=='0')
				continue;

			@endphp
			<tr style="border: 0px !important">	
			<td>{{ $batch->purchase_no }}</td>

			<td>{{ $batch_opening_stock or 0 }}</td>

			<td>{{ $batch_sold_qty}}</td>

			<td>{{ $batch_damaged_qty }}</td>

			<td>{{ $batch_closing_stock }}</td>
			</tr>
			@php
			$os+=$batch_opening_stock;
			$is+=$batch_sold_qty;
			$dm+=$batch_damaged_qty;
			$cs+=$batch_closing_stock;
			$batch_product_qty=$batch_sales_qty=$batch_damage_qty==$batch_transfer_qty=$batch_opening_stock=$batch_received_qty=$batch_sold_qty=$batch_damaged_qty=$batch_transfer_qty=$batch_closing_stock=0;
			@endphp
			@endforeach
			<tr>
			<td><b>Total</b></td>
			<td align="text-right"><b>{{ $os }}</b></td>
			<td align="text-right"><b>{{ $is }}</b></td>
			<td align="text-right"><b>{{ $dm }}</b></td>
			<td align="text-right"><b>{{ $cs }}</b></td>
			</tr>
			</tbody>
			</table>
			</td>
		</tr>
							@php $i++; 
							$closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;
							@endphp

							@endforeach

							</tbody>	
							@endif
							</table>
						</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>
<input type="hidden" id="link" value="{{URL::to('/') }}/admin/stockReport">

@endsection

@section('jquery')
<script type="text/javascript">

getProducts();


$('.chosen-select').chosen();

$('.default').val('Select Products');

$("#fdate").datepicker({format:'dd-mm-yyyy',autoclose: true});

$("#tdate").datepicker({format:'dd-mm-yyyy',autoclose: true});

$('#table').DataTable({"search": true, "paginate":false});

$('.showBatches').hide();

function showBatches(id)
{
$('.showBatches').hide();
$('#showBatches'+id).show();
}

function hideBatches(id)
{
$('#showBatches'+id).hide();
}



function getProducts()
{
	var productIds='<?php if(isset($productIds)) echo $s=implode(",",$productIds); else echo '0'; ?>';

		productIds = productIds.split(",");
		console.log(productIds);

      for(var i in productIds){
      	console.log(productIds[i]);
      }
	var branch=$('#branch').val();
	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/admin/stockReport/create",
	data:{branch:branch},
	success: function (data) 
		{	
			$('#product').html('').trigger("chosen:updated");
			for (var i=0;i<data.length;i++)
			{
				var s='';
				if(jQuery.inArray(data[i].id+"", productIds) !== -1)
				 	var s='selected';

				$('#product').append('<option value="'+data[i].id+'" '+s+' >'+data[i].product_name+'</option>');
				 	
			}
			$('#product').trigger("chosen:updated")
		}
	});
}



function print_product_stock_report(print){

	$('#printDiv').html('<input name="_method" value="PUT" type="hidden">');
	if(print=='print')
		$('#print').val('print');
	else
		$('#print').val('excel');

	var link=$('#link').val();

	$('#form').attr('action',link+'/print').attr('target', '_blank').submit();

	$('#form').attr('action',link).attr('target', '');
	
	$('#printDiv').html('');

}

</script>
@endsection