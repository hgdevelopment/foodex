<?php
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
			$f_date=date('Y-m-d',strtotime($fdate));
			$t_date=date('Y-m-d',strtotime($tdate));

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		table {
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

<img src="<?php echo e(URL::to('/').'/img/logo.png'); ?>" style="height: 35px">
<div>
<h2 style="margin: auto" align="center">Stock Report <?php echo e($fdate); ?> To <?php echo e($tdate); ?></h2>
<br>
</div>
	<table border="1" cellspacing="5" cellpadding="5" style="font-size: 14px">
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
		<?php
			
			$user=Auth('admin')->user();
			 $products=Product::where('added_branch',$user->branch)->orderBy('id','ASC')->get();
			$i=1;
		?>

			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<?php

				$opening_product_qty  =	  Purchase_product::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');

				$opening_sales_qty    =  Sales_product::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','<',$f_date)
										->whereIn('status',['0','1','2'])
										->sum('product_qty');

				$opening_damage_qty   =   damagedproduct::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');

				$opening_transfer_qty =   Transfer_confirm_product::where('product_id',$product->id)
										->where('from_branch',$user->branch)
										->whereDate('created_at','<',$f_date)
										->sum('product_qty');


				$opening_stock=max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);	


				$received_qty  		 =	  Purchase_product::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');


				$sold_qty    		  =  Sales_product::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->whereIn('status',['0','1','2'])
										->sum('product_qty');

				$damaged_qty   		  =   damagedproduct::where('product_id',$product->id)
										->where('branch_id',$user->branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');

				$transfer_qty 		  =   Transfer_confirm_product::where('product_id',$product->id)
										->where('from_branch',$user->branch)
										->whereDate('created_at','>=',$f_date)
										->whereDate('created_at','<=',$t_date)
										->sum('product_qty');

				$closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

				// if($opening_stock==0 && $received_qty==0 && $sold_qty==0 && $damaged_qty==0 && $closing_stock==0)
					// continue;
			?>
			<tr>
			<td><?php echo e($i); ?></td>

			<td align="left" style="padding-right: 10px"><?php echo e($product->product_name); ?></td>

			<td align="left" style="padding-right: 10px"><?php echo e($product->product_number); ?></td>

			<td align="center"><?php echo e($product->unit->unit_name); ?></td>

			<td align="right" style="padding-right: 10px"><?php echo e($opening_stock); ?></td>

			<td align="right" style="padding-right: 10px"><?php echo e($received_qty); ?></td>

			<td align="right" style="padding-right: 10px"><?php echo e($sold_qty); ?></td>

			<td align="right" style="padding-right: 10px"><?php echo e($damaged_qty); ?></td>

			<td align="right" style="padding-right: 10px"><?php echo e($closing_stock); ?></td>

			</tr>
			<?php $i++; 
			$closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;
			?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</tbody>	
	</table>
</div>
</body>
</html>



