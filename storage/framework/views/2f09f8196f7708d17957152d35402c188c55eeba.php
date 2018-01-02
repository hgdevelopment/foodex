
 <?php
 // $errors=session()->get('valiationErrors');
  ?>
  <input type="hidden" name="memberName" id="memberName" value="<?php echo e($userProfile->name); ?>">
 <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Name of Bank</label>
              <input type="text" class="form-control" placeholder="Name of Bank"  name="benifit_account_bank_name" id="benifit_account_bank_name"  value="<?php echo e(isset($bank->bankName)?$bank->bankName:''); ?><?php echo e(old('benifit_account_bank_name')); ?>" <?php echo e(isset($bank->bankName)?'readonly':''); ?> data-parsley-required-message="Name of Bank is required" required data-parsley-trigger="keyup" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/">
              
            </div>
            </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Branch</label>
              <input type="text" class="form-control" placeholder="Branch"  name="benifit_account_bank_branch" id="benifit_account_bank_branch"  value="<?php echo e(isset($bank->branchName)?$bank->branchName:''); ?><?php echo e(old('benifit_account_bank_branch')); ?>" <?php echo e(isset($bank->branchName)?'readonly':''); ?> data-parsley-required-message="Branch is required" required data-parsley-trigger="keyup" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/">
              
            </div>
            </div>
            </div>
            <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>IFSC</label>
              <input type="text" class="form-control" name="benifit_account_bank_ifsc" id="benifit_account_bank_ifsc"  value="<?php echo e(isset($bank->ifsc)?$bank->ifsc:''); ?><?php echo e(old('benifit_account_bank_ifsc')); ?>" <?php echo e(isset($bank->ifsc)?'readonly':''); ?> data-parsley-required-message="IFSC is required" required data-parsley-trigger="keyup" data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" data-parsley-pattern-message="IFSC Code Format is wrong..! " placeholder="Ex: IFSC1234567" >
              
            </div>
            </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Account Holder Name</label>
              <input type="text" class="form-control" placeholder="Account Holder Name"  name="benifit_account_bank_holder" id="benifit_account_bank_holder" value=
              "<?php echo e(isset($bank->accountHolderName)?$bank->accountHolderName:''); ?><?php echo e(old('benifit_account_bank_holder')); ?>" <?php echo e(isset($bank->accountHolderName)?'readonly':''); ?>  data-parsley-required-message="Account Holder Name is required" required data-parsley-trigger="keyup" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/" data-parsley-equalto="#memberName" data-parsley-equalto-message="should be same as member name">
             <span class="benifit_account_bank_holder text-danger" ></span>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
            <div class="form-group">
              <label>Bank Account No.</label>
              <input type="text" class="form-control" placeholder="Bank Account No."  name="benifit_account_bank_no" id="benifit_account_bank_no" value="<?php echo e(isset($bank->accountNumber)?$bank->accountNumber:''); ?><?php echo e(old('benifit_account_bank_no')); ?>" <?php echo e(isset($bank->accountNumber)?'readonly':''); ?> data-parsley-required-message="Bank Account No is required" required data-parsley-trigger="keyup" data-parsley-type="integer" >
              
            </div>
            </div>
            </div>

