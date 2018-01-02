<table class="table" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
	}}' id="table" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th>S&nbsp;NO</th>
		<th>MEMBER&nbsp;CODE</th>
		<th>MEMBER&nbsp;NAME</th>
		<th>APPROVED&nbsp;DATE</th>
		<th>TCN&nbsp;TYPE</th>
		<th>UNIT</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMOUNT</th>
		<th>NOMINEE&nbsp;NAME</th>
		<th>ACTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php $i=1;?>
		<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr data-expanded="true">
		<td align="center"><?php echo e($i); ?></td>
		<td><?php echo e($detail->code); ?></td>
		<td align="left"><?php echo e($detail->name); ?> <?php echo e($detail->guardian); ?></td>
		<td><?php echo e(date('d-m-Y',strtotime($detail->approvalDate))); ?></td>
		<td align="left" style="padding-left: 20px"><?php echo e($detail->tcn->tcnType); ?></td>
		<td align="center"><?php echo e($detail->unit); ?></td>
		<td align="right" style="padding-right: 30px"><?php echo e($detail->amount); ?></td>
		<td align="left"><?php echo e($detail->nominee->name); ?></td>
		<td style="cursor:pointer">

		      <a style="padding:2px 12px" class="btn btn-primary sm" href="<?php echo e(URL::to('/')); ?>/admin/tcnTransfer/<?php echo e('Show@@@'); ?><?php echo e($detail->tcnId); ?>">Transfer</a> 
		</td>
		</tr>
		<?php $i++;?>
		<input type="hidden" id="oldNominee" name="oldNominee" value="<?php echo e($detail->nominee->id); ?>"> 
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>