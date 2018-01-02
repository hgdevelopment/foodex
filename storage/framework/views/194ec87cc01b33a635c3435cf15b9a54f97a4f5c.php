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
<h1 class="m-n font-normal h3">TCN Application Form <?php if(isset($Edit)): ?> <?php echo e('Edit'); ?><?php endif; ?></h1>
</div>

<?php  
	$editId='';
	session_start();
	if(isset($Edit) && is_array($Edit) && trim($__env->yieldContent('edits')))
	{ $_SESSION["Edit"]=$Edit;}	
 ?>

<input type="hidden" id="editAc" name="editAc" value="<?php echo e((isset($Edit))?$Edit['selectAccountNumber']:'0'); ?>">
<input type="hidden" name="editHAc" id="editHAc" value="<?php echo e((isset($Edit))?$Edit['heeraAccountId']:'0'); ?>">
<input type="hidden" name="editMC" id="editMC" value="<?php echo e((isset($Edit))?$Edit['code']:'0'); ?>">
<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">
	<?php if(trim($__env->yieldContent('edits'))): ?>
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($Edit['editId']); ?>" enctype="multipart/form-data" id="form" data-parsley-validate>
	<?php else: ?>
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm" enctype="multipart/form-data" id="form" data-parsley-validate>
	<?php endif; ?>
		<?php echo e(csrf_field()); ?>

		<?php $__env->startSection('edit'); ?>
		<?php echo $__env->yieldSection(); ?>
		<div class="panel panel-default">
			<div class="panel-heading font-bold">
				<div style="width: 50%;float: left;">Select A Member For Add New TCN</div>
				<div class="text-right" >
				<?php if(!isset($Edit)): ?>
					<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info">TCN APPLICATION LIST</a>
				<?php endif; ?>
				<?php if(isset($Edit)): ?>
					<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info">BACK</a>
				<?php endif; ?>
				</div>

			</div>
			<div class="panel-body">
				<div class="form-group col-sm-4" id="getMembers">
				<label>Member Code</label>
					<input type="text" name="memberCode" id="memberCode" class="form-control"  required data-parsley-required-message="Enter Valid Member Code" onblur="getMembers();" value="<?php if(isset($Edit)): ?><?php echo e($Edit['code']); ?><?php endif; ?>">
					
				</div>
				<div class="form-group col-sm-4" id="gettcnType">
					<label>TCN Type</label>
					<select class="form-control" name="tcnType" id="tcnType" required data-parsley-required-message="Select TCN Type" onchange="calcAmount()
