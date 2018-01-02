<?php $__env->startSection('unit_name',$editUnit->unit_name); ?>
<?php $__env->startSection('branch_name',$editUnit->branch_id); ?>
<?php $__env->startSection('edit_id',$editUnit->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.unit.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>