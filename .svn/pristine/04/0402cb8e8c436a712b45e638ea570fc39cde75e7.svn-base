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
 <?php 
  if($tcnrequests->docVerified=='Pending' && $tcnrequests->status=='Pending')
  { $button='Document';
  }

  if($tcnrequests->docVerified!='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->status=='Pending')
  { $button='Payment';
  }

  if($tcnrequests->status=='Denied')
  { $button='Denied';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0')
  { $button='Reapprove';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId=='0')
  { $button='Pending';
  }

  if($tcnrequests->status=='Approved')
  { $button='Approve';
  }
  if($tcnrequests->status=='Transfered')
  { $button='Transfer';
  }
   ?>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Application View</h1>
</div>
<input type="hidden" id="tcnId" value="<?php echo e($tcnrequests->id); ?>">
<input type="hidden" id="userId" value="<?php echo e($tcnrequests->userId); ?>">

<input type="hidden" name="button" id="button" value="<?php echo e($button); ?>">
<div class="wrapper-md">
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
							<div class="col-lg-4">Email Id</div>
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
						<div class="col-lg-6">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>" style="height:160px;width:150px;cursor: pointer" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>')" >
						</div>
						<div class="col-lg-6">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>" style="height:160px;width:150px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>')">
						</div>
					</div>
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
							<div class="col-lg-5 font-bold" style="word-wrap: break-word;"><?php echo e($banks->accountNumber); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-6">Bank Name</div>
							<div class="col-lg-6 font-bold" style="word-wrap: break-word;"><?php echo e($banks->bankName); ?></div>
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
							<div class="col-lg-5 font-bold" style="word-wrap: break-word;"><?php echo e($banks->branchName); ?></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
							<div class="col-lg-6">Account Holder Name</div>
							<div class="col-lg-6 font-bold" style="word-wrap: break-word;"><?php echo e($banks->accountHolderName); ?></div>
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
							<label class=" font-bold" style="word-wrap: break-word;">Nominee Name</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($nominees->name); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class=" font-bold" style="word-wrap: break-word;">Email ID</label>
							</div>
							<div class="col-sm-8">
							<label><?php echo e($nominees->email); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=" font-bold"> Proof Type</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($proofs->typeOfProof); ?></label>
							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=" font-bold">Relation With Applicant</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($nominees->relationWithApplicant); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class=" font-bold" style="word-wrap: break-word;">Address </label>
							</div>
							<div class="col-sm-8">
							<label><?php echo e($address2->address); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=" font-bold">Proof Number</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($proofs->proofNumber); ?></label>
							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=" font-bold">Gender</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($nominees->gender); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class=" font-bold">City</label>
							</div>
							<div class="col-sm-8">
							<label><?php echo e($address2->city); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="font-bold">State</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($address2->state); ?></label>
							</div>
							</div>
						</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class=" font-bold">D O B</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e(date('d-m-Y',strtotime($nominees->dob))); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-4">
							<label class=" font-bold">Mobile No</label>
							</div>
							<div class="col-sm-8">
							<label><?php echo e($nominees->mobile); ?></label>
							</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-6">
							<label class="font-bold">PIN</label>
							</div>
							<div class="col-sm-6">
							<label><?php echo e($address2->pin); ?></label>
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

	<?php if($button=='Approve'): ?>
	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">PAYMENT RECEIVED DETAILS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">Payment&nbsp;Mode</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->payment_mode); ?></div>
						<div class="col-sm-2">Amount</div>
						<div class="col-sm-2 font-bold"><?php echo e($tcnrequests->amount); ?></div>
						<div class="col-sm-2">Transaction&nbsp;No</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->transactionNumber); ?></div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-2">Bank</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->bank); ?></div>
						<div class="col-sm-2">Branch</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->branch); ?></div>
						<div class="col-sm-2">Received Date</div>
						<div class="col-sm-2 font-bold"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate))); ?></div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php endif; ?>

	<?php 	
	function TCNuserID($id)
	{

	$user=DB::table('logins')->where('id',$id)->get();
	foreach($user as $user)
	return $user->username;
	}
	 ?>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">APPROVAL DETAILS
				</div>
				<div class="panel-body">
					<?php if($tcnrequests->status!='Transfered'): ?>
					<div class="col-lg-12">
						<div class="row">
							<div class="col-sm-2">TCN Applied By</div>
							<div class="col-sm-2 font-bold"> <?php if($tcnrequests->addedId=='0'): ?><?php echo e('MEMBER'); ?><?php else: ?><?php echo e(TCNuserID($tcnrequests->addedId)); ?><?php endif; ?></div>
							<div class="col-sm-2">Applied Date</div>
							<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y',strtotime($tcnrequests->addedDate))); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>

						<?php if($tcnrequests->status!='Denied'): ?>
						<div class="row">

							<div class="col-sm-2">Document Status</div>
							<div class="col-sm-2 font-bold"> <?php echo e($tcnrequests->docVerified); ?></div>
							<div class="col-sm-2">Payment Status</div>
							<div class="col-sm-2 font-bold"> <?php echo e($tcnrequests->paymentReceived); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>
						

						<?php if($tcnrequests->docVerified!='Pending'): ?>
						<div class="row">
							<div class="col-sm-2">Doc Verified By</div>
							<div class="col-sm-2 font-bold"> <?php echo e(TCNuserID($tcnrequests->docVerifiedId)); ?></div>
							<div class="col-sm-2">Doc Verified Date</div>
							<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->docVerifiedDate))); ?></div>
							<div class="col-sm-1">Remarks</div>
							<div class="col-sm-3 font-bold"> <?php echo e($tcnrequests->reason); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>
						<?php endif; ?>	

						<?php if($tcnrequests->paymentReceived!='Pending'): ?>
						<?php 
						$payment=DB::table('paymentdetails')->where('id',$tcnrequests->paymentId)->get();
						foreach($payment as $payment)
						 ?>

						<div class="row">
							<div class="col-sm-2">Approved By</div>
							<div class="col-sm-2 font-bold">  <?php echo e(TCNuserID($payment->addedId)); ?></div>
							<div class="col-sm-2">Approved Date</div>
							<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate))); ?></div>
							<div class="col-sm-1">Remarks</div>
							<div class="col-sm-3 font-bold"> <?php echo e($payment->remarks); ?></div>
						</div><div class="col-lg-12"><?php if($tcnrequests->transferedReason!=''): ?><br>Transfered TCN : <?php echo e($tcnrequests->transferedReason); ?></div><?php endif; ?>
							<div class="col-lg-12">&nbsp;</div>
						<?php endif; ?>

						<?php if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0'): ?>
						<div class="row">
							<div class="col-sm-2">Reapproval Send By</div>
							<div class="col-sm-2 font-bold"> <?php echo e(TCNuserID($tcnrequests->approvalId)); ?></div>
							<div class="col-sm-2">Reapproval Date</div>
							<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></div>
							<div class="col-sm-1">Remarks</div>
							<div class="col-sm-3 font-bold"> <?php echo e($tcnrequests->reason); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>
						<?php endif; ?>
						<?php endif; ?>
						<?php if($tcnrequests->status=='Denied'): ?>
						<div class="row">
							<div class="col-sm-2">Denied By</div>
							<div class="col-sm-2 font-bold"> <?php echo e(TCNuserID($tcnrequests->approvalId)); ?></div>
							<div class="col-sm-2">Denied Date</div>
							<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></div>
							<div class="col-sm-2">Remarks</div>
							<div class="col-sm-2 font-bold"> <?php echo e($tcnrequests->reason); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if($tcnrequests->status=='Removed'): ?>
					<div class="row">
						<div class="col-sm-2">Removed By</div>
						<div class="col-sm-2 font-bold"> <?php echo e(TCNuserID($tcnrequests->approvalId)); ?></div>
						<div class="col-sm-2">Removed Date</div>
						<div class="col-sm-2 font-bold"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></div>
						<div class="col-sm-2">Remarks</div>
						<div class="col-sm-2 font-bold"> <?php echo e($tcnrequests->reason); ?></div>
					</div>
					<?php endif; ?>

					<?php if($tcnrequests->status=='Transfered'): ?>
					<div class="col-lg-12">
						<div class="row">
							<div class="col-sm-2">TCN Transfered By</div>
							<div class="col-sm-2 font-bold"> <?php if($tcnrequests->addedId=='0'): ?><?php echo e('MEMBER'); ?><?php else: ?><?php echo e(TCNuserID($tcnrequests->addedId)); ?><?php endif; ?></div>
							<div class="col-sm-2">Remarks</div>
							<div class="col-sm-6 font-bold"> <?php echo e($tcnrequests->transferedReason); ?></div>
						</div><div class="col-lg-12">&nbsp;</div>
					</div>	
					<?php endif; ?>
				</div>
			</div>
		</div>	
	</div>


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
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