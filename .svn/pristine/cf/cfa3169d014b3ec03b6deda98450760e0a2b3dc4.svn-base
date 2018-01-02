<?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('img/new_heading.png')); ?>" class="img-responsive">
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Bank Account Master</h1>
  </div>
  <div class="wrapper-md" ng-controller="FormDemoCtrl">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">ADD ACCOUNT</div>
          <div class="panel-body">
            <?php if(trim($__env->yieldContent('edit_id'))): ?>
            <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/bankmaster/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
            <?php else: ?>
            <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/bankmaster" enctype="multipart/form-data" data-parsley-validate>
             <?php endif; ?>
                  <?php echo e(csrf_field()); ?>

                  <?php $__env->startSection('edit'); ?>
                  <?php echo $__env->yieldSection(); ?>
                  <div class="col-md-12">
                    <div class="col-md-4">
                      <label>BANK NAME*</label>
                      <input type="text" name="bank_name" class="form-control" value="<?php echo $__env->yieldContent('bank_name'); ?>" placeholder="Enter Bank Name" required data-parsley-required-message="Please Enter Bank Name">
                      <?php if($errors->has('bank_name')): ?>
                        <span class="help-inline"><?php echo e($errors->first('bank_name')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                      <label>ACCOUNT NUMBER*</label>
                      <input type="text" name="account_number" class="form-control" value="<?php echo $__env->yieldContent('account_number'); ?>"  placeholder="Enter Account Number" required data-parsley-required-message="Please Enter Account Number">
                      <?php if($errors->has('account_number')): ?>
                        <span class="help-inline"><?php echo e($errors->first('account_number')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                      <label>BRANCH*</label>
                      <input type="text" name="branch" class="form-control" placeholder="Enter Branch" value="<?php echo $__env->yieldContent('branch'); ?>" required data-parsley-required-message="Please Enter Branch">
                      <?php if($errors->has('branch')): ?>
                        <span class="help-inline"><?php echo e($errors->first('branch')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-4">
                      <label>COUNTRY*</label>
                      <select  class="form-control" name="country" id="country" required data-parsley-required-message="Please Select Country">
                        <option value=""> SELECT COUNTRY</option>
                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($countrys->id); ?>" 
                          <?php if($__env->yieldContent('country')==$countrys->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <?php if($errors->has('country')): ?>
                      <span class="help-inline"><?php echo e($errors->first('country')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                      <label>IFSC/Swift *</label>
                      <input type="text" value="<?php echo $__env->yieldContent('ifsc'); ?>"  name="ifsc" class="form-control" placeholder="Enter Ifsc/swift Code" required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/">
                      <?php if($errors->has('ifsc')): ?>
                        <span class="help-inline"><?php echo e($errors->first('ifsc')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                      <label>ACCOUNT HOLDER NAME*</label>
                      <input type="text" value="<?php echo $__env->yieldContent('holderName'); ?>"  name="holderName" class="form-control" placeholder="Enter Holder Name" id="holderNmae" required data-parsley-required-message="Please Enter Name">
                      <?php if($errors->has('holderName')): ?>
                        <span class="help-inline"><?php echo e($errors->first('holderName')); ?></span>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-4">
                    <label>TYPE OF ACCOUNT*</label>
                    <select  class="form-control" name="account_type" id="account_type" required data-parsley-required-message="Please Select Account Type">
                      <option value=""> SELECT TYPE </option>
                      <option value="Heera Account" <?php if(strtoupper($__env->yieldContent('account_type'))=='HEERA ACCOUNT'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Heera Account</option>
                      <option value="TCN Benefit" <?php if(strtoupper($__env->yieldContent('account_type'))=='TCN BENEFIT'): ?> <?php echo e('selected'); ?> <?php endif; ?>>TCN Benefit Account</option>
                    </select>
                    <?php if($errors->has('account_type')): ?>
                      <span class="help-inline"><?php echo e($errors->first('account_type')); ?></span>
                    <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                      <label>PLACE</label>
                      <input type="text" value="<?php echo $__env->yieldContent('place'); ?>"  name="place" class="form-control" placeholder="Enter Place Name" id="place">
                    </div>
                    <div class="col-md-4">
                      <label>IBAN</label>
                      <input type="text" value="<?php echo $__env->yieldContent('iban'); ?>"  name="iban" class="form-control" placeholder="Enter Iban Number" >
                    </div>
                    <div class="col-md-3 col-md-offset-5"><br>
                      <button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">VIEW ACCOUNT</div>
        <table class="table" ui-jq="footable" ui-options='{
          "paging": {
          "enabled": true
          },
          "filtering": {
          "enabled": true
          },
          "sorting": {
          "enabled": true
          }}'>
          <thead>
            <tr>
              <th>Name</th>
              <th>Acc No</th>
              <th>Bank</th>
              <th>Branch</th>
              <th>Country</th>
              <th>IFSC Code</th>
              <th>IBAN No</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr data-expanded="true">
                <td><?php if(isset($banks->accountHolderName)): ?><?php echo e($banks->accountHolderName); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->accountNumber)): ?><?php echo e($banks->accountNumber); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->bankName)): ?><?php echo e($banks->bankName); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->branchName)): ?><?php echo e($banks->branchName); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->countryName)): ?><?php echo e($banks->countryName); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->ifsc)): ?><?php echo e($banks->ifsc); ?> <?php endif; ?></td>
                <td><?php if(isset($banks->ibanNumber)): ?><?php echo e($banks->ibanNumber); ?> <?php endif; ?></td>
                <td>
                  <a href="<?php echo e(URL::to('/')); ?>/admin/bankmaster/<?php echo e($banks->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                  <form action="<?php echo e(URL::to('/')); ?>/admin/bankmaster/<?php echo e($banks->id); ?>" method="POST" class="pull-right">
                    <?php echo e(method_field('DELETE')); ?>

                    <?php echo e(csrf_field()); ?>

                    <button class="active" style="border: none;"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">ALLOT ACCOUNT NUMBER FOR EACH TCN</div>
        <div class="panel-body">
          <form  action="<?php echo e(URL::to('/')); ?>/admin/bankmasteradd" method="post" data-parsley-validate>
            <?php echo e(csrf_field()); ?>

            <div class="col-md-12">
              <div class="col-md-3">
                <label>TCN</label>
                <select name="tcn" id="tcn" class="form-control" required data-parsley-required-message="Please select TCN">
                  <option value=""> SELECT TCN</option>
                  <?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($tcnmasters->tcnType); ?>"><?php echo e($tcnmasters->tcnType); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-md-3">
                <label>CURRENCY</label>
                <select name="currency" id="currency" class="form-control" required data-parsley-required-message="Please select Currency">
                  <option value="">SELECT CURRENCY</option>
                  <option value="inr">INR</option>
                  <option value="aed">AED</option>
                  <option value="usd">USD</option>
                  <option value="sar">SAR</option>
                  <option value="cad">CAD</option>'
                </select>
              </div>
              <div class="col-md-3">
                <label>ACCOUNT NUMBER</label>
                <select name="account_number" id="account_number" class="form-control" required data-parsley-required-message="Please select Account No.">
                  <option value=""> SELECT ACCOUNT</option>
                  <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($banks->accountNumber); ?>"><?php echo e($banks->accountNumber); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-md-3"><br>
                <button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">VIEW ACCOUNT NUMBER OF EACH TCN</div>
        <table class="table" ui-jq="footable" ui-options='{
          "paging": {
          "enabled": true
          },
          "filtering": {
          "enabled": true
          },
          "sorting": {
          "enabled": true
          }}'>
          <thead>
            <tr>
              <th>TCN</th>
              <th>CURRENCY TYPE</th>
              <th>ACCOUNT NUMBER</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $tcnallot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <tr data-expanded="true">
             <td><?php echo e($tcn->tcnType); ?></td>
             <td><?php echo e($tcn->currency_type); ?></td>
        <td><?php echo e($tcn->accountNumber); ?></td>
             </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>