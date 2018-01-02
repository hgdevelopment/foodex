 <?php
  //$errors=session()->get('valiationErrors');
  ?>
<div class="row">
<?php if(isset($nominee)): ?>
    <input type="hidden" name="nominee_id" value="<?php echo e($nominee->id); ?>">
<?php endif; ?>
              <div class="col-sm-12">
            <div class="form-group">
              <label>Name of Nominee</label>
              <input type="text" class="form-control" placeholder="Name of Nominee"  name="name_nominee" id="name_nominee" value="<?php echo e(isset($nominee->name)?$nominee->name:''); ?><?php echo e(old('name_nominee')); ?>" <?php echo e(isset($nominee->name)?'readonly':''); ?> data-parsley-required-message="Type of proof is required" required data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/">
               
            </div>
            </div>
             <div class="col-sm-12">
            <div class="form-group">
              <label>Date of Birth</label>
              <input type="text" class="form-control" placeholder="Date of Birth" data-date-end-date="0d"  name="dob_nominee" id="dob_nominee" value="<?php echo e(isset($nominee->dob)?$nominee->dob:''); ?><?php echo e(old('dob_nominee')); ?>" <?php echo e(isset($nominee->dob)?'readonly':''); ?> data-parsley-required-message="Date of Birth is required" required   >
              
            </div>
             </div>
             </div>
             <div class="row">
              <div class="col-sm-6">
            <div class="form-group">
              <label>Relation with the Applicant</label>
              <select name="relation_applicant" id="relation_applicant" class="form-control" <?php echo e(isset($nominee->relationWithApplicant)?'readonly':''); ?> data-parsley-required-message="Relation with the Applicant is required" required>
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['relationnominee']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	 <option value="<?php echo e($element); ?>" <?php echo e((isset($nominee->relationWithApplicant) && $nominee->relationWithApplicant==$element)?'selected':''); ?>  <?php echo e((old('relation_applicant')==$element)?'selected':''); ?>><?php echo e($element); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              
            </div>
            </div>

              <div class="col-sm-6">
            <div class="form-group">
              <label>Gender</label>
              <select name="nominee_gender" id="nominee_gender" class="form-control" <?php echo e(isset($nominee->gender)?'readonly':''); ?> data-parsley-required-message="Gender is required" required>
                <option value="">Select</option>
                <option value="Male" <?php echo e((isset($nominee->gender) && $nominee->gender=='Male')?'selected':''); ?> <?php echo e((old('nominee_gender')=='Male')?'selected':''); ?>>Male</option>
                <option value="Female" <?php echo e((isset($nominee->gender) && $nominee->gender=='Female')?'selected':''); ?> <?php echo e((old('nominee_gender')=='Female')?'selected':''); ?>>Female</option>
              </select>
               <?php if($errors->has('nominee_gender')): ?>
                                      <span class="help-inline"><?php echo e($errors->first('nominee_gender')); ?></span>
                                    <?php endif; ?>
            </div>
            </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" placeholder="Address"  name="nominee_addr" id="nominee_addr" <?php echo e(isset($nominee->address->address)?'readonly':''); ?> data-parsley-required-message="Address is required" required><?php echo e(isset($nominee->address->address)?$nominee->address->address:''); ?><?php echo e(old('nominee_addr')); ?></textarea>  
              
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City"  name="city_nominee" id="city_nominee" value="<?php echo e(isset($nominee->address->city)?$nominee->address->city:''); ?><?php echo e(old('city_nominee')); ?>" <?php echo e(isset($nominee->address->city)?'readonly':''); ?> data-parsley-required-message="City is required" required>
              
              </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="state"  name="state_nominee" id="city_nominee" value="<?php echo e(isset($nominee->address->state)?$nominee->address->state:''); ?><?php echo e(old('state_nominee')); ?>" <?php echo e(isset($nominee->address->state)?'readonly':''); ?> data-parsley-required-message="state is required" required>
              
              </div>
              </div>
              
            </div>

            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Pin</label>
              <input type="text" class="form-control" placeholder="Pin"  name="pin_nominee" id="pin_nominee" value="<?php echo e(isset($nominee->address->pin)?$nominee->address->pin:''); ?><?php echo e(old('pin_nominee')); ?>" <?php echo e(isset($nominee->address->pin)?'readonly':''); ?> data-parsley-required-message="Pin is required" required data-parsley-pattern="^[1-9][0-9]{4,5}$" data-parsley-trigger="keyup">
             
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Mobile No.</label>
              <input type="text" class="form-control" placeholder="Mobile No."  name="mobile_nominee" id="mobile_nominee" value="<?php echo e(isset($nominee->mobile)?$nominee->mobile:''); ?><?php echo e(old('mobile_nominee')); ?>" <?php echo e(isset($nominee->mobile)?'readonly':''); ?> data-parsley-required-message="Mobile No. is required" required data-parsley-pattern="^[1-9][0-9]{9,15}$" data-parsley-trigger="keyup">
              
              </div>
              </div>
              
            </div>
            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email"  name="email_nominee" id="email_nominee" value="<?php echo e(isset($nominee->email)?$nominee->email:''); ?><?php echo e(old('email_nominee')); ?>" <?php echo e(isset($nominee->email)?'readonly':''); ?> data-parsley-required-message="Email is required" required data-parsley-type="email">
              
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
              <label>Upload Photo</label>

             
              <?php if(empty($nominee->uploadPhoto)): ?>
				 <input type="file" class="form-control" placeholder="Mobile No."  name="nominee_photo" id="nominee_photo" data-parsley-extension="jpg,jpeg,png"  data-parsley-required-message="Upload Photo is required" data-parsley-max-file-size="200" required>
         
			  <?php endif; ?>

              <?php if(isset($nominee->uploadPhoto)): ?>
                  <img src="<?php echo e(URL::asset('/storage/img/nominee/'.$nominee->uploadPhoto)); ?>" class="img-thumbnail" alt="" style="width: 150px;" />
              <?php endif; ?>
              </div>
              </div>
             
              
            </div>
            <div class="row">
               <div class="col-sm-6">
            <div class="form-group">
              <label>Upload Signature</label>
             
              <?php if(empty($nominee->signature)): ?>
          <input type="file" class="form-control" placeholder="Email"  name="nominee_signature" id="nominee_signature" data-parsley-extension="jpg,jpeg,png" data-parsley-max-file-size="200"   data-parsley-required-message="Upload Signature is required" required>
         
        <?php endif; ?>

              <?php if(isset($nominee->signature)): ?>
                  <img src="<?php echo e(URL::asset('/storage/img/nominee/'.$nominee->signature)); ?>" class="img-thumbnail" alt="" style="width: 150px;" />
              <?php endif; ?>
            </div>
              </div>
            </div>