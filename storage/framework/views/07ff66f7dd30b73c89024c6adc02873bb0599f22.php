<?php $__env->startSection('branch_name',$editBranch->branch_name); ?>
<?php $__env->startSection('gst_no',$editBranch->gst_no); ?>
<?php $__env->startSection('address',$editBranch->address); ?>
<?php $__env->startSection('pin_number',$editBranch->pin_number); ?>
<?php $__env->startSection('phone_number',$editBranch->phone_number); ?>
<?php $__env->startSection('edit_id',$editBranch->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.branch.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>