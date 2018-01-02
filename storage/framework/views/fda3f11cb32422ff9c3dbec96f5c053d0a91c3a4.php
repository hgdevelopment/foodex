
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
			setTimeout(function(){ 
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
							<h2><u>Stock Invoice</u></h2>
						</div>
					</div>
					<div class="row">
						<div class="invoice-title" style="text-align: right; margin-right:15px;">
							<address>
								Transfer Date : <?php echo e($transfer_date->format('d-m-Y   H:i:s ')); ?><br>
								Stock Transfer To: <?php echo e($branch_name->branch_name); ?>

							</address>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<table class="table" style="max-width: 500px;font-size: 14px !important " cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td style="width:60%"><strong>Name</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Qty</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Amt</strong></td>
							<td class="text-right" style="width:10%;padding: 2px 2px !important"><strong>Total</strong></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$total_amount=0;
							$product_count = 0;
							$total_gst = 0;
							$gst=0;
						?>
						<?php $__currentLoopData = $transfer_product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php 
								$mrp = ($details->billing_price *  $details->product_qty);
								$total_amount += $mrp;
								$product_count++;
								$gst += $details->product_gst;
							?>

							<tr>
								<td style="width:60%;font-size: 13.5px !important"><?php echo e($details->product_name); ?></td>
								<td class="text-right" valign="center" style="width:10%;padding: 2px 0px !important"><?php echo e($details->product_qty); ?></td>
								<td class="text-right" valign="center"  style="width:10%;padding: 2px 2px !important""><?php echo e($details->billing_price); ?></td>
								<td class="text-right" valign="center"  style="width:10%;padding: 2px 2px !important""><?php echo e($mrp); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
			<?php
				$total_gst +=$total_amount*($gst/100);
			?>
			<div class="row" style="    margin-right: -30px !important;">
				<table width="100%" style="font-size: 14px !important " cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td align="right" colspan="2">Total Products :<?php echo e($product_count); ?> Products </td>
						</tr>

						<tr>
							<td align="right">CGST Amount </td><td> :</td><td>₹ <?php echo e(round($total_gst/2)); ?></td>
						</tr>

						<tr>
							<td align="right" >SGST Amount </td><td> :</td><td>₹ <?php echo e(round($total_gst/2)); ?></td>
						</tr>
						<tr>
							<td align="right">Total Amount </td><td> :</td><td><?php echo e($total_amount); ?></td>
						</tr>
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
					Thank you. Visit us a again.<br>
				</div>
				<div class="thick-line"></div>
			</div>
		</div>
	</body>
</html>
