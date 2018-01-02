<?php $__env->startSection(''); ?>
<?php $__env->startSection('edits',$tcnrequests->id); ?>
<?php $__env->startSection('editId','1'); ?>
<?php 
$Edit['code']=$memberregistrations->code; 

$Edit['tcnType']=$tcnrequests->tcn_id; 
$Edit['currencyType']=$tcnrequests->currencyType; 
$Edit['paymentMode']=$tcnrequests->paymentMode; 
$Edit['unit']=$tcnrequests->unit; 
$Edit['transactionNumber']=$tcnrequests->transactionNumber; 
$Edit['depositeDate']=$tcnrequests->depositeDate; 
$Edit['heeraAccountId']=$tcnrequests->heeraAccountId; 
$Edit['doc1']=$tcnrequests->doc1; 
$Edit['doc2']=$tcnrequests->doc2; 
$Edit['doc3']=$tcnrequests->doc3; 

$Edit['nominee']=$tcnrequests->nominee_id; 
$Edit['relationWithApplicant']=$nominees->relationWithApplicant; 
$Edit['dob']=$nominees->dob; 
$Edit['gender']=$nominees->gender; 

$Edit['proofId']=$proofs->id;


$Edit['addressId']=$address2->id; 

$Edit['selectAccountNumber']=$banks->id;

$Edit['country']=$countrys->id;

$Edit['editId']=$tcnrequests->id; 
 ?>

<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.tcn.tcnapplication.tcnApplicationForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>