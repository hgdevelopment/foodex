<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<style type="text/css">
.card-outline-info {
	background-color: #fff;
}
.parsley-required{
	font-size: 12px;
	margin-left:-35px;
}
</style>
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
/*.bigdrop{
     max-width: 200px !important;
}*/
</style>
	<form method="post" action="<?php echo e(URL::to('/')); ?>/admin/updateOrder/<?php echo e($view_order->sales_id); ?>" data-parsley-validate class="m-t-40">
		<?php echo csrf_field(); ?> 
		<?php echo e(method_field('PUT')); ?>

		<input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
		<div class="container-fluid" style="margin-top:-30px">
			<div class="row">
				<div class="col-md-3">
					<div class="card card-outline-info">
						<div class="card-header">
							<h4 class="m-b-0 text-white">Customer Details</h4>
						</div>
						<div class="card-block">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" readonly class="form-control form-control-line" name="bill_no" value="<?php echo e($view_order->bill_number); ?>" readonly="" id="bill_no">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" id="bill_date" name="bill_date" required data-parsley-required-message= "Enter Sales Date" value="<?php echo e($view_order->created_at->format('d-m-Y   H:i:s')); ?>" readonly="">
									</div>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" name="sales_person" value="<?php echo e($sales_person->username); ?>" required data-parsley-required-message= "Enter Sales Person" readonly="" id="sales_person">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" name="me_code" id="me_code" placeholder="ME Code" Name" required data-parsley-required-message= "Enter ME Code." data-parsley-trigger="keyup"  data-parsley-type="number" value="<?php echo e($view_order->me_code); ?>">
									</div>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" name="customer_name"  id="customer_name" required data-parsley-required-message= "Enter Customer Name" placeholder="CustomerName" value="<?php echo e($view_order->customer_name); ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" name="customer_phone" id="customer_phone" required data-parsley-required-message= "Enter Customer Phone No." placeholder="CustomerNumber" data-parsley-trigger="keyup"  data-parsley-type="number" value="<?php echo e($view_order->customer_phone); ?>">
									</div>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea type="text"  class="form-control form-control-line" name="customer_address" id="customer_address" placeholder="CustomerAddress" required data-parsley-required-message= "Enter Customer Address."><?php echo e($view_order->customer_address); ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea type="text"  class="form-control form-control-line" name="shipping_address" id="shipping_address" placeholder="ShippingAddress" required data-parsley-required-message= "Enter Customer Address."><?php echo e($view_order->shipping_address); ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text"  class="form-control form-control-line" name="customer_gst_no" id="customer_gst_no" placeholder="Customer GST" required data-parsley-required-message= "Enter Customer GST No." data-parsley-trigger="keyup"  data-parsley-pattern="(?:\s*[a-zA-Z0-9]\s*)*" value="<?php echo e($view_order->customer_gst); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card card-outline-info">
						<div class="card-header">
							<h4 class="m-b-0 text-white">Bill Details( Update Order Request)</h4>
						</div>
						<div class="card-block">
							<div class="row">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Product Name</th>
												<th>Batch No</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>GST</th>
												<th>Discount%</th>
												<th>Total</th>
												<th></th>
											</tr>
										</thead>
										<tbody id="add_products">
											<tr>
												<td>
													<select name="product_name" id="product_name" class="form-control product" style="width: 100%">
													</select> 
													<span id="product_name_error" style="color:red"></span>
												</td>
												<td>
													<select class="chose" id="batch_no"  name="batch_no" style="width: 100%" >

													</select>
													<span id="batch_no_name_error" style="color:red"></span>
												</td>
												<td>
													<input type="text"  class="form-control form-control-line" name="quantity" id="quantity" data-parsley-trigger="keyup"  data-parsley-type="number" readonly="">
													<span id="product_quantity_error" style="color:red"></span>
												</td>
												<td>
													<input type="text" class="form-control form-control-line" name="price" id="price" readonly="">
													<input type="hidden"  class="form-control form-control-line" name="basic_cost" id="basic_cost">
												</td>
												<td>
													<input type="text"  class="form-control form-control-line" name="gst" id="gst" >
													
												</td>
												<td>
													<input type="text"  class="form-control form-control-line" name="discount_per" id="discount_per"  min="0" max="99" step="99" data-parsley-validation-threshold="1" data-parsley-trigger="keyup"  data-parsley-type="number">
												</td>
												<td>
													<input type="text" readonly class="form-control form-control-line" name="total" id="total">
												</td>
												<td>
													<button type="button" class="btn btn-circle btn-sm btn-success waves-effect waves-dark" id="add_values_order">+</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="card card-outline-info">
						<div class="card-header">
							<h4 class="m-b-0 text-white">Order Product</h4>
						</div>
					    <table class="table" id="stock_request_send" style="width: 100%">
					        <thead>
					            <tr>
					                <th>Product Name</th>
					                <th>Batch No</th>
					                <th>Quantity</th>
					                <th>Price</th>
					                <th>GST</th>
					                <th>Discount</th>
					                <th>Total</th>
					                <th>Delete</th>
					            </tr>
					        </thead>
					        <?php if($count>0): ?>
					        <tbody>
					            <?php $__currentLoopData = $product_payment_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                             
					            <tr>
					            	<input type="hidden" name="sales_id" id="sales_id" value="<?php echo e($details->sales_id); ?>">
					            	<input type="hidden" name="mrp" id="mrp" value="<?php echo e($details->mrp); ?>">
					                <td><?php echo e($details->name); ?></td>
					                <td><?php echo e($details->batch_id); ?></td>
					                <td><?php echo e($details->product_qty); ?></td>
					                <td><?php echo e($details->basic_cost); ?></td>
					                <td><?php echo e($details->gst); ?></td>
					                <td><?php echo e($details->discount); ?></td>
					                <td><?php echo e($details->mrp); ?></td>
					                <td><a onclick="(cancel_product(<?php echo e($details->sales_ids); ?>));" style="cursor: pointer;"><img src="<?php echo e(URL::to('/')); ?>/img/delete.png"></a></td>

					            </tr>
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					        <?php endif; ?>
					   		<tbody>
								<tr>
									<td colspan="9" style="text-align: right;">
										<label class="col-md-12">
											<h5>Grand Total</h5>
											<input type="hidden" class="form-control" value="" id="gt">
											<h1><i class="fa fa-inr" aria-hidden="true"></i><span id="grand_total"><?php echo e($total_amount); ?></span></h1>
										</label>
									</td>
								</tr>
							</tbody>
					    </table>
				    	<br>
					</div>
				</div>
				<hr>
				<input type="hidden" name="inc_val" id="inc_val" value=0>
			</div>
			<div class="row"  id="payment">
				<div class="col-md-12">
					<div class="card card-outline-info">
						<div class="card-header">
							<h4 class="m-b-0 text-white">Payment Details</h4>
						</div>
						<?php $__currentLoopData = $pay_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="card-block">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="col-md-12"><strong>Payment Type</strong></label>
										<div class="col-md-12">
											<select class="form-control p-0" required  data-parsley-required-message="Select Mode" id="payment_type" name="payment_type" onclick="check_mode()">
												<option value="">Select</option>
												<option value="normal" <?php if($count>0 && $pay_detail->status=='normal'): ?><?php echo e('selected'); ?><?php endif; ?> >Normal</option>
												<option value="partial" <?php if($count>0 && $pay_detail->status=='partial'): ?><?php echo e('selected'); ?><?php endif; ?> >Partial</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3"  id="display_mode">
									<div class="form-group">
										<label class="col-md-12"><strong>Payment Mode </strong></label>
										<div class="col-md-12">
											<select class="form-control p-0" required  data-parsley-required-message="Select Mode" id="payment_mode" name="payment_mode">
												<option value="">Select</option>
												<option value="cash"  id="1">Cash</option>
												<option value="card"  id="2">Card</option>
												<option value="credit"  id="3">Credit</option>
												<option value="cheque"  id="4">Cheque</option>
												<option value="online"  id="5">Online</option>
												<option value="both"  id="6">Both</option>
												<option value="charity"  id="7">Charity</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-block">
							<div class="row">
								<div class="col-md-2" id="cash_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Total Amount </label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="total_amount" id="total_amount" readonly="" value="<?php echo e($total_amount); ?>">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="cash_paid_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12" id="paid_cash">Paid Amount</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="paid_amount" id="paid_amount" value="0" data-parsley-trigger="keyup"  data-parsley-type="number"> 
										</div>
									</div>
								</div>
								<div class="col-md-2" id="card_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">By Card</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="card" id="card" value="0" data-parsley-trigger="keyup"  data-parsley-type="number" readonly="">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="balance_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Balance Amount</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="balance" id="balance" readonly="" value="0">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="transaction_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Transaction No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="transaction_no" id="transaction_no" value="0" data-parsley-trigger="keyup"  data-parsley-type="number">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="reference_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Reference No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="reference_no" id="reference_no" value="0" data-parsley-trigger="keyup"  data-parsley-type="number">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="cheque_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Cheque No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="cheque_no" id="cheque_no" value="0" data-parsley-trigger="keyup"  data-parsley-type="number">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="account_div" style="display: none">
									<div class="form-group">
										<label class="col-md-12">Account No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="account_no" id="account_no" value="0" data-parsley-trigger="keyup"  data-parsley-type="number">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-block">
							<div class="row">
								<div class="col-lg-12 col-xlg-12 col-md-12">
									<div class="form-group">
										<div class="col-sm-12">
											<input type="submit" class="btn btn-success pull-left" style="margin-right:1%" value="Update" name="submit">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js"></script>
