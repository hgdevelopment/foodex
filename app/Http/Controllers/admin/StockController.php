<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase_order;
use App\Purchase_product;
use Carbon\Carbon;
use Auth;
use DB;
// use DataTable;
class StockController extends Controller
{
    //
    public function stocklist(){

    	return view('admin.stock.stock_list');


        
    }
    public function stock_DataTable(Request $request){
    	$branch_id=Auth::guard('admin')->user()->branch;
        $data=DB::table('purchase_products')
                    ->join('products',function($join) use ($branch_id){
                         $join->on('purchase_products.product_id', '=', 'products.id')->where('products.added_branch',$branch_id);
                    })
                    ->select(DB::raw('SUM(purchase_products.product_qty) as quantity'),
                        'products.product_number',
                        'products.product_name',
                        'products.basic_cost',
                        'products.product_discount',
                        'products.product_gst',
                        'products.billing_price')
                    ->groupBy('purchase_products.product_id')
                    ->get();

          $datatable= \DataTables::of($data);
           
        
         return $datatable->make(true);
        
    }
    
}
