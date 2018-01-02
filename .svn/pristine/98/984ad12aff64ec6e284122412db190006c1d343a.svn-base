<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<style type="text/css">
		.invoice-title h2, .invoice-title h3,  .invoice-title h4 {
			display: inline-block;
		}
		.table > tbody > tr > .no-line {
			border-top: none;
		}
		.table > thead > tr > .no-line {
			border-bottom: none;
		}
		.table > tbody > tr > .thick-line {
			border-top: 2px solid;
		}
		.thick-line {
			border-top: 1px solid;
		}
	</style>
	<body style="max-width: 500px; font-family: 'Oswald', serif;   font-size: 20px;">
		<div class="container" style="max-width: 500px; font-size: 20px;">
			<div class="row">
				<div class="col-md-12">
					<img src="http://heeramart.co/foodex_hyderabad/logonew.png" style="width:500px;"><br>
					<div class="row">
						<br>
						<div class="col-xs-12" style="text-align: center;">
							<address>
								GST No:<?php echo e($address->gst_no); ?><br>
								<?php echo str_replace("\n", '<br />', $address->address); ?><?php echo e($address->pin_number); ?><br>

								Phone :<?php echo e($address->phone_number); ?>

							</address>
						</div>
					</div>
					<div class="row">
						<div class="invoice-title" style="text-align: center; margin-top:-35px">
							<h2><u>Sales Invoice</u></h2>
						</div>
					</div>
					<div class="row">
						<div class="invoice-title" style="text-align: right; margin-right:15px;">
							<address>
								Bill # : HF<?php echo e($view_order->bill_number); ?></h4><br>
								Date : <?php echo e($view_order->created_at->format('d-m-Y   H:i:s ')); ?><br>
								Salesman: <?php echo e($sales_person->username); ?><br>
								ME Code: <?php echo e($view_order->me_code); ?><br>
							</address>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<address>
								<u>Billed To:</u><br>
								<?php echo e($view_order->customer_name); ?><br>
								<?php echo str_replace("\n", '<br />', $view_order->customer_address); ?><br>
								<?php echo e($view_order->customer_phone); ?>

							</address>
						</div>
						<div class="col-xs-6 text-right">
							<address>
								<u>Shipped To:</u><br>
								<?php echo str_replace("\n", '<br />', $view_order->shipping_address); ?>

							</address>
						</div>
						<div class="col-xs-12 text-right">
							<address>
								Customer GST # : <?php echo e($view_order->customer_gst); ?>

							</address>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<table class="table" style="max-width: 500px;font-size: 16px; ">
					<thead>
						<tr>
							<td style="width:60%"><strong>Item</strong></td>
							<td class="text-right" style="width:10%"><strong>Price</strong></td>
							<td class="text-right" style="width:10%"><strong>Quantity</strong></td>
							<td class="text-right" style="width:10%"><strong>Disc%</strong></td>
							<td class="text-right" style="width:10%"><strong>Total</strong></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$p = 0;
							$q=0;
							$discount = 0;
						?>
						<?php $__currentLoopData = $product_payment_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td style="width:60%"><?php echo e($details->name); ?></td>
								<td class="text-right" style="width:10%"><?php echo e($details->billing_price); ?></td>
								<td class="text-right" style="width:10%"><?php echo e($details->product_qty); ?></td>
								<td class="text-right" style="width:10%"><?php echo e($details->discount); ?> 
									<?php $discount += ($details->billing_price * ($details->discount/100)) * $details->product_qty; ?>
								</td>
								<td class="text-right" style="width:10%"><?php echo e($details->mrp); ?></td>
								<td class="thick-line"></td>
								<?php
								$q+=$details->product_qty;
								$p++;
								?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-xs-12 text-right">
					<address>
						Total Products : <?php echo e($p); ?> Products / <?php echo e($q); ?> Items<br>
						CGST Amount: ₹ <?php echo e($total_gst/2); ?><br>
						SGST Amount: ₹ <?php echo e($total_gst/2); ?><br>
						Saved Amount : ₹ <?php echo e($discount); ?><br>
						Payment Mode : <?php echo e(ucwords($details->payment_mode)); ?><?php if($details->status=='partial'): ?>(<?php echo e(ucwords($details->status)); ?>) <?php endif; ?><br>
						<?php if($details->payment_mode=='cash' || $details->payment_mode=='card' || $details->payment_mode=='cheque' ): ?>
							Amount Paid : ₹ <?php echo e($details->paid_amount); ?><br>
							Balance Amount : ₹ <?php echo e($details->balance); ?><br>
						<?php endif; ?>
						<?php if($details->payment_mode=='online'): ?>
							Account No : <?php echo e($details->account_number); ?><br>
							Transaction no :<?php echo e($details->transaction_number); ?>

						<?php endif; ?>
						<?php if($details->payment_mode=='cheque'): ?>
							Cheque No : <?php echo e($details->cheque_number); ?>

						<?php endif; ?>
						<?php if($details->payment_mode=='both'): ?>
							By Cash :<?php echo e($details->paid_amount); ?><br>
							By Card :<?php echo e($details->card_amount); ?>

						<?php endif; ?>
					</address>
				</div>
			</div>
			<div class="row" style="margin-top:-20px">
				<div class="thick-line"></div>
				<div class="invoice-title" style="text-align: center; margin-top:-20px">
					<h1>₹ <strong><?php echo e($total_amount); ?></strong></h1>
				</div>
			</div>
			<div class="row" >
				<div class="thick-line"></div>
				<div class="invoice-title" style="text-align: center">
					Thank you for shopping visit again.<br>
				</div>
				<div class="thick-line"></div>
			</div>
			<div class="row" >
				<div class="thick-line"></div>
				<div class="invoice-title" style="text-align: left;">
					Customer Copy...
				</div>
			</div>
		</div>
	</body>
</html>
