<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>

<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Stocks</h2>
		</div>
	</div>
	<form method="post" action="#" id="purchase_order_form"> 
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-block">
							
							<div class="table-responsive">
								<table id="stocklist" class="table table-hover table-striped table-bordered" >
									<thead>
										<tr>
											<th>Product No</th>
											<th>Name</th>
											<th>Basic Cost</th>
											<th>Discount</th>
											<th>GST</th>
											<th>Billing Price</th>
											<th>Quantity</th>
										</tr>
									</thead>
									
								</table>
							</div>
					</div>
				</div>
			</div>

			</div>

		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript">

            $('#stocklist').DataTable({
		        // dom: 'Bfrtip',
		         dom: 'Bfrtip',
		        processing: true,
		        serverSide: true,
		        ajax: {
		            url: '<?php echo e(URL::to('/')); ?>/admin/stock/list/datatable',
		            data: function (d) {
		                d.name = '';
		                // d.code = $('input[name=code]').val();
		                // d.usertype = $('select[name=usertype]').val();
		                // d.status = $('select[name=status]').val();
		            }
		        },
		        columns: [
		            // {data: 'rownum', name: 'rownum'},
		            {data: 'product_number', name: 'product_number'},
		            {data: 'product_name', name: 'product_name'},
		            {data: 'basic_cost', name: 'basic_cost'},
		            {data: 'product_discount', name: 'product_discount'},
		            {data: 'product_gst', name: 'product_gst'},
		            {data: 'billing_price', name: 'billing_price'},
		            // {data: 'billing_price', name: 'billing_price'},
		            {data: 'quantity', name: 'quantity' },
		            // {data: 'quantity', name: 'quantity' }
		        ],
		        buttons: [
			        'copy', 'csv', 'excel', 'pdf', 'print'
			    ]
       });
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>