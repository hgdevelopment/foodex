<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit User <?php else: ?> Add User <?php endif; ?></h3>
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
					<form  class=" m-t-40" method="post" action="<?php echo e(URL::to('/')); ?>/admin/addUser/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate>
					<?php else: ?>
					<form class=" m-t-40" action="<?php echo e(URL::to('/')); ?>/admin/addUser" method="post" data-parsley-validate>
					<?php endif; ?>
						<?php echo csrf_field(); ?>

						<?php $__env->startSection('edit'); ?>
						<?php echo $__env->yieldSection(); ?>
						<div class="row">
							<div class="col-md-4">
								<label for="employee_name">Employee Name</label>
								<input type="text" class="form-control" id="employee_name" name="employee_name" value="<?php echo $__env->yieldContent('employee_name'); ?>" required data-parsley-required-message="Please enter branch name">
								<?php if($errors->has('employee_name')): ?>
									<span class="help-inline"><?php echo e($errors->first('employee_name')); ?></span>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<label for="employee_code">Employee Code</label>
								<input type="text" class="form-control" id="employee_code" name="employee_code" value="<?php echo $__env->yieldContent('employee_code'); ?>" required data-parsley-required-message="Please enter branch name">
								<?php if($errors->has('employee_code')): ?>
								<span class="help-inline" style="color:red"><?php echo e($errors->first('employee_code')); ?></span>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<label for="employee_code">Password</label>
								<input type="password" class="form-control" id="employee_password" name="employee_password" value="<?php echo $__env->yieldContent('employee_password'); ?>" required data-parsley-required-message="Please enter branch name">
								<?php if($errors->has('employee_password')): ?>
								<span class="help-inline"><?php echo e($errors->first('employee_password')); ?></span>
								<?php endif; ?>
							</div>
							<div class="col-md-12"><br></div>
							<div class="col-md-4">
								<label for="employee_branch">Branch</label>
								<select class="form-control p-0" id="employee_branch" required name="employee_branch">
									<option value="">Select Branch</option>
									<?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($branchs->id); ?>" <?php if($__env->yieldContent('employee_branch')==$branchs->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($branchs->branch_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-md-4">
								<label for="employee_type">Employee Type</label>
								<select class="form-control p-0" id="employee_type" value="<?php echo $__env->yieldContent('employee_type'); ?>"  required name="employee_type">
									<option value="">Select Type</option>
									<option value="OI" <?php if(strtoupper($__env->yieldContent('employee_type'))=='OI'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Office Incharge</option>
									<option value="SE" <?php if(strtoupper($__env->yieldContent('employee_type'))=='SE'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sales Employee</option>
									<option value="RE" <?php if(strtoupper($__env->yieldContent('employee_type'))=='RE'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Request Employee</option>
									<option value="VN" <?php if(strtoupper($__env->yieldContent('employee_type'))=='VN'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Verification</option>

								</select>
							</div>
							<div class="col-md-12"></div>
							<div class="col-md-3">
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
					<h4 class="card-title">Users</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Code</th>
									<th>Employee Type</th>
									<th>Branch</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($sl++); ?></td>
										<td><?php echo e($users->employee_name); ?></td>
										<td><?php echo e($users->username); ?></td>
										<td><?php echo e($users->userType); ?></td>
										<td><?php echo e($users->branch_name); ?></td>
										<td class="text-nowrap">							
											<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
												<form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/admin/addUser/<?php echo e($users->id); ?>" >
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="_method" value="DELETE">
												<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
												<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
												</form>
											</a>
											<a href="<?php echo e(URL::to('/')); ?>/admin/addUser/<?php echo e($users->id); ?>/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
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
<script src="<?php echo e(URL::asset('js/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>