<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<style>
	.select2-selection{
		padding: .5rem .75rem;
		font-size: 1rem;
		line-height: 1.25;
		min-height: 38px;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow {
		top: 6px;
		right: 4px;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		color: #444;
		line-height: 22px;
	}
	/*.fadeInDownBig {
	  -webkit-animation-name: fadeInDownBig;
	  animation-name: fadeInDownBig;
	  -webkit-animation-duration: 1s;
	  animation-duration: 1s;
	  -webkit-animation-fill-mode: both;
	  animation-fill-mode: both;
  	}*/
	@-webkit-keyframes fadeInDownBig {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -2000px, 0);
			transform: translate3d(0, -2000px, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}
	@keyframes  fadeInDownBig {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -2000px, 0);
			transform: translate3d(0, -2000px, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	} 	
</style>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center"> 
			<h2 class="text-themecolor m-b-0 m-t-0">Damaged Products</h2>
		</div>
	</div>
	<form method="post" action="#" id="damage_product_form"> 
		<div class="container-fluid">
			<?php echo e(csrf_field()); ?>

			<div class="row">
				<?php if(Auth::guard('admin')->user()->branch=='0'): ?>
					<div class="col-md-2">
						<label for="product_brand"><b>Branch</b></label>
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
				<div class="col-lg-12">
					<div class="card fadeInDownBig">
						<div class="card-block">
							<span class="unique_value"></span>
							<div class="col-lg-8">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Batch Number</th>
												<th>Product</th>
												<th>Available Qty</th>
												<th>Qty</th>
												<th>
												<button type="button" class="add-more btn btn-circle btn-sm btn-success waves-effect waves-dark" id="add_values">+</button>
												</th>
											</tr>
										</thead>
										<tbody id="add_products">
											<tr class="hide" id="hidden_product">
												<td>
													<select name="batchno[]" id="batchno" class="form-control batchno" style="width:100%;">
														<?php $__currentLoopData = $purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchases): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value='<?php echo e($purchases->id); ?>'><?php echo e($purchases->purchase_no); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</td>
												<td>
													<select name="product[]" id="product" class="form-control product" style="width:100%;"></select>
												</td>
												<td>
													<input type="hidden" name="total_available_qty[]" id="total_available_qty" readonly>
													<input type="text" class="form-control-line form-control" name="availableqty[]" id="availableqty" readonly>
												</td>
												<td>
													<input type="text" class="form-control form-control-line" name="qty[]" id="qty" required style="width:60%;">
												</td>
												<td>
													<button type="button" class="remove-product btn btn-circle btn-sm btn-danger waves-effect waves-dark" id="add_values">-</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="row">
									<div class="col-lg-4 col-xlg-4 col-md-4"></div>
									<div class="col-lg-4 col-xlg-4 col-md-4">
										<div class="form-group" style="margin-right: 100%;"> 
											<div class="col-sm-12 col-lg-12 col-xlg-12 col-md-12">
												<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-xlg-4 col-md-4"></div>
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">View Damaged Products</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Branch</th>
									<th>Batch Number</th>
									<th>Product</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;
								?>
								<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($sl++); ?></td>
									<td><?php echo e($products->branch_id); ?></td>
									<td><?php echo e($products->purchase_no); ?></td>
									<td><?php echo e($products->product_name); ?></td>
									<td><?php echo e($products->product_qty); ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/form_wizard.js')); ?>"></script>
