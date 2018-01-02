<?php $__env->startSection('fullname',$member->name); ?>
<?php $__env->startSection('guardian',$member->guardian); ?>
<?php $__env->startSection('religion',$member->religion); ?>
<?php $__env->startSection('caste',$member->caste); ?>
<?php $__env->startSection('dateofbirth',$member->dob); ?>
<?php $__env->startSection('education',$member->education); ?>
<?php $__env->startSection('marital',$member->maritalStatus); ?>
<?php $__env->startSection('occupation',$member->occupation); ?>
<?php $__env->startSection('gender',$member->gender); ?>
<?php $__env->startSection('country',$member->countryId); ?>
<?php $__env->startSection('income',$member->incomeAmount); ?>
<?php $__env->startSection('incomeid',$member->incomeCurrencytype); ?>
<?php $__env->startSection('childrens',$member->noOfChildren); ?>
<?php $__env->startSection('aboutheera',$member->aboutHeera); ?>
<?php $__env->startSection('mobileno',$member->mobileNo); ?>
<?php $__env->startSection('conId1',$member->mobileId); ?>
<?php $__env->startSection('landlineno',$member->LandlineNo); ?>
<?php $__env->startSection('email',$member->email); ?>
<?php $__env->startSection('signature',$member->singnature); ?>
<?php $__env->startSection('photo',$member->photo); ?>
<?php $__currentLoopData = $mem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('proofId',$memb->typeOfProof); ?>
<?php $__env->startSection('proof_number',$memb->proofNumber); ?>
<?php $__env->startSection('proof_file',$memb->file); ?>
<?php $__env->startSection('idproof',$memb->idproof); ?> 
<?php $__env->startSection('edit_id',$member->userId); ?> 
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.members.editDeniedMemView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>