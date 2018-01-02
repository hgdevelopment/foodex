<?php
 //use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase_product;
use App\sales_product;
use App\damagedproduct;
use App\Transfer_confirm_product;
?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard </h3>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">Todays Sale</h5>
                            <h3 class="m-b-0 font-lgiht">₹<?php echo e($todaySales); ?></h3>
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
                            <h3 class="m-b-0 font-lgiht">₹<?php echo e($yesderdaySales); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-danger"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">THIS MONTH SALES</h5>
                            <h3 class="m-b-0 font-lgiht" id="clock">₹<?php echo e($monthlySale); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h5 class="text-muted m-b-0">LAST MONTH SALES</h5>
                            <h3 class="m-b-0 font-lgiht">₹<?php echo e($lastMonthlySale); ?></h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_quantitys= Purchase_product::where('branch_id',$branchid)
                                ->selectRaw('product_id, SUM(product_qty) as total')
                                ->groupBy('product_id')
                                ->get();                                
                                foreach($total_quantitys as $total_quantity)
                                {
                                $prdct=Product::find($total_quantity->product_id);

                                $sales_quantity= sales_product::where('branch_id',$branchid)
                                ->WhereIn('status',['0','1','2'])
                                ->where('product_id',$total_quantity->product_id)
                                ->sum('product_qty');

                                $damage_quantity= damagedproduct::where('branch_id',$branchid)
                                ->where('product_id',$total_quantity->product_id)
                                ->sum('product_qty');


                                
                                $transfer_quantity= Transfer_confirm_product::where('to_branch',$branchid)
                                ->where('product_id',$total_quantity->product_id)
                                ->sum('product_qty');

                                $bal=max(  $total_quantity->total - ($sales_quantity + $damage_quantity + $transfer_quantity),0);    
                                if($bal!='0')
                                continue;                        
                                ?>
                            <tr>
                                <td><?php echo e($prdct->product_name); ?></td>
                                <td><?php echo e($bal); ?></td>
                            </tr>
                            <?php
                                }
                            ?>
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
                          <div class="card-body p-b-0"></div>
                          <!-- Nav tabs -->
                          <div id="nav-tabs">
                             <ul class="nav nav-tabs customtab"  role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link <?php if(isset($active)): ?><?php echo e('active'); ?><?php endif; ?> <?php echo e(Request::segment(3) === '1' ? 'active' : null); ?> "  href="<?php echo e(URL::to('/')); ?>/admin/dashboard/1" role="tab">
                                   <span class="hidden-sm-up">
                                   <i class="ti-email"></i>
                                   </span> 
                                   <span class="hidden-xs-down">Expired Products</span>
                                   </a> 
                                </li>
                                <li class="nav-item"> 
                                   <a class="nav-link <?php echo e(Request::segment(3) === '2' ? 'active' : null); ?>"   href="<?php echo e(URL::to('/')); ?>/admin/dashboard/2"  role ="tab">
                                   <span class="hidden-sm-up">
                                   <i class="ti-home"></i>
                                   </span> 
                                   <span class="hidden-xs-down">Within 7 Days</span>
                                   </a> 
                                </li>
                                <li class="nav-item"> 
                                   <a class="nav-link  <?php echo e(Request::segment(3) === '3' ? 'active' : null); ?>"   href="<?php echo e(URL::to('/')); ?>/admin/dashboard/3" role="tab">
                                   <span class="hidden-sm-up">
                                   <i class="ti-user"></i>
                                   </span> 
                                   <span class="hidden-xs-down">Within 15 Days</span>
                                   </a> 
                                </li>
                             </ul>
                          </div>
                          <!-- Tab panes -->
                       </div>
                        <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Expiry Date</th>
                                    <th>Quantity</th>

                               </tr>
                            </thead>
                            <tbody>
                                
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $damage=DB::table('damage_products')->where('product_id',$product->product_id)->where('batch_id',$product->batch_id)->where('branch_id',Auth::guard('admin')->user()->branch);
                                if($branchid!='0')
                                {
                                $damage=$damage->where('branch_id',$branchid)->where('branch_id',Auth::guard('admin')->user()->branch);
                                }
                                
                                $damage=$damage->sum('product_qty');
                                $sales=DB::table('sales_products')->where('product_id',$product->product_id)->WhereIn('status',['0','1','2'])->where('batch_id',$product->batch_id)->where('branch_id',Auth::guard('admin')->user()->branch);;
                               

                                if($branchid!='0')
                                {
                                $sales=$sales->where('branch_id',$branchid)->where('branch_id',Auth::guard('admin')->user()->branch);
                                }
                                $sales=$sales->sum('product_qty');
                                $transfer=DB::table('transfer_confirm_products')->where('product_id',$product->product_id)->where('batch_id',$product->batch_id)->where('to_branch',Auth::guard('admin')->user()->branch);
                                
                                if($branchid!='0')
                                {
                                $transfer=$transfer->where('to_branch',$branchid)->where('to_branch',Auth::guard('admin')->user()->branch);
                                }
                                
                                $transfer=$transfer->sum('product_qty');
                                $product_qty=max($product->product_qty-($damage+$sales+$transfer),0);
                                
                                ?>
                                <?php if($product_qty!=0): ?>
                                <tr>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e(date('d-m-Y',strtotime($product->expiry_date))); ?></td>
                                    <td><?php echo e($product_qty); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
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