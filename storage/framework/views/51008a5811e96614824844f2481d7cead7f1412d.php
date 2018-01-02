<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php  
use \App\Http\Controllers\Controller;
 ?>
<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Master</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">ADD TCN</div>
		<div class="panel-body">
			<div class="row">
		        <?php if(trim($__env->yieldContent('editId'))): ?>
				<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnmaster/<?php echo $__env->yieldContent('editId'); ?>" id="form" enctype="multipart/form-data" data-parsley-validate>
				<?php else: ?>
				<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnmaster" enctype="multipart/form-data"  id="form" data-parsley-validate>
				 <?php endif; ?>
				  <?php echo e(csrf_field()); ?>

		          <?php $__env->startSection('edit'); ?>
		          <?php echo $__env->yieldSection(); ?>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<label>TCN Type</label>
								<input type="text" name="tcnType" id="tcnType" class="form-control" placeholder="Enter TCN Type ( Ex : TCN X )"  value="<?php echo $__env->yieldContent('tcnType'); ?><?php echo e(old('tcnType')); ?>" required data-parsley-required-message="Please Enter TCN Type" onblur="CheckThisTCN()" >
								<?php if($errors->has('tcnType')): ?>
								<span class="help-inline text-danger"><?php echo e($errors->first('tcnType')); ?></span>
								<?php endif; ?>
							</div>

				            <div class="col-md-4">
				              <label>Locking Duration(In Months)</label>
				              <input type="number" name="lockingDuration" class="form-control" placeholder="Enter Locking Duration"  value="<?php echo $__env->yieldContent('lockingDuration'); ?><?php echo e(old('lockingDuration')); ?>" data-parsley-trigger="change" data-parsley-type="integer" required data-parsley-required-message="Please Enter Valid Locking Duration"">
				            </div>

				             <div class="col-md-4">
				              <label>Benifit Locking Duration</label>
				              <input type="number" name="benefitLockingDuration" class="form-control" placeholder="Enter Benifit Locking Duration"  value="<?php echo $__env->yieldContent('benefitLockingDuration'); ?><?php echo e(old('benefitLockingDuration')); ?>"  data-parsley-trigger="change" data-parsley-type="integer" required data-parsley-required-message="Please Enter Valid Benifit Locking Duration" />
				            </div>
			            </div>       <div class="col-sm-12">&nbsp;</div>

			            <div class="row">
				            <div class="col-md-4">
				              <label>Amount per unit (INR)</label>
				              <input name="inr" class="form-control" placeholder="Enter Amount per unit (INR)"   value="<?php echo $__env->yieldContent('inr'); ?><?php echo e(old('inr')); ?>" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter INR Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (AED)</label>
				              <input  name="aed" class="form-control" placeholder="Enter Amount per unit (AED)"   value="<?php echo $__env->yieldContent('aed'); ?><?php echo e(old('aed')); ?>" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter AED Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (USD)</label>
				              <input name="usd" class="form-control" placeholder="Enter Amount per unit (USD)"  value="<?php echo $__env->yieldContent('usd'); ?><?php echo e(old('usd')); ?>" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter USD Amount" >
				            </div>
				        </div>       <div class="col-sm-12">&nbsp;</div>
				        
				        <div class="row">    
				            <div class="col-md-4">
				              <label>Amount per unit (SAR)</label>
				              <input  class="form-control" name="sar" id="sar" placeholder="Enter Amount per unit (SAR)"    value="<?php echo $__env->yieldContent('sar'); ?><?php echo e(old('sar')); ?>" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter SAR Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (CAD)</label>
				              <input name="cad" class="form-control" placeholder="Enter Amount per unit (CAD)"   value="<?php echo $__env->yieldContent('cad'); ?><?php echo e(old('cad')); ?>" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter CAD Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Profit Declaration</label>

				              <select name="profitDeclaration" class="form-control" placeholder="Profit Declaration" required data-parsley-required-message="Please Select Profit Declaration" >
				              	<option value=" ">Select</option>
				                <option value="Monthly" <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Monthly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Monthly</option>
				                
				                <option value="Bimonthly"  <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Bimonthly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bimonthly</option>
				                
				                <option value="Quarterly"  <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Quarterly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Quarterly</option>
				               
				                <option value="Half-Yearly"  <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Half-Yearly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Half-Yearly</option>
				                
				                <option value="Yearly"  <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Yearly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Yearly</option>
				                
				                <option value="Biyearly"  <?php if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Biyearly'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Biyearly</option>
				             
				            </select>
				            </div>
				        </div>       <div class="col-sm-12">&nbsp;</div>
				            
				        <div class="row">
				            <div class="col-md-4">
				              <label>Open For</label>
				              <select name="openStatus" id="openStatus" class="form-control chosen" required data-parsley-required-message="Please Select Open For" onchange="openForSet()">
				              	<option value=" ">Select</option>
				                <option value="Always Open" <?php if(!empty($edittcnmaster) && $edittcnmaster->openStatus=='Always Open'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Always Open</option>

				                <option <?php if(!empty($edittcnmaster) && $edittcnmaster->openStatus=='Limited Period'): ?> <?php echo e('selected'); ?> <?php endif; ?> value="Limited Period">Limited Period</option>
				              </select>
				            </div>
				                 
				           <div class="col-md-4">
				              <label>Open On</label>

				              <input class="form-control"  id="openOn" name="openOn" value="<?php if(isset($Edit)): ?><?php echo e(date('d-m-Y',strtotime($Edit['openOn']))); ?><?php endif; ?><?php echo e(old('openOn')); ?>" required="" data-parsley-required-message="Select Deposite Date" readonly="" type="text">
				            </div>

				            <div class="col-md-4">
				              <label>Close On</label>
				              <input class="form-control"  id="closeOn" name="closeOn" value="<?php if(isset($Edit)): ?><?php echo e(date('d-m-Y',strtotime($Edit['closeOn']))); ?><?php endif; ?><?php echo e(old('closeOn')); ?>" required="" data-parsley-required-message="Select Deposite Date" readonly="" type="text">
				            </div>
				        </div>   

						<div class="col-md-4">
						</div>

						<div class="col-md-4">
						</div>

			            <div class="col-md-4">
			              <br>
			              <button class="btn btn-success" type="button" onclick="validateThis()">Submit</button>
			              <?php if(isset($Edit)): ?>
			              <a href="<?php echo e(URL::to('/')); ?>/admin/tcnmaster" class="btn btn-danger" type="button">Cancel</a>
			              <?php endif; ?>
			            </div>
					</div>
				</form> 
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">VIEW TCN DETAILS</div>
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive">
				<table class="table" ui-jq="footable" ui-options='{
			        "paging": {
			          "enabled": true
			        },
			        "filtering": {
			          "enabled": true
			        },
			        "sorting": {
			          "enabled": true
			        }}'>
			        <thead>
			             <tr>
			                <th rowspan="2" valign="middle">TCN  Name</th>
			                <th colspan="5" align="center">Amount Per Unit</th>
			                <th rowspan="2">Open For</th>
			                <th rowspan="2">Locking Duration</th>
			                <th rowspan="2">Benefit Locking Duration</th>
			                <th rowspan="2">Profit</th>
			                <th rowspan="2">Actions</th>
			            </tr>
			            <tr>
			                <th>INR</th>
			                <th>AED</th>
			                <th>USD</th>
			                <th>SAR</th>
			                <th>CAD</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			          <tr>
			            <td><?php echo e($tcnmasters->tcnType); ?></td>
			            <td><?php echo e($tcnmasters->inr); ?></td>
			            <td><?php echo e($tcnmasters->aed); ?></td>
			            <td><?php echo e($tcnmasters->usd); ?></td>
			            <td><?php echo e($tcnmasters->sar); ?></td>
			            <td><?php echo e($tcnmasters->cad); ?></td>
			            <td><?php echo e($tcnmasters->openStatus); ?></td>
			            <td><?php echo e($tcnmasters->lockingDuration); ?></td>
			            <td><?php echo e($tcnmasters->benefitLockingDuration); ?></td>
			            <td><?php echo e($tcnmasters->profitDeclaration); ?></td>
			            <td>
			            	<?php if(Controller::UserAccessRights('TCN Master Edit')=='1'): ?>
			              <a href="<?php echo e(URL::to('/')); ?>/admin/tcnmaster/<?php echo e($tcnmasters->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
			              </a>
			              	<?php endif; ?> 
			            	<?php if(Controller::UserAccessRights('TCN Master Delete')=='1'): ?>
			              <form action="<?php echo e(URL::to('/')); ?>/admin/tcnmaster/<?php echo e($tcnmasters->id); ?>" method="POST" class="pull-right">
			              <?php echo e(method_field('DELETE')); ?>

			              <?php echo e(csrf_field()); ?>

			              <button class="active" style="border: none;"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
			              </form>
			              	<?php endif; ?>

			            </td>
			          </tr>
			           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </tbody>
		      </table>
		      </div>
			</div>
		</div>
	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

