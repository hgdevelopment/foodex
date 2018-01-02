<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>


<?php echo $__env->make('web.partial.profileheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Personal Details </div>
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>Name</td>
              <th>
                <?php echo e($userProfile->name); ?>

              </th> 
              <td>Father's Name/ Husband's Name</td>
              <th>
                <?php echo e($userProfile->guardian); ?>

              </th>
            </tr>
            <tr>   
            <td>Religion</td>
              <th>
                <?php echo e($userProfile->religion); ?>

              </th> 
              <td>Caste</td>
              <th>
                <?php echo e($userProfile->caste); ?>

              </th>
            </tr>
            <tr>   
            <td>Date of Birth</td>
              <th>
                <?php echo e(date('d-m-Y',strtotime($userProfile->dob))); ?>

              </th> 
              <td>Education</td>
              <th>
                <?php echo e($userProfile->education); ?>

              </th>
            </tr>
            <tr>   
            <td>Marital status</td>
              <th>
                <?php echo e($userProfile->maritalStatus); ?>

              </th> 
              <td>Occupation</td>
              <th>
               <?php echo e($userProfile->occupation); ?>

              </th>
            </tr>
             <tr>   
            <td>Gender</td>
              <th>
               <?php echo e($userProfile->gender); ?>

              </th> 
              <td>Income</td>
              <th>
                <?php echo e($userProfile->incomeCurrencytype); ?> - <?php echo e($userProfile->incomeAmount); ?>

              </th>
            </tr>
            <tr>   
            <td>No of Children</td>
              <th>
                <?php echo e($userProfile->noOfChildren); ?>

              </th> 
              <td>Country</td>
              <th>
                <?php echo e($userProfile->country->countryName); ?>

              </th>
            </tr>
            <tr>   
            <td>Mobile No</td>
              <th>
              <?php echo e($userProfile->mobileId); ?> <?php echo e($userProfile->mobileNo); ?>

              </th> 
              <td>Email</td>
              <th>
               <?php echo e($userProfile->email); ?>

              </th>
            </tr>
            <tr>  
            <td>Landline No</td>
            <th><?php echo e($userProfile->LandlineNo); ?></th> 
            <td>Signature</td>
              <th >
               <img src="<?php echo e(URL::asset('/public/img/member_img/'.$userProfile->singnature)); ?>" class="img-thumbnail" alt="" style="width: 100px;" />
              </th> 
            </tr>
          </tbody>
        </table>
          
      </div>
    </div>
    </div>
  <?php $__currentLoopData = $userProfile->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(in_array($address->typeOfAddress,array('official','correspondance','permanent'))): ?>
    
  
     <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
        <?php if($address->typeOfAddress=='official'): ?>
         Official Address
        <?php elseif($address->typeOfAddress=='permanent'): ?>
         Permanent Address
        <?php elseif($address->typeOfAddress=='correspondance'): ?>
         Correspondence Address
        <?php endif; ?>
        </div>
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          
          <tbody>
            <tr>   
            <td>Address</td>
              <th>
               <?php echo e($address->address); ?>

              </th> 
              <td>City</td>
              <th>
                <?php echo e($address->city); ?>

              </th>
            </tr>
            <tr>   
            <td>State</td>
              <th>
                 <?php echo e($address->state); ?>

              </th> 
              <td>Pin</td>
              <th>
                <?php echo e($address->pin); ?>

              </th>
            </tr>
            <tr>   
            <td>Country</td>
              <th>
                 <?php echo e($address->country->countryName); ?>

              </th> 
              <td></td>
              <th>
                
              </th>
            </tr>
            
          </tbody>
          
        </table>
       
      </div>
    </div>
    </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  


    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Proof </div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          
          <tbody>
            <tr>   
            <td>Type of proof</td>
              <th>
              <?php echo e(ucfirst($userProfile->proof->typeOfProof)); ?>

              
              </th> 
              <td>ID Number</td>
              <th>
                <?php echo e($userProfile->proof->proofNumber); ?>

              </th>
            </tr>
           
            <tr>   
            
              <td>Proof Image</td>
              <th>
               <img src="<?php echo e(URL::asset('/public/img/proof/'.$userProfile->proof->file)); ?>" class="img-thumbnail" alt="" style="width: 100px;" />
               
              </th>
              <td></td>
              <th>
               
              </th> 
            </tr>
            
          </tbody>
          
        </table>
       
      </div>
    </div>
    </div>


<div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">How do you know about heera group? </div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          
          <tbody>

            <tr>   
              <th>
              <?php echo e($userProfile->aboutHeera); ?>

              </th> 
              
            </tr>
            
          </tbody>
          
        </table>
      </div>
    </div>
    </div>




<?php echo $__env->make('web.partial.profilefooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             





<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>