<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use App\Product;
use App\Purchase_product;
use App\Purchase_order;
use App\sales_product;
use App\sales_order;
use App\payment_mode;
use App\customer;
use Carbon\Carbon;
use DB;
use Auth;
use Alert;

class viewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch_id=Auth::guard('admin')->user()->branch;
        $view_order=sales_order::join("customers","customers.id","=","sales_orders.customer_id")
                                ->join("sales_products","sales_products.sales_id","=","sales_orders.id")
                                ->where("sales_orders.branch_id",$branch_id)
                                ->where("sales_products.status",'0')
                                ->select('customers.customer_name as customer_name','sales_orders.id as orderId','sales_orders.*')->groupBy('sales_products.sales_id')
                                ->get();

        return view('admin.order.viewOrder',compact('view_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_id=Auth::guard('admin')->user()->branch;
        $view_order=sales_order::join("customers","customers.id","=","sales_orders.customer_id")
                                ->join("sales_products","sales_products.sales_id","=","sales_orders.id")
                                ->where("sales_orders.branch_id",$branch_id)
                                ->where("sales_products.status",'1')
                                ->select('customers.customer_name as customer_name','sales_orders.id as orderId','sales_orders.*')->groupBy('sales_products.sales_id')
                                ->get();

        return view('admin.sales.viewOrderConfirm',compact('view_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reason = $request->reason;
        $sales_id = $request->id;
        $sales_product = sales_product::where('sales_id','=',$sales_id)->update(['status'=>'3']);
        $payment_mode = payment_mode::where('sales_id','=',$sales_id)->update(['reason'=>$reason]);
        $bill_number = sales_order::find($sales_id);
        $type='Confirm Bills';
        $report='Deleted Confirm Bill. Deleted Id: '. $bill_number->bill_number ;
        Controller::logReport($type,$report);

        $payment_delete = payment_mode::where('sales_id','=',$sales_id)->delete();
    }
}
