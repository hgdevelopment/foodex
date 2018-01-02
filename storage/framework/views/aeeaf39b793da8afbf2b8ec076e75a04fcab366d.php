<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<style type="text/css">
	.card-outline-info {
    background-color: #fff;
}
</style>
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-12 col-8 align-self-center">
			<h2 class="text-themecolor m-b-0 m-t-0">Import Excel</h2>
		</div>
	</div>
	<div class="row">
    <div class="col-lg-12">
      <div class="card card-outline-info">
        <div class="card-header">
          <h4 class="m-b-0 text-white">Product Details(Import Excel)</h4>
        </div>
        <div class="card-body col-sm-12">
          <form action="#" method="POST" id="stock_upload"  enctype="multipart/form-data">
            <div class="form-body">
              <?php echo e(csrf_field()); ?>

              <div class="row p-t-20">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Select File</label>
                    <input type="file" id="upload_excel" name="upload_excel" class="form-control" required="">
                  </div>
                </div>
                  <!--/span-->
              </div>     
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
            </div>
            <br/>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline-info">
        <div class="card-header">
          <h4 class="m-b-0 text-white">Stock Details(Import Excel)</h4>
        </div>
        <div class="card-body col-sm-12">
          <form action="<?php echo e(URL::to('/')); ?>/admin/purchase/stock_upload" method="POST" id="stock"  enctype="multipart/form-data" data-parsley-validate class="m-t-40">
            <div class="form-body">
              <?php echo e(csrf_field()); ?>

              <div class="row p-t-20">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Select File</label>
                    <input type="file" id="stock_upload" name="stock_upload" class="form-control" required="">
                  </div>
                </div>
                  <!--/span-->
              </div>     
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
            </div>
            <br/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/form_wizard.js')); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(function(){
         $('#stock_upload')
        .formValidation({
	        framework: 'bootstrap',
	        
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
            fields: {
                
                'upload_excel': {
                	// row: '.form-group',
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                        file: {
		                    extension: 'csv',
		                    type: 'application/vnd.ms-excel',
		                    message: 'Please choose a .csv file'
		                }
                    }
                },
                
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();

            var $form = $(e.target),
                fv    = $form.data('formValidation');
            

            var form = $('#stock_upload')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '<?php echo e(URL::to('/')); ?>/admin/purchase/excel_upload',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                                   swal({ title: "Product Importing!",
                                            text: data.msg,
                                            type: "success" 
                                            }).then(function() {
                                                 $('#stock_upload').formValidation('resetForm', true);
                                            });
                                  }else{
                                  swal({ title: "Product Importing!",
                                            text: data.msg,
                                            type: "danger" 
                                            }).then(function() {
                                               
                                            });
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });

            
        });
	});
  // function upload_stock() 
  // {

  //   //var data = new FormData(form);
  //   $.ajax({
  //       url: '<?php echo e(URL::to('/')); ?>/admin/purchase/stock_upload',
  //       type: 'POST',
  //       data: data,
  //       dataType: "html",
  //       success: function (data) {
  //         alert(data);
  //         // if(data.result){
  //         //  swal({ title: "Stock Importing!",
  //         //     text: data.msg,
  //         //     type: "success" 
  //         //     });
  //         // }
       
  //       },
  //   });

  // }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>