">
						<option value=" ">Select</option>
							<?php 
							$table=DB::table('tcnmasters')->get();

							 ?>
						<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcntype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($tcntype->id); ?>" <?php if(isset($Edit) && $Edit['tcnType']==$tcntype->id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($tcntype->tcnType); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<!--         get Tcn Type From Ajax- -->
				</div>
				<div class="col-sm-2">
					<a onclick="">
				</div>
				</div>
			</div>      
		<!---                    MEMBER  DETAILS           -->
		<div class="panel panel-default">
			<div class="panel-heading font-bold">MEMBER DETAILS</div>
			<div class="panel-body" id="getMemberDetails">
				<!--         get Member Details From Ajax- -->
			</div>
		</div>      
		<!---             HEERA PAYMENT  DETAILS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">HEERA PAYMENT DETAILS</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">Currency Type
							<select class="form-control col-md-6" name="currencyType" id="currencyType" onchange="calcAmount()" required data-parsley-required-message="Select Currency Type">
								<option value=" ">Select</option>
								<option value="INR" <?php if(isset($Edit) && $Edit['currencyType']=='INR'): ?><?php echo e('selected'); ?> <?php endif; ?>>INR</option>
								<option value="USD" <?php if(isset($Edit) && $Edit['currencyType']=='USD'): ?><?php echo e('selected'); ?> <?php endif; ?>>USD</option>
								<option value="AED" <?php if(isset($Edit) && $Edit['currencyType']=='AED'): ?><?php echo e('selected'); ?> <?php endif; ?>>AED</option>
								<option value="SAR" <?php if(isset($Edit) && $Edit['currencyType']=='SAR'): ?><?php echo e('selected'); ?> <?php endif; ?>>SAR</option>
								<option value="CAD" <?php if(isset($Edit) && $Edit['currencyType']=='CAD'): ?><?php echo e('selected'); ?> <?php endif; ?>>CAD</option>
							</select>
						</div>    
						<div class="col-sm-4">Payment Mode
							<select class="form-control col-md-6" name="paymentMode" id="paymentMode"  required data-parsley-required-message="Select Payment Mode">
								<option value=" ">Select</option>
								<option value="cheque" <?php if(isset($Edit) && $Edit['paymentMode']=='cheque'): ?><?php echo e('selected'); ?> <?php endif; ?>>CHEQUE</option>

								<option value="DD" <?php if(isset($Edit) && $Edit['paymentMode']=='DD'): ?><?php echo e('selected'); ?> <?php endif; ?>>DD</option>

								<option value="online" <?php if(isset($Edit) && $Edit['paymentMode']=='online'): ?><?php echo e('selected'); ?> <?php endif; ?>>ONLINE TRANSFERS</option>
								<option value="cash" <?php if(isset($Edit) && $Edit['paymentMode']=='cash'): ?><?php echo e('selected'); ?> <?php endif; ?>>CASH</option>
								<option value="other" <?php if(isset($Edit) && $Edit['paymentMode']=='other'): ?><?php echo e('selected'); ?> <?php endif; ?>>OTHERS</option>
							</select>
						</div>

						<div class="col-sm-4">Unit
							<select class="form-control col-md-6" name="unit" id="unit"  onchange="calcAmount()" required data-parsley-required-message="Select Unit">
								<option value=" ">Select</option>
								<?php for($i=1;$i<=100;$i++) {?>
								<option value="<?php echo $i;?>" <?php if(isset($Edit) && $Edit['unit']==$i): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo $i;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div> <div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4" id="getCountrys">
							ApplyingFrom
							<select class="form-control chosen-select" name="applyingFrom" id="applyingFrom" required data-parsley-required-message="Select Apply From">
								<option value=" ">Select</option>
								<?php 
    							$table = DB::table('countries')->get();
								 ?>
								<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($countrys->id); ?>" <?php if(isset($Edit) && $Edit['country']==$countrys->id): ?><?php echo e('selected'); ?> <?php endif; ?>><?php echo e($countrys->countryCode); ?> - <?php echo e($countrys->countryName); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						<!--   get Countrys from ajax -->	
						</div>

						<div class="col-sm-4">Amount
							<input type="text" name="amount" id="amount" value="<?php echo e(old('amount')); ?>" class="form-control" readonly />
						</div>

						<div class="col-sm-4 ">Transaction&nbsp;Number (DD/Cheque/UTR/Ref..*)
							<input type="text" name="transactionNumber" id="transactionNumber" value="<?php echo e(old('transactionNumber')); ?><?php if(isset($Edit)): ?><?php echo e($Edit['transactionNumber']); ?><?php endif; ?>" class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="(?:\s*[a-zA-Z0-9]\s*)*" data-parsley-pattern-message="Enter Valid Transaction Number" required data-parsley-required-message="Enter Transaction No."/>
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">Deposit Date
							<input class="form-control"  data-date-end-date="0d" type="text" id="depositeDate" name="depositeDate" value="<?php echo e(old('depositeDate')); ?><?php if(isset($Edit)): ?><?php echo e(date('d-m-Y',strtotime($Edit['depositeDate']))); ?><?php endif; ?>" required data-parsley-required-message="Select Deposite Date" readonly>

						</div>

						<div class="col-sm-4" id="heeraAccountIds">
						</div>
						<div class="col-md-4">
						
						</div>
					</div>
				</div>			
			</div>
		</div>      

		<!---                   BENEFIT REMITTANCE           -->
		<div class="panel panel-default">
			<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2 font-bold">Select Ac/No</div>
						<div class="col-sm-4" id="getAccount">
						<!--   get Account from ajax -->
						</div>
						<div class="col-sm-6"></div>
					</div>
				</div>       <div class="col-sm-12">&nbsp;</div>

				<!--          Account details from ajax -->

				<div id="getAccountDetails">
				</div>
			</div>
		</div>      

		<!---                   SUPPORTING DOCUMENTS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc1']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc1']); ?>')">
							<?php endif; ?>
							<br>Doc 1
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc1" id="doc1"  <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 1"  accept="image/png,image/jpeg"';   ?> onchange="imageCheck(this)">
							(Upload passbook/cancelled cheque/bank statement.) 
							<span class="doc1 text-danger"></span> 
							<?php if($errors->has('doc1')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc1')); ?></span>
                			<?php endif; ?>
						</div>

						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc2']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc2']); ?>')">
							<?php endif; ?>
							<br>Doc 2
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc2" id="doc2" <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 2" data-parsley-max-file-size="50" ';   ?> onchange="imageCheck(this)">
							(Upload Transfer statement proof.) 
							<span class="doc2 text-danger"></span> 
							<?php if($errors->has('doc2')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc2')); ?></span>
                			<?php endif; ?>
						</div>

						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc3']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc3']); ?>')">
							<?php endif; ?>
							<br>Doc 3
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc3" id="doc3" <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 3" data-parsley-max-file-size="50"';   ?> onchange="imageCheck(this)">
							(Upload Transaction proof/cheque proof/online transfer screenshot.) 
							<span class="doc3 text-danger"></span> 
							<?php if($errors->has('doc3')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc3')); ?></span>
                			<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>      


		<!---             NOMINEE DETAILS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">NOMINEE DETAILS</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2 font-bold">Select Nominee</div>
						<div class="col-sm-4" id="getNominee">
							<!--   get Nominee from ajax -->
						</div>
						<div class="col-sm-6"></div>
					</div>
				</div>      <div class="col-sm-12">&nbsp;</div>


				<div id="getNomineeDetails">
				<!--   get Nominee Details from ajax -->
				</div>
				 <div class="col-sm-12">&nbsp;</div>
				<div id="nomineePhotos" >
					<div class="col-sm-4">Upload Photo<input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="uploadPhoto" id="uploadPhoto" <?php  
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Nominee Photo"';   ?> onchange="imageCheck(this)">
							<span class="uploadPhoto text-danger"></span> 
							<?php if($errors->has('uploadPhoto')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('uploadPhoto')); ?></span>
                			<?php endif; ?>
					</div>

					<div class="col-sm-4">Signature<input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="signature" id="signature" <?php  
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Signature Fle"';   ?> onchange="imageCheck(this)">
							<span class="signature text-danger"></span> 
							<?php if($errors->has('signature')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('signature')); ?></span>
                			<?php endif; ?>
					</div>


					<div class="col-sm-4">Proof Copy<input class="form-control removeattr" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="proofCopy" id="proofCopy" <?php  
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Nominee ProofCopy"';   ?> onchange="imageCheck(this)">
							<span class="proofCopy text-danger"></span> 
							<?php if($errors->has('proofCopy')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('proofCopy')); ?></span>
                			<?php endif; ?>
					</div>
				</div> 	<div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12 text-center">
				<input type="submit" value="<?php if(!isset($Edit)): ?><?php echo e('Add'); ?><?php else: ?><?php echo e('Save'); ?><?php endif; ?>" class="btn btn-success" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if(!isset($Edit)): ?>
				<input type="reset" name="clear" value="Clear" class="btn btn-danger"/>
				<?php else: ?>
				<input type="button" name="clear" value="Cancel" onclick="window.history.back()" class="btn btn-danger"/>
				<?php endif; ?>
				</div>
			</div>
		</div>     
	</form>	
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

$( "#depositeDate").datepicker({format:'dd-mm-yyyy',autoclose: true});


$(".chosen-select").chosen({width:'100%'});
</script>




<script type="text/javascript">
//
$(document).ready(function() {
getMembers();
}
 );

function getMembers()
{

var userCode=$('#memberCode').val().replace(/\s/g, '');


var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';
	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:1,edits:edits,userCode:userCode},
	success: function (data) {

		if(data!=1 && userCode!='' && userCode!=null)
		{
		    sweetAlert("Check...","Incorrect Member Code." , "error");
		   $('#memberCode').val(' ');
		   $('.memberCode').html('Enter A Valid Member Code');
		}
		else
		   $('.memberCode').html('');

		getMemberDetails();

	}
	});
}