$(".chosen-select").chosen();

function validateThis()
{

swal({
title: "Confirm!!",
text: "Are you sure, You Want To Save This Details?",
type: "info",
showCancelButton: true,
confirmButtonColor: "#2dbc09",
confirmButtonText: "Save",
animation: "slide-from-bottom",
closeOnConfirm: true
}, 
function (isConfirm) 
{
if(isConfirm) {
	$('#form').submit();
}
else
return; 
});
return ;
}

function CheckThisTCN()
{

var tcnType = $('#tcnType').val();


if(tcnType=='')
return;
else
{
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnAjax",
	data:{opcode:11,tcnType:tcnType},
	success: function (data)
	 {

		if(data>0)
		{
	    sweetAlert("Oops...","This TCN Type has already Exist." , "error");

	   // $('#memberCode');
	   $('#tcnType').val(' ').attr('placeholder', 'Type your answer here');

		}
		else
		{ 

		}
	}
	});
}
}

function openForSet()
 {
var openStatus=$('#openStatus').val();

if(openStatus=="Always Open")
{
	$('#openOn').attr('disabled',true).attr('required',false);
	$('#closeOn').attr('disabled',true).attr('required',false);
}
else
	{
	$('#openOn').attr('disabled',false).attr('required',true);
	$('#closeOn').attr('disabled',false).attr('required',true);
	}	
}

$( "#openOn").datepicker({format:'dd-mm-yyyy',autoclose: true});
$( "#closeOn").datepicker({format:'dd-mm-yyyy',autoclose: true});

openForSet();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>