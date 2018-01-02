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
	<div id="loader" style="text-align:center;position: fixed;opacity: 0.5;display: none;z-index: 1000001;left: 0;right:0;"><img style="width: 15%" src="<?php echo e(URL::to('/')); ?>/loaderbig.gif"/></div>
  <h1 class="m-n font-normal h3">
  <?php 
  if($tcnrequests->docVerified=='Pending' && $tcnrequests->status=='Pending')
  { $button='Document';
  echo 'TCN Document Verification';
  }
  if($tcnrequests->docVerified!='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->status=='Pending')
  { $button='Payment';
  echo 'TCN Payment Verification'; 
  }
  if($tcnrequests->status=='Denied')
  { $button='Reapprove';
  echo 'TCN Reapproval';
  }
  if($tcnrequests->status=='Approved')
  { $button='View';
  echo 'TCN Application View';
  }
   ?>
  </h1>

</div>
<input type="hidden" id="tcnId" value="<?php echo e($tcnrequests->id); ?>">
<input type="hidden" id="userId" value="<?php echo e($tcnrequests->userId); ?>">

<input type="hidden" name="button" id="button" value="<?php echo e($button); ?>">

<div class="wrapper-md" id="wrapper-md">
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">
		<div class="col-sm-4 font-bold text-success h4">TCN TYPE : <span class="text-danger"><?php echo e($tcnrequests->tcn->tcnType); ?></span></div><div class="col-sm-4 font-bold text-success h4">TCN STATUS : <span class="text-danger"><?php echo e($tcnrequests->status); ?></span></div>&nbsp;
		</div>
	</div>

	<div class="col-lg-12">
	<div class="row">	
		<div class="panel panel-default">
			<div class="panel-heading font-bold">
				<div style="width: 50%;float: left;">TCN PERSONAL DETAILS</div>
				<div class="text-right" >
					<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info">Back</a>
				</div>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5">Member&nbsp;Code</div>
							<div class="col-lg-7 font-bold" ><?php echo e($memberregistrations->code); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Mobile No</div>
							<div class="col-lg-8 font-bold">+<?php echo e($memberregistrations->country->countryId); ?>&nbsp;<?php echo e($memberregistrations->mobileNo); ?>

							</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4" >Email Id</div>
							<div class="col-lg-8 font-bold" style="word-wrap: break-word;"><?php echo e($memberregistrations->email); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5">Member Name</div>
							<div class="col-lg-7 font-bold" style="word-wrap: break-word;"><?php echo e($memberregistrations->name); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Nationality</div>
							<div class="col-lg-8 font-bold"><?php echo e($countrys->countryName); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Address</div>
							<div class="col-lg-8 font-bold" style="word-wrap: break-word;"><?php echo e($address1->address); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5">Guardian</div>
							<div class="col-lg-7 font-bold" style="word-wrap: break-word;"><?php echo e($memberregistrations->guardian); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Religion</div>
							<div class="col-lg-8 font-bold"><?php echo e($memberregistrations->religion); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">City</div>
							<div class="col-lg-8 font-bold"><?php echo e($address1->city); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5">Gender</div>
							<div class="col-lg-7 font-bold"><?php echo e($memberregistrations->gender); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Caste</div>
							<div class="col-lg-8 font-bold"><?php echo e($memberregistrations->caste); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">State</div>
							<div class="col-lg-8 font-bold"><?php echo e($address1->state); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5">D O B</div>
							<div class="col-lg-7 font-bold"><?php echo e(date('d-m-Y',strtotime($memberregistrations->dob))); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Marital&nbsp;Status</div>
							<div class="col-lg-8 font-bold"><?php echo e($memberregistrations->maritalStatus); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4 ">PIN</div>
							<div class="col-lg-8 font-bold"><?php echo e($address1->pin); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-5 ">Education</div>
							<div class="col-lg-7 font-bold"><?php echo e($memberregistrations->education); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Occupation</div>
							<div class="col-lg-8 font-bold"><?php echo e($memberregistrations->occupation); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-4">Total&nbsp;Income </div>
							<div class="col-lg-8"><span class=" font-bold"> <?php echo e($memberregistrations->incomeAmount); ?></span> ( <?php echo e($memberregistrations->incomeCurrencytype); ?> )</div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>
				</div>
		</div>
	</div>	
	</div>


	<div class="col-lg-7">
		<div class="row">
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
							<div class="col-lg-6 font-bold" style="word-wrap: break-word;"><?php echo e($tcnrequests->transactionNumber); ?></div>
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
							<div class="col-lg-6 font-bold" style="word-wrap: break-word;"><?php echo e($tcnrequests->heeraaccount->accountNumber); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">MEMBER IMAGE</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6 d-flex justify-content-between">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>" style="height:150px;width:150px;cursor: pointer" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>')">
						</div>
						<div class="col-lg-6 d-flex justify-content-between">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>" style="height:150px;width:150px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>')">
						</div>
					</div><div class="col-lg-12">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-7">Account Number</div>
							<div class="col-lg-5 font-bold"><?php echo e($banks->accountNumber); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-6">Bank Name</div>
							<div class="col-lg-6 font-bold"><?php echo e($banks->bankName); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-6">IFSC Code</div>
							<div class="col-lg-6 font-bold"><?php echo e($banks->ifsc); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-7">Branch Name</div>
							<div class="col-lg-5 font-bold"><?php echo e($banks->branchName); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-6">Account Holder Name</div>
							<div class="col-lg-6 font-bold"><?php echo e($banks->accountHolderName); ?></div>
							</div>
						</div>
					</div><div class="col-lg-12">&nbsp;</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">NOMINEE DETAILS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">Nominee Name</label>
							</div>
							<div class="col-sm-6 font-bold" style="word-wrap: break-word;">
							<?php echo e($nominees->name); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4" style="word-wrap: break-word;">
							<label class="">Email ID</label>
							</div>
							<div class="col-sm-8 font-bold">
							<?php echo e($nominees->email); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=""> Proof Type</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($proofs->typeOfProof); ?>

							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">Relation With Applicant</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($nominees->relationWithApplicant); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class="">Address </label>
							</div>
							<div class="col-sm-8 font-bold" style="word-wrap: break-word;">
							<?php echo e($address2->address); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">Proof Number</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($proofs->proofNumber); ?>

							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">Gender</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($nominees->gender); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class="">City</label>
							</div>
							<div class="col-sm-8 font-bold">
							<?php echo e($address2->city); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">State</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($address2->state); ?>

							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">D O B</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e(date('d-m-Y',strtotime($nominees->dob))); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class="">Mobile No</label>
							</div>
							<div class="col-sm-8 font-bold">
							<?php echo e($nominees->mobile); ?>

							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="">PIN</label>
							</div>
							<div class="col-sm-6 font-bold">
							<?php echo e($address2->pin); ?>

							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>


				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">NOMINEE PROOFS</div>
				<div class="panel-body">
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees->uploadPhoto); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees->uploadPhoto); ?>')"><br>
					<label>Photo</label>
				</div>

				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees->signature); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees->signature); ?>')"><br>
					<label>Signature</label>
				</div>
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs->file); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs->file); ?>')"><br>
					<label>Proof</label>
				</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc1); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc1); ?>')"><br>
							<label>Document 1</label>
						</div>

						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc2); ?>" style="height:200px;width:200px;cursor: pointer" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc2); ?>')"><br>
							<label>Document 2</label>
						</div>
						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc3); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc3); ?>')"><br>
							<label>Document 3</label>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold"><?php if($button=='Document'): ?><?php echo e('DOCUMENT APPROVAL'); ?><?php elseif($button=='Payment'): ?><?php echo e('PAYMENT DETAILS'); ?><?php elseif($button=='Reapprove'): ?><?php echo e('REAPPROVAL'); ?><?php else: ?><?php echo e('APPROVAL DETAILS'); ?><?php endif; ?>
				</div>
				<div class="panel-body">
					<?php if($tcnrequests->status=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->docVerified!='Pending' ): ?>
					<div class="row">
						<div class="col-sm-2">
						<strong>Payment Received</strong>
						</div>
						<div class="col-sm-2">
						<select id="paymentReceived" name="paymentReceived" class="chosen-select form-control" onchange="paymentReceived()">
						<option value="0">Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						</select><span class="paymentReceivedspan text-danger"></span>
						</div>
					</div>
					<div class="col-sm-12" id="paymentDiv">
						<div class="row">
							<div class="col-sm-12">
							<div class="col-sm-4">
								<label>Payment Mode</label> 
								<select name="paymentMode" id="paymentMode" class="chosen-select col-sm-12">
									<option value="cheque" <?php if($tcnrequests->paymentMode=='cheque'): ?><?php echo e('selected'); ?> <?php endif; ?>>CHEQUE</option>

									<option value="DD" <?php if($tcnrequests->paymentMode=='DD'): ?><?php echo e('selected'); ?> <?php endif; ?>>DD</option>

									<option value="online" <?php if($tcnrequests->paymentMode=='online'): ?><?php echo e('selected'); ?> <?php endif; ?>>ONLINE TRANSFERS</option>
									<option value="cash" <?php if($tcnrequests->paymentMode=='cash'): ?><?php echo e('selected'); ?> <?php endif; ?>>CASH</option>

									<option value="other" <?php if($tcnrequests->paymentMode=='other'): ?><?php echo e('selected'); ?> <?php endif; ?>>OTHERS</option>
								</select>						
							</div>

							<div class="col-sm-4">
								<label>Amount</label>
								<input type="text" name="amount" id="amount" value="<?php echo e($tcnrequests->amount); ?>" class="form-control" readonly/><span id="error_msg" class="text-danger"></span>
							</div>

							<div class="col-sm-4">
								<label>Transaction Number</label>
								<input type="text" name="transactionNumber" id="transactionNumber" value="<?php echo e($tcnrequests->transactionNumber); ?>"  class="form-control" /><span id="error_msg" class="text-danger"></span>
							</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-12">
							<div class="col-sm-4">
								<label>Bank</label>
								<input type="text" name="bankName" id="bankName" value="<?php echo e($banks->bankName); ?>" class="form-control" /><span id="error_msg" class="text-danger"></span>
							</div>

							<div class="col-sm-4">
								<label>Branch</label>
								<input type="text" name="branchName" id="branchName" value="<?php echo e($banks->branchName); ?>" class="form-control" /><span id="error_msg" class="text-danger"></span>
							</div>
							<div class="col-sm-4">Received Date
								<input class="form-control" data-date-end-date="0d" type="text" id="receivedDate" name="receivedDate" value="<?php echo e(date('d-m-Y')); ?>"><span id="error_msg" class="text-danger"></span>
							</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row">
					<?php if($button=='Document' || $button=='Payment' || $button=='Reapprove'): ?>
						<div class="col-sm-12 text-center">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
							<label class="font-bold" style="font-size: 16px">Remarks</label><br>
							<textarea class="form-control" name="reason" id="reason" cols="80" ></textarea>
							<br><br>
							</div>
						</div>
						<div class="col-sm-12 text-center">	
							<?php if($button=='Reapprove'): ?>
							<button class="btn btn-success" onclick="setApprovalStatus('Pending')">Send To Reapprove</button>&nbsp;&nbsp;&nbsp;
							<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info">Cancel</a>
							<?php endif; ?>

							<?php if($button=='Document'): ?>
							<button class="btn btn-success" onclick="setApprovalStatus('Approved')">Verify</button>&nbsp;&nbsp;&nbsp;
							<?php elseif($button=='Payment'): ?>
							<button class="btn btn-success" onclick="setApprovalStatus('Approved')" type="button" id="saveapprove">Approve</button>&nbsp;&nbsp;&nbsp;
							<?php endif; ?>

							<?php if($button!='Reapprove'): ?>
							<button class="btn btn-danger" onclick="setApprovalStatus('Denied')">Deny</button>
							<?php endif; ?>

							<?php if($button=='Payment'): ?>&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary" onclick="window.history.go(-1)">Cancel</button>
							<?php endif; ?>

						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>









