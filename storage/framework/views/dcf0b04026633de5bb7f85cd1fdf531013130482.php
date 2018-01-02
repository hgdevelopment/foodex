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
?>


<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<style type="text/css">
	@-webkit-keyframes blinker {
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
<?php $__env->startSection('body'); ?>

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Product wise Stock Report</h2>
		</div>
	</div>

	<div class="container-fluid">
		<form method="post" action="<?php echo e(URL::to('/')); ?>/admin/stockReport" data-parsley-validate="" > 
		<input type="hidden" name="report" value="productwiseReport">
		<?php echo e(csrf_field()); ?>

			<div class="col-lg-12">
				<div class="row">

					<label class="control-label text-right ">Product</label>
					<div class="col-lg-2">
						<select id="product" name="product[]" class="form-control chosen-select" multiple="" required data-parsley-required-message="Select Products">
						<?php
							$user=Auth('admin')->user();
							 $products=Product::where('added_branch',$user->branch)->orderBy('id','ASC')->get();
							 $productIds[]='';
						?>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($product->id); ?>" <?php if(in_array($product->id ,$productIds)): ?> <?php echo e('selected'); ?><?php endif; ?>><?php echo e($product->product_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>

					<label class="control-label text-right ">From :</label>
					<div class="col-lg-2">
						<input type="text"  value="<?php echo e(isset($fdate) ? $fdate : date('d-m-Y')); ?>" name="fdate" id="fdate" class="form-control" readonly>  
					</div>

					<label class="control-label text-right ">To : </label>
					<div class="col-lg-2">
						<input type="text"  value="<?php echo e(isset($tdate) ? $tdate : date('d-m-Y')); ?>" name="tdate" id="tdate" class="form-control" readonly>  
					</div>
					<div class="col-md-1">
					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Search</button>
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
		
		
								<thead>
									<tr>
										<th>Sl No</th>
                                        <th>Product name</th>
                                        <th>Product code</th>
                                        <th>Unit</th>
                                        <th>Opening stock</th>
                                        <th><span class="text-primary">( <?php echo e(isset($fdate) ? $fdate : 'From Date'); ?> </span> <br>Receive qty</th>
                                        <th><span class="text-primary"> to </span><br>Item Sold</th>
                                        <th><span class="text-primary"> <?php echo e(isset($tdate) ? $tdate : 'To Date'); ?> )</span> <br>Damaged</th>
                                        <th>Closing stock</th>
                                    </tr>									
                                </thead>
                                <?php if(isset($fdate) && isset($tdate)): ?>
								<tbody class="shake animated">
								<?php
									$f_date=date('Y-m-d',strtotime($fdate));
									$t_date=date('Y-m-d',strtotime($tdate));
									$user=Auth('admin')->user();

        																							// DB::connection()->enableQueryLog();
									$products=Product::where('added_branch',$user->branch)->whereIn('id',$productIds)->orderBy('id','ASC')->get();
																								        // $queries = DB::getQueryLog();
																								        //  var_dump($queries);        
								class Testclass
								{
								    public function opening_product($product_id,$branch,$f_date) { 

										return $opening_product      = Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
																								->whereDate('created_at','<',$f_date);
								    }

								    public function opening_sales($product_id,$branch,$f_date) { 

										return $opening_sales        = Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
																								->whereDate('created_at','<',$f_date)
																								->whereIn('status',['0','1','2']);
									}
								    public function opening_damage($product_id,$branch,$f_date) { 


										return $opening_damage       = damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
											 														->whereDate('created_at','<',$f_date);
									}
								    public function opening_transfer($product_id,$branch,$f_date) { 

										return $opening_transfer     =  Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
																		    					->whereDate('created_at','<',$f_date);
									}
								    public function received($product_id,$branch,$f_date,$t_date) { 

										return $received    		  =	  Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}

								    public function sold($product_id,$branch,$f_date,$t_date) { 
										return $sold       		  =  Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date)
																		  						->whereIn('status',['0','1','2']);
									}

								    public function damaged($product_id,$branch,$f_date,$t_date) { 
										return $damaged    		  =   damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
																		  						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}
								    public function transfer($product_id,$branch,$f_date,$t_date) { 

										return $transfer   		  =   Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
																		 						->whereDate('created_at','>=',$f_date)
																		  						->whereDate('created_at','<=',$t_date);
									}
								}

									$i=1;
								?>
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<?php
										$MainQuery=new Testclass();


										$opening_product_qty  =   $MainQuery->opening_product($product->id,$user->branch,$f_date)->sum('product_qty');

										$opening_sales_qty    =   $MainQuery->opening_sales($product->id,$user->branch,$f_date)->sum('product_qty');

										$opening_damage_qty   =   $MainQuery->opening_damage($product->id,$user->branch,$f_date)->sum('product_qty');

										$opening_transfer_qty =   $MainQuery->opening_transfer($product->id,$user->branch,$f_date)->sum('product_qty');


										$opening_stock=max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);	


										$received_qty		  =   $MainQuery->received($product->id,$user->branch,$f_date,$t_date)->sum('product_qty');

										$sold_qty 		 	  =   $MainQuery->sold($product->id,$user->branch,$f_date,$t_date)->sum('product_qty');

										$damaged_qty 		  =   $MainQuery->damaged($product->id,$user->branch,$f_date,$t_date)->sum('product_qty');

										$transfer_qty 		  =   $MainQuery->transfer($product->id,$user->branch,$f_date,$t_date)->sum('product_qty');

										$closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

									?>
									<tr>
									<td><?php echo e($i); ?> <span class="blink"><i class="mdi mdi-cart-plus float-right text-danger h5" style="cursor: pointer;" onclick="showBatches(<?php echo e($i); ?>)"></i></span></td>

									<td><?php echo e($product->product_name); ?></td>

									<td><?php echo e($product->product_number); ?></td>

									<td><?php echo e($product->unit->unit_name); ?></td>

									<td><?php echo e($opening_stock); ?></td>

									<td><?php echo e($received_qty); ?></td>

									<td><?php echo e($sold_qty); ?></td>

									<td><?php echo e($damaged_qty); ?></td>

									<td><?php echo e($closing_stock); ?></td>

									</tr>

	<tr class="showBatches" id="showBatches<?php echo e($i); ?>" style="display: none;">

		
		

		<td colspan="9" >
		<div style="float: left;background: white;font-size: 26px;color: red;"><i class="fa fa-window-close " style="cursor: pointer;" onclick="hideBatches(<?php echo e($i); ?>)"></i>
			</div>
		<table  style="float: left"> 
		<thead>
		<th>Batch No</th>
        <th>Opening stock</th>
        <th>Item Sold</th>
        <th>Damaged</th>
        <th>Closing stock</th>
		</thead>
			<?php
			$batchs=Purchase_product::join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')->where('purchase_products.product_id',$product->id)->orderBy('purchase_products.order_id','ASC')->get();
			$os=$is=$dm=$cs=0;
			?>
		<tbody>
		<?php $__currentLoopData = $batchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php 
			$BatchQuery=new Testclass();

			$batch_product_qty	=	  $BatchQuery->opening_product($product->id,$user->branch,$f_date)->where('order_id',$batch->id)->sum('product_qty');

			$batch_sales_qty    =	  $BatchQuery->opening_sales($product->id,$user->branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_damage_qty   =	  $BatchQuery->opening_damage($product->id,$user->branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_transfer_qty =	  $BatchQuery->opening_transfer($product->id,$user->branch,$f_date)->where('batch_id',$batch->id)->sum('product_qty');


			$batch_opening_stock=max($batch_product_qty-($batch_sales_qty+$batch_damage_qty+$batch_transfer_qty),0);	


			$batch_received_qty		  =   $BatchQuery->received($product->id,$user->branch,$f_date,$t_date)->where('order_id',$batch->id)->sum('product_qty');

			$batch_sold_qty 		  =   $BatchQuery->sold($product->id,$user->branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_damaged_qty 		  =   $BatchQuery->damaged($product->id,$user->branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_transfer_qty 	  =   $BatchQuery->transfer($product->id,$user->branch,$f_date,$t_date)->where('batch_id',$batch->id)->sum('product_qty');

			$batch_closing_stock=max(($batch_opening_stock + $batch_received_qty)-($batch_sold_qty + $batch_damaged_qty + $batch_transfer_qty),0);




			?>
			<tr style="border: 0px !important">	
			<td><?php echo e($batch->purchase_no); ?></td>

			<td><?php echo e(isset($batch_opening_stock) ? $batch_opening_stock : 0); ?></td>

			<td><?php echo e($batch_sold_qty); ?></td>

			<td><?php echo e($batch_damaged_qty); ?></td>

			<td><?php echo e($batch_closing_stock); ?></td>
			</tr>
			<?php
				$os+=$batch_opening_stock;
				$is+=$batch_sold_qty;
				$dm+=$batch_damaged_qty;
				$cs+=$batch_closing_stock;
				$batch_product_qty=$batch_sales_qty=$batch_damage_qty==$batch_transfer_qty=$batch_opening_stock=$batch_received_qty=$batch_sold_qty=$batch_damaged_qty=$batch_transfer_qty=$batch_closing_stock=0;
			?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td>Total</td>
				<td align="text-right"><?php echo e($os); ?></td>
				<td align="text-right"><?php echo e($is); ?></td>
				<td align="text-right"><?php echo e($dm); ?></td>
				<td align="text-right"><?php echo e($cs); ?></td>
			</tr>
			</tbody>
			</table>
			
			
			</td>

		</tr>

									<?php $i++; 
									$closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;
									?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</tbody>	
								<?php endif; ?>
							</table>
						</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
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

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>