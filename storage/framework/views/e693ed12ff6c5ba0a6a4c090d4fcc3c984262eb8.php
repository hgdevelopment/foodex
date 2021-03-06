  <?php $__env->startSection('banner'); ?>
    <div class="col-lg-12" align="center" style="background-color:#ffcf29">
      <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
    </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>
  <style type="text/css">
    textarea.form-control {
    height:10px;
    }
  </style>
  <?php $__env->startSection('body'); ?>
  <div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Edit Blacklist Member</h1>
  </div>
  <div class="wrapper-md">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <form role="form" method="POST" action="<?php echo e(URL::to('/')); ?>/admin/member/blacklistMember/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <?php $__env->startSection('edit'); ?>
              <?php echo $__env->yieldSection(); ?>
              <div class="panel panel-default">
                <div class="panel-heading font-bold">Personal Details</div>
                <div class="panel-body">
                  <div class="form-group col-sm-4">
                    <label>Full Name<span style="color:red;">*</span>(as per Bank Record)</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $__env->yieldContent('fullname'); ?>" class="form-control"  required data-parsley-required-message="Please Enter Full Name" >
                    <?php if($errors->has('fullname')): ?>
                     <span class="help-inline"><?php echo e($errors->first('fullname')); ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Father's Name/Husband's Name<span style="color:red;">*</span></label>
                    <input type="text" name="guardian" id="guardian" value="<?php echo $__env->yieldContent('guardian'); ?>" class="form-control" >
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Date of Birth<span style="color:red;">*</span></label>
                    <input type='text' name="dateofbirth" id="dateofbirth" class="form-control" onchange="getAge()" data-language="en" value="<?php echo $__env->yieldContent('dateofbirth'); ?>"/>
                     <div id="dateerror" style="color:red;"></div>
                    <?php if($errors->has('dateofbirth')): ?>
                      <span class="help-inline"><?php echo e($errors->first('dateofbirth')); ?></span>
                    <?php endif; ?>
                  </div>
                 <div class="form-group col-sm-4">
                    <label>Gender<span style="color:red;">*</span></label><br>
                    <select  class="form-control" id="gender" name="gender" required data-parsley-required-message="Please Select Gender">
                      <option value="">Select</option>
                      <option value="Male" <?php if($__env->yieldContent('gender')=='Male'): ?> <?php echo e('selected'); ?><?php endif; ?>>Male</option>
                      <option value="Female" <?php if($__env->yieldContent('gender')=='Female'): ?> <?php echo e('selected'); ?><?php endif; ?>>Female</option>
                    </select>
                    <?php if($errors->has('gender')): ?>
                      <span class="help-inline"><?php echo e($errors->first('gender')); ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Religion</label>
                    <input type="text"  class="form-control" readonly id="religion" name="religion"
                    value="Islam"<?php echo $__env->yieldContent('religion'); ?>=='Islam') <?php echo e('selected'); ?>>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Caste<span style="color:red;">*</span></label>
                    <select  class="form-control" id="caste" name="caste" required data-parsley-required-message="Please Select Caste">
                      <option value="">Select</option>
                      <option value="General" <?php if($__env->yieldContent('caste')=='General'): ?> <?php echo e('selected'); ?><?php endif; ?>>General</option>
                      <option value="OBC" <?php if($__env->yieldContent('caste')=='OBC'): ?> <?php echo e('selected'); ?><?php endif; ?>>OBC</option>
                      <option value="BC" <?php if($__env->yieldContent('caste')=='BC'): ?> <?php echo e('selected'); ?><?php endif; ?>>BC</option>
                      <option value="OC" <?php if($__env->yieldContent('caste')=='OC'): ?> <?php echo e('selected'); ?><?php endif; ?>>OC</option>
                      <option value="SC" <?php if($__env->yieldContent('caste')=='SC'): ?> <?php echo e('selected'); ?><?php endif; ?>>SC</option>
                      <option value="ST" <?php if($__env->yieldContent('caste')=='ST'): ?> <?php echo e('selected'); ?><?php endif; ?>>ST</option>
                    </select>
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="form-group col-sm-4">
                    <label>Nationality<span style="color:red;">*</span></label>
                    <select class="form-control" id="country" name="country" required data-parsley-required-message="Please Select Country" onchange="countryId(this.value)">
                     <option value="">Select</option>
                     <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($countrys->id); ?>" <?php if($__env->yieldContent('country')==$countrys->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryName); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Education<span style="color:red;">*</span></label>
                    <select  class="form-control" id="education" name="education" required data-parsley-required-message="Please Select Education">
                      <option value="">Select</option>
                      <option value="NON-SSC" <?php if($__env->yieldContent('education')=='NON-SSC'): ?> <?php echo e('selected'); ?><?php endif; ?>>NON_SSC</option>
                      <option value="SSC-HSC" <?php if($__env->yieldContent('education')=='SSC-HSC'): ?> <?php echo e('selected'); ?><?php endif; ?>>SSC_HSC</option>
                      <option value="Graduate" <?php if($__env->yieldContent('education')=='Graduate'): ?> <?php echo e('selected'); ?><?php endif; ?>>GRADUATE</option>
                      <option value="Postgraduate" <?php if($__env->yieldContent('education')=='Postgraduate'): ?> <?php echo e('selected'); ?><?php endif; ?>>POSTGRADUATE</option>
                    </select>  
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Occupation<span style="color:red;">*</span></label>
                    <select  class="form-control" id="occupation" name="occupation" required data-parsley-required-message="Please Select Occupation">
                      <option value="">Select</option>
                      <option value="Business" <?php if($__env->yieldContent('occupation')=='Business'): ?> <?php echo e('selected'); ?><?php endif; ?>>BUSINESS</option>
                      <option value="Salaried" <?php if($__env->yieldContent('occupation')=='Salaried'): ?> <?php echo e('selected'); ?><?php endif; ?>>SALARIED</option>
                      <option value="Student" <?php if($__env->yieldContent('occupation')=='Student'): ?> <?php echo e('selected'); ?><?php endif; ?>>STUDENT</option>
                      <option value="Housewife" <?php if($__env->yieldContent('occupation')=='Housewife'): ?> <?php echo e('selected'); ?><?php endif; ?>>HOUSEWIFE</option>
                      <option value="SelfEmployed/Professional"<?php if($__env->yieldContent('occupation')=='SelfEmployed/Professional'): ?> <?php echo e('selected'); ?> <?php endif; ?>>SELFEMPLOYED / PROFESSIONAL</option>
                      <option value="Retired"<?php if($__env->yieldContent('occupation')=='Retired'): ?> <?php echo e('selected'); ?> <?php endif; ?>>RETIRED</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Income<span style="color:red;">*</span></label>  
                      <div class="input-group m-b"> 
                        <div class="input-group-btn dropdown">
                          <select class="btn btn-default" id="incomeid" name="incomeid" required data-parsley-trigger="keyup" >
                            <option value="">Select</option>
                            <option value="INR" <?php if($__env->yieldContent('incomeid')=='INR'): ?> <?php echo e('selected'); ?><?php endif; ?>>INR</option>
                            <option value="AED" <?php if($__env->yieldContent('incomeid')=='AED'): ?> <?php echo e('selected'); ?><?php endif; ?>>AED</option>
                            <option value="USD" <?php if($__env->yieldContent('incomeid')=='USD'): ?> <?php echo e('selected'); ?><?php endif; ?>>USD</option>
                            <option value="SAR" <?php if($__env->yieldContent('incomeid')=='SAR'): ?> <?php echo e('selected'); ?><?php endif; ?>>SAR</option>
                            <option value="CAD" <?php if($__env->yieldContent('incomeid')=='CAD'): ?> <?php echo e('selected'); ?><?php endif; ?>>CAD</option>
                          </select>
                        </div>
                        <input type="text"  name="income" id="income" value="<?php echo $__env->yieldContent('income'); ?>" required data-parsley-required-message="Please Enter Income" data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-min="1" class="form-control" >
                        <?php if($errors->has('income')): ?>
                        <span class="help-inline"><?php echo e($errors->first('income')); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Marital status<span style="color:red;">*</span></label>
                    <select  class="form-control" id="marital" name="marital" required data-parsley-required-message="Please Select Marital status">
                      <option value="">--Select--</option>
                      <option value="Single" <?php if($__env->yieldContent('marital')=='Single'): ?> <?php echo e('selected'); ?><?php endif; ?>>Single</option>
                      <option value="Married" <?php if($__env->yieldContent('marital')=='Married'): ?> <?php echo e('selected'); ?><?php endif; ?>>Married</option>
                      <option value="Divorced" <?php if($__env->yieldContent('marital')=='Divorced'): ?> <?php echo e('selected'); ?><?php endif; ?>>Divorced</option>
                      <option value="Widowed" <?php if($__env->yieldContent('marital')=='Widowed'): ?><?php echo e('selected'); ?><?php endif; ?>>Widowed</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>No of Children</label>
                    <input type="text" name="childrens" id="childrens" value="<?php echo $__env->yieldContent('childrens'); ?>" class="form-control" data-parsley-type="number" data-parsley-trigger="keyup">
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="form-group col-sm-4">
                    <label>Mobile No<span style="color:red;">*</span></label>
                     <div class="input-group m-b">
                    <span class="input-group-addon conId"><?php echo $__env->yieldContent('conId1'); ?></span>
                    <input type="hidden" id="conId1" name="conId1" value="<?php echo $__env->yieldContent('conId1'); ?>">
                    <input type="text" name="mobileno" id="mobileno" value="<?php echo $__env->yieldContent('mobileno'); ?>" required data-parsley-required-message="Please Enter Mobile Number" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="14" data-parsley-type="integer"  class="form-control">
                  </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label id="land_prefix">Landline No</label>
                    <input type="text" class="form-control" placeholder="Landline No" data-parsley-type="integer" data-parsley-trigger="keyup" id="landlineno" name="landlineno" value="<?php echo $__env->yieldContent('landlineno'); ?>" >
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Email<span style="color:red;">*</span></label>
                    <input type="text" name="email" id="email" value="<?php echo $__env->yieldContent('email'); ?>" required data-parsley-required-message="Please Enter Correct Email" data-parsley-trigger="change" data-parsley-type="email" class="form-control" >
                  </div>
                   <div class="col-sm-12"></div>
                  <div class="form-group col-sm-4">
                    <label>How Do You Know About Heera Group<span style="color:red;">*</span></label>
                     <textarea type="text" class="form-control" placeholder="How Do You Know About Heera Group" required ata-parsley-required-message="Please Enter This Field" name="aboutheera" id="aboutheera" data-parsley-trigger="keyup"><?php echo $__env->yieldContent('aboutheera'); ?></textarea>
                  </div>
                  <div class="form-group col-sm-4" >
                    <label>Upload Photo<span style="color:red;">*</span></label><br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <?php if(isset($blacklistedit->id)): ?>
                      <input type="file" name="photo" id="photo" class="form-control" accept="image/png,image/jpeg" onchange="validateFileType();photoSize(this)" >
                      <div id="msgerror" style="color:red;"></div>
                      <div id="photoSize" style="color:red;"></div>
                      <img src="<?php echo e(URL::asset('storage/img/member_img/'.$blacklistedit->photo)); ?>" style="width:100px;height:100px;">
                      <input type="hidden" name="photo_update" value="<?php echo e($blacklistedit->photo); ?>">
                    <?php endif; ?>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Upload Signature<span style="color:red;">*</span></label><br>
                    <?php if(isset($blacklistedit->id)): ?>
                      <input type="file" name="signature" id="signature" class="form-control" accept="image/png,image/jpeg" onchange="validateSig();sigSize(this)" >
                       <div id="msgerrorsignature" style="color:red;"></div>
                       <div id="sigSize" style="color:red;"></div>
                      <img src="<?php echo e(URL::asset('storage/img/member_img/'.$blacklistedit->singnature)); ?>" style="width:100px;height:100px;">
                      <input type="hidden" name="sign_update" value="<?php echo e($blacklistedit->singnature); ?>">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="blog-post">
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading font-bold">Permanent Address</div>
                    <div class="panel-body">
                      <div class="form-group col-sm-12">
                        <label>Address<span style="color:red;">*</span></label>
                        <textarea type="text" name="per_address"  id="per_address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup"  class="form-control" style="height:5%"><?php echo $__env->yieldContent('per_address'); ?></textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>City<span style="color:red;">*</span></label>
                        <input type="text" name="per_city" id="per_city" value="<?php echo $__env->yieldContent('per_city'); ?>" required data-parsley-required-message="Please Enter City" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>State<span style="color:red;">*</span></label>
                        <input type="text" name="per_state" id="per_state" value="<?php echo $__env->yieldContent('per_state'); ?>" required data-parsley-required-message="Please Enter State" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Country<span style="color:red;">*</span></label>
                        <select  class="form-control" id="per_country" name="per_country" required data-parsley-required-message="Please Select Country">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countrys->id); ?>" <?php if($__env->yieldContent('per_country')==$countrys->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryName); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Pin<span style="color:red;">*</span></label>
                        <input type="text" name="per_pin" id="per_pin" value="<?php echo $__env->yieldContent('per_pin'); ?>" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" data-parsley-maxlength="6" data-parsley-type="integer" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="blog-post">
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading font-bold">Correspondance Address   
                       <span style="float: right;font-size: 10px; margin-top: -4px;">SAME AS PERMANENT ADDRESS  
                      <label class="checkbox-inline i-checks">
                      <input type="checkbox" name="Address" id="Address" onclick="address()"><i style="margin-top: -10px;"></i></label></span>
                    </div>
                    <div class="panel-body">
                      <div class="form-group col-sm-12">
                        <label>Address<span style="color:red;">*</span></label>
                        <textarea type="text" name="corr_address"  id="corr_address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup"  class="form-control" style="height:5%"><?php echo $__env->yieldContent('corr_address'); ?></textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>City<span style="color:red;">*</span></label>
                        <input type="text" name="corr_city" id="corr_city" value="<?php echo $__env->yieldContent('corr_city'); ?>" required data-parsley-required-message="Please Enter City" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>State<span style="color:red;">*</span></label>
                        <input type="text" name="corr_state" id="corr_state" value="<?php echo $__env->yieldContent('corr_state'); ?>" required data-parsley-required-message="Please Enter State" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Country<span style="color:red;">*</span></label>
                        <select  class="form-control" id="corr_country" name="corr_country" required data-parsley-required-message="Please Select Country">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countrys->id); ?>" <?php if($__env->yieldContent('corr_country')==$countrys->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryName); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Pin<span style="color:red;">*</span></label>
                        <input type="text" name="corr_pin" id="corr_pin" value="<?php echo $__env->yieldContent('corr_pin'); ?>" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" data-parsley-maxlength="6" data-parsley-type="integer" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="blog-post">
                <div class="col-sm-4">
                  <div class="panel panel-default">
                    <div class="panel-heading font-bold">Official Address</div>
                    <div class="panel-body">
                      <div class="form-group col-sm-12">
                        <label>Address</label>
                        <textarea type="text" name="official_addr"  id="official_addr" class="form-control" style="height:5%"><?php echo $__env->yieldContent('official_addr'); ?></textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>City</label>
                        <input type="text" name="official_city" id="official_city" value="<?php echo $__env->yieldContent('official_city'); ?>" data-parsley-required-message="Please Enter City" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>State</label>
                        <input type="text" name="official_state" id="official_state" value="<?php echo $__env->yieldContent('official_state'); ?>" data-parsley-required-message="Please Enter State" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" class="form-control" >
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Country</label>
                        <select  class="form-control" id="official_country" name="official_country" data-parsley-required-message="Please Select Country">
                          <option value="">--Select--</option>
                          <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($countrys->id); ?>" <?php if($__env->yieldContent('official_country')==$countrys->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryName); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-12">
                        <label>Pin</label>
                        <input type="text" name="official_pin" id="official_pin" value="<?php echo $__env->yieldContent('official_pin'); ?>" data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" data-parsley-maxlength="6" data-parsley-type="integer" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-heading font-bold">Proof</div>
                  <div class="panel-body">
                    <div class="form-group col-sm-6">
                      <label>Type of proof<span style="color:red;">*</span></label>
                      <select class="form-control" name="proofId" id="proofId" required data-parsley-required-message="Please Select Type Of Proof" >
                        <option value="">--select--</option>
                        <option value="aadhar" <?php if($__env->yieldContent('proofId')=='aadhar'): ?> <?php echo e('selected'); ?><?php endif; ?>>AADHAR</option>
                        <option value="license" <?php if($__env->yieldContent('proofId')=='license'): ?> <?php echo e('selected'); ?><?php endif; ?>>LICENSE</option>
                        <option value="pancard" <?php if($__env->yieldContent('proofId')=='pancard'): ?> <?php echo e('selected'); ?><?php endif; ?>>PAN CARD</option>
                        <option value="passport" <?php if($__env->yieldContent('proofId')=='passport'): ?> <?php echo e('selected'); ?><?php endif; ?>>PASSPORT</option>
                        <option value="VoterId"<?php if($__env->yieldContent('proofId')=='VoterId'): ?> <?php echo e('selected'); ?><?php endif; ?>>VOTERID CARD</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>ID Number</label>
                      <input type="text" name="proof_number" id="proof_number" value="<?php echo $__env->yieldContent('proof_number'); ?>" class="form-control" >
                    </div>
                     <div class="col-sm-12"></div>
                    <div class="form-group col-sm-6">
                      <label>Upload Proof<span style="color:red;">*</span></label>
                      <?php if(isset($blacklistproof->id)): ?>
                      <input type="file" name="idproof" id="idproof" class="form-control" accept="image/png,image/jpeg" onchange="proofcheck();idSize(this)" >
                      <div id="msgerrorIdProof" style="color:red;"></div>
                      <div id="idSize" style="color:red;"></div>
                      <img src="<?php echo e(URL::asset('storage/img/proof/'.$blacklistproof->file)); ?>" style="width:100px;">
                      <input type="hidden" name="proof_update" value="<?php echo e($blacklistproof->file); ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12" ><br></div>
                <div class="form-group">
                  <div class="col-sm-9 "><br></div>
                  <div class="col-sm-3">
                   <button name="submit" type="submit" class="btn btn-success btn-block" id="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>

  <script type="text/javascript">
    $(function()
    {
    $('#dateofbirth').datepicker({
   orientation:'bottom auto',
  autoclose:true
    });
    });
  </script>
  <script type="text/javascript"> 
    function getAge() 
    {
      var dateString = document.getElementById("dateofbirth").value;
      if(dateString !="")
      {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        var da = today.getDate() - birthDate.getDate();
        $("#dateerror").html("");
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
        {
          age--;
        }
        if(m<0)
        {
          m +=12;
        }
        if(da<0)
        {
        da +=30;
        }
        if(age < 18 )
        {
          $("#dateerror").html("You must be 18 Years Old");
          return false;
        } 
      }
    }

  </script>