<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
function setApprovalStatus(status)
{

	var button 	= $('#button').val();
	var tcnId 	= $('#tcnId').val();
	var userId 	= $('#userId').val();
	var reason 	= $('#reason').val();
	var sw 		= 'info';
	var cc      = "#10a72c";

	if(status=='Approved' && button=='Document')
		 {var s='Verify!!'; var text='Are You Sure,All Documents are Verified'; var cbt='Verify'; }
	
	if(status=='Approved' && button=='Payment')
		{ var s='Approve'; var text='Are You Sure,You want to Approve This Request.'; var cbt='Approve'; }
	if(status=='Pending' && button=='Reapprove')
		 {var s='Confirm!!'; var text='Are You Sure,You want to Send Reapproval Request';  var cbt='Reapprove'; }
	if(status=='Denied')
		 {var s='Confirm!!'; var text='Are You Sure,You want to Deny This Request';  var cc = "#ea467a"; var sw ='warning';  var cbt='Deny'; }





	if(button=='Document' || button=='Reapprove')
	var datas='reason='+reason;	


	if(button=='Payment')
	{
		var paymentReceived = $('#paymentReceived').val();

		if(paymentReceived=='0')
		{
		$(".paymentReceivedspan").html('Select  Yes/No ');
		returns = false;
		}
		else
		$(".paymentReceivedspan").html('');	


		if(paymentReceived=='Yes')
		{	var returns =true;
			$('span.error_msg').html('');
			$("#paymentDiv input").each(function()
			{	

			if(!this.value)
			{	if(this.id)
			{
			returns = false;
			$(this).next().html("Field needs filling");
			}              
			}
			else
			$(this).next().html("");
			});
		}
		if(returns==false)
		return;

		if(paymentReceived=='Yes')
			var datas= $('#paymentDiv').find("select, input").serialize()+'&paymentReceived='+paymentReceived+'&reason='+reason;

		if(paymentReceived=='No')
			var datas='paymentReceived='+paymentReceived+'&reason='+reason;	
	}
	if(reason=="" || reason==null)
	{
	$('#reason').focus().css("border","1px solid red");
	return ;
	}

      swal({
        title: s,
        text: text,
        type: sw,
        showCancelButton: true,
        confirmButtonColor: cc,
        confirmButtonText: cbt,
        cancelButtonClass: "btn-info",
        closeOnConfirm: true
      }, 
      function (isConfirm) 
      {
        if (isConfirm) 
        {	$('#loader').show();


			$.ajax({
			     type: "get",
			     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
			     data:datas+'&opcode=30&userId='+userId+'&tcnId='+tcnId+'&status='+status+'&button='+button,
			     success: function (data) {

			     	window.location="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show";
			     }
			 	 });
        }
        else
        {
          return ;
        }   
      }); 

}

function paymentReceived()
{
	var paymentReceived = $('#paymentReceived').val();
	if(paymentReceived=='Yes' && paymentReceived!='0')
	{
	$('#paymentDiv').css('display','block');
	 $('#saveapprove').prop('disabled', false);
	}
	else
	{
	$('#paymentDiv').css('display','none');
	 $('#saveapprove').prop('disabled', true);
	}
	$(".chosen-select").chosen();
}


$(".chosen-select").chosen({width:'100%'});

$( "#receivedDate").datepicker({format:'dd-mm-yyyy',autoclose: true});


paymentReceived();
</script>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
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