<?php $__env->startSection('companyName',$dsaDetails->companyName); ?>
<?php $__env->startSection('name',$dsaDetails->name); ?>
<?php $__env->startSection('guardian',$dsaDetails->guardian); ?>
<?php $__env->startSection('dob',$dsaDetails->dob); ?>
<?php $__env->startSection('aboutHeera',$dsaDetails->aboutHeera); ?>
<?php $__env->startSection('maritalStatus',$dsaDetails->maritalStatus); ?>
<?php $__env->startSection('gender',$dsaDetails->gender); ?>
<?php $__env->startSection('country',$dsaDetails->countryId); ?>
<?php $__env->startSection('mobileNo',$dsaDetails->mobileNumber); ?>
<?php $__env->startSection('mobileId',$dsaDetails->mobileId); ?>
<?php $__env->startSection('email',$dsaDetails->email); ?>
<?php $__env->startSection('telePhoneNo',$dsaDetails->telePhoneNo); ?>

<?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($dsaaddress->typeOfAddress=='official'): ?>
<?php $__env->startSection('officialAddress',$dsaaddress->address); ?>
<?php $__env->startSection('officialState',$dsaaddress->state); ?>
<?php $__env->startSection('officialCity',$dsaaddress->city); ?>
<?php $__env->startSection('officialPin',$dsaaddress->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($dsaaddress->typeOfAddress=='permanent'): ?>
<?php $__env->startSection('permanentAddress',$dsaaddress->address); ?>
<?php $__env->startSection('permanentState',$dsaaddress->state); ?>
<?php $__env->startSection('permanentCity',$dsaaddress->city); ?>
<?php $__env->startSection('permanentPin',$dsaaddress->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($dsaaddress->typeOfAddress=='correspondance'): ?>
<?php $__env->startSection('corrsAddress',$dsaaddress->address); ?>
<?php $__env->startSection('corrsState',$dsaaddress->state); ?>
<?php $__env->startSection('corrsCity',$dsaaddress->city); ?>
<?php $__env->startSection('corrsPin',$dsaaddress->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('typeOfProof',$dsaProof->typeOfProof); ?>
<?php $__env->startSection('idNumber',$dsaProof->proofNumber); ?>


<?php $__env->startSection('paymentMode',$dsapaymentdetails->payment_mode); ?>
<?php $__env->startSection('number',$dsapaymentdetails->transactionNumber); ?>
<?php $__env->startSection('depositDate',$dsapaymentdetails->paymentDate); ?>
<?php $__env->startSection('bankName',$dsapaymentdetails->bank); ?>
<?php $__env->startSection('branch',$dsapaymentdetails->branch); ?>
<?php $__env->startSection('accountNo',$dsapaymentdetails->accountNumber); ?>

<?php $__env->startSection('holderName',$dsabank->accountHolderName); ?>
<?php $__env->startSection('incaccountnumber',$dsabank->accountNumber); ?>
<?php $__env->startSection('incbankName',$dsabank->bankName); ?>
<?php $__env->startSection('incBranchName',$dsabank->branchName); ?>
<?php $__env->startSection('incIfscCode',$dsabank->ifsc); ?>

<?php $__env->startSection('refName',$dsareference->name ); ?>
<?php $__env->startSection('refaddress',$dsaaddress->address ); ?>
<?php $__env->startSection('refDistrict',$dsaaddress->city); ?>
<?php $__env->startSection('refState',$dsaaddress->state); ?>
<?php $__env->startSection('refPin',$dsaaddress->pin); ?>
<?php $__env->startSection('refMobileNo',$dsareference->referenceMobileNumber); ?>
<?php $__env->startSection('refEmail',$dsareference->referenceEmail); ?>
<?php $__env->startSection('relationship',$dsareference->referenceRelation); ?>
<?php $__env->startSection('edit_id',$dsaDetails->userId); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dsa.editDsa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>