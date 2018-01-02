<?php $__env->startSection('fullname',$editmember->name); ?>
<?php $__env->startSection('guardian',$editmember->guardian); ?>
<?php $__env->startSection('religion',$editmember->religion); ?>
<?php $__env->startSection('caste',$editmember->caste); ?>
<?php $__env->startSection('dateofbirth',$editmember->dob); ?>
<?php $__env->startSection('education',$editmember->education); ?>
<?php $__env->startSection('marital',$editmember->maritalStatus); ?>
<?php $__env->startSection('occupation',$editmember->occupation); ?>
<?php $__env->startSection('gender',$editmember->gender); ?>
<?php $__env->startSection('country',$editmember->countryId); ?>
<?php $__env->startSection('income',$editmember->incomeAmount); ?>
<?php $__env->startSection('incomeid',$editmember->incomeCurrencytype); ?>
<?php $__env->startSection('childrens',$editmember->noOfChildren); ?>
<?php $__env->startSection('mobileno',$editmember->mobileNo); ?>
<?php $__env->startSection('conId1',$editmember->mobileId); ?>
<?php $__env->startSection('landlineno',$editmember->LandlineNo); ?>
<?php $__env->startSection('email',$editmember->email); ?>
<?php $__env->startSection('aboutheera',$editmember->aboutHeera); ?>
<?php $__env->startSection('signature',$editmember->singnature); ?>
<?php $__env->startSection('photo',$editmember->photo); ?>
<?php $__currentLoopData = $editaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($address->typeOfAddress=='permanent'): ?>
<?php $__env->startSection('per_address',$address->address); ?>
<?php $__env->startSection('percity',$address->city); ?>
<?php $__env->startSection('perstate',$address->state); ?>
<?php $__env->startSection('percountry',$address->Country); ?>
<?php $__env->startSection('perpin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='correspondance'): ?>
<?php $__env->startSection('corr_address',$address->address); ?>
<?php $__env->startSection('corrcity',$address->city); ?>
<?php $__env->startSection('corrstate',$address->state); ?>
<?php $__env->startSection('corrcountry',$address->Country); ?>
<?php $__env->startSection('corrpin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='official'): ?>
<?php $__env->startSection('off_address',$address->address); ?>
<?php $__env->startSection('offcity',$address->city); ?>
<?php $__env->startSection('offstate',$address->state); ?>
<?php $__env->startSection('offcountry',$address->Country); ?>
<?php $__env->startSection('offpin',$address->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('proofId',$editproof->typeOfProof); ?>
<?php $__env->startSection('proof_number',$editproof->proofNumber); ?>
<?php $__env->startSection('proof_file',$editproof->file); ?>
<?php $__env->startSection('idproof',$editproof->idproof); ?> 
<?php $__env->startSection('edit_id',$editmember->userId); ?> 
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.members.editApprovedMemView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>