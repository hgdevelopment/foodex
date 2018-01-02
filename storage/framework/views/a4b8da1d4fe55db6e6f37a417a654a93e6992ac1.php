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


<?php $__env->startSection('body'); ?>

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Stock Report</h2>
		</div>
	</div>
	<form method="post" action="<?php echo e(URL::to('/')); ?>/admin/stockReport" data-parsley-validate="" > 
	<input type="hidden" name="report" value="stockReport">
	<?php echo e(csrf_field()); ?>

		<div class="container-fluid">
			<div class="col-lg-12">
			<div class="row bounce animated">
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
				<div class="col-md-1">
				<button type="button" onclick="print_stock_report()" class="btn btn-danger"><i class="fa fa-check"></i> Print</button>
				</div>
			</div>
		</div>	
		</div>		
	</form>

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
								<tbody>
								<?php
									$f_date=date('Y-m-d',strtotime($fdate));
									$t_date=date('Y-m-d',strtotime($tdate));
									
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

									?>
									<tr>
									<td><?php echo e($i); ?></td>

									<td><?php echo e($product->product_name); ?></td>

									<td><?php echo e($product->product_number); ?></td>

									<td><?php echo e($product->unit->unit_name); ?></td>

									<td><?php echo e($opening_stock); ?></td>

									<td><?php echo e($received_qty); ?></td>

									<td><?php echo e($sold_qty); ?></td>

									<td><?php echo e($damaged_qty); ?></td>

									<td><?php echo e($closing_stock); ?></td>

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
<input type="hidden" id="link" value="<?php echo e(URL::to('/')); ?>/admin/stockReport/print_stock_report/">
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
$("#fdate").datepicker({format:'dd-mm-yyyy',autoclose: true});
$("#tdate").datepicker({format:'dd-mm-yyyy',autoclose: true});
$('#table').DataTable({
  "search": true,
  "paginate":false
});


function print_stock_report(){
var link=$('#link').val();
var fdate=$('#fdate').val();
var tdate=$('#tdate').val();

	window.open(link+fdate+'&'+tdate);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>