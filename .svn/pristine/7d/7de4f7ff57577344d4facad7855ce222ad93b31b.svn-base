<?php $__env->startSection('fullname',$blacklistedit->name); ?>
<?php $__env->startSection('guardian',$blacklistedit->guardian); ?>
<?php $__env->startSection('religion',$blacklistedit->religion); ?>
<?php $__env->startSection('caste',$blacklistedit->caste); ?>
<?php $__env->startSection('dateofbirth',$blacklistedit->dob); ?>
<?php $__env->startSection('education',$blacklistedit->education); ?>
<?php $__env->startSection('marital',$blacklistedit->maritalStatus); ?>
<?php $__env->startSection('occupation',$blacklistedit->occupation); ?>
<?php $__env->startSection('gender',$blacklistedit->gender); ?>
<?php $__env->startSection('country',$blacklistedit->countryId); ?>
<?php $__env->startSection('income',$blacklistedit->incomeAmount); ?>
<?php $__env->startSection('incomeid',$blacklistedit->incomeCurrencytype); ?>
<?php $__env->startSection('childrens',$blacklistedit->noOfChildren); ?>
<?php $__env->startSection('aboutheera',$blacklistedit->aboutHeera); ?>
<?php $__env->startSection('mobileno',$blacklistedit->mobileNo); ?>
<?php $__env->startSection('conId1',$blacklistedit->mobileId); ?>
<?php $__env->startSection('landlineno',$blacklistedit->LandlineNo); ?>
<?php $__env->startSection('email',$blacklistedit->email); ?>
<?php $__env->startSection('signature',$blacklistedit->singnature); ?>
<?php $__env->startSection('photo',$blacklistedit->photo); ?>
<?php $__currentLoopData = $blacklistaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($address->typeOfAddress=='permanent'): ?>
<?php $__env->startSection('per_address',$address->address); ?>
<?php $__env->startSection('per_city',$address->city); ?>
<?php $__env->startSection('per_state',$address->state); ?>
<?php $__env->startSection('per_country',$address->Country); ?>
<?php $__env->startSection('per_pin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='correspondance'): ?>
<?php $__env->startSection('corr_address',$address->address); ?>
<?php $__env->startSection('corr_city',$address->city); ?>
<?php $__env->startSection('corr_state',$address->state); ?>
<?php $__env->startSection('corr_country',$address->Country); ?>
<?php $__env->startSection('corr_pin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='official'): ?>
<?php $__env->startSection('official_addr',$address->address); ?>
<?php $__env->startSection('official_city',$address->city); ?>
<?php $__env->startSection('official_state',$address->state); ?>
<?php $__env->startSection('official_country',$address->Country); ?>
<?php $__env->startSection('official_pin',$address->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('proofId',$blacklistproof->typeOfProof); ?>
<?php $__env->startSection('proof_number',$blacklistproof->proofNumber); ?>
<?php $__env->startSection('proof_file',$blacklistproof->file); ?>
<?php $__env->startSection('idproof',$blacklistproof->idproof); ?> 
<?php $__env->startSection('edit_id',$blacklistedit->userId); ?> 
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.members.editBlacklistMemberView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>