	<?php $__env->startSection('sidebar'); ?>
		<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Branch <?php else: ?> Add Branch <?php endif; ?></h3>
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
					<?php if(trim($__env->yieldContent('edit_id'))): ?>
						<form  class=" m-t-40" method="post" action="<?php echo e(URL::to('/')); ?>/admin/addBranch/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate>
					<?php else: ?>
						<form class=" m-t-40" action="<?php echo e(URL::to('/')); ?>/admin/addBranch" method="post" data-parsley-validate>
					<?php endif; ?>
					<?php echo csrf_field(); ?>

					<?php $__env->startSection('edit'); ?>
					<?php echo $__env->yieldSection(); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="row col-md-12">
									<div class="col-md-3">
										<div class="form-group m-b-40">
											<label for="branch_name">Branch Name</label>
											<input type="text" class="form-control" id="branch_name" name="branch_name" value="<?php echo $__env->yieldContent('branch_name'); ?>" required data-parsley-required-message="Please enter branch name">
											<?php if($errors->has('branch_name')): ?>
												<span class="help-inline" style="color:red"><?php echo e($errors->first('branch_name')); ?></span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group m-b-40">
											<label for="branch_name">GST Number</label>
											<input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo $__env->yieldContent('gst_no'); ?>" required data-parsley-required-message="Please enter GST Number">
											<?php if($errors->has('gst_no')): ?>
												<span class="help-inline" style="color:red"><?php echo e($errors->first('gst_no')); ?></span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group m-b-40">
											<label for="branch_name">Address</label>
											<textarea type="text" class="form-control" id="address" name="address" required data-parsley-required-message="Please enter Address" wrap="soft|hard"><?php echo $__env->yieldContent('address'); ?></textarea>
											<?php if($errors->has('address')): ?>
												<span class="help-inline" style="color:red"><?php echo e($errors->first('address')); ?></span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group m-b-40">
											<label for="branch_name">Pin Number</label>
											<input type="text" class="form-control" id="pin_number" name="pin_number" value="<?php echo $__env->yieldContent('pin_number'); ?>" required data-parsley-required-message="Please enter Address">
											<?php if($errors->has('pin_number')): ?>
												<span class="help-inline" style="color:red"><?php echo e($errors->first('pin_number')); ?></span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group m-b-40">
											<label for="branch_name">Phone Number</label>
											<input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $__env->yieldContent('phone_number'); ?>" required data-parsley-required-message="Please enter Phone Number">
											<?php if($errors->has('phone_number')): ?>
												<span class="help-inline" style="color:red"><?php echo e($errors->first('phone_number')); ?></span>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-left" value="Submit" name="submit" style="margin-top:7%">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php if(trim($__env->yieldContent('edit_id'))): ?>
	<?php else: ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Branches</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Branch Name</th>
									<th>GST Number</th>
									<th>Address</th>
									<th>Pin Number</th>
									<th>Phone Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								<?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($sl++); ?></td>
										<td><?php echo e($branch->branch_name); ?></td>
										<td><?php echo e($branch->gst_no); ?></td>
										<td><?php echo e($branch->address); ?></td>
										<td><?php echo e($branch->pin_number); ?></td>
										<td><?php echo e($branch->phone_number); ?></td>
										<td class="text-nowrap">							
											<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
												<form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/admin/addBranch/<?php echo e($branch->id); ?>" >
													<?php echo e(method_field('DELETE')); ?>

													<?php echo e(csrf_field()); ?>

													<input type="hidden" name="_method" value="DELETE">
													<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
													<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
												</form>
											</a>
											<a href="<?php echo e(URL::to('/')); ?>/admin/addBranch/<?php echo e($branch->id); ?>/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
												<i class="fa fa-pencil text-inverse m-r-10"></i> 
											</a>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="<?php echo e(URL::asset('js/branch.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>