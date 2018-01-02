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
use App\branch;
$branches = branch::all();
?>


<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<div class="container-fluid">

	<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center"> <h2 class="text-themecolor m-b-0 m-t-0">Stock Moving Report</h2> </div>
	</div>

	<form  id="form" method="post" data-parsley-validate="" action="<?php echo e(URL::to('/')); ?>/admin/stockReport"> 
	<input type="hidden" name="report" value="stockMovingReport">
	<input type="hidden" name="print" id="print">
	<?php echo e(csrf_field()); ?>


	<div id="printDiv"> </div>

		<div class="container-fluid">
			<div class="col-lg-12">
			<div class="row">

				<?php if(Auth::guard('admin')->user()->branch=='0'): ?>
				
				<label  class="control-label text-right ">Branch :</label>
				<div class="col-lg-2">
					<select class="form-control chosen-select" id="branch" required name="branch" style="width: 100%">

					<option value="">Select Branch</option>
					<?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branches): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($branches->id); ?>" <?php if(isset($branch) && $branch==$branches->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($branches->branch_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</select>
				</div>

				<?php else: ?>
				<input type="hidden" id="branch"  name="branch" value="<?php echo e(Auth::guard('admin')->user()->branch); ?>">
				<?php endif; ?>


				<label class="control-label text-right ">From :</label>
				<div class="col-lg-1">
					<input type="text"  value="<?php echo e(isset($fdate) ? $fdate : date('d-m-Y')); ?>" name="fdate" id="fdate" class="form-control" readonly>  
				</div>

				<label class="control-label text-right ">To : </label>
				<div class="col-lg-1">
					<input type="text"  value="<?php echo e(isset($tdate) ? $tdate : date('d-m-Y')); ?>" name="tdate" id="tdate" class="form-control" readonly>  
				</div>
				<div class="col-md-1 bounce animated">
				<button type="submit" class="btn btn-primary  zoomInUp animated"><i class="fa fa-search"></i> Search</button>
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
							<th>Sold Quantity</th>
							</tr>									
							</thead>
                            <?php if(isset($fdate) && isset($tdate)): ?>
									<tbody>
									<?php
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
									?>

									<?php $__currentLoopData = $sales_qty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales_qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php
									 $product=Product::where('id',$sales_qty->product_id)->where('added_branch',$branch)->first();
									?>

									<tr>
									<td><?php echo e($i); ?></td>

									<td><?php echo e($product->product_name); ?></td>

									<td><?php echo e($product->product_number); ?></td>

									<td><?php echo e($product->unit->unit_name); ?></td>

									<td><?php echo e(isset($sales_qty->sold_qty) ? $sales_qty->sold_qty : 0); ?></td>



									</tr>
									<?php $i++; $sales_qty='';
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
<input type="hidden" id="link" value="<?php echo e(URL::to('/')); ?>/admin/stockReport">
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
        $('#table').DataTable({
        	 dom: 'Bfrtip',
        	 buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        });
    });
	
</script>
<script type="text/javascript">
$('.chosen-select').chosen();


$("#fdate").datepicker({format:'dd-mm-yyyy',autoclose: true});

$("#tdate").datepicker({format:'dd-mm-yyyy',autoclose: true});

// $('#table').DataTable({ "search": true, "paginate":false });


	// $('#printDiv').html('');

	// var link=$('#link').val();

	// $('#form').attr('action',link);

// function print_stock_moving_report(print){

// 	$('#printDiv').html('<input name="_method" value="PUT" type="hidden">');
// 	if(print=='print')
// 		$('#print').val('print');
// 	else
// 		$('#print').val('excel');

// 	var link=$('#link').val();

// 	$('#form').attr('action',link+'/print').attr('target', '_blank').submit();

// 	$('#form').attr('action',link).attr('target', '');
	
// 	$('#printDiv').html('');

// }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>