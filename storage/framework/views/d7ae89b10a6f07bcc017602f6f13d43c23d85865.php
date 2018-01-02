 
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"> Reports</h3>
		</div>
	</div>
	<?php if(Session()->has('message')): ?>
	<div class="alert alert-success"> 
		<i class="ti-product"></i> 
		<?php echo e(Session()->get('message')); ?>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
	</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<form class=" m-t-40" action="<?php echo e(URL::to('/')); ?>/admin/report" method="post" data-parsley-validate>
					<?php echo e(csrf_field()); ?>

						<div class="row">
							<?php if(Auth::guard('admin')->user()->userType=='OI' || Auth::guard('admin')->user()->userType=='VN'): ?>
							<div class="col-md-2">
								<label for="product_brand">Branch</label>
								<select class="form-control p-0" id="branch" required name="branch">
									<option value="">Select Branch</option>
									<?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($branchs->id); ?>"><?php echo e($branchs->branch_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<?php else: ?>
                            	<input type="hidden" id="branch"  name="branch" value="<?php echo e(Auth::guard('admin')->user()->branch); ?>">
							<?php endif; ?>
							<div class="col-md-2">
								<div class="form-group m-b-40">
									<label for="type">Type</label>
									<select  class="form-control" id="type" name="type"  required data-parsley-required-message="Please select report type">
										<option value="">Select</option>
										<option value="cash" <?php if(isset($request) && $request->type =='cash'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Cash</option>
										<option value="card" <?php if(isset($request) && $request->type=='card'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Card</option>
										<option value="both" <?php if(isset($request) && $request->type=='both'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Both</option>
										<option value="charity" <?php if(isset($request) && $request->type=='charity'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Charity</option>
										<option value="cheque" <?php if(isset($request) && $request->type=='cheque'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Cheque</option>
										<option value="online" <?php if(isset($request) && $request->type=='online'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Online</option>
										<option value="credit" <?php if(isset($request) && $request->type=='credit'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Credit</option>
										<option value="sales" <?php if(isset($request) && $request->type=='sales'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Sales</option>
										<option value="partial" <?php if(isset($request) && $request->type=='partial'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Partial</option>
										<option value="ME" <?php if(isset($request) && $request->type=='ME'): ?> <?php echo e('selected'); ?> <?php endif; ?> >ME Based</option>
										<option value="master" <?php if(isset($request) && $request->type=='master'): ?> <?php echo e('selected'); ?> <?php endif; ?> >ME Master</option>

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
									<input type="text" class="form-control" id="from" name="from"  required data-parsley-required-message="Please select date" value="<?php echo e(isset($request->from) ? $request->from : date('d-m-Y')); ?>" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-b-40">
									<label for="to">To</label>
									<input type="text" class="form-control" id="to" name="to"  required  data-parsley-required-message="Please select date" value="<?php echo e(isset($request->to) ? $request->to : date('d-m-Y')); ?>">
								</div>
							</div>
							<div class="col-md-1">
									<label>&nbsp;</label>
									<br>
									<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php if(isset($reports)): ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
				<h4 class="card-title"><?php echo e(ucfirst($request->type)); ?> Report </h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<?php if($request->type!="master"): ?>
									<th>Date</th>
									<th>Branch</th>
									<th>Bill Number</th>
									<?php endif; ?>


									<?php if($request->type=="ME" || $request->type=="master"): ?>
									<th>ME</th>
									<?php endif; ?>

									<?php if($request->type=="partial" || $request->type=="ME"): ?>
									<th>Payment Mode</th>
									<?php endif; ?>

									<?php if($request->type!="sales" && $request->type!="master"): ?>
									<th>Customer Name</th>
									<?php endif; ?>

									<th>Total Amount</th>

									<?php if($request->type!="charity" && $request->type!="sales"): ?> 

										<?php if( $request->type=="card" || $request->type=="both" || $request->type=="online" ): ?>
										<th>Transaction Number</th>
										<?php endif; ?>

										<?php if( $request->type!="cash" && $request->type!="credit" && $request->type!="partial"  && $request->type!="ME" && $request->type!="master"): ?>
										<th>Reference Number</th>									
										<?php endif; ?>

										<?php if($request->type=="cheque" && $request->type!="master"): ?>
										<th>Cheque Number</th>	
										<?php endif; ?>

										<?php if($request->type=="online" && $request->type!="master"): ?>
										<th>Account Number</th>
										<?php endif; ?>


										<?php if( $request->type=="both" && $request->type!="master"): ?>
										<th>Paid Amount(Card)</th>
										<th>Paid Amount(Cash)</th>
										<?php endif; ?> 

										<?php if($request->type!="credit"): ?>
										<th>Total Paid Amount</th>	
										<?php endif; ?> 

										<?php if($request->type=="master" || $request->type=="ME" || $request->type=="credit" || $request->type=="partial"): ?>
										<th>Balance Amount</th>
										<?php endif; ?>

									<?php endif; ?>

										<?php if( $request->type=="sales"): ?>
										<th>Product Quantity</th>
										<?php endif; ?>
										
								</tr>
							</thead>
							<tbody>
							<?php $sl=1;
							$total_paid_amount=0;
							?>
							<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<?php 
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
										 ?>

								<tr>
									<td><?php echo e($sl++); ?></td>
									<?php if($request->type!="master"): ?>

									<td><?php echo e(date('d-m-Y',strtotime($reports->date))); ?></td>

									<td><?php echo e($reports->branch_name); ?></td>

									<td><?php echo e($reports->bill_number); ?></td>
									<?php endif; ?>

									<?php if($request->type=="ME" || $request->type=="master"): ?>
									<td><?php echo e($reports->me_code); ?></td>
									<?php endif; ?>

									<?php if($request->type=="partial" || $request->type=="ME"): ?>
									<td><?php echo e($reports->payment_mode); ?><?php if($reports->status=="partial"): ?> <?php echo e('( Partial )'); ?><?php endif; ?></td>
									<?php endif; ?>

									<?php if($request->type!="sales" && $request->type!="master"): ?>
									<td><?php echo e($reports->customer_name); ?></td>
									<?php endif; ?>
									<?php if($request->type=="master"): ?>
									<td><?php echo e($total_amount); ?></td>
									<?php else: ?>
									<td><?php echo e($reports->total_amount); ?></td>
									<?php endif; ?>

									<?php if($request->type!="charity" && $request->type!="sales"): ?>

										<?php if( $request->type=="card" || $request->type=="both" || $request->type=="online" ): ?>
										<td><?php echo e($reports->transaction_number); ?></td>
										<?php endif; ?>

										<?php if($request->type!="cash" && $request->type!="credit"  && $request->type!="partial" && $request->type!="ME" && $request->type!="master"): ?>
										<td><?php echo e($reports->reference_number); ?></td>
										<?php endif; ?>

										<?php if($request->type=="cheque" && $request->type!="master"): ?>
										<td><?php echo e($reports->cheque_number); ?></td>	
										<?php endif; ?>


										<?php if($request->type=="online" && $request->type!="master"): ?>
										<td><?php echo e($reports->account_number); ?></td>
										<?php endif; ?>

										<?php if( $request->type=="both" && $request->type!="master"): ?>
										<td><?php echo e($reports->card_amount); ?></td>	
										<td><?php echo e($reports->paid_amount); ?></td>	
										<?php endif; ?>

										<?php if( $request->type!="both" && $request->type!="credit" && $request->type!="master"): ?>
										<td><?php echo e($reports->paid_amount); ?></td>
										<?php endif; ?>

										<?php if( $request->type=="both" || $request->type=="master"): ?>
										<td><?php echo e($reports->card_amount + $reports->paid_amount); ?> </td>
										<?php endif; ?>


										
										<?php if($request->type=="master"): ?>
										<td><?php echo e(max($total_amount- ($reports->paid_amount + $reports->card_amount),0)); ?></td>
										
										<?php elseif($request->type=="credit" || $request->type=="partial"): ?>
										<td><?php echo e(max($reports->total_amount-$total_paid_amount,0)); ?></td>
										<?php elseif($request->type=="ME"): ?>
										<td><?php echo e(max($reports->balance,0)); ?></td>	
										<?php endif; ?>

									<?php endif; ?>

										<?php if( $request->type=="sales"): ?>	
										<td><?php echo e($reports->quantity); ?></td>	
										<?php endif; ?>


								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<tr>
									<?php
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
									?>
									<?php if($request->type=='charity' || $request->type=='credit' || $request->type=='sales'): ?>
									<td colspan="<?php echo e($col); ?>" style="text-align:right;font-weight:bold;">Total Amount:</td>
									<?php else: ?>
									<td colspan="<?php echo e($col); ?>" style="text-align:right;font-weight:bold;">Total Paid Amount:</td>
									<?php endif; ?>
									<td style="font-weight:bold;"><?php echo e($total_paid_amount); ?></td>
									<?php if( $request->type=='master' || $request->type=='credit' || $request->type=='sales' || $request->type=='partial' || $request->type=='ME'): ?><td></td><?php endif; ?>

								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/report.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>