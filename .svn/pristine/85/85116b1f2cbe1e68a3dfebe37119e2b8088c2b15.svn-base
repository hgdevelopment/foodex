<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title><?php echo $__env->yieldContent('title'); ?> | HEERA ERP</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   <!-- Bootstrap CSS -->
       
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/animate.css/animate.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/font-awesome/css/font-awesome.min.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/jquery/bootstrap/dist/css/bootstrap.css')); ?>" type="text/css" />
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/chosen.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/font.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/app.css')); ?>" type="text/css" />
  <script src="<?php echo e(URL::asset('libs/jquery/jquery/dist/jquery.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/dataTables.bootstrap.css')); ?>" type="text/css" />

 
</head>
<body>
<?php  
use \App\Http\Controllers\Controller;
 ?>
<div class="loading" style="display: none;"></div>
<div class="app app-header-fixed container">
  
  

  <!-- header -->
  <?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->yieldSection(); ?>
  
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">

  <?php $__env->startSection('banner'); ?>
  <?php echo $__env->yieldSection(); ?>

  <div class="app-content-body ">


  <?php $__env->startSection('body'); ?>
  <?php echo $__env->yieldSection(); ?>
      


  </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
    <?php echo $__env->make('partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!-- / footer -->



</div>


<script src="<?php echo e(URL::asset('libs/jquery/bootstrap/dist/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-load.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-jp.config.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-jp.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-nav.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-toggle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/ui-client.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/chosen.jquery.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.min.js')); ?>"></script>
 <script src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('js/dataTables.bootstrap.js')); ?>"></script>

<script type="text/javascript">
  $('.notificaiton_read').on('click' , function(){
            setTimeout( function(){
                count.html(0);
                $('.unread').each(function(){
                    $(this).removeClass('unread');
                });
            }, 5000);
            $.get('<?php echo e(URL::to('/')); ?>/MarkAllSeen' , function(){});
        });
  var $loading = $('.loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });
</script>

<?php $__env->startSection('jquery'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
