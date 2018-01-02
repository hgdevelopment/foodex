<?php $__env->startSection('banner'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<style type="text/css">
textarea.form-control {
	height:10px;
}
</style>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Add Sales</h1>
</div>
<form role="form"  method="POST" action="<?php echo e(URL::to('/')); ?>/admin/member"  data-parsley-validate  enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<?php if(session()->has('message')): ?>
	<div class="alert alert-info fade in alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<strong>Info!</strong> <?php echo e(session()->get('message')); ?>

	</div>
	<?php endif; ?>

	<div class="wrapper-md">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Billing Details</div>
			<div class="panel-body">

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Bill Number</label>
							<input type="text" class="form-control" placeholder="" id="fullname" name="fullname" value="<?php echo e(old('fullname')); ?>"  required data-parsley-required-message="Please Enter Full Name">
							<?php if($errors->has('fullname')): ?>
							<span class="help-inline"><?php echo e($errors->first('fullname')); ?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label>Date</label>
							<input type="text" class="form-control" placeholder="" id="guardian" name="guardian" value="<?php echo e(old('guardian')); ?>" required data-parsley-required-message="Please Enter Guardians Name">
							<?php if($errors->has('guardian')): ?>
							<span class="help-inline"><?php echo e($errors->first('guardian')); ?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
						<label>Sales Person</label>
						<input type='text' name="dateofbirth" id="dateofbirth" required placeholder="" data-language="en" class="form-control" onchange="getAge()" value=""/>
						<div id="dateerror" style="color:red;"></div>
						<?php if($errors->has('dateofbirth')): ?>
						<span class="help-inline"><?php echo e($errors->first('dateofbirth')); ?></span>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Customer Name</label>
							<input type="text" class="form-control" placeholder="" id="fullname" name="fullname" value="<?php echo e(old('fullname')); ?>"  required data-parsley-required-message="Please Enter Full Name">
							<?php if($errors->has('fullname')): ?>
							<span class="help-inline"><?php echo e($errors->first('fullname')); ?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<label>Phone Number</label>
							<input type="text" class="form-control" placeholder="" id="guardian" name="guardian" value="<?php echo e(old('guardian')); ?>" required data-parsley-required-message="Please Enter Guardians Name">
							<?php if($errors->has('guardian')): ?>
							<span class="help-inline"><?php echo e($errors->first('guardian')); ?></span>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
						<label>Customer Address</label>
						<input type='text' name="dateofbirth" id="dateofbirth" required placeholder="" data-language="en" class="form-control" onchange="getAge()" value=""/>
						<div id="dateerror" style="color:red;"></div>
						<?php if($errors->has('dateofbirth')): ?>
						<span class="help-inline"><?php echo e($errors->first('dateofbirth')); ?></span>
						<?php endif; ?>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading font-bold">Product Details</div>
			<div class="panel-body">
				<div class="row">
					<table class="table">
						<thead>
							<th>#</th>
							<th>Code</th>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Discount</th>
							<th>Total</th>
							<th>Free Stock</th>
							<th>Action</th>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Code</td>
								<td>Item</td>
								<td>Quantity</td>
								<td>Price</td>
								<td>Discount</td>
								<td>Total</td>
								<td>Free Stock</td>
								<td>Add</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Code</td>
								<td>Item</td>
								<td>Quantity</td>
								<td>Price</td>
								<td>Discount</td>
								<td>Total</td>
								<td>Free Stock</td>
								<td>Add</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">Grand Total</div>
				<div class="panel-body">
					<div class="row">
					</div>
				</div>
			</div>
		</div>

	</div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>