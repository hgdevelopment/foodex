<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<link href="<?php echo e(URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection{
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.25;
    min-height: 38px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
   
    top: 6px;
    right: 4px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px;
}
.bigdrop{
    /* max-width: 200px !important;*/
}
td ul.dropdown-menu{
    padding:6px;
}
td ul.dropdown-menu li a{
    display: block;
    width:100%;
}
</style>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h2 class="text-themecolor m-b-0 m-t-0">View Credit/Partial Bill </h2>
        </div>
    </div>
    <form method="post" action="#" id="form_stock_confirm"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="p-20">
                            <table class="table" id="stock_request_send" style="width: 100%">
                                <thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Billnumber</th>
									<th>Customer Name</th>
									<th>Total Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								<?php $__currentLoopData = $view_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($sl++); ?></td>
										<td><?php echo e(date('d-m-Y H:i:s',strtotime($view_orders->created_at))); ?></td>
										<td><?php echo e($view_orders->bill_number); ?></td>
										<td><?php echo e($view_orders->customer_name); ?></td>
										<td><?php echo e($view_orders->total_amount); ?></td>
                                        <td>
                                          <a href="<?php echo e(URL::to('/')); ?>/admin/updateOrderConfirm/<?php echo e($view_orders->orderId); ?>" class=""><button class="btn btn-success" type="button"> Order Sales</button></a>
                                        </td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
                        </div>
           	        </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/form_wizard.js')); ?>"></script>
<script>
    $(function(){
        $('#stock_request_send').DataTable({
        	 dom: 'Bfrtip',
        	 buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
        });
    });
</script>
<?php if(session()->has('sweet_alert.title')): ?>
    <script>
       swal('Success','Order Confirm','success');
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>