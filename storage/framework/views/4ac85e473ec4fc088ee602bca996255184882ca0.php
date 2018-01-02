<?php $__env->startSection('brand_name',$editBrand->brand_name); ?>
<?php $__env->startSection('brand_description',$editBrand->brand_description); ?>
<?php $__env->startSection('edit_id',$editBrand->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.brand.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>