<script>
	$(function()
	{
	var initLoad=true;
	var revalidateForm=function()
	{
		$('#damage_product_form').formValidation('revalidateField','product[]');
		$('#damage_product_form').formValidation('revalidateField','qty[]');
	}
	$('#damage_product_form')
	.formValidation({
		framework: 'bootstrap',
		row: 
		{
			selector: 'td'
		},
		icon: 
		{
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			'product[]': {
				validators: {
					notEmpty: {
						message: 'Product is required'
					},
					callback: {
						callback: function(value, validator, $field) {
							var $emails      = validator.getFieldElements('product[]'),
							numEmails        = $emails.length,
							notEmptyCount    = 0,
							obj              = {},
							duplicateRemoved = [];
							for (var i = 0; i < numEmails-1; i++) {
								var v = $emails.eq(i).val();
								if (v !== '') {
									obj[v] = 0;
									notEmptyCount++;
								}
							}
							for (i in obj) {
								duplicateRemoved.push(obj[i]);
							}
							if (duplicateRemoved.length !== notEmptyCount) {
							$('.unique_value').html('*The Products must be unique')
								return {
									valid: false,
									message: '**'
								};
							}
							validator.updateStatus('product[]', validator.STATUS_VALID, 'callback');
							$('.unique_value').html('')
							return true;
						}
					}
				}
			},
			'qty[]': {
				validators: {
					notEmpty: {
						message: 'Quantity is required'
					},
					numeric: {
						message: 'The value is not a number',
					}
				}
			}, 
		}
	})

	// Add button click handler
	.on('click', '.add-more', function() {
		var $template = $('#hidden_product'),
		$clone    = $template
		.clone()
		.removeClass('hide')
		.removeAttr('id')
		.insertBefore($template);
		if(initLoad==true)
		{
			$clone.find('.remove-product').remove();
			initLoad=false;
		}
		$clone.find('input[name="expiry[]"]').bootstrapMaterialDatePicker({ weekStart : 0, time: false,format:'DD/MM/YYYY' }).on('change',function(){
			revalidateForm();
		});
		$clone.find('select[name="product[]"]').select2({
			placeholder: 'Select a product',
			containerCssClass : 'bigdrop',
			ajax: {
				url: '<?php echo e(URL::to('/')); ?>/admin/damageproduct/damaged_product_select',
				dataType: 'json',
				method:'post',
				data:function (params) {
					var query = {
						search: params.term,
						batchno:$(this).parents('tr').find('select[name="batchno[]"]').val(),

						type: 'public',
						_token:'<?php echo e(csrf_token()); ?>',
					}
					return query;
				}
			}
		}).on('select2:select', function(e) {
			var data= e.params.data;
			$(this).parents('tr').find('input[name="total_available_qty[]"]').val(data.available_quantity);
			$(this).parents('tr').find('input[name="availableqty[]"]').val(data.available_quantity);
			$(this).parents('tr').find('input[name="qty[]"]').val(0);
			$(this).parents('tr').find('input[name="qty[]"]').trigger('input');
		});
		// quantity check start
		$('input[name="qty[]"]').on('input',function(e){
			var avl=parseInt($(this).parents('tr').find('input[name="total_available_qty[]"]').val());
			var qty=parseInt($(this).val());
			if(qty=="" ||  isNaN(qty) || qty==undefined || qty=="undefined"){
				qty=0;
				return;
			}

			if(avl<qty){
				alert('Stock not a available');
				$(this).parents('tr').find('input[name="availableqty[]"]').val(avl);
				$(this).val('');
				return;
			}
			$(this).parents('tr').find('input[name="availableqty[]"]').val(avl-qty);
		});

		//quantity check end
		$('#batchno').select2();
	})

	// Remove button click handler
	.on('click', '.remove-product', function() { 
		var $row = $(this).closest('tr');

		// Remove fields
		$('#damage_product_form')
		.formValidation('removeField', $row.find('[name="product[]"]'))
		.formValidation('removeField', $row.find('[name="qty[]"]'))

		// Remove element containing the fields
		$row.remove();
	})
	.on('success.form.fv', function(e) {
		e.preventDefault();
		var $form = $(e.target),
		fv    = $form.data('formValidation');
		var form = $('#damage_product_form')[0];
		var data = new FormData(form);
		$.ajax({
			url: '<?php echo e(URL::to('/')); ?>/admin/damageproduct/damaged_product',
			method: 'POST',
			data: data,
			success: function(data){
			swal({
			position: 'top-right',
			type: 'success',
			title: 'Product has been saved',
			showConfirmButton: false,
			timer: 1500
			}).then(function() {
				location.reload();
				});
			},
			error: function(xhr, status, error){
			},
			processData: false,
			contentType: false
		});
	});
	$('.add-more').trigger('click');
	});

	// $('#select2-product-container').keyup(function(){
	// 	//alert('ok');
	// })

	$('#example23').DataTable({
		dom: 'Bfrtip',
		buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	});	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>