<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Product <?php else: ?> Add Product <?php endif; ?></h3>
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
					<form  class="m-t-40" method="post" action="<?php echo e(URL::to('/')); ?>/admin/addProducts/<?php echo $__env->yieldContent('edit_id'); ?>" >
					<?php else: ?>
					<form class="m-t-40" action="<?php echo e(URL::to('/')); ?>/admin/addProducts" method="post" data-parsley-validate>
					<?php endif; ?>
					<?php echo csrf_field(); ?>

					<?php $__env->startSection('edit'); ?>
					<?php echo $__env->yieldSection(); ?>
						<div class="row">
							<div class="col-md-3">
								<label for="batch_number">Product Number</label>
								<input type="text" class="form-control" id="product_number" name="product_number" required value="<?php echo $__env->yieldContent('product_number'); ?>">
								<?php if($errors->has('product_number')): ?>
										<span class="help-inline" style="color:red"><?php echo e($errors->first('product_number')); ?></span>
								<?php endif; ?>	
							</div>
							<div class="col-md-3">
								<label for="batch_number">Product Name</label>
								<input type="text" class="form-control" id="product_name" name="product_name" required value="<?php echo $__env->yieldContent('product_name'); ?>">		
							</div>
							<div class="col-md-3">
								<label for="product_brand">Product Brand</label>
								<select class="form-control p-0" id="product_brand" required name="product_brand">
									<option value="">Select Brand</option>
									<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($brand->id); ?>" <?php if($__env->yieldContent('product_brand')==$brand->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($brand->brand_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-md-3">
								<label for="batch_number">Basic Cost</label>
								<input type="text" class="form-control" id="basic_cost" name="basic_cost" required value="<?php echo $__env->yieldContent('basic_cost'); ?>">	
							</div>

							<div class="col-md-12"><br></div>

							<div class="col-md-3">
								<label for="batch_number">Discount</label>
								<input type="text" class="form-control" id="product_discount" name="product_discount" required value="<?php echo $__env->yieldContent('product_discount'); ?>"></div>
							<div class="col-md-3">
								<label for="product_gst">GST</label>
								<input type="text" class="form-control" id="product_gst" data-mask="99%" required name="product_gst" value="<?php echo $__env->yieldContent('product_gst'); ?>">
							</div>
							<div class="col-md-3">
								<label for="batch_number">MRP</label>
								<input type="text" class="form-control" id="billing_price" name="billing_price" required value="<?php echo $__env->yieldContent('billing_price'); ?>">
							</div>
							
					
					
							<div class="col-md-3">
								<label for="product_brand">Product Unit</label>
								<select class="form-control p-0" id="unit_id" required name="unit_id">
									<option value="">Select Unit</option>
									<?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $units): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($units->id); ?>" <?php if($__env->yieldContent('unit_id')==$units->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($units->unit_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
							
							<div class="col-md-12"><br></div>	
							<div class="col-lg-12 col-xlg-12 col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
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
					<h4 class="card-title">Products</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Product Name</th>
									<th>Product Number</th>
									<th>Unit</th>
									<th>Basic Cost</th>
									<th>Discount</th>	
									<th>GST</th>
									<th>Billing Price</th>
									<th>Branch</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;
								?>
								<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($sl++); ?></td>
									<td><?php echo e($product->product_name); ?></td>
									<td><?php echo e($product->product_number); ?></td>
									<td><?php echo e($product->unit_name); ?></td>
									<td><?php echo e($product->basic_cost); ?></td>
									<td><?php echo e($product->product_discount); ?></td>								
									<td><?php echo e($product->product_gst); ?></td>
									<td><?php echo e($product->billing_price); ?></td>
									<td><?php echo e($product->branch_name); ?></td>
									<td class="text-nowrap">							
										<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
											<form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/admin/addProducts/<?php echo e($product->id); ?>" >
											<?php echo e(method_field('DELETE')); ?>

											<?php echo e(csrf_field()); ?>

											<input type="hidden" name="_method" value="DELETE">
											<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
											<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
											</form>
										</a>
										<a href="<?php echo e(URL::to('/')); ?>/admin/addProducts/<?php echo e($product->id); ?>/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
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
<script src="<?php echo e(URL::asset('js/product.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>