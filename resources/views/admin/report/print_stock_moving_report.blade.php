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

	<p style="margin: auto" align="center"><b>Stock Moving Report - {{ $address->branch_name }}</b> &nbsp;&nbsp;{{ $fdate }} <b>To</b> {{ $tdate }} </p>

<div style="clear: both;">&nbsp;</div>

	<table border="1" cellspacing="5" cellpadding="5"  align="center">
	<thead>
	<tr>
	<th>Sl No</th>
	<th>Product name</th>
	<th>Product code</th>
	<th>Unit</th>
	<th>Sold Quantity</th>
	</tr>									
	</thead>
    @if(isset($fdate) && isset($tdate))
			<tbody>
			@php
			$f_date=date('Y-m-d',strtotime($fdate));
			$t_date=date('Y-m-d',strtotime($tdate));
									
			$sales_qty = DB::table('sales_products')
						->selectRaw('product_id, SUM(product_qty) as sold_qty')
						->where('branch_id',$branch)
						->whereDate('updated_at','>=',$f_date)
				 		->whereDate('updated_at','<=',$t_date)
				 		->whereIn('status',['2'])
				 		->groupBy('product_id')
				 		->OrderBy('sold_qty','desc')
				 		->get();
			$i=1;
			@endphp

			@foreach($sales_qty as $sales_qty)

			@php
			 $product=Product::where('id',$sales_qty->product_id)->where('added_branch',$branch)->first();
			@endphp

			<tr>
			<td align="center">{{ $i }}</td>

			<td align="left" style="padding-left: 10px">{{ $product->product_name}}</td>

			<td align="left" style="padding-left: 10px">{{ $product->product_number}}</td>

			<td align="center" style="padding:0px 10px"> {{ $product->unit->unit_name}}</td>

			<td align="right" style="padding-right: 10px">{{ $sales_qty->sold_qty or 0 }}</td>



			</tr>
			@php $i++; $sales_qty='';
			@endphp

			@endforeach

		</tbody>	
	@endif
	</table>

</div>
</body>
@section('jquery')

<script type="text/javascript">

$('#table').DataTable({ "order": [[ 4, "desc" ]]});

</script>
@endsection
</html>



