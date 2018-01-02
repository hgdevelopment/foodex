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
	<title> HEERA FOODEX</title>
	<body style="max-width: 500px; font-family: 'Oswald', serif;">
	<button onclick="printpage()" id="printButton">print</button>
	<script type="text/javascript">
	function printpage() 
	{
	 document.getElementById('printButton').style.visibility = "hidden";
	 window.print();
	 setTimeout(function(){ document.getElementById('copy').innerHTML = "Original copy"; 
		window.print();
		window.close(); }, 500);
	}
</script>

		<div class="container" style="max-width: 500px;">
			<div class="row" style="font-size: 14px !important">
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
								Bill # : HF<?php echo e($view_order->bill_number); ?><br>
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
				<table class="table" style="max-width: 500px;font-size: 14px !important " cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td style="width:60%"><strong>Item</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 0px !important"><strong>Price</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Qty</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Disc%</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Total</strong></td>
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
								<td style="width:60%;font-size: 13.5px !important"><?php echo e($details->name); ?></td>
								<td class="text-right" valign="center" style="width:10%;padding: 2px 0px !important"><?php echo e($details->billing_price); ?></td>
								<td class="text-right" valign="center"  style="width:10%;padding: 2px 2px !important""><?php echo e($details->product_qty); ?></td>
								<td class="text-right" valign="center"  style="width:10%;padding: 2px 2px !important""><?php echo e($details->discount); ?> 
									<?php $discount += ($details->billing_price * ($details->discount/100)) * $details->product_qty; ?>
								</td>
								<td class="text-right" valign="center"  style="width:10%;padding: 2px 2px !important""><?php echo e($details->mrp); ?></td>
								
								<?php
								$q+=$details->product_qty;
								$p++;
								?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</tbody>
				</table>
			</div>
			<div class="row" style="    margin-right: -35px !important;">
				<?php $__currentLoopData = $pay_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<table width="100%" style="font-size: 14px !important " cellpadding="0" cellspacing="0">
					<tbody>
					<tr>
						<td align="right" colspan="2">Total Products :<?php echo e($p); ?> Products /</td><td> <?php echo e($q); ?> Items</td>
					</tr>

					<tr>
						<td align="right">CGST Amount </td><td> :</td><td>₹ <?php echo e(round($total_gst/2)); ?></td>
					</tr>

					<tr>
						<td align="right" >SGST Amount </td><td> :</td><td>₹ <?php echo e(round($total_gst/2)); ?></td>
					</tr>

					<tr>
						<td align="right">Saved Amount </td><td> :</td><td>₹ <?php echo e($discount); ?></td>
					</tr>
					<?php if($pay_detail->status!='partial'): ?>
					<tr>
						<td align="right">Payment Mode </td><td> : </td><td><?php echo e(ucwords($pay_detail->payment_mode)); ?></td>
					</tr>
					<?php endif; ?>

					<?php if($pay_detail->status=='partial'): ?>
					<tr>	<td align="right">Payment Mode </td><td> :</td><td><?php echo e(ucwords($pay_detail->status)); ?></td></tr>
						<?php $__currentLoopData = $partial_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partial_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr><td align="right">Amount Paid (<?php echo e(ucwords($partial_detail->payment_mode)); ?>)</td><td>:</td><td> ₹ <?php echo e($partial_detail->paid_amount); ?></td></tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

					<?php if($pay_detail->payment_mode=='cash' || $pay_detail->payment_mode=='card' || $pay_detail->payment_mode=='cheque' ): ?>
						<?php if($pay_detail->status!='partial'): ?>
							<tr><td align="right">Amount Paid </td><td> :</td><td>₹ <?php echo e($pay_detail->paid_amount); ?></td></tr>
						<?php endif; ?>
							<tr><td align="right">Balance Amount </td><td> :</td><td> ₹ <?php echo e($pay_detail->balance); ?></td></tr>
					<?php endif; ?>

					<?php if($pay_detail->payment_mode=='online'): ?>
						<tr><td align="right">Account No </td><td> :</td><td> <?php echo e($pay_detail->account_number); ?></td></tr>
						<tr><td align="right">Transaction no </td><td> :</td><td><?php echo e($pay_detail->transaction_number); ?></td></tr>
					<?php endif; ?>

					<?php if($pay_detail->payment_mode=='cheque'): ?>
						<tr><td align="right">Cheque No </td><td> :</td><td> <?php echo e($pay_detail->cheque_number); ?></td></tr>
					<?php endif; ?>

					<?php if($pay_detail->payment_mode=='both'): ?>
						<tr><td align="right">By Cash </td><td> :</td><td><?php echo e($pay_detail->paid_amount); ?></td></tr>
						<tr><td align="right">By Card </td><td> :</td><td><?php echo e($pay_detail->card_amount); ?></td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>

			<div style="clear: both;">&nbsp;</div>

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
				<div class="invoice-title" style="text-align: left;" id="copy">
					Customer Copy...
				</div>
			</div>
		</div>
	</body>
</html>
