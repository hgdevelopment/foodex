<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Add Sales</h2>
		</div>
	</div>
	<form method="post" action="functions/savesales.php" data-parsley-validate class="m-t-40"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-block">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Bill Number</label>
										<div class="col-md-12">
											<input type="text" readonly class="form-control form-control-line" name="bill_no" value="" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Date</label>
										<div class="col-md-12">
											<input type="date"  class="form-control form-control-line" id="bill_date" name="bill_date" required data-parsley-required-message= "Enter Sales Date">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Sales Person</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="sales_person" value="0000000002" required data-parsley-required-message= "Enter Sales Person">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Customer Name</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="customer_name" required data-parsley-required-message= "Enter Customer Name">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Phone Number</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="customer_phone" required data-parsley-required-message= "Enter Customer Phone No.">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-12">Customer Address</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="customer_address">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Item</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Discount</th>
											<th>Total</th>
											<th>Free Stock</th>
											<th></th>
										</tr>
									</thead>
									<tbody id="add_products">
										<tr>
											<td></td>
											<td><input type="text" class="form-control form-control-line" name="product_code" id="product_code"><span id="product_code_error" style="color:red"></span></td>
											<td><input type="text" readonly class="form-control form-control-line" name="product_name" id="product_name"></td>
											<td><input type="text" class="form-control form-control-line" name="product_quantity" id="product_quantity"><span id="product_quantity_error" style="color:red"></span></td>
											<td><input type="text" readonly class="form-control form-control-line" name="product_price" id="product_price"></td>
											<td><input type="text" class="form-control form-control-line" name="product_discount" id="product_discount"></td>
											<td><input type="text" readonly class="form-control form-control-line" name="product_total" id="product_total"></td>
											<td><input type="text" readonly class="form-control form-control-line" name="product_free" id="product_free"></td>
											<td><button type="button" class="btn btn-circle btn-sm btn-success waves-effect waves-dark" id="add_values">+</button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<input type="hidden" name="inc_val" id="inc_val" value=0>

			<div class="row">
				<div class="col-lg-4 col-xlg-4 col-md-4" style="float:right">
					<div class="card">
						<div class="card-block">
							<div class="form-group">
								<label class="col-md-12"><h3><u>Grand Total</u></h3></label>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<input type="hidden" class="form-control" value="" id="gt">
										<label class="col-md-12"><h1>Rs.</h1></label>
									</div>
									<div class="col-md-10">
										<label class="col-md-12"><h1><span id="grand_total" style="float:left;"></span></h1></label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="card">
						<div class="card-block">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="col-md-12">Payment Mode</label>
										<div class="col-md-12">
											<select class="form-control form-control-line" required  data-parsley-required-message="Select Mode" id="payment_mode" name="payment_mode">
												<option value="">Select</option>
												<option value="cash">Cash</option>
												<option value="card">Card</option>
												<option value="both">Both</option>
												<option value="credit">Credit</option>
												<option value="cheque">Cheque</option>
												<option value="online">Online</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-2" id="cash_div">
									<div class="form-group">
										<label class="col-md-12">By Cash </label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="cash" id="cash">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="cash_paid_div">
									<div class="form-group">
										<label class="col-md-12">Cash Paid</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="cash_paid" id="cash_paid">
										</div>
									</div>
								</div>
								<div class="col-md-2" id="card_div">
									<div class="form-group">
										<label class="col-md-12">By Card</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line" name="card" id="card">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="transaction_div">
									<div class="form-group">
										<label class="col-md-12">Transaction No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="cheque_div">
									<div class="form-group">
										<label class="col-md-12">Cheque No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line">
										</div>
									</div>
								</div>
								<div class="col-md-3" id="account_div">
									<div class="form-group">
										<label class="col-md-12">Account No</label>
										<div class="col-md-12">
											<input type="text"  class="form-control form-control-line">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-xlg-12 col-md-12">
									<div class="form-group">
										<div class="col-sm-12">
											<input type="reset" class="btn btn-info pull-right" value="Reset" name="reset">
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
<script src="<?php echo e(URL::asset('js/sales.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>