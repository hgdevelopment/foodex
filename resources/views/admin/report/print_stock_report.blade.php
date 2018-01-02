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
use App\branch;
use Carbon\Carbon;

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

	<p style="margin: auto" align="center"><b>Stock Report - {{ $address->branch_name }}</b> &nbsp;&nbsp;{{ $fdate }} <b>To</b> {{ $tdate }} </p>

<div style="clear: both;">&nbsp;</div>

	<table border="1" cellspacing="5" cellpadding="5" style="font-size: 14px" width="100%">
	<thead>
	<tr style="background: #e1e1e1;">
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
	<tbody>
	@php
			
			
	$products=Product::where('added_branch',$branch)->orderBy('id','ASC')->get();
	$i=1;
	@endphp

			@foreach($products as $product)

			@php

				$opening_product_qty  =	  Purchase_product::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');

				$opening_sales_qty    =  Sales_product::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','<',$f_date)
										->whereIn('status',['0','1','2'])
										->sum('product_qty');

				$opening_damage_qty   =   damagedproduct::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');

				$opening_transfer_qty =   Transfer_confirm_product::where('product_id',$product->id)
										->where('from_branch',$branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');


				$opening_stock=max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);	


				$received_qty  		  =	  Purchase_product::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');


				$sold_qty    		  =  Sales_product::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->whereIn('status',['0','1','2'])
										->sum('product_qty');

				$damaged_qty   		  =   damagedproduct::where('product_id',$product->id)
										->where('branch_id',$branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');

				$transfer_qty 		  =   Transfer_confirm_product::where('product_id',$product->id)
										->where('from_branch',$branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');

				$closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

				// if($opening_stock==0 && $received_qty==0 && $sold_qty==0 && $damaged_qty==0 && $closing_stock==0)
					// continue;
			@endphp
			<tr>
			<td>{{ $i }}</td>

			<td align="left" style="padding-right: 10px">{{ $product->product_name }}</td>

			<td align="left" style="padding-right: 10px">{{ $product->product_number }}</td>

			<td align="center">{{ $product->unit->unit_name }}</td>

			<td align="right" style="padding-right: 10px">{{ $opening_stock }}</td>

			<td align="right" style="padding-right: 10px">{{ $received_qty }}</td>

			<td align="right" style="padding-right: 10px">{{ $sold_qty }}</td>

			<td align="right" style="padding-right: 10px">{{ $damaged_qty }}</td>

			<td align="right" style="padding-right: 10px">{{ $closing_stock }}</td>

			</tr>
			@php $i++; 
			$closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;
			@endphp

			@endforeach

		</tbody>	
	</table>
</div>
</body>
</html>



