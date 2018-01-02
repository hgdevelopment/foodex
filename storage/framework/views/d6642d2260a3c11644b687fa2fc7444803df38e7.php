<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Stocks</h2>
		</div>
	</div>
	<form method="post" action="#" id="purchase_order_form"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							<div class="table-responsive">
								<table id="stocklist" class="table table-hover table-striped table-bordered" >
									<thead>
										<tr>
											<th>Product No</th>
											<th>Name</th>
											<th>Basic Cost</th>
											<th>Discount</th>
											<th>GST</th>
											<th>Billing Price</th>
											<th>Quantity</th>
										</tr>
									</thead>
								<tbody>
								<?php

									   $branch 	=	Auth::guard('admin')->user()->branch;

									 $products=DB::table('products')->where('added_branch',$branch)->orderBy('id','ASC')->get();
									 $i=1;
								?>

									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php

										$received_qty  		 =	 DB::table('purchase_products')->where('product_id',$product->id)
																->where('branch_id',$branch)
																->sum('product_qty');


										$sold_qty    		  =  DB::table('sales_products')->where('product_id',$product->id)
																->where('branch_id',$branch)
																->whereIn('status',['0','1','2'])
																->sum('product_qty');

										$damaged_qty   		  =   DB::table('damage_products')->where('product_id',$product->id)
																->where('branch_id',$branch)
																->sum('product_qty');

										$transfer_qty 		  =   DB::table('transfer_confirm_products')->where('product_id',$product->id)
																->where('from_branch',$branch)
																->sum('product_qty');

										$closing_stock=max(($received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

									?>
									<tr>

									<td><?php echo e($product->product_number); ?></td>

									<td><?php echo e($product->product_name); ?></td>

									<td><?php echo e($product->basic_cost); ?></td>
									<td><?php echo e($product->product_discount); ?></td>

									<td><?php echo e($product->product_gst); ?></td>

									<td><?php echo e($product->billing_price); ?></td>

									<td><?php echo e($closing_stock); ?></td>

									</tr>
									<?php $i++; 
									$closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;
									?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</tbody>	
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
                $(function(){
        $('#stocklist').DataTable({
        	 dom: 'Bfrtip',
        	 buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        });
    });
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>