function getMemberDetails(check)
{
 $('#getMemberDetails').html('<div style="text-align:center;"><img  src="<?php echo e(URL::to('/')); ?>/loaderbox.gif"/></div>');

var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';

	var id=$('#memberCode').val();	

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:2,id:id,check:check,edits:edits},
	success: function (data) {
	$('#getMemberDetails').html(data);

		var userCode=$('#memberCode').val().replace(/\s/g, '');
		var userId=$('#memberUserId').val();	
		var tcnType=$('#tcnType').val();	
		var editMC=$('#editMC').val().replace(/\s/g, '');

		if((edits!='1' && tcnType!='') || (edits=='1' && editMC!=userCode))
		CheckThisTCN();
		else
		$('#memberCode').val(userCode);

getAccount();	
getNominee();

	}
	});
}



function CheckThisTCN()
{
var userId = $('#memberUserId').val();
var memberCode = $('#memberCode').val().replace(/\s/g, '');

	if(userId>0 && memberCode!='')
	{

		$.ajax({
		type: "get",
		url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
		data:{opcode:9,userId:userId},
		success: function (data)
		 { 
			if(data>0)
			{
		    sweetAlert("Oops...","This member has already applied for a TCN today. A member is allowed to apply TCN only once in a day." , "error");

		   // $('#memberCode');
		   $('#memberCode').val(' ');

			}
			else
			{ 
			$('#memberCode').val(memberCode);	
			}

		}
		});
	}
	//calcAmount();
}

function calcAmount()
{
var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';


	var id=$('#tcnType').val();	
	var unit=$('#unit').val();	
	var currencyType=$('#currencyType').val();	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:20,id:id,currencyType:currencyType,edits:edits},
	success: function (data) {
	$('#amount').val(data*unit);

heeraAccountCheck();	
	}
	});

}

