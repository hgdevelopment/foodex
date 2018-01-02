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
<body style="background-image:url(<?php echo e(URL::asset('storage/img/background/back.jpg')); ?>);">
<br><br><br><br><br><br>
<div class="container">
 <div class="app ng-scope app-header-fixed" id="app">
  <a href="" class="navbar-brand block m-t ng-binding"><h1><strong>HEERA PURE DROPS</strong></h1></a>
  <div class="m-b-lg">
   
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
         
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" >Log in</button>
    </form>
  </div>
  <!-- ngInclude: 'tpl/blocks/page_footer.html' --><div class="text-center ng-scope" ng-include="'tpl/blocks/page_footer.html'"><p class="ng-scope">
  <small class="text-muted"><br>Heera Pure Drops © 2017</small>
</p></div>

</div>

</body></html>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('libs/jquery/jquery/dist/jquery.js')); ?>"></script>

<?php if(Session::has('sweet_alert.alert')): ?>
<script type="text/javascript">
  swal({
      text: "<?php echo Session::get('sweet_alert.text'); ?>",
      title: "<?php echo Session::get('sweet_alert.title'); ?>",
      timer: <?php echo Session::get('sweet_alert.timer'); ?>,
      type: "<?php echo Session::get('sweet_alert.type'); ?>",
  });
</script>
<?php endif; ?>
