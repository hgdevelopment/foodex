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
  <h1 class="m-n font-normal h3">TCN Applications List</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">
			<div style="width: 50%;float: left;">SELECT TCN</div><div class="text-right">
						<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm" class="btn btn-info">TCN Application Form</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-sm-8" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<div class="col-lg-12">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-1"  style=" padding:0 3px"><label>DATE</label>
	                  	<div class=" checkbox text-black">
	                  	<label class="i-checks">
	                    <input type="checkbox" name="checkDate" id="checkDate" checked="checked"  /><i class="font-bold"></i>
	                  	</label>
	                  	</div>
					</div>
					<div class="col-sm-2 "  style=" padding:0 3px">
						<label>FROM</label>
						<input class="form-control"  data-date-end-date="0d" type="text" id="fDate" name="fDate" value="<?php echo e(date('d-m-Y', strtotime("-30 days"))); ?>" readonly style="padding: 5px 7px !important">
					</div>
					<div class="col-sm-2" style=" padding:0 3PX">	
						<label>TO</label>
						<input class="form-control" data-date-end-date="0d" type="text" id="tDate" name="tDate" value="<?php echo e(date('d-m-Y')); ?>" readonly style="padding: 5px 7px !important">
					</div>
					<div class="col-sm-2" id="getMembers"  style=" padding:0 3px">
						<label>TCN TYPE</label>
						<select class="form-control chosen-select" name="tcnType" id="tcnType" onchange="getMembers()">
						<option value="All">All</option>
						<?php  $i=1;  ?>
						<?php $__currentLoopData = $tcntypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcntype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($tcntype->id); ?>" <?php if($i==1): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($tcntype->tcnType); ?></option>
						<?php  $i=0; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="col-sm-2" id="gettcnType"  style=" padding:0 3px">
						<label>TCN STATUS</label>
						<select class="form-control chosen-select" name="status" id="status"  onchange="getMembers()">
						<option value="All">All</option>
						<option value="Pending" selected>Pending</option>	
						<option value="Approved">Approved</option>	
						<option value="Denied">Denied</option>	
						<option value="Removed">Removed</option>	
						</select>
					</div>						
					<div class="col-sm-3"  style=" padding:0 3px">
					  <label>MEMBER CODE</label>
					  <select class="form-control col-md-6 chosen-select" name="userId" id="userId">

					  </select>

					</div>
				</div>
				<div class="col-lg-12 text-right"><button class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN('btn1')">Search</button></div>
			</div>

			<div class="col-sm-4" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<div class="col-sm-12" style=" padding:0 3px;"><span style="font-size: 12px; color: blue">( Here you can see the transfered TCN also .. )</span>
					<label>ENTER MEMBER CODE</label>

					<input type="text" name="memberCode" id="memberCode" class="form-control" />
				</div>
				<div class="col-lg-12 text-right"><button style=" margin-top: 6px" class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN('btn2')">Search</button></div>
			</div> 
		</div> 
	</div>	


	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="table-responsive">
						<div  id="showTCN">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(function() {
    $( "#fDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
    $( "#tDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
});	

$(".chosen-select").chosen({width:'100%'});



function showTCN(btn)
{
 $('#showTCN').html('<div style="text-align:center;"><img  src="<?php echo e(URL::to('/')); ?>/loadersmall.gif"/></div>');

if(document.getElementById('checkDate').checked==true)
var checkDate = true;
else
var checkDate = false;

if(btn=='btn2')
var memberCode=$('#memberCode').val();
else
var memberCode='0';	

var tcnType = $('#tcnType').val();	
var status = $('#status').val();	
var fDate = $('#fDate').val();	
var tDate = $('#tDate').val();
var userId = $('#userId').val();	

$.ajax({
     type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
     data:{opcode:21,tcnType:tcnType,status:status,checkDate:checkDate,fDate:fDate,tDate:tDate,userId:userId,btn:btn,memberCode:memberCode},
     success: function (data) {
     		$('#showTCN').html(data);
     		$('#table').dataTable();
$('#table.dataTable thead th, table.dataTable thead td').css('padding','10px 1px');
     		// $('div').find('#table tr:last td:last').removeclass().addClass('btn-group up');
     		// $('div ul').find('#table tr:last td:last').removeclass('').addClass('dropup-menu dropup-menu-right');
     }
 });
}



function getMembers()
{
var tcnType = $('#tcnType').val();	
var status = $('#status').val();	

$.ajax({
     type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
     data:{opcode:22,tcnType:tcnType,status:status},
     success: function (data) {
     	$('#userId').html('').trigger("chosen:updated");  

		for (var i=0;i<data.length;i++) {
			if(i==0)
			$('#userId').append('<option value="All">All</option>').trigger("chosen:updated");   

			$('#userId').append('<option value="'+data[i].id+'">'+data[i].username+'</option>').trigger("chosen:updated");    	
		}

     }
 });
}


function physicalBenefit(tcnId)
{
swal({
  title: "Confirm!",
  text: "Are You Sure, You want add to physical benefit list for this TCN",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
  function (isConfirm) 
  {
    if (isConfirm) 
    {	

		$.ajax({
		     type: "get",
		     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
		      data: {opcode:31,tcnId:tcnId},
		     success: function (data) {
		  		swal({title:'Done',text:'This TCN is succesfully added to physical benefit list!',type:'success',timer:'3800'},
		  		function () {
		          window.location.reload();
		       	});
		     }
		 	 });
    }
    else
    {
      return ;
    }   
  }); 
}

function removeTCN(tcnId)
{
swal({
  title: "Remove!",
  text: "Are You Sure, You want  to remove this TCN",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to write remarks!");
    return false;
  }

  $.ajax({
    type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
    data: {opcode:32,remarks:inputValue,tcnId:tcnId},
    success: function (data)
    {
  		swal({title:'Done',text:'The Request is succesfully Removed!',type:'success',timer:'3800'},
  		function () {
          window.location.reload();
       	});
	},
  		});   
});
}

// $('.table-responsive').on('show.bs.dropdown', function () {
//      $('.table-responsive').css( "overflow", "auto" );
//      $('.btn-group').css({'position':'absolute'});

// });
// $('.table-responsive').on('hide.bs.dropdown', function () {
//      $('.btn-group').css({'position':'absolute'});

// });
getMembers();
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