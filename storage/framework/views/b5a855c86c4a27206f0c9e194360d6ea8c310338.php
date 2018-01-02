<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0"<?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Product <?php else: ?> Add Product <?php endif; ?></h3>
		</div>
	</div>
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
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="batch_number">Batch Number</label>
									<input type="text" class="form-control" id="batch_number" name="batch_number" required value="<?php echo $__env->yieldContent('product_batchNo'); ?>">
									<span class="bar"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_brand">Product Brand</label>
									<select class="form-control p-0" id="product_brand" required name="product_brand">
										<option value="">Select Brand</option>
										<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($brand->id); ?>" <?php if($__env->yieldContent('product_brand')==$brand->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($brand->brand_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_category">Product Category</label>
									<select class="form-control p-0" id="product_category" required name="product_category">
										<option value="">Select Category</option>
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->id); ?>" <?php if($__env->yieldContent('product_category')==$category->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($category->category_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_cost">Product Quantity</label>
									<input type="text" class="form-control" id="product_quantity" required name="product_quantity" value="<?php echo $__env->yieldContent('product_quantity'); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_cost">Product Unit</label>
									<select class="form-control p-0" id="product_unit" required name="product_unit">
										<option value="">Select Unit</option>
										<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($unit->id); ?>" <?php if($__env->yieldContent('product_unit')==$unit->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($unit->unit_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_cost">Basic Cost</label>
									<input type="text" class="form-control" id="product_basic_price" required name="product_basic_price" value="<?php echo $__env->yieldContent('product_basic_price'); ?>">
								</div>
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_gst">GST</label>
									<input type="text" class="form-control" id="product_gst" data-mask="99%" required name="product_gst" value="<?php echo $__env->yieldContent('product_gst'); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_discount">Discount</label>
									<input type="text" class="form-control" id="product_discount" required name="product_discount" value="<?php echo $__env->yieldContent('product_discount'); ?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group m-b-40">
									<label for="product_mrp">MRP</label>
									<input type="text" class="form-control" id="product_mrp" required name="product_mrp" value="<?php echo $__env->yieldContent('product_mrp'); ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xlg-12 col-md-12">
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
					<h4 class="card-title">Products</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Batch Number</th>
									<th>Category</th>
									<th>Discount</th>
									<th>Tax</th>
									<th>Quantity</th>
									<th>Billing Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;
								?>
								<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($sl++); ?></td>
									<td><?php echo e($product->product_batchNo); ?></td>
									<td><?php echo e($product->category_name); ?></td>
									<td><?php echo e($product->product_discount); ?> %</td>
									<td><?php echo e($product->product_gst); ?> %</td>
									<td><?php echo e($product->product_quantity); ?> <?php echo e($product->unit_name); ?></td>
									<td><?php echo e($product->product_mrp); ?> Rs</td>
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