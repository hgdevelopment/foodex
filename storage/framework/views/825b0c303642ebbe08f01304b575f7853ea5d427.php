<?php
namespace App\Http\Controllers\Auth;
use Session;
use URL;
use DB;
$branch = Session::get('branch');
?>
<?php
$branch = Session::get('branch');
$branchName = DB::table('branches')->where('id',$branch)->select('branch_name')->first();
$userType = Session::get('userType');
if($userType == "RE")
{
    $userType = "Request Employee";
}
if($userType == "SE")
{
    $userType = "Sales Employee";
}
if($userType == "VN")
{
    $userType = "Verification";
}
if($userType == "OI")
{
    $userType = "Administrator";
}

?>
<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>
                   <img src="<?php echo e(URL::asset('storage/img/background/foodex1.png')); ?>" alt="homepage" class="dark-logo" />
                    <img src="<?php echo e(URL::asset('storage/img/background/foodex1.png')); ?>" alt="homepage" class="light-logo" />
                </b>
                <span>
                    <img src="<?php echo e(URL::asset('storage/img/background/foodex.png')); ?>" alt="homepage" class="dark-logo" />
                    <img src="<?php echo e(URL::asset('storage/img/background/foodex.png')); ?>" class="light-logo" alt="homepage" />
                </span> 
            </a>
        </div>
        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item hidden-sm-down search-box">
                <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                <form class="app-search">
                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                                    <?php if(Session::get('userType') == "VN"): ?> 
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span><span class="heartbit_2"><?php echo e(count(auth('admin')->user()->unreadNotifications)); ?></span> <span class="point"></span> </div>
                    </a>

              

                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php $__currentLoopData = auth('admin')->user()->notifications()->paginate(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <a href="" class="list-group-item <?php echo e($note->read_at == null ? 'unread' : ''); ?>">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                            <span class="mail-desc"><?php echo $note->data['message']; ?></span> <span class="time"><?php echo e($note->created_at->diffForHumans()); ?></span> 
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </li>
                            <li>
                            <a class="nav-link text-center" href="<?php echo e(URL::to('/')); ?>/admin/allnotification"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                    <?php endif; ?>
                </li>



                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up" style="background-color:#ffff">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-text">
                                        <p class="text-muted"><h5><?php echo e($empName = Session::get('empName')); ?></h5></p>
                                        <p class="text-muted"><h6><?php echo e($empName = Session::get('userName')); ?></h6></p>
                                        <p class="text-muted"><h6><?php if($branchName): ?> <?php echo e($branchName->branch_name); ?> <?php endif; ?></h6></p>
                                        <p class="text-muted"><h6><?php echo e($userType); ?></h6></p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(URL::to('/')); ?>/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>

                

            </ul>
        </div>
    </nav>
</header>