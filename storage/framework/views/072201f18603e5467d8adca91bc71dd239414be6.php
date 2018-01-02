<?php $__env->startSection('tcnType',$edittcnmaster->tcnType); ?>
<?php $__env->startSection('inr',$edittcnmaster->inr); ?>
<?php $__env->startSection('aed',$edittcnmaster->aed); ?>
<?php $__env->startSection('usd',$edittcnmaster->usd); ?>
<?php $__env->startSection('sar',$edittcnmaster->sar); ?>
<?php $__env->startSection('cad',$edittcnmaster->cad); ?>
<?php $__env->startSection('openStatus',$edittcnmaster->openStatus); ?>
<?php $__env->startSection('lockingDuration',$edittcnmaster->lockingDuration); ?>
<?php $__env->startSection('benefitLockingDuration',$edittcnmaster->benefitLockingDuration); ?>
<?php $__env->startSection('profitDeclaration',$edittcnmaster->profitDeclaration); ?>

<?php $__env->startSection('header',$edittcnmaster->header); ?>
<?php $__env->startSection('indianCertificate',$edittcnmaster->indianCertificate); ?>
<?php $__env->startSection('certificateDmcc',$edittcnmaster->certificateDmcc); ?>

<?php $__env->startSection('editId',$edittcnmaster->id); ?>

<?php 
$Edit['openOn']=$edittcnmaster->openOn; 
$Edit['closeOn']=$edittcnmaster->closeOn; 
 ?>

<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.tcn.tcnmaster.tcn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>