<script type="text/javascript">  //for photo validation
    function validateFileType(){
     //$maxsize=2097152;
        var fileName = document.getElementById("photo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

        $("#msgerror").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
        {
           //alert('ok'); 
        }
        else
        {

      $("#msgerror").html("Only jpg/jpeg and png files are allowed!");
       return false;
          //alert('notok'); 
        } 
        
    }
</script>

<script type="text/javascript">//for signature validation
  function validateSig(){
  var fileName = document.getElementById("signature").value;
  var idxDot = fileName.lastIndexOf(".") + 1;
  var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
  $("#msgerrorsignature").html("");
  if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
  {
  }else
  {
  $("#msgerrorsignature").html("Only jpg/jpeg and png files are allowed!");
  return false;
  } 
  }
</script>

<script type="text/javascript">//for proof validation
  function proofcheck(){
  var fileName = document.getElementById("idproof").value;
  var idxDot = fileName.lastIndexOf(".") + 1;
  var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
  $("#msgerrorIdProof").html("");
  if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
  }
  else
  {
  $("#msgerrorIdProof").html("Only jpg/jpeg and png files are allowed!");
  return false;
  }   
  }
</script>

<script type="text/javascript"> //address check box
  function address()
  {
  var value = document.getElementById("Address").checked==true;
  if(value==true)
  {
  $('#corr_address').val($('#per_address').val());
  $('#corr_city').val($('#per_city').val());
  $('#corr_state').val($('#per_state').val());
  $('#corr_pin').val($('#per_pin').val());
  $('#corr_country').val($('#per_country').val());
  }
  else
  {
  $('#corr_address').val("");
  $('#corr_city').val("");
  $('#corr_state').val("");
  $('#corr_pin').val("");
  $('#corr_country').val("");
  }
  }
</script>

<script type="text/javascript">

 function photoSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#photoSize").html("");
        if(FileSize>102400)
    {
      $("#photoSize").html("Upload File size allowed is 100 Kb.");
      document.getElementById('photo').value="";
    }
  }

  function sigSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#sigSize").html("");
        if(FileSize>102400)
    {
      $("#sigSize").html("Upload File size allowed is 100 Kb.");
      document.getElementById('signature').value="";
    }
  }
   function idSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#idSize").html("");
        if(FileSize>102400)
    {
      $("#idSize").html("Upload File size allowed is 100 Kb.");
      document.getElementById('idproof').value="";
    }
  }
  
  </script>
  <script type="text/javascript">

    function countryId(countryName)
    {

      $.ajax(
      {
        type: "get",
        url: "<?php echo e(URL::to('/')); ?>/admin/countryId",
        data:{countryName:countryName},
        success: function (data) 
        {
          $(".conId").html("+"+data);
           $("#conId1").val("+"+data);
         
        }
      });
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>