<script src="<?php echo e(URL::asset('js/updateorder.js')); ?>"></script>
<script type="text/javascript">

	/* Display Product Name */
	$('select[name="product_name"]').select2({
	  placeholder: 'Select an product',
  		containerCssClass : 'bigdrop',
	   ajax: {
		    url: '<?php echo e(URL::to('/')); ?>/autocomplete/product_details',
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
	    // alert(data.billing_price);
		$(this).parents('tr').find('input[name="price"]').val(data.billing_price);
		$(this).parents('tr').find('input[name="gst"]').val(data.gst);
		$(this).parents('tr').find('input[name="discount_per"]').val(data.product_discount);
		$(this).parents('tr').find('input[name="basic_cost"]').val(data.basic_cost);
	});
		/* Select Batch No */
	$('select[name="batch_no"]').select2({
	  placeholder: 'Select an Batch',
  		containerCssClass : 'bigdrop',
	   ajax: {
		    url: '<?php echo e(URL::to('/')); ?>/autocomplete/product_details',
		    dataType: 'json',
		    method:'post',
		    data:function (params) {
		      	var query = {
		      	productId:$('#product_name').val(),	
		        batch:1,
		        type: 'public',
		        _token:'<?php echo e(csrf_token()); ?>',
		      	}
		      	return query;
		    }
      	}
	}).on('select2:select', function (e) {		
	    var data = e.params.data;
	    
	});

	/* Sum Available Quantity */
	$('#quantity').keyup(function() 
	{
		var productName=$("#product_name").val();
		var batch_no=$("#batch_no").val();
		var quantity=$("#quantity").val();
		$.ajax({
			type: "get",
			url: "<?php echo e(URL::to('/')); ?>/product/quantity_details",
			data:{productId:productName,batch_no:batch_no},
			dataType:'json',
			success: function(data){
				//alert(data);
				if(quantity>data)
				{
					$( "#quantity" ).focus();
					swal("Only "+data+" quantity available");
					$( "#quantity" ).val(data);
					$( "#total" ).val(0);
					
				}	
			}
		})
	})

	/* Check Expiry Date */


$('.chose').on('select2:select', function (e) {		

	    var productName=$("#product_name").val();
		var batch_no=$("#batch_no").val();
		var quantity=$("#quantity").val();
		if(batch_no=="null"){
			document.getElementById("quantity").readOnly = true;
		}
		else{
			document.getElementById("quantity").readOnly = false;
		}
		$.ajax({
			type: "get",
			url: "<?php echo e(URL::to('/')); ?>/product/expiry_date",
			data:{productId:productName,batch_no:batch_no},
			dataType:'json',
			success: function(data){
				//alert(data);
				if(data==1)
				{
					$( "#batch_no" ).focus();
					swal("Expiry date completed");
				}	
			}
		})
	});
	function cancel_product(id) 
	{
		var sales_id = $("#sales_id").val();
		swal({
        title: "Cancel !!!",
        text: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    }, function (isConfirm) {
        if (isConfirm) {
        $.ajax({
            url: "<?php echo e(URL::to('admin/updateOrder/cancel_product')); ?>",
            type: "get",
            data: { method: 'get',"_token": "<?php echo e(csrf_token()); ?>","id":id},
            dataType: "html",
            success: function (data) {
                swal("Done!", "Update Amount !!!", "success");
                setTimeout(function() {
              window.location.href = "<?php echo e(URL::to('/')); ?>/admin/updateOrder/"+sales_id
            }, 2000);
                                   
            },
        });

      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
	}
</script>

<?php if(session()->has('sweet_alert.title')): ?>
    <script>
       swal('Success Message', 'Success');
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>