function heeraAccountCheck()
{

var tcnType=$('#tcnType').val();	
var currencyType=$('#currencyType').val();

var editHAc= $('#editHAc').val();

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:8,currencyType:currencyType,tcnType:tcnType,editHAc:editHAc},
	success: function (data) 
	{

		$('#heeraAccountIds').html(data);
		$(".chosen-select").chosen({width:'100%'});
	}
	});

}

// function getCountrys()
// {
// var edits='
// 	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0'; ;

// 	$.ajax({
// 	type: "get",
// 	url: "admin/tcnAjax",
// 	data:{opcode:3,edits:edits},
// 	success: function (data) {

// 	$('#getCountrys').html(data);
// 	getAccount();
// 	getNominee();
// 	}
// 	});
// }


function getAccount()
{
var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';

var id=$('#memberUserId').val();
var editAc = $('#editAc').val();	

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:4,id:id,edits:edits,editAc:editAc},
	success: function (data) {
	$('#getAccount').html(data);
	$(".chosen-select").chosen({width:'100%'});
	<?php 
	if(isset($Edit))
		{  ?>

	getAccountDetails();  
	<?php  }       
	 ?>
	}
	});
}


function getAccountDetails(change)
{
 $('#getAccountDetails').html('<div style="text-align:center;"><img  src="<?php echo e(URL::to('/')); ?>/loaderbox.gif"/></div>');

var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';
var editAc='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo $Edit["selectAccountNumber"]; else echo '0';  ?>';


	var id=$('#selectAccountNumber').val();		
	var memberName=$('#memberName').val();		
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:5,id:id,change:change,memberName:memberName,edits:edits,editAc:editAc},
	success: function (data) {
	$('#getAccountDetails').html(data);
	$(".chosen-select").chosen({width:'100%'});
	 	
	$("#getAccountDetails *").parsley(); 	
	}
	});
}



function getNominee()
{

var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';

	var memberUserId = $('#memberUserId').val();	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:6,memberUserId:memberUserId,edits:edits},
	success: function (data) {
	$('#getNominee').html(data);
	$(".chosen-select").chosen({width:'100%'});
var userCode=$('#memberCode').val().replace(/\s/g, '');
if(userCode!='')
getNomineeDetails();

	}
	});
}


function getNomineeDetails(change)
{
 $('#getNomineeDetails').html('<div style="text-align:center;"><img  src="<?php echo e(URL::to('/')); ?>/loaderbox.gif"/></div>');
		var nominee=$('#nominee').val();

	if(nominee==' ' || nominee==null)
	{
		$('#nomineePhotos').css('display','none');
		$('#getNomineeDetails').css('display','none');
		return ;
	}
	else
	{
		$('#nomineePhotos').css('display','block');
		$('#getNomineeDetails').css('display','block');
	}
var edits='<?php 
	if(trim($__env->yieldContent('edits'))!='') echo '1'; else echo '0';  ?>';


	var id=$('#nominee').val();	
	<?php  
	if(isset($Edit['nominee'])){  ?>	var Nphoto=1;	<?php  } else
	{  ?>	var Nphoto=0;	<?php  	}  ?>

	if(id=='Others'  && Nphoto!=1)
	document.getElementById('nomineePhotos').style.display = 'block';

	if(id!='Others' && Nphoto!=1)
	{
	$(".removeattr").attr("required", false);	
	document.getElementById('nomineePhotos').style.display = 'none';
	}

	if(id!='Others' && Nphoto!=1)
	{
	$('.nomineePhoto').css("display","none");
	}

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:7,id:id,nominee:nominee,edits:edits},
	success: function (data) {

	$('#getNomineeDetails').html(data);


	$("#getNomineeDetails *").parsley();


	$( "#dob").datepicker({format:'dd-mm-yyyy',autoclose: true});


	}
	});
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






// function getAge() {

// var dateString = document.getElementById("dob").value;
// if(dateString !="")
// {
//     var today = new Date();
//     var birthDate = new Date(dateString);
//     var age = today.getFullYear() - birthDate.getFullYear();
//     var m = today.getMonth() - birthDate.getMonth();
//     var da = today.getDate() - birthDate.getDate();
//     $("#dateerror").html("");
//     if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
//         age--;
//     }
//     if(m<0){
//         m +=12;
//     }
//     if(da<0){
//         da +=30;
//     }

//   	if(age < 18 )
// 	{
// 	$(".dob").html("You must be 18 Years Old");
// 	document.getElementById("dob").value='';
// 	 return false;
// 	}
// 	else
// 	$(".dob").html("");
// }
//}


</script>
<?php  
if(isset($Edit)){  ?>
<script type="text/javascript">
calcAmount();	
</script>
<?php 
}
 ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>