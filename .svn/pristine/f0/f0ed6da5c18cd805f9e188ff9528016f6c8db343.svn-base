<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
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
class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $daystosum = '';

        $today=date("Y-m-d");

        $sevendays = date('Y-m-d', strtotime($today.' + 7 days'));     

        $fifteendays = date('Y-m-d', strtotime($today.' + 15 days'));     

        $branchid = Auth::guard('admin')->user()->branch; 

        // DB::enableQueryLog();  
        $products = \DB::table('purchase_products');

        if($id==1)
        $products=$products->whereDate('purchase_products.expiry_date','<=',$today);
        if($id==2)
        $products=$products->whereBetween('purchase_products.expiry_date',[$today,$sevendays]);
        if($id==3)
        $products=$products->whereDate('purchase_products.expiry_date','>=',$today)->whereDate('purchase_products.expiry_date','<=',$fifteendays);
        $products=$products->join('products','products.id','=','purchase_products.product_id')
        ->join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')  
        ->join('branches','branches.id','=','products.added_branch')
        ->select('products.product_number','products.product_name','purchase_orders.id as batch_id','purchase_orders.purchase_no','purchase_products.product_qty','purchase_products.expiry_date','branches.branch_name','products.basic_cost','products.product_discount','products.product_gst','products.billing_price','purchase_products.product_id');   
        if($branchid != 0)
        {
        $products=$products->where('branches.id', $branchid);
        }
        $products = $products->get();
      // dd(
      //       DB::getQueryLog()
      //   );
        $todaySales=payment_mode::where('sales_date',$today)->where('branch_id',$branchid)->sum('total_amount');
        $yesderdaySales=payment_mode::where('sales_date',$yesterdate)->where('branch_id',$branchid)->sum('total_amount');
        $monthlySale = payment_mode::whereMonth('sales_date',$thisMonth)->where('branch_id',$branchid)->sum('total_amount');
        $lastMonthlySale = payment_mode::whereMonth('sales_date',$lastMonth)->where('branch_id',$branchid)->sum('total_amount');
        return view('admin.dashboard', compact('products','daystosum','branchid','todaySales','yesderdaySales','monthlySale','lastMonthlySale','time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
