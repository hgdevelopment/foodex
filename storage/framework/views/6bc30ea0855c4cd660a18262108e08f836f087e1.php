<?php $__env->startSection('banner'); ?>
	<div class="col-lg-12" align="center" style="background-color:#ffcf29">
		<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Member Request</h1>
		<h6 class="m-n font-thin h5"></h6>
	</div>
	<div class="wrapper-md">
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="col-md-12"><br></div>
		<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table class="table table-striped b-t" id="viewRequest">
					<thead>
						<div class="panel-heading">
							View Member Request
						</div>
						<tr>
							<th>Sl No</th>
							<th>Code</th>
							<th>Name</th>
							<th>Email</th>
							<th>Applied Date</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $viewmember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $viewmembers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($viewmembers->code); ?></td>
								<td><?php echo e($viewmembers->name); ?></td>
								<td><?php echo e($viewmembers->email); ?></td>
								<td><?php echo e(date("Y-m-d",strtotime($viewmembers->addedByDate))); ?></td>
								<td>
								<a href="<?php echo e(URL::to('/')); ?>/admin/membersview/<?php echo e($viewmembers->userId); ?>"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td> 
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
	$(document).ready(function()
	{
	$('#viewRequest').DataTable();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>