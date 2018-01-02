 <html lang="en" data-ng-app="app" class="ng-scope">
<head>
  <meta charset="utf-8">
  <title>HEERA ERP</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/animate.css/animate.css')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/font-awesome/css/font-awesome.min.css')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css')); ?>"" type="text/css">
  <link rel="stylesheet" href="<?php echo e(URL::asset('libs/jquery/bootstrap/dist/css/bootstrap.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(URL::asset('css/app.min.css')); ?>">
<style type="text/css" media="screen">
  .m-b-lg {
   display: block;
   margin: 0 auto;
}
@media (min-width: 320px) {
    .m-b-lg {
    width: 290px;
}
}
	@media (min-width: 768px) {
    .m-b-lg {
    width: 430px;
}
}

 
 
</style>
</head>
<body>
<div class="container">
 <div class="app ng-scope app-header-fixed" id="app">
  <a href="" class="navbar-brand block m-t ng-binding">HEERA ERP</a>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Sign in to get in touch</strong>
    </div>
    <form name="form" class="form-validation ng-pristine ng-valid-email ng-invalid ng-invalid-required" method="post" action="<?php echo e(route('login')); ?>">
      <?php echo e(csrf_field()); ?>

      <div class="text-danger wrapper text-center ng-binding ng-hide" ng-show="authError" aria-hidden="true">
          
      </div>
      <div class="list-group list-group-sm">
         <?php if(session()->has('message')): ?>
              <div class="alert alert-info fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Info!</strong> <?php echo e(session()->get('message')); ?>

            </div>
            <?php endif; ?>
        <div class="list-group-item <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
          <input type="text" placeholder="Username" class="form-control no-border ng-pristine ng-valid-email ng-invalid ng-invalid-required ng-touched"  id="username" name="username"  value="">
           <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
          <?php endif; ?>
        </div>
        <div class="list-group-item">
           <input type="password" placeholder="Password" class="form-control no-border"  id="password" name="password">
           <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
        </div>
         <div class="list-group-item">
          <input type="checkbox" checked="checked" name="remember" id="remember" <?php echo e(old('remember')? 'checked':''); ?>> Remember me
         
        </div>
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" >Log in</button>
      <div class="text-center m-t m-b"><a  href="<?php echo e(route('forgetpassword')); ?>">Forgot password?</a></div>
      <div class="line line-dashed"></div>
      <p class="text-center">Do not have an account? Register Here..</p>
      <a href="web/member/createMember" class="btn btn-lg btn-default btn-block" >Member Registration</a>
      <a href="web/dsaCreate" class="btn btn-lg btn-default btn-block" >DSA Registration</a>
      <a href="enquiryreg" class="btn btn-lg btn-default btn-block" >Enquiry Registration</a>
    </form>
  </div>
  <!-- ngInclude: 'tpl/blocks/page_footer.html' --><div class="text-center ng-scope" ng-include="'tpl/blocks/page_footer.html'"><p class="ng-scope">
  <small class="text-muted"><br>© 2017</small>
</p></div>

</div>

</body></html>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

        // more options
        <?php  Session::forget('sweet_alert'); ?>
    });
  </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>