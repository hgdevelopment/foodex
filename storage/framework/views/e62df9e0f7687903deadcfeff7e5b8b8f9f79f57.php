<?php 
use \App\Http\Controllers\Controller;


session_start();
if(isset($_SESSION['Edit']) && $request->edits==1)
$Edit= $_SESSION['Edit'];
 ?>







<?php if($request->opcode==1): ?>

	<label>Member Code</label><?php echo $__env->yieldContent('code'); ?>
	<select class="form-control chosen-select" onchange="getMemberDetails('1')" name="memberCode" id="memberCode"  required data-parsley-required-message="Select Member">
	<option value=" ">Select</option>
		<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($members->code); ?>" <?php if(isset($Edit) && $Edit['code']==$members->code): ?><?php echo e('selected'); ?> <?php endif; ?>
			><?php echo e($members->code); ?> - <?php echo e($members->name); ?> <?php echo e($members->guardian); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
<?php endif; ?>





<?php if($request->opcode==10): ?>
	<label>TCN Type</label>
	<select class="form-control chosen-select" name="tcnType" id="tcnType" required data-parsley-required-message="Select TCN Type" onchange="calcAmount();">
		<option value=" ">Select</option>
		<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcntype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($tcntype->id); ?>" <?php if(isset($Edit) && $Edit['tcnType']==$tcntype->id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($tcntype->tcnType); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
<?php endif; ?>





<?php if($request->opcode==2): ?>

	<input type="hidden" name="memberUserId" id="memberUserId" value="<?php if(isset($table->userId)): ?><?php echo e($table->userId); ?><?php else: ?> <?php echo e('0'); ?><?php endif; ?>">
	
	<div class="col-sm-12">
		<div class="row">	
			<div class="col-sm-2">Member Code</div>
			<div class="col-sm-4">:  <?php echo e($table->code); ?></div>
			<div class="col-sm-2">Marital Status</div>
			<div class="col-sm-4">: <?php echo e($table->maritalStatus); ?></div>
		</div>
	</div>		<div class="col-sm-12">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-2">Member Name</div><input type="hidden"  name="memberName" id="memberName" value="<?php echo e($table->name); ?>">
			<div class="col-sm-4">: <?php echo e($table->name); ?></div>
			<div class="col-sm-2">Guardian's </div>
			<div class="col-sm-4">: <?php echo e($table->guardian); ?></div>
		</div>  
	</div>		<div class="col-sm-12">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-2">D O B</div>
			<div class="col-sm-4">: <?php if(isset($table->dob)): ?><?php echo e(date('d-m-Y',strtotime($table->dob))); ?><?php endif; ?></div>
			<div class="col-sm-2">Mobile Number</div>
			<div class="col-sm-4">: <?php echo e($table->mobileNo); ?></div>
		</div>  
	</div>
<?php endif; ?>















<?php if($request->opcode==4): ?>

	<select class="form-control col-md-6" name="selectAccountNumber" id="selectAccountNumber" onchange="getAccountDetails(1);" required data-parsley-required-message="Select Account No">
		<option value=" ">Select</option>
		<?php if(!isset($Edit) || empty($table->accountNumber)): ?>
		<option value="Others">Others</option>
		<?php endif; ?>
		<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($table->id); ?>" <?php if(isset($Edit) && $request->editAc==$table->id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($table->accountNumber); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>

<?php endif; ?>







<?php if($request->opcode==5): ?>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Account Number
				<input type="text" name="accountNumber" id="accountNumber" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->accountNumber); ?><?php endif; ?>" class="form-control" data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Account No" data-parsley-type="integer" type="number" />
			</div>


			<div class="col-sm-4">Bank Name
				<input type="text" name="bankName" id="bankName" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->bankName); ?><?php endif; ?>" class="form-control"  data-parsley-trigger="keyup" required data-parsley-required-message="Enter Bank Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			</div>

			<div class="col-sm-4">IFSC Code
				<input type="text" name="ifsc" id="ifsc" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->ifsc); ?><?php endif; ?>" class="form-control"   required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-trigger="keyup" data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" data-parsley-pattern-message="IFSC Code Format is wrong..! " placeholder="Ex: IFSC1234567" />
			</div>
		</div>
	</div> 		<div class="col-sm-12">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Branch Name
				<input type="text" name="branchName" id="branchName" value="<?php if(isset($table->accountNumber)): ?><?php echo e($table->branchName); ?><?php endif; ?>" class="form-control"   data-parsley-trigger="keyup" required data-parsley-required-message="Enter Branch Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			</div>

			<div class="col-sm-4">Account Holder Name
				<input type="text" name="accountHolderName" id="accountHolderName" value="<?php echo e($request->memberName); ?>" class="form-control" data-parsley-trigger="keyup"    required data-parsley-required-message="Enter Account Holder Name" data-parsley-equalto="#memberName" data-parsley-equalto-message="Account Holder Name Mismatched with Member Name"/>
				<span class="accountHolderName text-danger" ></span>
			</div>
		</div>
	</div> 

