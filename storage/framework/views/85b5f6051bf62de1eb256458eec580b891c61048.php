<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<link href="<?php echo e(URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet">
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
.bigdrop{
    /* max-width: 200px !important;*/
}
</style>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Stock Request</h2>
		</div>
	</div>
	<form method="post" action="#" id="purchase_order_form"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">							
							<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Branch</label>
                                        <input type="text" readonly  class="form-control form-control-line" name="from_branch" value="<?php echo e($data['branch']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Branch</label>
                                        <select name="to_branch" id="to_branch" class="form-control form-control-line" >
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $data['branchs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($element->id!=Auth::guard('admin')->user()->branch): ?>
                                               <option value="<?php echo e($element->id); ?>"><?php echo e($element->branch_name); ?></option>
                                               <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Requested By</label>
                                        <input type="text"  class="form-control form-control-line"  value="<?php echo e(Auth::guard('admin')->user()->employee_name); ?>" readonly>
                                    </div>
                                </div>
							</div>							
						</div>
					</div>
				</div>
			</div>
            <?php echo e(csrf_field()); ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							<span class="unique_value">**The Products must be unique</span>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Product</th>
											<th>Quantity</th>
											<th><button type="button" class="add-more btn btn-circle btn-sm btn-success waves-effect waves-dark" id="add_values">+</button></th>
										</tr>
									</thead>
									<tbody id="add_products">										
										<tr class="hide" id="hidden_prodect">
											<td>
											<select name="product[]" id="product" class="form-control product" style="width: 100%">
											</select>
                                            <input type="hidden" name="product_code[]" id="product_code" >
										    </td>
											<td><input type="text"  class="form-control form-control-line" name="qty[]" id="qty"></td>
											<td><button type="button" class="remove-product btn btn-circle btn-sm btn-danger waves-effect waves-dark" id="add_values">-</button></td>
										</tr>
									</tbody>
								</table>
							</div>
						<hr>							
					</div>
				</div>
			</div>
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-block">							
							<div class="row">
								<div class="col-lg-12 col-xlg-12 col-md-12">
									<div class="form-group">
										<div class="col-sm-12">											
											<input type="submit" class="btn btn-success pull-right" style="margin-right:2%" value="Submit" name="submit">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
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
<script src="<?php echo e(URL::asset('js/purchase/purchase_order.js')); ?>"></script>
<script>
	$(function(){

		var initLoad=true;
		var revalidateForm=function(){
			$('#purchase_order_form').formValidation('revalidateField', 'product[]');
            $('#purchase_order_form').formValidation('revalidateField', 'qty[]');
            // $('#purchase_order_form').formValidation('revalidateField', 'billing[]');
		}
		var mrp_calculate=function(base_amt,gst){
							 gst=(gst==null|| gst==NaN || gst=='')?0:parseFloat(gst);
							 base_amt=(base_amt==null|| base_amt==NaN || base_amt=='')?0:parseFloat(base_amt);
					         var mrp=((base_amt*gst)/100)+base_amt;
					         return mrp;
		                   };
		


		$('#purchase_order_form')
        .formValidation({
	        framework: 'bootstrap',
	        // err: {
	        //     container: 'tooltip'
	        // },
	        row: {
	            selector: 'td'
	        },
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
            fields: {
                'product[]': {
                  // row: '.form-group',
                   validators: {
                         notEmpty: {
                            message: 'Product is required'
                        },
                        callback: {
                        callback: function(value, validator, $field) {
                            var $emails          = validator.getFieldElements('product[]'),
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

                            // if (duplicateRemoved.length === 0) {
                            //     return {
                            //         valid: false,
                            //         message: 'You must fill at least one email address'
                            //     };
                            // } else 
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
                	// row: '.form-group',
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
            var $template = $('#hidden_prodect'),
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
                           
                           //products
                           $clone.find('select[name="product[]"]').select2({
			         		  placeholder: 'Select an product',
                              containerCssClass : 'bigdrop',
								   ajax: {
									    url: '<?php echo e(URL::to('/')); ?>/admin/purchase/select2/product',
									    dataType: 'json',
									    method:'post',
									    data:function (params) {
										      var query = {
										        search: params.term,
										        type: 'public',
										        _token:'<?php echo e(csrf_token()); ?>',
										      }

										      return query;
										    }
								      }
									}).on('select2:select', function (e) {		
											var data = e.params.data;
                                            $(this).parents('tr').find('input[name="product_code[]"]').val(data.code);
										    revalidateForm();
										});
           $('#purchase_order_form')
                .formValidation('addField', $clone.find('[name="product[]"]'))
                .formValidation('addField', $clone.find('[name="qty[]"]'))


                //change event
                
        })

        // Remove button click handler
        .on('click', '.remove-product', function() {
            var $row = $(this).closest('tr');

            // Remove fields
            $('#purchase_order_form')
                .formValidation('removeField', $row.find('[name="product[]"]'))
                .formValidation('removeField', $row.find('[name="qty[]"]'));
          
            // Remove element containing the fields
            $row.remove();
        }).on('success.form.fv', function(e) {
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');

             var form = $('#purchase_order_form')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '<?php echo e(URL::to('/')); ?>/admin/stock/request/send',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                                swal({ title: "Stock Request!",
                                            text: "Request Send!",
                                            type: "success" 
                                            }).then(function() {
                                                location.reload();
                                            });
                                
                              }else{
                                sweetAlert("Oops...",'' , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });
        });

        
     $('.add-more').trigger('click');
		
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>