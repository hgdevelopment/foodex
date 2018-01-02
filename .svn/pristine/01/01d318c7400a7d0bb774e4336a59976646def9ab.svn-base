<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">TCN Transfer Form</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnTransfer" enctype="multipart/form-data" id="form" data-parsley-validate>
		<?php echo e(csrf_field()); ?>

		<!--************************************ 				  	***************************

												 NOMINEE TRANSFER TO MEMBER 

		*****************************************	MEMBER DETAILS 	************************-->
		<input type="hidden" id="oldMember" name="oldMember" value="<?php echo e($members->id); ?>">
		<input type="hidden" id="oldTcn" name="oldTcn" value="<?php echo e($tcnrequests->id); ?>">

	    <div class="panel panel-default">
	      <div class="panel-heading font-bold">Personal Details</div>
	      <div class="panel-body">
	        <div class="row">
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Full Name<span style="color:red;">*</span> (as per Bank Record)</label>
	              <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" value="<?php echo e(old('fullname')); ?><?php echo e($nominees->name); ?>"  required data-parsley-required-message="Please Enter Full Name">
	              <?php if($errors->has('fullname')): ?>
	                <span class="help-inline"><?php echo e($errors->first('fullname')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Father's Name/Husband's Name<span style="color:red;">*</span></label>
	              <input type="text" class="form-control" placeholder="Father's Name/Husband's Name" id="guardian" name="guardian" value="<?php echo e(old('guardian')); ?>" required data-parsley-required-message="Please Enter Guardians Name">
	              <?php if($errors->has('guardian')): ?>
	                <span class="help-inline"><?php echo e($errors->first('guardian')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Date of Birth<span style="color:red;">*</span></label>
	              <input type='text' name="dateofbirth" id="dateofbirth"  class="form-control"  value="<?php echo e(date('d/m/Y',strtotime($nominees->dob))); ?>"/>
	              <div id="dateerror" style="color:red;"></div>
	              <?php if($errors->has('dateofbirth')): ?>
	                <span class="help-inline"><?php echo e($errors->first('dateofbirth')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>

	        <div class="row">  
	          <div class="col-sm-4">
	            <label>Gender<span style="color:red;">*</span></label>
	            <select class="form-control" id="gender" name="gender" required data-parsley-required-message="Please Enter Gender">
	              <option value="">Select</option>
	              <option value="Male" <?php echo e((old('gender')=='Male')?'selected':''); ?> <?php if($nominees->gender=='Male'): ?><?php echo e('selected'); ?><?php endif; ?>>Male</option>
	              <option value="Female" <?php echo e((old('gender')=='Female')?'selected':''); ?> <?php if($nominees->gender=='Female'): ?><?php echo e('selected'); ?><?php endif; ?>>Female</option>
	            </select>
	              <?php if($errors->has('gender')): ?>
	                <span class="help-inline"><?php echo e($errors->first('gender')); ?></span>
	              <?php endif; ?>
	          </div>
	          <div class="col-sm-4">
	            <label>Religion</label>
	            <input type="text" name="religion" id="religion" readonly class="form-control" value="Islam">
	            <?php if($errors->has('religion')): ?>
	              <span class="help-inline"><?php echo e($errors->first('religion')); ?></span>
	            <?php endif; ?>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Caste<span style="color:red;">*</span></label>
	              <select  class="form-control" id="caste" name="caste" required data-parsley-required-message="Please Select Caste">
	                <option value="">Select</option>
	                <?php $__currentLoopData = $listTypes['caste']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($caste); ?>" <?php echo e((old('caste')==$caste)?'selected':''); ?><?php echo e(($members->caste==$caste)?'selected':''); ?>><?php echo e($caste); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	              </select>
	              <?php if($errors->has('caste')): ?>
	                <span class="help-inline"><?php echo e($errors->first('caste')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>

	        <div class="row">  
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Nationality<span style="color:red;">*</span></label>
	              <input type="hidden" name="zip_code" id="zip_code" value="AUTO">
	              <select  class="form-control" name="country" id="country" required data-parsley-required-message="Please Select Country" onchange="countryId()">
	                <option value="">Select</option>
	                <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($country->id); ?>" <?php if($members->countryId ==$country->id): ?><?php echo e('selected'); ?><?php endif; ?> <?php echo e((old('country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	              </select>
	              <?php if($errors->has('country')): ?>
	                <span class="help-inline"><?php echo e($errors->first('country')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Education<span style="color:red;">*</span></label>
	              <select class="form-control" id="education" name="education" required data-parsley-required-message="Please Select Education">
	                <option value="">Select</option>
	                <?php $__currentLoopData = $listTypes['education']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($education); ?>" <?php echo e((old('education')==$education)?'selected':''); ?>><?php echo e($education); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	              </select>
	              <?php if($errors->has('education')): ?>
	                <span class="help-inline"><?php echo e($errors->first('education')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Occupation<span style="color:red;">*</span></label>
	              <select  class="form-control" id="occupation" name="occupation" required data-parsley-required-message="Please Select Occupation">
	                <option value="">Select</option>
	                <?php $__currentLoopData = $listTypes['occupation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($occupation); ?>" <?php echo e((old('occupation')==$occupation)?'selected':''); ?>><?php echo e($occupation); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	              </select>
	              <?php if($errors->has('occupation')): ?>
	                <span class="help-inline"><?php echo e($errors->first('occupation')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>
	        
	        <div class="row">  
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Income<span style="color:red;">*</span></label>  
	              <div class="input-group m-b"> 
	                <div class="input-group-btn dropdown">
	                  <select class="btn btn-default" id="incomeid" name="incomeid" required>
	                    <option value="">--Select--</option>
	                    <option value="INR" <?php echo e((old('incomeid')=='INR')?'selected':''); ?>>INR</option>
	                    <option value="AED" <?php echo e((old('incomeid')=='AED')?'selected':''); ?>>AED</option>
	                    <option value="USD" <?php echo e((old('incomeid')=='USD')?'selected':''); ?>>USD</option>
	                    <option value="SAR" <?php echo e((old('incomeid')=='SAR')?'selected':''); ?>>SAR</option>
	                    <option value="CAD" <?php echo e((old('incomeid')=='CAD')?'selected':''); ?>>CAD</option>
	                  </select>
	                </div>
	                <input type="text" placeholder="Income" id="income" name="income" value="<?php echo e(old('income')); ?>" class="form-control" required  data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-min="1">
	                <?php if($errors->has('income')): ?>
	                  <span class="help-inline"><?php echo e($errors->first('income')); ?></span>
	                <?php endif; ?>
	              </div>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Marital status<span style="color:red;">*</span></label>
	              <select  class="form-control" id="marital" name="marital" required data-parsley-required-message="Please Select Marital status" >
	                <option value="">Select</option>
	                <option value="Single" <?php echo e((old('marital')=='Single')?'selected':''); ?>>Single</option>
	                <option value="Married" <?php echo e((old('marital')=='Married')?'selected':''); ?>>Married</option>
	                <option value="Divorced" <?php echo e((old('marital')=='Divorced')?'selected':''); ?>>Divorced</option>
	                <option value="Widowed" <?php echo e((old('marital')=='Widowed')?'selected':''); ?>>Widowed</option>
	              </select>
	              <?php if($errors->has('marital')): ?>
	                <span class="help-inline"><?php echo e($errors->first('marital')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>No of Children</label>
	              <input type="text" class="form-control" data-parsley-type="number" data-parsley-trigger="keyup" placeholder="No of Children" id="childrens" name="childrens" value="<?php echo e(old('childrens')); ?>">
	              <?php if($errors->has('childrens')): ?>
	                <span class="help-inline"><?php echo e($errors->first('childrens')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>
	        

	          <div class="col-sm-12"></div>
	        <div class="row">  
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label id="mobile_prefix">Mobile No <span style="color:red;">*</span></label>
	              <div class="input-group m-b">
	                <span class="input-group-addon conId"> </span>
	                <input type="hidden" id="conId1" name="conId1" class="conId1" vlaue="">
	                <input type="text" class="form-control" placeholder="Mobile No" id="mobileno" name="mobileno" value="<?php echo e(old('mobileno')); ?><?php echo e($nominees->mobile); ?>" required data-parsley-maxlength="16" data-parsley-minlength="10" data-parsley-minlength-message="Please enter valid phone no" data-parsley-maxlength-message="Please enter valid phone no" data-parsley-type="integer" data-parsley-trigger="keyup" >
	                <?php if($errors->has('mobileno')): ?>
	                  <span class="help-inline"><?php echo e(($errors->first('mobileno')=='validation.phone')?'Not a valid Mobile Number':$errors->first('mobileno')); ?></span>
	                <?php endif; ?>
	              </div>
	            </div>  
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label id="land_prefix">Landline No</label>
	              <input type="text" class="form-control" placeholder="Landline No" data-parsley-type="integer" data-parsley-maxlength="16" data-parsley-trigger="keyup" id="landlineno" name="landlineno" value="<?php echo e(old('landlineno')); ?><?php echo e($members->LandlineNo); ?>">
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Email<span style="color:red;">*</span></label>
	              <input type="email" data-parsley-trigger="change" required class="form-control" placeholder="Email" id="email" name="email" value="<?php echo e(old('email')); ?><?php echo e($nominees->email); ?>" data-parsley-required-message="Please enter email" data-parsley-type="email" data-parsley-type-message="Please enter valid email">
	              <?php if($errors->has('email')): ?>
	                <span class="help-inline"><?php echo e($errors->first('email')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>
	        
	        <div class="row">  
	          <div class="col-sm-12"></div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>How Do You Know About Heera Group<span style="color:red;">*</span></label>
	              <textarea type="text" class="form-control" placeholder="How Do You Know About Heera Group" required name="aboutheera" id="aboutheera"><?php echo e($members->aboutHeera); ?></textarea>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group">
	              <label>Upload Photo (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
	              <input type="file" class="form-control" id="profilepic" name="profilepic" accept="image/png,image/jpeg" onchange="imageCheck(this)" required>
	              <span class="profilepic  text-danger"></span> 
	              <?php if($errors->has('profilepic')): ?>
	                <span class="help-inline"><?php echo e($errors->first('profilepic')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	          <div class="col-sm-4">
	            <div class="form-group" style="float:left;">
	              <label>Upload Signature (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
	              <input type="file" class="form-control" id="signature" name="signature" accept="image/png,image/jpeg" onchange="imageCheck(this)" required>
	              <span class="signature  text-danger"></span> 
	              <?php if($errors->has('signature')): ?>
	              <span class="help-inline"><?php echo e($errors->first('signature')); ?></span>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>  
	        </div>
	    </div>
		<!--************************************ 				  ************************************

												 MEMBER ADDRESSES 

		********************************************************************************************-->
	    <div class="row">  
  			<div class="col-sm-4">
			    <div class="panel panel-default">
			      <div class="panel-heading font-bold">Permanent Address</div>
			      <div class="panel-body">
			        <div class="form-group">
			          <label>Address<span style="color:red;">*</span></label>
			          <textarea type="text" class="form-control" required  data-parsley-required-message="Please enter address" data-parsley-trigger="keyup" placeholder="Address" id="permanent_addr" name="permanent_addr"><?php echo e(old('permanent_addr')); ?><?php echo e($address2->address); ?></textarea>
			          <?php if($errors->has('permanent_addr')): ?>
			            <span class="help-inline"><?php echo e($errors->first('permanent_addr')); ?></span>
			          <?php endif; ?>
			        </div>
			        <div class="form-group">
			          <label>City<span style="color:red;">*</span></label>
			          <input type="text" class="form-control" placeholder="City" id="permanent_city" required data-parsley-required-message="Please enter city"  name="permanent_city" value="<?php echo e(old('permanent_city')); ?><?php echo e($address2->city); ?>">
			          <?php if($errors->has('permanent_city')): ?>
			            <span class="help-inline"><?php echo e($errors->first('permanent_city')); ?></span>
			          <?php endif; ?>
			        </div>
			        <div class="form-group">
			          <label>State<span style="color:red;">*</span></label>
			          <input type="text" class="form-control" placeholder="State" id="permanent_state" required data-parsley-trigger="blur" data-parsley-required-message="Please enter state" data-parsley-pattern="^[A-Za-z]*$" name="permanent_state" value="<?php echo e(old('permanent_state')); ?><?php echo e($address2->state); ?>">
			          <?php if($errors->has('permanent_state')): ?>
			            <span class="help-inline"><?php echo e($errors->first('permanent_state')); ?></span>
			          <?php endif; ?>
			        </div>
			        <div class="form-group">
			          <label>Country<span style="color:red;">*</span></label>
			          <select  class="form-control" name="permanent_country" id="permanent_country" required data-parsley-required-message="Please Select Country">
			            <option value="">Select</option>
			            <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            <option value="<?php echo e($country->id); ?>" <?php if($members->countryId ==$country->id): ?><?php echo e('selected'); ?><?php endif; ?> <?php echo e((old('permanent_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			          </select>
			        </div>
			        <div class="form-group">
			          <label>Pin<span style="color:red;">*</span></label>
			          <input type="text" class="form-control" placeholder="Pin" data-parsley-trigger="keyup" required data-parsley-maxlength="6" data-parsley-minlength="4" data-parsley-type="integer" data-parsley-minlength-message="Please enter valid pin" id="permanent_pin" name="permanent_pin" value="<?php echo e(old('permanent_pin')); ?><?php echo e($address2->pin); ?>">
			          <?php if($errors->has('permanent_pin')): ?>
			           <span class="help-inline"><?php echo e($errors->first('permanent_pin')); ?></span>
			          <?php endif; ?>
			        </div>
			      </div>
			    </div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-default" id="CorsAdrDiv">
				  <div class="panel-heading font-bold">Correspondance Address  
				    <span style="float: right;font-size: 10px; margin-top: -4px;">SAME AS PERMANENT ADDRESS  
				    <label class="checkbox-inline i-checks">
				    <input type="checkbox" name="Address" id="Address" onclick="address()"><i style="margin-top: -10px;"></i></label></span>
				  </div>
				  <div class="panel-body">
				    <div class="form-group">
				      <label>Address<span style="color:red;">*</span></label>
				      <textarea type="text" class="form-control" required placeholder="Address" id="correspondance_addr" name="correspondance_addr"><?php echo e(old('correspondance_addr')); ?></textarea>
				      <?php if($errors->has('correspondance_addr')): ?>
				      <span class="help-inline"><?php echo e($errors->first('correspondance_addr')); ?></span>
				      <?php endif; ?>
				    </div>
				    <div class="form-group">
				      <label>City<span style="color:red;">*</span></label>
				      <input type="text" class="form-control" placeholder="City" required id="correspondance_city" name="correspondance_city" value="<?php echo e(old('correspondance_city')); ?>">
				      <?php if($errors->has('correspondance_city')): ?>
				      <span class="help-inline"><?php echo e($errors->first('correspondance_city')); ?></span>
				      <?php endif; ?>
				    </div>
				    <div class="form-group">
				      <label>State<span style="color:red;">*</span></label>
				      <input type="text" class="form-control" placeholder="State" required data-parsley-pattern="^[A-Za-z]*$" data-parsley-trigger="keyup" id="correspondance_state" name="correspondance_state" value="<?php echo e(old('correspondance_state')); ?>">
				      <?php if($errors->has('correspondance_state')): ?>
				        <span class="help-inline"><?php echo e($errors->first('correspondance_state')); ?></span>
				      <?php endif; ?>
				    </div>
				    <div class="form-group">
				      <label>Country<span style="color:red;">*</span></label>
				      <select  class="form-control" name="correspondance_country" id="correspondance_country" required data-parsley-required-message="Please Select Country">
				        <option value="">Select</option>
				        <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('correspondance_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label>Pin<span style="color:red;">*</span></label>
				      <input type="text" id="correspondance_pin" name="correspondance_pin" class="form-control" required data-parsley-maxlength="6" data-parsley-minlength="4" data-parsley-minlength-message="Please enter valid pin" data-parsley-trigger="keyup" placeholder="Pin" data-parsley-type="integer"  value="<?php echo e(old('correspondance_pin')); ?>">
				      <?php if($errors->has('correspondance_pin')): ?>
				        <span class="help-inline"><?php echo e($errors->first('correspondance_pin')); ?></span>
				      <?php endif; ?>
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="panel panel-default">
				  <div class="panel-heading font-bold">Official Address</div>
				  <div class="panel-body">
				    <div class="form-group">
				      <label>Address</label>
				      <textarea  class="form-control" placeholder="Address" id="official_addr" name="official_addr"><?php echo e(old('official_addr')); ?></textarea>
				    </div>
				    <div class="form-group">
				      <label>City</label>
				      <input type="text" class="form-control" placeholder="City" id="official_city" name="official_city" value="<?php echo e(old('official_city')); ?>">
				    </div>
				    <div class="form-group">
				      <label>State</label>
				      <input type="text" class="form-control" placeholder="State" id="official_state" data-parsley-pattern="^[A-Za-z]*$" data-parsley-trigger="keyup" name="official_state" value="<?php echo e(old('official_state')); ?>">
				    </div>
				    <div class="form-group">
				      <label>Country</label>
				      <select  class="form-control" name="official_country" id="official_country">
				      <option value="">Select</option>
				      <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				      <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('official_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
				      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label>Pin</label>
				      <input type="text" class="form-control" data-parsley-maxlength="6" data-parsley-minlength="4" data-parsley-minlength-message="Please enter valid pin" data-parsley-trigger="keyup" placeholder="Pin" id="official_pin" name="official_pin" data-parsley-type="integer" value="<?php echo e(old('official_pin')); ?>">
				    </div>
				  </div>
				</div>
			</div>
		</div>
		<!--************************************ 				  ************************************

												 MEMBER PROOF 

		********************************************************************************************-->
	    <div class="panel panel-default">
	      <div class="panel-heading font-bold">Proof</div>
	      <div class="panel-body">
	      <div class="row">
	        <div class="col-sm-4">
	          <div class="form-group">
	            <label>Type of proof<span style="color:red;">*</span></label>
	            <select  class="form-control" id="type_of_proof" name="type_of_proof" required data-parsley-required-message="Please Select Proof">
	              <option value="">Select</option>
	              <?php $__currentLoopData = $listTypes['proof_type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proof_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	              <option value="<?php echo e($proof_type); ?>" <?php if($proofs->typeOfProof==$proof_type): ?><?php echo e('selected'); ?><?php endif; ?><?php echo e((old('type_of_proof')==$proof_type)?'selected':''); ?>><?php echo e(ucfirst($proof_type)); ?></option>
	              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </select>
	            <?php if($errors->has('type_of_proof')): ?>
	              <span class="help-inline"><?php echo e($errors->first('type_of_proof')); ?></span>
	            <?php endif; ?>
	          </div>
	        </div>
	        <div class="col-sm-4">
	          <div class="form-group">
	            <label>ID Number<span style="color:red;">*</span></label>
	            <input type="text" class="form-control" required placeholder="ID Number" id="proof_number" name="proof_number" value="<?php echo e(old('proof_number')); ?><?php echo e($proofs->proofNumber); ?>">
	            <?php if($errors->has('proof_number')): ?>
	              <span class="help-inline"><?php echo e($errors->first('proof_number')); ?></span>
	            <?php endif; ?>
	          </div>
	        </div>
	        <div class="col-sm-4">
	          <div class="form-group">
	            <label>Proof file (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
	            <input type="file" class="form-control" placeholder="Proof File" id="proof_file" name="proof_file" onchange="imageCheck(this)" required>
	            <span class="proof_file  text-danger"></span> 
	            <?php if($errors->has('proof_file')): ?>
	              <span class="help-inline"><?php echo e($errors->first('proof_file')); ?></span>
	            <?php endif; ?>
	          </div>
	        </div>
	        <div class="col-sm-6">
	          
	        </div>
	        </div>
	      </div>
	    </div>
		<!--************************************ 				  ************************************

												 TCN PAYMENT DETAILS 

		********************************************************************************************-->
		<div class="panel panel-default">
			<div class="panel-heading font-bold">PAYMENT DETAILS</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-5">
						<div class="row">
						<div class="col-lg-7">Currency Type</div>
						<div class="col-lg-5 font-bold"><?php echo e($tcnrequests->currencyType); ?></div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
						<div class="col-lg-6">Applying From</div>
						<div class="col-lg-6 font-bold"><?php echo e($countrys->countryName); ?></div>
						</div>
					</div>
				</div><div class="col-lg-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-5">
						<div class="row">
						<div class="col-lg-7">Unit</div>
						<div class="col-lg-5 font-bold"><?php echo e($tcnrequests->unit); ?></div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
						<div class="col-lg-6">Deposit Date</div>
						<div class="col-lg-6 font-bold"><?php echo e(date('d-m-Y',strtotime($tcnrequests->depositeDate))); ?></div>
						</div>
					</div>
				</div><div class="col-lg-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-5">
						<div class="row">
						<div class="col-lg-7">Payment&nbsp;Mode</div>
						<div class="col-lg-5 font-bold"><?php echo e($tcnrequests->paymentMode); ?></div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
						<div class="col-lg-6">Transaction No</div>
						<div class="col-lg-6 font-bold"><?php echo e($tcnrequests->transactionNumber); ?></div>
						</div>
					</div>
				</div><div class="col-lg-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-5">
						<div class="row">
						<div class="col-lg-7">Amount</div>
						<div class="col-lg-5 font-bold"><?php echo e($tcnrequests->amount); ?></div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
						<div class="col-lg-6">Heera Account No</div>
						<div class="col-lg-6 font-bold"><?php echo e($tcnrequests->heeraaccount->accountNumber); ?></div>
						</div>
					</div>
				</div><div class="col-lg-12">&nbsp;</div>
			</div>
		</div>

		<!--************************************ 				  ************************************

												TCN BENEFIT REMITTANCE 

		********************************************************************************************-->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
			<div class="panel-body">
		<div class="row">
			<div class="col-sm-4">Account Number<span style="color:red;">*</span>
				<input type="text" name="accountNumber" id="accountNumber" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->accountNumber); ?><?php endif; ?>" class="form-control" data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Account No" data-parsley-type="integer" type="number" />
			</div>


			<div class="col-sm-4">Bank Name<span style="color:red;">*</span>
				<input type="text" name="bankName" id="bankName" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->bankName); ?><?php endif; ?>" class="form-control"  data-parsley-trigger="keyup" required data-parsley-required-message="Enter Bank Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			</div>

			<div class="col-sm-4">IFSC Code<span style="color:red;">*</span>
				<input type="text" name="ifsc" id="ifsc" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->ifsc); ?><?php endif; ?>" class="form-control"   required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-trigger="keyup" data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" data-parsley-pattern-message="IFSC Code Format is wrong..! " placeholder="Ex: IFSC1234567" />
			</div>
		</div>
	 		<div class="col-sm-12">&nbsp;</div>

		<div class="row">
			<div class="col-sm-4">Branch Name<span style="color:red;">*</span>
				<input type="text" name="branchName" id="branchName" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->branchName); ?><?php endif; ?>" class="form-control"   data-parsley-trigger="keyup" required data-parsley-required-message="Enter Branch Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			</div>

			<div class="col-sm-4">Account Holder Name<span style="color:red;">*</span>
				<input type="text" name="accountHolderName" id="accountHolderName" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->accountHolderName); ?><?php endif; ?>" class="form-control"     required data-parsley-required-message="Enter Account Holder Name" data-parsley-equalto="#fullname" data-parsley-trigger="keyup" data-parsley-equalto-message="Account Holder Name Mismatched with Member Name"/>
				<span class="accountHolderName text-danger" ></span>
			</div>
		</div>
			</div>
		</div> 
		<!--************************************ 				  ************************************

												TCN SUPPORTING DOCUMENTS 

		********************************************************************************************-->
	    <div class="panel panel-default">
	      <div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
	      <div class="panel-body">
	          <div class="row">
	            <div class="col-sm-4">
	              Doc 1<span style="color:red;">*</span>
	              <input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc1" id="doc1" required data-parsley-required-message="Select Document 1"  accept="image/png,image/jpeg"';  onchange="imageCheck(this)">
	              (Upload passbook/cancelled cheque/bank statement.) 
	              <span class="doc1 text-danger"></span> 
	              <?php if($errors->has('doc1')): ?>
	                        <span class="help-inline "><?php echo e($errors->first('doc1')); ?></span>
	                      <?php endif; ?>
	            </div>

	            <div class="col-sm-4">
	              Doc 2<span style="color:red;">*</span>
	              <input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc2" id="doc2" required data-parsley-required-message="Select Document 2" data-parsley-max-file-size="50" onchange="imageCheck(this)">
	              (Upload Transfer statement proof.) 
	              <span class="doc2 text-danger"></span> 
	              <?php if($errors->has('doc2')): ?>
	                        <span class="help-inline "><?php echo e($errors->first('doc2')); ?></span>
	                      <?php endif; ?>
	            </div>

	            <div class="col-sm-4">
	              Doc 3<span style="color:red;">*</span>
	              <input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc3" id="doc3" required data-parsley-required-message="Select Document 3" data-parsley-max-file-size="50"' onchange="imageCheck(this)">
	              (Upload Transaction proof/cheque proof/online transfer screenshot.) 
	              <span class="doc3 text-danger"></span> 
	              <?php if($errors->has('doc3')): ?>
	                        <span class="help-inline "><?php echo e($errors->first('doc3')); ?></span>
	                      <?php endif; ?>
	            </div>
	          </div>
	      </div>
	    </div>
		<!--************************************ 				  ************************************

												TCN NOMINEE DETAILS 

		********************************************************************************************-->
	    <div class="panel panel-default">
	      <div class="panel-heading font-bold">NOMINEE DETAILS</div>
	      <div class="panel-body">
			    <div class="row">
			      <div class="col-sm-4">Nominee Name<span style="color:red;">*</span>
			        <input type="text" name="name" id="name" value="<?php if(isset($nominee->name)): ?><?php echo e($nominee->name); ?><?php endif; ?>" class="form-control"     required data-parsley-required-message="Enter Nominee Name"  data-parsley-trigger="keyup" data-parsley-pattern-message="Dont Enter Special Charecters or Numbers" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			      </div>

			      <div class="col-sm-4">Relation&nbsp;With&nbsp;Applicant<span style="color:red;">*</span>
			        <select class="form-control" name="relationWithApplicant" id="relationWithApplicant"  required data-parsley-required-message="Select Relation With Applicant">
			          <option value=" ">Select</option>
			          <?php $__currentLoopData = $listTypes['relation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			          <option value="<?php echo e($relation); ?>"><?php echo e($relation); ?></option>
			          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </select> 
			      </div>

			      <div class="col-sm-4">Email Id<span style="color:red;">*</span>
			        <input type="email" name="email" id="email" value="<?php if(isset($nominee->email)): ?><?php echo e($nominee->email); ?><?php endif; ?>" class="form-control"   data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Valid Email Id"/>
			      </div>
			    </div>
			    <div class="col-sm-12"><br></div>


			    <div class="row">
			      <div class="col-sm-4">Mobile Number<span style="color:red;">*</span>
			        <input class="form-control" placeholder="Mobile No" required data-parsley-required-message="Please Enter Mobile Number" required data-parsley-pattern-message="Enter Valid Mobile Number with between 10 to 16 digits" data-parsley-pattern="^[0-9]{10,16}$" data-parsley-trigger="keyup" name="mobile" id="mobile"  type="text" value="<?php if(isset($nominee->mobile)): ?><?php echo e($nominee->mobile); ?><?php endif; ?>"    >
			      </div> 

			      <div class="col-sm-4">D O B<span style="color:red;">*</span>
			        <input class="form-control" type="text"  data-date-end-date="0d" id="dob" name="dob"  required data-parsley-required-message="Please Select Correct DOB" readonly />
			        <span class="dob text-danger"></span>
			      </div>

			      <div class="col-sm-4">Gender<span style="color:red;">*</span>
			        <select class="form-control col-md-6" name="gender" id="gender" required data-parsley-required-message="Please Select Gender">
			        <option value=" ">Select</option>
			        <option value="Male" <?php if(isset($nominee->gender) && $nominee->gender=='Male'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Male</option>
			        <option value="Female" <?php if(isset($nominee->gender) && $nominee->gender=='Female'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Female</option>
			      </select>
			      </div>
			    </div>
			   <div class="col-sm-12"><br></div>

			    <div class="row">
			      <div class="col-sm-4">Address<span style="color:red;">*</span>
			        <textarea class="form-control" id="naddress" name="naddress"  data-parsley-trigger="keyup" rows="1" required data-parsley-required-message="Enter Correct Address" data-parsley-trigger="keyup" data-parsley-minlength="20"><?php if(isset($address->address)): ?><?php echo e($address->address); ?><?php endif; ?></textarea>
			      </div>

			      <div class="col-sm-4">City<span style="color:red;">*</span>
			        <input type="text" name="city" id="city" class="form-control" value="<?php if(isset($address->city)): ?><?php echo e($address->city); ?><?php endif; ?>"   required data-parsley-required-message="Enter City" />
			      </div>

			      <div class="col-sm-4">State<span style="color:red;">*</span>
			        <input type="text" name="state" id="state" class="form-control" value="<?php if(isset($address->state)): ?><?php echo e($address->state); ?><?php endif; ?>"    required data-parsley-required-message="Enter State"/>
			      </div>

			    </div>
			   <div class="col-sm-12"><br></div>


			    <div class="row">
			      <div class="col-sm-4">Nominee Proof Type
			        <select class="form-control col-md-6" name="typeOfProof" id="typeOfProof" >
			          <option value=" ">Select</option>
			          <option value="aadhar" <?php if(isset($proofs->typeOfProof) && $proofs->typeOfProof=='aadhar'): ?><?php echo e('selected'); ?><?php endif; ?> >Aadhar</option>

			          <option value="license" <?php if(isset($proofs->typeOfProof) && $proofs->typeOfProof=='license'): ?><?php echo e('selected'); ?><?php endif; ?> >License</option>

			          <option value="pancard" <?php if(isset($proofs->typeOfProof) && $proofs->typeOfProof=='pancard'): ?><?php echo e('selected'); ?><?php endif; ?> >Pancard</option>

			          <option value="passport" <?php if(isset($proofs->typeOfProof) && $proofs->typeOfProof=='passport'): ?><?php echo e('selected'); ?><?php endif; ?>>Passport</option>
			          <option value="VoterId" <?php if(isset($proofs->typeOfProof) && $proofs->typeOfProof=='VoterId'): ?><?php echo e('selected'); ?><?php endif; ?>>VoterId</option>

			        </select>
			      </div>
			      <div class="col-sm-4">proof Number
			        <input type="text" name="proofNumber" id="proofNumber" value="<?php if(isset($proof->proofNumber)): ?><?php echo e($proofs->proofNumber); ?><?php endif; ?>" class="form-control"  />
			      </div>
			      <div class="col-sm-4">Pin<span style="color:red;">*</span>
			        <input class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" name="pin" id="pin" type="text" value="<?php if(isset($address->pin)): ?><?php echo e($address->pin); ?><?php endif; ?>"  data-parsley-pattern="^[1-9][0-9]{4,5}$">
			      </div>
			      <div class="col-sm-12"><br></div>
			    </div><div class="col-sm-12">&nbsp;</div>

		        <div class="row">
		          <div class="col-sm-4">Upload Photo<span style="color:red;">*</span><input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="uploadPhoto" id="uploadPhoto" required data-parsley-required-message="Select Nominee Photo" onchange="imageCheck(this)">
		              <span class="uploadPhoto text-danger"></span> 
		              <?php if($errors->has('uploadPhoto')): ?>
		                        <span class="help-inline "><?php echo e($errors->first('uploadPhoto')); ?></span>
		                      <?php endif; ?>
		          </div>

		          <div class="col-sm-4">Signature<span style="color:red;">*</span><input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="nsignature" id="nsignature" required data-parsley-required-message="Select Signature Fle" onchange="imageCheck(this)">
		              <span class="nsignature text-danger"></span> 
		              <?php if($errors->has('nsignature')): ?>
		                        <span class="help-inline "><?php echo e($errors->first('nsignature')); ?></span>
		                      <?php endif; ?>
		          </div>


		          <div class="col-sm-4">Proof Copy<span style="color:red;">*</span><input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="proofCopy" id="proofCopy" required data-parsley-required-message="Select Nominee ProofCopy" onchange="imageCheck(this)">
		              <span class="proofCopy text-danger"></span> 
		              <?php if($errors->has('proofCopy')): ?>
		                        <span class="help-inline "><?php echo e($errors->first('proofCopy')); ?></span>
		                      <?php endif; ?>
		          </div>
		        </div>  <div class="col-sm-12">&nbsp;</div>
		      </div>
	    </div>
		<!--************************************ 				  ************************************

												ALL  DECLARATION 

		********************************************************************************************-->
        <div class="panel panel-default">
          <div class="panel-heading font-bold">DECLARATION</div>
          <div class="panel-body">
            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-lg-12">
                  <p class="form-control-static">I HAVE READ THE TERMS AND CONDITIONS OF HG AND THE SAME HAVE BEEN WELL EXPLAINED TO ME BY THE HG AUTHORITIES. I AM ALSO AWARE THAT THE TERMS AND CONDITIONS OF HG ARE PRINTED OVERLEAF .I HERE BY AGREE TO ABIDE BY THEM I DECLARE THAT ALL ABOVE DETAILS PROVIDED BY ME ARE CORRECT TO THE BEST OF MY KNOWLDGE</p>
                </div>
              </div>
              <div class="line line-dashed b-b line-lg pull-in"></div>
              <div class="form-group">
                <label class="control-label" style="text-align: left;"></label>
                <div class="col-lg-10">
                  <div class="checkbox" style="padding-right: 10px;float: left;padding-top: 14px;margin: 0;">
                    <label class="i-checks">
                      <input type="checkbox" checked="" id="iagree" name="iagree" required data-parsley-required-message="Please agree terms and conditions"><i></i> 
                    </label>
                  </div>
                  <p class="form-control-static" style="float: left;">
                    <a>Terms &amp; Conditions</a><br>I AGREE TO FULFILL ALL THE REQUISITES MENTIONED IN THE TERMS AND CONDITIONS OF HG<br/>
                    <?php if($errors->has('iagree')): ?>
                    <span class="help-inline"><?php echo e($errors->first('iagree')); ?></span>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
              <div class="form-group">
              	<div class="row">
	                <div class="col-lg-3"></div>
	                <div class="col-lg-6 text-center">
	                	<b>Enter the reason here..  Why did you Transfer this TCN..?</b><br><br>
	                	<textarea name="remarks" id="remarks" class="form-control" required data-parsley-required-message="Please Enter Transfer reason.." data-parsley-minlength="20"></textarea>
	                </div>
                </div>
              </div>
              <div class="line line-dashed b-b line-lg pull-in"></div>
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
                <button type="reset" class="btn btn-warning">Cancel</button>
              </div>
            </div>
          </div>
        </div>
	</form>	
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  $('#dateofbirth').datepicker({ orientation:'bottom right',autoclose:true});
  $('#dob').datepicker({ orientation:'top right',autoclose:true});


	$( "#depositeDate").datepicker({format:'dd-mm-yyyy',autoclose: true});


	$(".chosen-select").chosen({width:'100%'});
</script>




<script type="text/javascript">
  function address()
  {

  var value = document.getElementById("Address").checked==true;
  if(value==true)
  {
  $('#correspondance_addr').val($('#permanent_addr').val());
  $('#correspondance_city').val($('#permanent_city').val());
  $('#correspondance_state').val($('#permanent_state').val());
  $('#correspondance_pin').val($('#permanent_pin').val());
  $('#correspondance_country').val($('#permanent_country').val());
//   //$("#CorsAdrDiv *").addClass('parsley-success');
// $('#CorsAdrDiv').find(':input').removeClass('parsley-error');  
// $('#CorsAdrDiv').find(':input').not('#Address').addClass('parsley-success').removeAttr('required');
// $('#CorsAdrDiv').find('.parsley-errors-list').css('opacity','0');  
}
  else
  {
  $('#correspondance_addr').val("");
  $('#correspondance_city').val("");
  $('#correspondance_state').val("");
  $('#correspondance_pin').val("");
  $('#correspondance_country').val("");
//   $('#CorsAdrDiv').find(':input').not('#Address').removeClass('parsley-success').prop('required',true);
//   if($('#CorsAdrDiv').find('.parsley-errors-list filled'))
// $('#CorsAdrDiv').find('.parsley-errors-list').css('opacity','0');  
  }
//$('#CorsAdrDiv').find(':input').not('#Address').parsley();


// $('#CorsAdrDiv :input').not('#Address').each(function()
// {
// 	 if(this.value=='')
// 	 $( "#"+this.id+' ul.people li').css( 'background-color', 'red' );
// });

  }

function imageCheck(feild){

    var feildName  = feild.name;

    var FileName  = feild.value;

    var idxDot = FileName.lastIndexOf(".") + 1;
    var extFile = FileName.substr(idxDot, FileName.length).toLowerCase();

    var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
    var FileSize = feild.files[0].size;

     $("."+feildName).html(""); 

  	if(FileSize>204800)
	{
		$("."+feildName).html("Upload File size allowed is 200 Kb.");
		document.getElementById(feildName).value="";
		return;
	}
    else if(extFile!="jpg" && extFile!="jpeg" && extFile!="png")
    {
		$("."+feildName).html("Only jpg/jpeg and png  files are allowed!");
		document.getElementById(feildName).value='';
	 	 return;
    }
    else
    {
		$("."+feildName).html("");
    }   
}


  function countryId()
  {

    var countryName=$('#country').val();
  $.ajax(
  {
  type: "get",
  url: "<?php echo e(URL::to('/')); ?>/admin/countryId",
  data:{countryName:countryName},
  success: function (data) 
  {
  $(".conId").html("+"+data);
  $(".conId1").val("+"+data);
  }
  });
  }

  countryId();


</script>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: 4000,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
            <?php  
            Session::Forget('sweet_alert');  ?>
            // more options
        });
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>