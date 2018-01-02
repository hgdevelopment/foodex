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


$f_date=date('Y-m-d',strtotime($fdate));
$t_date=date('Y-m-d',strtotime($tdate));

$address = branch::find($branch);

@endphp
<!DOCTYPE html>
<html>
<head>

	<title></title>

	<style type="text/css">
	table 
	{
	border-collapse: collapse;
	border:1px solid ;
	}
	</style>

	<script type="text/javascript">
	window.print();
	</script>

</head>
<body>
<div style="margin: auto;">
	<div>
		<img src="{{ URL::to('/').'/img/logonew.png' }}" style="height: 70px;width: 25%; float: left;">
	</div>
	<div style="clear: both;">&nbsp;</div>

	<p style="margin: auto" align="center"><b>Stock Transfer Report - {{ $address->branch_name }}</b> &nbsp;&nbsp;{{ $fdate }} <b>To</b> {{ $tdate }} </p>

<div style="clear: both;">&nbsp;</div>

	<table border="1" cellspacing="5" cellpadding="5" style="font-size: 14px" width="100%">
	<thead>
	<tr style="background: #e1e1e1;">
	<th>Sl No</th>
	<th>Date</th>
	<th>Product name</th>
	<th>Product code</th>
	<th>To Branch</th>
	<th>Transfer qty</th>
    </tr>									
    </thead>
	<tbody>
	@php
			

	$products=Product::join('transfer_confirm_products','transfer_confirm_products.product_id','=','products.id')->where('products.added_branch',$branch)->get();
	
	$i=1;
	@endphp



	@foreach($products as $product)
	@php
	$transfer_qty = DB::table('transfer_confirm_products')
				->where('product_id',$product->id)
				->where('from_branch',$branch)
				->whereDate('updated_at','>=',$f_date)
		 		->whereDate('updated_at','<=',$t_date)
		 		->sum('product_qty');

	// $inward_qty =Purchase_product::leftJoin('purchase_orders','purchase_orders.id','=','purchase_products.order_id')
	// 			->where('purchase_products.product_id',$product->id)
	// 			->where('purchase_products.branch_id',$branch)
	// 			->where('purchase_orders.stock_status','transfer')
	// 			->whereDate('purchase_products.created_at','>=',$f_date)
	// 			->whereDate('purchase_products.created_at','<=',$t_date)



				// ->sum('purchase_products.product_qty');
	if($transfer_qty==0)
		continue;
	@endphp
			<tr>
			<td>{{ $i }}</td>

			<td  style="padding-right: 10px">{{ date('d-m-Y',strtotime($product->updated_at)) }}</td>

			<td align="left" style="padding-right: 10px">{{ $product->product_name }}</td>

			<td align="left" style="padding-right: 10px">{{ $product->product_number }}</td>


			<td align="right" style="padding-right: 10px">{{ $products->to_branch }}</td>

			<td align="right" style="padding-right: 10px">{{ $transfer_qty }}</td>



			</tr>
			@php 
			$i++; 
			@endphp

			@endforeach

		</tbody>	
	</table>
</div>
</body>
</html>



