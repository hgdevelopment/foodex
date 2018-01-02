<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Heera Foodex</title>
    <link href="<?php echo e(URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" type="text/css" />
</head>
<style type="text/css">
    body{
        font-family: "Poppins", sans-serif;
    }
</style>
<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo e(URL::asset('img/foodex_2.jpg')); ?>)" >        
            <div class="login-box card">
            <div class="card-block" style="">
                <form class="form-horizontal form-material" id="loginform" method="post" action="<?php echo e(route('login')); ?>" >
                    <?php echo csrf_field(); ?>

                    <h2 style="text-align:center;color: #1E88E5"><img src="img/logo.png" class="image-responsive"></h2><br><br>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" style="background: #579538;border: 1px #579538 solid;" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div> 
    </section>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/bootstrap/js/tether.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/waves.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
    
</body>
</html>