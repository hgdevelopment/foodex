<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use DB;
class expiredproductController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
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

        ->select('products.product_number','products.product_name','purchase_orders.id as batch_id','purchase_orders.purchase_no','purchase_products.product_qty','purchase_products.expiry_date','purchase_products.branch_id','products.basic_cost','products.product_discount','products.product_gst','products.billing_price','purchase_products.product_id');  

        if($branchid != 0)
        {
        $products=$products->where('products.added_branch', $branchid);
        $products=$products->where('purchase_products.branch_id', $branchid);
        }

        $products = $products->OrderBy('purchase_products.product_id','ASC')->OrderBy('purchase_orders.purchase_no','ASC')->get();
      // dd(  DB::getQueryLog() );
        return view('admin.expiredproduct.index', compact('products','daystosum','branchid'));
    }







}