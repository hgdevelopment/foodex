  <?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>
      <link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->startSection('body'); ?>
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <div class="col-sm-12">
        <a href="#" class="thumb-lg pull-left m-r" id="click_img_container">
          <img src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->photo)); ?>" class="img-circle img-circle-hover" width="96" height="96" style="width:96px;height: 96px;">
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
            <span class="h3 text-black"><?php echo e($dsaDetails->name); ?></span><br>
          </div>
        </div>
      </div>
    </div>
  </div><br>
<form method="post" data-parsley-validate enctype="multipart/form-data">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Personal Details</div>
      <div class="panel-body">
        <div class="row">
         <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Code  </strong> </label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->code); ?>

              </div>
            </div>
          </div>
          <input type="hidden" name="id" id="id" value="<?php echo e($dsaDetails->userId); ?>">
          <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Company Name :</strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->companyName); ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Father/Husband</strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->guardian); ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Date of Birth </strong></label>
              <div class="col-sm-6 " style="float:right;">
             : <?php echo e($dsaDetails->dob); ?>

             </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Religion </strong></label>
              <div class="col-sm-6 " style="float:right;">
             : <?php echo e($dsaDetails->religion); ?>

             </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Marital Status </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->maritalStatus); ?>

              </div>
            </div>
            </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>country </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($countryname->countryNames); ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label> <strong>Mobile No </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->mobileId); ?><?php echo e($dsaDetails->mobileNumber); ?>

              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Email </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->email); ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>TelePhone No </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : <?php echo e($dsaDetails->telePhoneNo); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Permanent Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='permanent'): ?>
        <div class="col-sm-12" >
          <label><strong>Address </strong> </label>
          <div class="col-sm-6" style=" float:right;">
           <label>: <?php echo e($dsaaddress->address); ?> </label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>State</strong></label>
          <div class="col-sm-6" style=" float:right;">
            <label>: <?php echo e($dsaaddress->state); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->city); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->pin); ?></label>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Correspondance Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='correspondance'): ?>
        <div class="col-sm-12">
          <label><strong>Address </strong> </label>
          <div class="col-sm-6 " style="word-wrap: break-word; float:right;">
           <label>: <?php echo e($dsaaddress->address); ?> </label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>State</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->state); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->city); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
        <div class="col-sm-12">
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->pin); ?></label>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-12"></div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Official Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='official'): ?>
         <div class="col-sm-12" >
          <label><strong>Address </strong> </label>
          <div class="col-sm-6 " style=" float:right;">
           <label>: <?php echo e($dsaaddress->address); ?> </label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
         <div class="col-sm-12" >
          <label><strong>State</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->state); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
         <div class="col-sm-12" >
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->city); ?></label>
          </div>
        </div>
        <div class="col-sm-12">&nbsp</div>
         <div class="col-sm-12" >
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: <?php echo e($dsaaddress->pin); ?></label>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Incentive Remittance</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Name</strong></label>
            <div class="col-sm-6 " style=" float:right;">
              : <?php echo e($dsabank->accountHolderName); ?>

            </div>
        </div>
        <div class="form-group">
          <label><strong>Account Number</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : <?php echo e($dsabank->accountNumber); ?>

          </div>
        </div>
        <div class="form-group">
          <label><strong>Bank Name</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : <?php echo e($dsabank->bankName); ?>

          </div>
        </div>
        <div class="form-group">
          <label><strong>Branch</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : <?php echo e($dsabank->branchName); ?>

          </div>
        </div>
        <div class="form-group">
          <label><strong>IFSC</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : <?php echo e($dsabank->ifsc); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="col-sm-12"></div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Heera Payment Details</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Pay Mode</strong></label>
           <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->payment_mode); ?>

           </div>
        </div>
        <?php if($dsapaymentdetails->payment_mode!='cash'): ?>
        <div class="form-group" >
          <label><strong><?php echo e(ucfirst(trans($dsapaymentdetails->payment_mode))); ?> No</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->transactionNumber); ?>

           </div>
        </div>
        <?php endif; ?>
        <div class="form-group">
          <label><strong>Deposit Date</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->paymentDate); ?>

           </div>

        </div>
        <div class="form-group">
          <label><strong>Bank</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->bank); ?>

           </div>
        </div>
        <div class="form-group">
         <label><strong>Branch</strong></label>
         <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->branch); ?>

           </div>
        </div>
        <div class="form-group">
          <label><strong>Heera's Account no</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : <?php echo e($dsapaymentdetails->accountNumber); ?>

           </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Reference</div>
      <div class="panel-body">
        <div class="form-group">
          <label>Referees Name</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsareference->name); ?>

          </div>
        </div>
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='referance'): ?>
        <div class="form-group">
          <label>Address</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsaaddress->address); ?>

          </div>
        </div>
        <div class="form-group">
          <label>State</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsaaddress->state); ?>

          </div>
        </div>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
          <label>Mobile No</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsareference->referenceMobileNumber); ?>

          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsareference->referenceEmail); ?>

          </div>
        </div>
        <div class="form-group">
          <label>Relationship</label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsareference->referenceRelation); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-12"></div>
    <div class="col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Proofs</div>
      <div class="panel-body">
        <div class="col-sm-3"><strong>ID Proof</strong>
          <img src="<?php echo e(URL::asset('storage/img/proof/'.$dsaProof->file)); ?>" style="width:96px;height:96px; " >
        </div>
        <div class="col-sm-3"><strong>Signature</strong>
          <img src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->signature)); ?>" style="width:96px;height:96px;" >
        </div>
        <div class="col-sm-3"><strong>Payment Proof</strong>
          <img src="<?php echo e(URL::asset('storage/img/payProof/'.$dsapaymentdetails->file)); ?>"  style="width:96px;height: 96px;">
        </div>
         <div class="col-sm-3"><strong>Account Proof</strong>
          <img src="<?php echo e(URL::asset('storage/img/Accproof/'.$dsabank->Accproof)); ?>"  style="width:96px;height: 96px;">
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Proof Details</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Type of proof </strong></label>
          <div class="col-sm-6 " style=" float:right;">
          : <?php echo e($dsaProof->typeOfProof); ?>

          </div>
        </div>
        <div class="form-group">
          <label><strong><?php echo e(ucfirst(trans($dsaProof->typeOfProof))); ?> Number </strong></label>
          <div class="col-sm-6 " style=" float:right;">
            : <?php echo e($dsaProof->proofNumber); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12"></div>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Payment Verification :</div>
      <div class="panel-body">
        <div class="col-sm-4 col-sm-offset-5">
          <button type="button" class="btn btn-danger" id="deny">Verification Status</button>

          <a href="<?php echo e(URL::to('/')); ?>/admin/dsa/app/editDsa/<?php echo e($dsaDetails->userId); ?>"  class="active"><button type="button" class="btn btn-danger" name="edit" id="edit">Edit</button></a>
        </div>
        <div class="col-sm-12">
        <div class="col-sm-6" style="display:none;" id="show">
          <label>Payment Verification Status*</label>
          <select  class="form-control" required data-parsley-required-message="Please Select Gender" name="verificationMode" id="verificationMode" onchange="status(this.value)">
            <option value="">Select</option>
            <option value="Verified">YES</option>
            <option value="Not Verified">NO</option>
          </select><br>
           <button type="button" class="btn btn-danger" onclick="payStatus(<?php echo e($dsaDetails->userId); ?>)" >Submit</button>
          <a href="<?php echo e(URL::to('/')); ?>/admin/dsa/<?php echo e($dsaDetails->userId); ?>/editReq"><button type="button" class="btn btn-danger">Back</button></a>
        </div>
        <div class="col-sm-3" style="display:none;" id="dateId" >
          <label>Payment Verified Date</label>
          <input type="text" name="date" id="date" class="form-control" data-language="en" data-date-end-date="0d">
        </div>
        <div class="col-sm-3" style="display:none;" id="reasonId" >
          <label>Reason</label>
          <textarea name="reason" id="reason" class="form-control"></textarea>
        </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript">
  $('#date').datepicker({
  orientation: 'top auto',
   autoclose:true
        
  });