<?php endif; ?>







<?php if($request->opcode==6): ?>

	<select class="form-control col-md-6" name="nominee" id="nominee" onchange="getNomineeDetails(1)"  required data-parsley-required-message="Select Nominee">
			<?php if(!isset($Edit)): ?>
			<option value=" ">Select</option>
			<?php endif; ?>
			<option value="Others">Others</option>
		<?php if($table!=''): ?>
			<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nominees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($nominees->id); ?>" <?php if(isset($Edit) && $Edit['nominee']==$nominees->id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($nominees->name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</select>
<?php endif; ?>







<?php if($request->opcode==7): ?>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Nominee Name
				<input type="text" name="name" id="name" value="<?php if(isset($nominee->name)): ?><?php echo e($nominee->name); ?><?php endif; ?>" class="form-control"     required data-parsley-required-message="Enter Nominee Name"  data-parsley-trigger="keyup" data-parsley-pattern-message="Dont Enter Special Charecters or Numbers" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
			</div>

			<div class="col-sm-4">Relation&nbsp;With&nbsp;Applicant
				<select class="form-control" name="relationWithApplicant" id="relationWithApplicant"  required data-parsley-required-message="Select Relation With Applicant">
					<option value=" ">Select</option>
					<?php for($i=0;count($relation)>$i;$i++): ?>
					<option <?php if($nominee->relationWithApplicant==$relation[$i]): ?><?php echo e('selected'); ?><?php endif; ?> value="<?php echo e($relation[$i]); ?>" <?php if(isset($Edit) && $Edit['relationWithApplicant']==$relation[$i] && $request->nominee!='Others'): ?><?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($relation[$i]); ?></option>
					<?php endfor; ?>
				</select> 
			</div>

			<div class="col-sm-4">Email Id
				<input type="email" name="email" id="email" value="<?php if(isset($nominee->email)): ?><?php echo e($nominee->email); ?><?php endif; ?>" class="form-control"   data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Valid Email Id"/>
			</div>
		</div>
	</div>  <div class="col-sm-12"><br></div>


	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Mobile Number
				<input class="form-control" placeholder="Mobile No" required data-parsley-required-message="Please Enter Mobile Number" required data-parsley-pattern-message="Enter Valid Mobile Number with between 10 to 16 digits" data-parsley-pattern="^[0-9]{10,16}$" data-parsley-trigger="keyup" name="mobile" id="mobile"  type="text" value="<?php if(isset($nominee->mobile)): ?><?php echo e($nominee->mobile); ?><?php endif; ?>"    >
			</div> 

			<div class="col-sm-4">D O B
				<input class="form-control" type="text"  data-date-end-date="0d" id="dob" name="dob" value="<?php if(isset($nominee->dob)): ?><?php echo e(date('m-d-Y',strtotime($nominee->dob))); ?><?php endif; ?>" required data-parsley-required-message="Please Select Correct DOB" readonly />
				<span class="dob text-danger"></span>
			</div>

			<div class="col-sm-4">Gender
				<select class="form-control col-md-6" name="gender" id="gender" required data-parsley-required-message="Please Select Gender">
				<option value=" ">Select</option>
				<option value="Male" <?php if(isset($nominee->gender) && $nominee->gender=='Male'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Male</option>
				<option value="Female" <?php if(isset($nominee->gender) && $nominee->gender=='Female'): ?> <?php echo e('selected'); ?> <?php endif; ?> >Female</option>
			</select>
			</div>
		</div>
	</div>	<div class="col-sm-12"><br></div>

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Address
				<textarea class="form-control" id="address" name="address"  data-parsley-trigger="keyup" rows="1" required data-parsley-required-message="Enter Correct Address" data-parsley-trigger="keyup" data-parsley-minlength="20"><?php if(isset($address->address)): ?><?php echo e($address->address); ?><?php endif; ?></textarea>
			</div>

			<div class="col-sm-4">City
				<input type="text" name="city" id="city" class="form-control" value="<?php if(isset($address->city)): ?><?php echo e($address->city); ?><?php endif; ?>"   required data-parsley-required-message="Enter City" />
			</div>

			<div class="col-sm-4">State
				<input type="text" name="state" id="state" class="form-control" value="<?php if(isset($address->state)): ?><?php echo e($address->state); ?><?php endif; ?>"    required data-parsley-required-message="Enter State"/>
			</div>

		</div>
	</div>	<div class="col-sm-12"><br></div>

	<input type="hidden" name="proofId" id="proofId" value="<?php if(!isset($Edit) && isset($proof->id)): ?><?php echo e($proof->id); ?><?php endif; ?> <?php if(isset($Edit)): ?><?php echo e($Edit['proofId']); ?><?php endif; ?>" />
	<input type="hidden" name="addressId" id="addressId" value="<?php if(!isset($Edit) && isset($address->id)): ?><?php echo e($address->id); ?><?php endif; ?> <?php if(isset($Edit)): ?><?php echo e($Edit['addressId']); ?><?php endif; ?>" />


	


	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-4">Nominee Proof Type<?php echo e($proof->typeOfProof); ?>

				<select class="form-control col-md-6" name="typeOfProof" id="typeOfProof" >
					<option value=" ">Select</option>
					<option value="aadhar" <?php if(isset($proof->typeOfProof) && $proof->typeOfProof=='aadhar'): ?><?php echo e('selected'); ?><?php endif; ?> >Aadhar</option>

					<option value="license" <?php if(isset($proof->typeOfProof) && $proof->typeOfProof=='license'): ?><?php echo e('selected'); ?><?php endif; ?> >License</option>

					<option value="pancard" <?php if(isset($proof->typeOfProof) && $proof->typeOfProof=='pancard'): ?><?php echo e('selected'); ?><?php endif; ?> >Pancard</option>

					<option value="passport" <?php if(isset($proof->typeOfProof) && $proof->typeOfProof=='passport'): ?><?php echo e('selected'); ?><?php endif; ?>>Passport</option>
					<option value="VoterId" <?php if(isset($proof->typeOfProof) && $proof->typeOfProof=='VoterId'): ?><?php echo e('selected'); ?><?php endif; ?>>VoterId</option>

				</select>
			</div>
			<div class="col-sm-4">proof Number
				<input type="text" name="proofNumber" id="proofNumber" value="<?php if(isset($proof->proofNumber)): ?><?php echo e($proof->proofNumber); ?><?php endif; ?>" class="form-control"  />
			</div>
			<div class="col-sm-4">Pin
				<input class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" name="pin" id="pin" type="text" value="<?php if(isset($address->pin)): ?><?php echo e($address->pin); ?><?php endif; ?>"  data-parsley-pattern="^[1-9][0-9]{4,5}$">
			</div>

		</div>	<div class="col-sm-12"><br></div>
			
	</div>


	<div class="col-sm-12">
		<div class="row">
			<?php if(isset($nominee->uploadPhoto)): ?>
				<div class="col-sm-4 nomineePhoto"><br>
					<img  alt="uploadPhoto" style="width:200px;height:200px;" src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominee->uploadPhoto); ?>" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominee->uploadPhoto); ?>')" download >
				</div>
				<?php endif; ?>

				<?php if(isset($nominee->signature)): ?>
				<div class="col-sm-4 nomineePhoto"><br>
					<img  alt="proofId" style="width:200px;height:200px;" src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominee->signature); ?>" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominee->signature); ?>')" download>
				</div>
			<?php endif; ?>



			<?php if(isset($proof->file)): ?>
			<div class="col-sm-4 nomineePhoto"><br>
				<img  alt="Proof Copy" style="width:200px;height:200px;" src="<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proof->file); ?>" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proof->file); ?>')" download>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php  
	if($request->edits!=1)
	unset($_SESSION['Edit']);  ?> 
