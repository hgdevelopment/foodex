<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<style type="text/css">
  .app-content{
  margin-left: 0px;
  }
  .app-header-fixed {
  padding-top: 0px;
  }
  .navbar-collapse, .app-content, .app-footer {
  margin-left: 0px;
  }
  span.help-inline{
  color:red;
  }
</style>
  <link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
  <div>
    <div class="wrapper-lg bg-white-opacity">
      <div class="row m-t">
        <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="<?php echo e(route('web.changeimg')); ?>" autocomplete="off">
          <?php echo e(csrf_field()); ?>

          <div class="col-sm-12">
            <a href="#" class="thumb-lg pull-left m-r" id="click_img_container">
              <img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->photo)); ?>" class="img-circle img-circle-hover" width="96" height="96" style="width:96px;height: 96px;">
              <style type="text/css" media="screen">
                #click_img_container
                {
                  position:relative;
                  }
                  #avatar_img
                  {
                  opacity:0;
                  position:absolute;
                  top:0;
                  left:0;
                  width:100%;
                  height:100%;
                  }
                #change_img
                {
                position: absolute;
                top: 0px;
                background: rgba(0, 0, 0, 0.4);
                width:100%;
                height:100%;
                border-radius: 50%;
                padding-top: 45%;
                text-align: center;
                color: #fff;
                }     
              </style>
            </a>
            <div class="clear m-b">
              <div class="m-b m-t-sm">
                <span class="h3 text-black"><?php echo e($viewmember->name); ?></span><br>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="padder" style="padding-top: 15px;">  
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading">Personal Details </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
              <tr>   
                <td style="width:25%">Name </td>
                <th style="width:25%"><?php echo e($viewmember->name); ?></th> 
                <td style="width:25%">Father's Name/ Husband's Name</td>
                <th style="width:25%"><?php echo e($viewmember->guardian); ?></th>
              </tr>
              <tr>
                <td style="width:25%">Date of Birth</td>
                <th style="width:25%"><?php echo e($viewmember->dob); ?></th> 
                <td style="width:25%">Gender</td>
                <th style="width:25%"><?php echo e($viewmember->gender); ?></th> 
              </tr>
              <tr> 
                <td style="width:25%">Religion</td>
                <th style="width:25%"><?php echo e($viewmember->religion); ?></th> 
                <td style="width:25%">Caste</td>
                <th style="width:25%"><?php echo e($viewmember->caste); ?></th>
              </tr>
              <tr>   
                <td >Nationality</td>
                <th ><?php echo e($countrys ->countryNames); ?></th>
                <td >Education</td>
                <th ><?php echo e($viewmember->education); ?></th>
              </tr>
              <tr>   
                <td >Occupation</td>
                <th ><?php echo e($viewmember->occupation); ?></th>
                <td >Marital status</td>
                <th ><?php echo e($viewmember->maritalStatus); ?></th> 
              </tr>
              <tr>   
                 <td >No of Children</td>
                <th ><?php echo e($viewmember->noOfChildren); ?></th> 
                <td >Income</td>
                <th ><?php echo e($viewmember->incomeCurrencytype); ?> : <?php echo e($viewmember->incomeAmount); ?></th>
              </tr>
              <tr>   
                <td >Mobile No</td>
                <th ><?php echo e($viewmember->mobileId); ?><?php echo e($viewmember->mobileNo); ?></th> 
                <td >Landline No</td>
                <th ><?php echo e($viewmember->LandlineNo); ?></th>
              </tr>
              <tr> 
              <td >Email</td>
                <th ><?php echo e($viewmember->email); ?></th>
              <td >How Do You Know About Heera Group</td>
                <th ><?php echo e($viewmember->aboutHeera); ?></th>   
              </tr>                           
            </tbody>
          </table>
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading"> Permanent Address
          </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
            <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if(($address->typeOfAddress=='permanent')&&($country->type=='permanent')): ?>
              <tr> 
              <td style="width:16%">Address</td>
                <th style="width:50%; word-wrap: break-word;display: inline-block;"><?php echo e($address->address); ?></th> 
                <td style="width:16%">City</td>
                <th style="width:16%"><?php echo e($address->city); ?></th>
              </tr>
              <tr>   
                <td >State</td>
                <th ><?php echo e($address->state); ?></th>
                <td >Country</td>
                <th ><?php echo e($country->Names); ?></th>
              </tr>
              <tr> 
                <td>Pin</td>
                <th><?php echo e($address->pin); ?></th> 
              </tr>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading"> Correspondence Address
          </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
            <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(($address->typeOfAddress=='correspondance')&&($country->type=='correspondance')): ?>
              <tr> 
              <td style="width:16%">Address</td>
                <th style="width:50%; word-wrap: break-word;display: inline-block;"><?php echo e($address->address); ?></th> 
                <td style="width:16%">City</td>
                <th style="width:16%"><?php echo e($address->city); ?></th>
              </tr>
              <tr>   
                <td>State</td>
                <th><?php echo e($address->state); ?></th> 
                <td>Country</td>
                <th><?php echo e($country->Names); ?></th>
              </tr>
              <tr>
                <td>Pin</td>
                <th><?php echo e($address->pin); ?></th> 
              </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading"> Official Address
          </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
            <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($address->typeOfAddress=='official'): ?>
              <tr> 
              <td style="width:16%">Address</td>
                <th style="width:50%; word-wrap: break-word;display: inline-block;"><?php echo e($address->address); ?></th> 
                <td style="width:16%">City</td>
                <th style="width:16%"><?php echo e($address->city); ?></th>
              </tr>
              <tr>   
                <td>State</td>
                <th><?php echo e($address->state); ?></th>
                <?php if($country->type=='official'): ?>
                <td>Country</td>
                <th><?php echo e($country->Names); ?></th>
                <?php endif; ?>
              </tr>
              <tr> 
                <td>Pin</td>
                <th><?php echo e($address->pin); ?></th> 
              </tr>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading">Proofs </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
              <tr>   
                <td style="width:25%">Type of proof</td>
                <th style="width:25%"><?php echo e($viewmem->typeOfProof); ?></th> 
                <td style="width:25%">ID Number</td>
                <th style="width:25%"><?php echo e($viewmem->proofNumber); ?></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading"> Proof Images
          </div>
          <table class="table table-striped m-b-none" style="background: #f3f3f3;">
            <tbody>
              <tr>
                <td>Photo</td>
                <th>
                <img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->photo)); ?>" class="img-thumbnail" alt="" style="width: 100px;"/> 
                </th>
                <td>Signature</td>
                <th colspan="3">
                <img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->singnature)); ?>" class="img-thumbnail" alt="" style="width: 100px;"/>  
                </th> 
                <td>Proof Image</td>
                <th>
                <img src="<?php echo e(URL::asset('storage/img/proof/'.$viewmem->file)); ?>" class="img-thumbnail" alt="" style="width: 100px;" /> 
                </th>
              </tr>
            </tbody>
          </table>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12"></div>
        <div class="col-sm-12">
          <div class="col-sm-4 col-sm-offset-8">
            <a href="<?php echo e(URL::to('/')); ?>/member/<?php echo e($viewmember->userId); ?>/edit"  class="active">  
            <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>
            <a href="<?php echo e(URL::to('/')); ?>/web/member/memberconfrim/<?php echo e($viewmember->userId); ?>" class="active">
            <button name="confrim" type="submit" class="btn btn-primary" id="confrim">Confrim</button></a>  
          </div>
        </div>
       <div class="col-sm-12" ><br></div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
  <script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
  <script type="text/javascript"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>