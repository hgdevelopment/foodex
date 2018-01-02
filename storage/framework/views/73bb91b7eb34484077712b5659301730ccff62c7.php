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
  <h1 class="m-n font-normal h3">Transfer TCN </h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-heading font-bold">SELECT TCN FOR TRANSFER</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-2 font-bold">MEMBER CODE</div>
						<div class="col-sm-3 "><input class="form-control" type="text" name="tcnCode" id="tcnCode" ></div>
						<div class="col-sm-2"><button class="btn btn-info" onclick="getTcnList()">Search</div>
					</div>
				</div>
			</div>
		</div> 
	</div> 

	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row table-responsive" id="tcnList">
				
				</div>
			</div>
		</div>
	</div>  

</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

function getTcnList()
{
var tcnCode=$('#tcnCode').val();
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnTransfer/List@@@"+tcnCode,
	data:{tcnCode:tcnCode},
	success: function (data) {
		if(data==1)
		{
			location.reload(); 
		}
		else
		{
		$('#tcnList').html(data);
		 $('#table').dataTable();
$('#table.dataTable thead th, table.dataTable thead td').css('padding','10px 1px');
		}
	}
	});
}	
</script>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
        });
    </script>
<?php endif; ?>

<?php  
Session::Forget('sweet_alert'); 
 ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>