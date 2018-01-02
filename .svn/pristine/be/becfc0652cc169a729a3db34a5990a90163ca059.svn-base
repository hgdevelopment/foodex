<?php $__env->startSection('fullname',$viewmember->name); ?>
<?php $__env->startSection('guardian',$viewmember->guardian); ?>
<?php $__env->startSection('dateofbirth',$viewmember->dob); ?>
<?php $__env->startSection('gender',$viewmember->gender); ?>
<?php $__env->startSection('religion',$viewmember->religion); ?>
<?php $__env->startSection('caste',$viewmember->caste); ?>
<?php $__env->startSection('country',$viewmember->countryId); ?>
<?php $__env->startSection('education',$viewmember->education); ?>
<?php $__env->startSection('occupation',$viewmember->occupation); ?>
<?php $__env->startSection('income',$viewmember->incomeAmount); ?>
<?php $__env->startSection('incomeid',$viewmember->incomeCurrencytype); ?>
<?php $__env->startSection('marital',$viewmember->maritalStatus); ?>
<?php $__env->startSection('childrens',$viewmember->noOfChildren); ?>
<?php $__env->startSection('mobileno',$viewmember->mobileNo); ?>
<?php $__env->startSection('conId1',$viewmember->mobileId); ?>
<?php $__env->startSection('landlineno',$viewmember->LandlineNo); ?>
<?php $__env->startSection('email',$viewmember->email); ?>
<?php $__env->startSection('aboutheera',$viewmember->aboutHeera); ?>
<?php $__env->startSection('signature',$viewmember->singnature); ?>
<?php $__env->startSection('photo',$viewmember->photo); ?>
<?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('proofId',$viewmem->typeOfProof); ?>
<?php $__env->startSection('proof_number',$viewmem->proofNumber); ?>
<?php $__env->startSection('proof_file',$viewmem->file); ?>
<?php $__env->startSection('idproof',$viewmem->idproof); ?> 
<?php $__env->startSection('edit_id',$viewmember->userId); ?> 
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.members.editMemberReqView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>