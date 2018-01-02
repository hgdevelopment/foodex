<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Units <?php else: ?> Add Units <?php endif; ?></h3>
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
					<form  class=" m-t-40" method="post" action="<?php echo e(URL::to('/')); ?>/admin/addUnits/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate>
					<?php else: ?>
					<form class=" m-t-40" action="<?php echo e(URL::to('/')); ?>/admin/addUnits" method="post" data-parsley-validate>
					<?php endif; ?>
						<?php echo csrf_field(); ?>

						<?php $__env->startSection('edit'); ?>
						<?php echo $__env->yieldSection(); ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="unit_name">Unit Name</label>
									<input type="text" class="form-control" id="unit_name" name="unit_name" value="<?php echo $__env->yieldContent('unit_name'); ?>" required data-parsley-required-message="Enter Unit Name">
									<span class="bar"></span>
									<?php if($errors->has('unit_name')): ?>
										<span class="help-inline"><?php echo e($errors->first('unit_name')); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="col-md-12"></div>
						<div class="row">
							<div class="col-lg-6 col-xlg-6 col-md-6">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
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
					<h4 class="card-title">Units</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Unit Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($sl++); ?></td>
										<td><?php echo e($unit->unit_name); ?></td>
										<td class="text-nowrap">							
											<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
												<form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/admin/addUnits/<?php echo e($unit->id); ?>" >
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="_method" value="DELETE">
												<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
												<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
												</form>
											</a>
											<a href="<?php echo e(URL::to('/')); ?>/admin/addUnits/<?php echo e($unit->id); ?>/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
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
<script src="<?php echo e(URL::asset('js/unit.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>