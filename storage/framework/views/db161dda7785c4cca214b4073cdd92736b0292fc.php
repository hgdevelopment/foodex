<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB;
use Carbon;
use Auth;
use Session;
use URL;
$branch = Session::get('branch');
?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH SALES</small></h6>
                        <h4 class="m-t-0 text-info">&#x20B9 58,356</h4>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH SALES</small></h6>
                        <h4 class="m-t-0 text-primary">&#x20B9 48,356 </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">Todays Sale</h5>
                            <h3 class="m-b-0 font-lgiht">&#x20B9 2376</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">Todays Sale</h5>
                            <h3 class="m-b-0 font-lgiht">&#x20B9 2376</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">Yesterdays Sale</h5>
                            <h3 class="m-b-0 font-lgiht">&#x20B9 1795</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-bullseye"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0"><?php echo date('d F Y'); ?></h5>
                            <h3 class="m-b-0 font-lgiht" id="clock">&#x20B9 687</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Out Of Stock Products</h4>
                    <div class="table-responsive m-t-20">
                        <table id="example24"  class="display nowrap table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity Left</th>
                                    <th>Add</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Elite Admin</td>
                                <td>$3.9K</td>
                                <td><span class="label label-success" ><a href="<?php echo e(\URL::to('admin/expiredproduct')); ?>" style="color:#fff;text-decoration: none;">ADD</a></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Expired Products</h4>
                        <div class="card">
                            <div class="card-body p-b-0">
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active "   href="<?php echo e(\URL::to('admin/dashboard')); ?>" role="tab">
                                    <span class="hidden-sm-up">
                                    <i class="ti-email"></i>
                                    </span> 
                                    <span class="hidden-xs-down">Expired Products</span>
                                </a> 
                                </li>   
                                <li class="nav-item"> 
                                    <a class="nav-link"   href="<?php echo e(URL::to('/')); ?>/admin/dash/seven" role="tab">
                                    <span class="hidden-sm-up">
                                    <i class="ti-home"></i>
                                    </span> 
                                    <span class="hidden-xs-down">Within 7 Days</span>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link"   href="<?php echo e(URL::to('/')); ?>/admin/dash/fifteen" role="tab">
                                    <span class="hidden-sm-up">
                                    <i class="ti-user"></i>
                                    </span> 
                                    <span class="hidden-xs-down">Within 15 Days</span>
                                    </a> 
                                </li>
                            </ul>                        
                        </div>    
                        <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Expiry Date</th>
                                    <th>Quantity</th>
                                    <th>Branch</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($daystosum)): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($exp_product->product_name); ?></td>
                                        <td>
                                            <?php 
                                                $dt = Carbon::now(); 
                                                $dt->toDateString($exp_product->expiry_date);
                                            ?>
                                            <?php echo e($dt->format('d-m-Y')); ?></td>
                                        <td><?php echo e($exp_product->product_qty); ?></td>
                                        <td><?php echo e($exp_product->branch_name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                            <?php
                                $current=date("Y-m-d");
                                $exp_products = DB::table('purchase_products')
                                ->whereDate('purchase_products.expiry_date','<=',$current)
                                ->join('products','products.id','=','product_id')
                                ->join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')
                                ->join('branches','branches.id','=','products.added_branch')
                                ->select('products.product_number','products.product_name','purchase_orders.purchase_no','purchase_products.product_qty','purchase_products.expiry_date','branches.branch_name','products.basic_cost','products.product_discount','products.product_gst');
                                if($branch != 0)
                                {
                                    $query = $exp_products->where('branches.id', $branch);
                                }
                                $exp_products = $exp_products->get();
                            ?>
                                <?php $__currentLoopData = $exp_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($exp_product->product_name); ?></td>
                                        <td>
                                            <?php 
                                                $dt = Carbon::now(); 
                                                $dt->toDateString($exp_product->expiry_date);
                                            ?>
                                            <?php echo e($dt->format('d-m-Y')); ?></td>
                                        <td><?php echo e($exp_product->product_qty); ?></td>
                                        <td><?php echo e($exp_product->branch_name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
var active = $( ".selector" ).tabs( "option", "active" );
 
// Setter
$( "#tabs" ).tabs( "option", "active", 2 );

</script>

<script src="<?php echo e(URL::asset('js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.puredrops', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>