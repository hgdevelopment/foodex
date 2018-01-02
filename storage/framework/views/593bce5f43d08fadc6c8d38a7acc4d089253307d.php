<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php echo $__env->make('web.partial.profileheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
<div class="col-md-12">
          <div class="row row-sm text-center">
            <div class="col-xs-6">
              <a href="#" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($tcnDetails->tcn->tcnType); ?></span>
                <span class="text-muted text-xs">TCN</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-6">
              <a href="#" class="block panel padder-v bg-info item">
                <span class="text-white font-thin h1 block"><?php echo e($tcnDetails->status); ?></span>
                <span class="text-muted text-xs">Status</span>
                <span class="top">
                  <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        </div>
<div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">HEERA PAYMENT DETAILS </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>HEERA's ACCOUNT NO/IBAN No</td>
              <th>
               <?php echo e($tcnDetails->heeraaccount->accountNumber); ?>

              </th>
           
              <td>Currency</td>
              <th>
                <?php echo e($tcnDetails->currencyType); ?>

              </th>
            </tr>
            <tr>   
            <td>No of Units</td>
              <th>
                 <?php echo e($tcnDetails->unit); ?>

              </th> 
              <td>Amount</td>
              <th>
                <?php echo e($tcnDetails->amount); ?>

              </th>
            </tr>
            <tr>   
            <td>Pay Mode</td>
              <th>
                <?php echo e($tcnDetails->paymentMode); ?>

              </th> 
              <td>Deposit Date</td>
              <th>
                <?php echo e($tcnDetails->depositeDate); ?>

              </th>
            </tr>
            <tr>   
            <td>DD/Cheque/UTR/Ref.</td>
              <th>
                <?php echo e($tcnDetails->transactionNumber); ?>

              </th> 
              <td>Applying From</td>
              <th>
               <?php echo e($tcnDetails->country->countryName); ?>

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
        <div class="panel-heading">BENEFIT REMITTANCE </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Name of Bank</td>
              <th>
                <?php echo e($tcnDetails->benefit->bankName); ?>

              </th>
              <td>Bank Account No.</td>
              <th>
                 <?php echo e($tcnDetails->benefit->accountNumber); ?>

              </th>
            </tr>
            <tr>   
            <td>Branch</td>
              <th>
                 <?php echo e($tcnDetails->benefit->branchName); ?>

              </th> 
              <td>IFSC</td>
              <th>
                <?php echo e($tcnDetails->benefit->ifsc); ?>

              </th>
            </tr>
            <tr>   
            <td>Account Holder Name</td>
              <th>
                <?php echo e($tcnDetails->benefit->accountHolderName); ?>

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
        <div class="panel-heading">NOMINEE DETAILS </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
          <tr> 

              <th colspan="4">
                  <img src="<?php echo e(URL::asset('/storage/img/nominee/'.$tcnDetails->nominee->uploadPhoto)); ?>" class="img-thumbnail" alt="" style="width: 150px;" /> &nbsp;
                     <img src="<?php echo e(URL::asset('/storage/img/nominee/'.$tcnDetails->nominee->signature)); ?>" class="img-thumbnail" alt="" style="width: 120px;" />
                 
              </th>


              
            </tr>

            <tr>  
           
              <td>Name of Nominee</td>
              <th>
                <?php echo e($tcnDetails->nominee->name); ?>

              </th>
              <td>Date of Birth</td>
              <th>
                 <?php echo e($tcnDetails->nominee->dob); ?>

              </th>
            </tr>
            <tr>   
            <td>Relation with the Applicant</td>
              <th>
                 <?php echo e($tcnDetails->nominee->relationWithApplicant); ?>

              </th> 
              <td>Gender</td>
              <th>
                <?php echo e($tcnDetails->nominee->gender); ?>

              </th>
            </tr>
            <tr>   
            <td>Address</td>
              <th>
                <?php echo e($tcnDetails->nominee->address->address); ?>

              </th> 
              <td>City</td>
              <th>
                <?php echo e($tcnDetails->nominee->address->city); ?>

              </th> 
            </tr>
            <tr> 
            <td>State</td>
              <th>
                 <?php echo e($tcnDetails->nominee->address->state); ?>

              </th>   
            <td>Pin</td>
              <th>
                <?php echo e($tcnDetails->nominee->address->pin); ?>

              </th> 
              
            </tr>
            <tr>   
            <td>Mobile No.</td>
              <th>
                <?php echo e($tcnDetails->nominee->mobile); ?>

              </th> 
            <td>Email</td>
              <th>
                <?php echo e($tcnDetails->nominee->email); ?>

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
        <div class="panel-heading">NOMINEE PROOF </div>
         <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Type of proof</td>
              <th>
                <?php echo e($tcnDetails->nominee->proof->typeOfProof); ?>

              </th>
              <td>ID Number</td>
              <th>
                 <?php echo e($tcnDetails->nominee->proof->proofNumber); ?>

              </th>
            </tr>
            <tr>   
          
              <td>Proof</td>
              <th>
              <img src="<?php echo e(URL::asset('/storage/img/proof/'.$tcnDetails->nominee->proof->file)); ?>" class="img-thumbnail" alt="" style="width: 120px;" />
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
        <div class="panel-heading">SUPPORTING DOCUMENTS </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
              <th>
              <img src="<?php echo e(URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc1)); ?>" class="img-thumbnail" alt="" style="width: 150px;" />
             <br/>  <span class="help-block m-b-none">(Upload passbook/cancelled cheque/bank statement.)</span>
              </th>
            <th>
              <img src="<?php echo e(URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc2)); ?>" class="img-thumbnail" alt="" style="width: 150px;" /><br/>
              (Upload Transfer statement proof.)
              </th>
              <th>
              <img src="<?php echo e(URL::asset('/storage/img/tcndocs/'.$tcnDetails->doc3)); ?>" class="img-thumbnail" alt="" style="width: 150px;" /><br/>
              (Upload Transaction proof/cheque proof/online transfer screenshot.)
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