</script>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#deny").click(function(){
        $("#show").show();
        $("#deny").hide();
        $("#edit").hide();
        $("#approveId").hide();
      });
  });
 </script>
 <script type="text/javascript">
   function status(val)
{
  
  if (val=="Verified")
  {
    $("#dateId").show();
    $("#reasonId").show();
  
  }
  
else {
    $("#dateId").hide();
    $("#reasonId").show();
    
}
}
 </script>
 <script type="text/javascript">
   function payStatus(id){
  var date=$("#date").val();
  var reason=$("#reason").val();
   var verificationMode=$("#verificationMode").val();

  var date=document.getElementById("date").value;
  if(verificationMode=='Verified')
  {
  if(date == "")
  {
    swal("Alert!", "Please select date")
    return false;
  }}

    swal({
        title: "Verification!!",
        text: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirm",
        closeOnConfirm: true
    }, function (isConfirm) {
        if (isConfirm) {
        $.ajax({
            url: "<?php echo e(URL::to('admin/verification')); ?>",
            type: "POST",
            data: { "_token": "<?php echo e(csrf_token()); ?>","id": id,"reason":reason,"date":date,"verificationMode":verificationMode},
            dataType: "html",
            success: function (data) {

              //alert(data);
                swal("Done!", "Verification Completed !!", "success");
                setTimeout(function() {
              window.location.href = "<?php echo e(URL::to('admin/viewDSA')); ?>";
            }, 2000);
                                   
            },
        });

      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
}
 </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>