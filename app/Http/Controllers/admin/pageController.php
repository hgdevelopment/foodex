<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Purchase_product;
use App\sales_product;
use App\damagedproduct;
use App\Transfer_confirm_product;
use App\payment_mode;
use Session;
use DB;
use Carbon;
class pageController extends Controller
{
    //
    public $user;
    public function __construct()
    {

    }

    public function index()
    {
        if(Auth::guard('admin')->user())
        {
            $daystosum = '';
            $mytime = Carbon\Carbon::now();
            $time = $mytime->toTimeString();
            //Total reports
        $today = date("Y-m-d");
        $yesterdate = date("Y-m-d",strtotime("-1 days"));
        $thisMonth = date("m");
        $lastMonth = date("m",strtotime("-1 months"));

        $branchid = Auth::guard('admin')->user()->branch; 

        $todaySales=payment_mode::where('sales_date',$today)->where('branch_id',$branchid)->sum('total_amount');
        $yesderdaySales=payment_mode::where('sales_date',$yesterdate)->where('branch_id',$branchid)->sum('total_amount');
        $monthlySale = payment_mode::whereMonth('sales_date',$thisMonth)->where('branch_id',$branchid)->sum('total_amount');
        $lastMonthlySale = payment_mode::whereMonth('sales_date',$lastMonth)->where('branch_id',$branchid)->sum('total_amount');




        //Expiry product reports
       // DB::enableQueryLog();  



        $products = \DB::table('purchase_products');

        $products=$products->whereDate('purchase_products.expiry_date','<=',$today);

        $products=$products->join('products','products.id','=','purchase_products.product_id')

        ->join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')  

        ->join('branches','branches.id','=','products.added_branch')

        ->select('products.product_number','products.product_name','purchase_orders.id as batch_id','purchase_orders.purchase_no','purchase_products.product_qty','purchase_products.expiry_date','purchase_products.branch_id','products.basic_cost','products.product_discount','products.product_gst','products.billing_price','purchase_products.product_id');  

        if($branchid != 0)
        {
        $products=$products->where('products.added_branch', $branchid);
        $products=$products->where('purchase_products.branch_id', $branchid);
        }

        $products = $products->OrderBy('purchase_products.product_id','ASC')->OrderBy('purchase_orders.purchase_no','ASC')->get();
      // dd(  DB::getQueryLog() );
        $active='active';
        return view('admin.dashboard', compact('products','daystosum','branchid','todaySales','yesderdaySales','monthlySale','lastMonthlySale','time','active'));
        }
        return redirect('/');
    }




    public function show($id)
    {

        if(Auth::guard('admin')->user())
        {
            $daystosum = '';
            $mytime = Carbon\Carbon::now();
            $time = $mytime->toTimeString();
            //Total reports
        $today = date("Y-m-d");
        $yesterdate = date("Y-m-d",strtotime("-1 days"));
        $thisMonth = date("m");
        $lastMonth = date("m",strtotime("-1 months"));

        $branchid = Auth::guard('admin')->user()->branch; 

        $todaySales=payment_mode::where('sales_date',$today)->where('branch_id',$branchid)->sum('total_amount');
        $yesderdaySales=payment_mode::where('sales_date',$yesterdate)->where('branch_id',$branchid)->sum('total_amount');
        $monthlySale = payment_mode::whereMonth('sales_date',$thisMonth)->where('branch_id',$branchid)->sum('total_amount');
        $lastMonthlySale = payment_mode::whereMonth('sales_date',$lastMonth)->where('branch_id',$branchid)->sum('total_amount');






        //Expiry product reports
       // DB::enableQueryLog();  

        $today=date("Y-m-d");

        $sevendays = date('Y-m-d', strtotime($today.' + 7 days'));     

        $fifteendays = date('Y-m-d', strtotime($today.' + 15 days'));     


        $products = \DB::table('purchase_products');

        if($id==1)
        $products=$products->whereDate('purchase_products.expiry_date','<=',$today);

        if($id==2)
        $products=$products->whereBetween('purchase_products.expiry_date',[$today,$sevendays]);

        if($id==3)
        $products=$products->whereDate('purchase_products.expiry_date','>=',$today)->whereDate('purchase_products.expiry_date','<=',$fifteendays);

        $products=$products->join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')  

        ->join('products','products.id','=','purchase_products.product_id')

        ->join('branches','branches.id','=','products.added_branch')

        ->select('products.product_number','products.product_name','purchase_orders.id as batch_id','purchase_orders.purchase_no','purchase_products.product_qty','purchase_products.expiry_date','purchase_products.branch_id','products.basic_cost','products.product_discount','products.product_gst','products.billing_price','purchase_products.product_id');  

        if($branchid != 0)
        {
        $products=$products->where('products.added_branch', $branchid);
        $products=$products->where('purchase_products.branch_id', $branchid);
        }

        $products = $products->OrderBy('purchase_products.product_id','ASC')->OrderBy('purchase_orders.purchase_no','ASC')->get();
      // dd(  DB::getQueryLog() );

        return view('admin.dashboard', compact('products','daystosum','branchid','todaySales','yesderdaySales','monthlySale','lastMonthlySale','time'));
        }
        return redirect('/');
}
}