<?php endif; ?>





<?php if($request->opcode==8): ?>

	HEERA'S ACCOUNT NO<?php echo e($Edit['heeraAccountId']); ?>

	<select class="form-control col-md-6" name="heeraAccountId" id="heeraAccountId" required data-parsley-required-message="Select Heera Account No">
		<option value=" ">Select</option>
		<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heeraid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($heeraid->account_id); ?>" <?php if($request->editHAc==$heeraid->account_id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($heeraid->accountNumber); ?><?php echo e($Edit['heeraAccountId']); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>

<?php endif; ?>






<?php if($request->opcode==21): ?>
	<table class="table table-striped m-b-none" ui-options='{
	"paging": {
	"enabled": true
	},
	"filtering": {
	"enabled": true
	},
	"sorting": {
	"enabled": true
		}}' id="table"  cellpadding="0" cellspacing="0">
		<thead>
			<tr>
			<th >S&nbsp;NO</th>
			<th>MEMBER&nbsp;CODE</th>
			<th>NAME</th>
			<th >AMOUNT</th>
			<th style="padding: 8px 2px !important">APPLY&nbsp;DATE</th>
			<th>TCN&nbsp;TYPE</th>
			<th>DOCUMENT</th>
		<th>STATUS</th>
			<th >ACTION</th>
			</tr>
			</thead>
		<tbody>
			<?php $i=1;?>
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr data-expanded="true">
			<td align="center"><?php echo e($i); ?></td>
			<td><?php echo e($detail->code); ?></td>
			<td><?php echo e($detail->name); ?> </td>
			<td align="right"><?php echo e($detail->amount); ?></td>
			<td><?php echo e(date('d-m-Y',strtotime($detail->addedDate))); ?></td>
			<td align="center"><?php echo e($detail->tcnType); ?></td>
			<td>
				<div class="text-center" style="color:black;background:<?php if($detail->docVerified=='Pending'): ?><?php echo e('yellow'); ?><?php elseif($detail->docVerified=='Verified'): ?><?php echo e('#63ce63'); ?><?php endif; ?>">
				<?php echo e($detail->docVerified); ?>

				</div>
				<?php if($detail->docVerified!='Pending'): ?>
				<?php echo e(date('d-m-Y h:i:A',strtotime($detail->docVerifiedDate))); ?>

				<?php endif; ?>
			</td>
	
			<td align="center">
			<div style="color:black;background:<?php if($detail->status=='Pending'): ?><?php echo e('yellow'); ?><?php elseif($detail->status=='Approved'): ?><?php echo e('#63ce63'); ?><?php elseif($detail->status=='Transfered'): ?><?php echo e('#a6b0e9'); ?><?php else: ?><?php echo e('#f67979'); ?><?php endif; ?>">
			<?php echo e($detail->status); ?>

			</div>
			<?php if($detail->status!='Pending' && $detail->status!='Transfered'): ?>
			<?php echo e(date('d-m-Y h:i:A',strtotime($detail->paymentReceivedDate))); ?>

			<?php endif; ?>
			<?php if($detail->status=='Transfered'): ?>
			<?php echo e(date('d-m-Y h:i:A',strtotime($detail->approvalDate))); ?>

			<?php endif; ?>
			</td>

			<td style="cursor:pointer">

			<div class="btn-group dropdown">
		      <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
		      <ul class="dropdown-menu dropdown-menu-right" >
		        <li>
			        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e('view@@@'); ?><?php echo e($detail->tcnId); ?>">View
					</a>
				</li>
				<?php if($detail->status=='Approved' && $detail->status!='Removed'): ?>
		        <li>
			        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnviewprint/<?php echo e($detail->tcnId); ?>" >Print
					</a>
				</li>
				<?php endif; ?>
		      <?php if($detail->docVerified=='Pending' && $detail->status=='Pending' && Controller::UserAccessRights('TCN Document Verification')=='1' && $detail->status!='Removed'): ?>
			        <li>
				        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($detail->tcnId); ?>">Document Verification
						</a>
					</li>
			  <?php endif; ?>		
		      <?php if($detail->paymentReceived=='Pending' && $detail->docVerified!='Pending'  && $detail->status=='Pending' && Controller::UserAccessRights('TCN Payment Verification')=='1' && $detail->status!='Removed'): ?> 
		        <li>
			        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($detail->tcnId); ?>">Payment Verification
					</a>
				</li>
			  <?php endif; ?>		
		      <?php if($detail->status=='Denied'): ?>
		        <li>
			        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($detail->tcnId); ?>">Reapproval
					</a>
				</li>
			  <?php endif; ?>		
				<?php if(Controller::UserAccessRights('TCN Application Edit')=='1' && $detail->status!='Removed'): ?>
				<li>
				<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($detail->tcnId); ?>/edit">Edit
				</a>
				</li>
				<?php endif; ?>
				<?php if($detail->status=='Approved'  && $detail->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $detail->status!='Removed'): ?>
				<li>
				<a onclick="physicalBenefit('<?php echo e($detail->tcnId); ?>')">Add to Physical Benefit
				</a>
				</li>
				<?php endif; ?>
				<?php if(Controller::UserAccessRights('TCN Remove')=='1' && $detail->status!='Removed'): ?>
				<li>
				<a onclick="removeTCN('<?php echo e($detail->tcnId); ?>')">Remove
				</a>
				</li>
				<?php endif; ?>
		      </ul>
			</div>
			</td>
			</tr>
			<?php $i++;?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
<?php endif; ?>	





<?php if($request->opcode==22): ?>



	
<?php endif; ?> 