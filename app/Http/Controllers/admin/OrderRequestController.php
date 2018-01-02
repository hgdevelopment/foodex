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
use App\damagedproduct;
use App\Transfer_confirm_product;
use DB;
use Auth;
use Alert;
class OrderRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::parse(now());
        $date = $date->format('d/m/Y');
        $bill_number=sales_order::max('bill_number');
        $user_id=Auth::guard('admin')->user()->username;

        if($bill_number=="" || $bill_number==0)
        {
           $billnumber=str_pad(1,8,"0",STR_PAD_LEFT);
        }
        else
        {
           $billnumber=str_pad(($bill_number+1),8,"0",STR_PAD_LEFT);
        }
        $Po=Purchase_order::all();
        return view('admin.order.index',compact('Po','billnumber','date','user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batchDetails(Request $request)
    {
        //  $data=Purchase_product::join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')->where('purchase_products.product_id',$request->search)->select('purchase_orders.id','purchase_orders.purchase_no')->where('purchase_orders.branch_id',Auth::guard('admin')->user()->branch)->get();

        // $_make_array=[];
        // foreach ($data as $key => $value) {
        //     $_make_array[]=['id'=>$value->id,
        //                     'text'=>$value->purchase_no];
        // }
        // return response()->json(['results'=>$_make_array]);

        // return $data;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales_order = new sales_order;
        $sales_product = new sales_product;
        $payment_mode = new payment_mode;
        $customer = new customer;

        $branch_id=Auth::guard('admin')->user()->branch;
        $addedById=Auth::guard('admin')->user()->id;

        $customer->branch_id = $branch_id;
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->shipping_address = $request->shipping_address;
        $customer->customer_gst = $request->customer_gst_no;
        $customer->addedById = $addedById;
        $customer->save();
        $customer_id = $customer->id;

        $sales_order->bill_number = $request->bill_no;
        $sales_order->branch_id = $branch_id;
        $sales_order->customer_id = $customer_id;
        $sales_order->me_code = $request->me_code;
        $sales_order->total_amount = $request->total_amount;
        $sales_order->save();
        $sales_id = $sales_order->id;

            $product_name= $request->product_name1;
            $product_id = $request->product_id;
            $batch_no = $request->batch_no1;
            $quantity= $request->product_quantity1;
            $price = $request->product_price1;
            $gst  = $request->gst1;
            $discount_per = $request->discount_per1;
            $total = $request->total1;


        for($i = 0; $i < count($product_name); $i++) 
        {
            
            $sales_product = new sales_product;
            $sales_product->sales_id = $sales_id;
            $sales_product->branch_id = $branch_id;
            $sales_product->batch_id = $batch_no[$i];
            $sales_product->product_id = $product_id[$i];
            $sales_product->product_qty = $quantity[$i];
            $sales_product->basic_cost = $price[$i];
            $sales_product->discount = $discount_per[$i];
            $sales_product->gst = $gst[$i];
            $sales_product->mrp = $total[$i];
            $sales_product->unit_id = 0;
            $sales_product->status = '0';
            $sales_product->save();
        }

        $payment_mode->sales_id = $sales_id;
        $payment_mode->branch_id = $branch_id;
        $payment_mode->payment_mode = $request->payment_mode;
        $payment_mode->paid_amount = $request->paid_amount;
        $payment_mode->total_amount = $request->total_amount;
        $payment_mode->card_amount = $request->card;
        $payment_mode->transaction_number = $request->transaction_no;
        $payment_mode->reference_number = $request->reference_no;
        $payment_mode->account_number = $request->account_no;
        $payment_mode->cheque_number = $request->cheque_no;
        $payment_mode->balance = $request->balance;
        $payment_mode->status = $request->payment_type;
        $payment_mode->save();

        $type='Order Request';
        $report='New Order Reqquest .Bill Number: '. $request->bill_no;
        Controller::logReport($type,$report);

        Alert::success('save Successfully', 'Success');
        return redirect('admin/addOrder');
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
    public function destroy($id)
    {
        //
    }

    public function stockDetails(Request $request)
    {
        if($request->batch==1)
        {
         $data=Purchase_product::join('purchase_orders','purchase_orders.id','=','purchase_products.order_id')->where('purchase_products.product_id',$request->productId)->select('purchase_orders.id','purchase_orders.purchase_no')->where('purchase_orders.branch_id',Auth::guard('admin')->user()->branch)->get();
       

        $_make_array=[];
        foreach ($data as $key => $value) {
            $_make_array[]=['id'=>$value->id,
                            'text'=>$value->purchase_no];
        }
        return response()->json(['results'=>$_make_array]);
        }
        else
        {
       $data= Product::where('added_branch',Auth::guard('admin')->user()->branch)
                       ->Where('product_name', 'LIKE', '%'.$request->search.'%')->get();
        $_make_array=[];
        foreach ($data as $key => $value) {
            $_make_array[]=['id'=>$value->id,
                            'text'=>$value->product_name,
                            'basic_cost'=>$value->basic_cost,
                            'gst'=>$value->product_gst,
                            'mrp'=>$value->product_mrp,
                            'billing_price'=>$value->billing_price,
                            'product_discount'=>$value->product_discount];
        }
        return response()->json(['results'=>$_make_array]);
        }
    }

    public function checkExpiryDate(Request $request)
    {
        $mytime = Carbon::now();
        $mytime1=$mytime->toDateString();
        // return response()->json(['date'=>$mytime1]);

        $productId=$request->productId;
        $batch_no=$request->batch_no;

        $batch_no1=Purchase_order::Where('id',$batch_no)->select('id')->first();
        $batch = $batch_no1->id;

        $total_quantity= Purchase_product::Where('product_id',$productId)->where('order_id',$batch)->where('branch_id',Auth::guard('admin')->user()->branch)->sum('product_qty');
        if($total_quantity!=0){

          $expiry_date= Purchase_product::where('product_id',$productId)->where('order_id',$batch)->where('branch_id',Auth::guard('admin')->user()->branch)->where('expiry_date','<',$mytime1)->get();
            return count($expiry_date);
        }
    }

    public function quantityDetails(Request $request)
    {
        $mytime = Carbon::now();
        $mytime1=$mytime->toDateString();
        // return response()->json(['date'=>$mytime1]);

        $productId=$request->productId;
        $batch_no=$request->batch_no;
        $branch = Auth::guard('admin')->user()->branch;
        $batch_no1=Purchase_order::Where('id',$batch_no)->select('id')->first();
        $batch = $batch_no1->id;

        $total_quantity1= Purchase_product::Where('product_id',$productId)->where('order_id',$batch)->where('branch_id',Auth::guard('admin')->user()->branch)->sum('product_qty');

        $sales_quantity= sales_product::Where('product_id',$productId)
        ->Where('batch_id',$batch_no)
        ->where('branch_id',$branch)
        ->WhereIn('status',['0','1','2'])
        ->sum('product_qty');

        $damage_quantity= damagedproduct::Where('product_id',$productId)
        ->Where('batch_id',$batch_no)
        ->where('branch_id',$branch)
        ->sum('product_qty');

        
         $transfer_quantity= Transfer_confirm_product::Where('product_id',$productId)
        ->Where('batch_id',$batch_no)
        ->where('to_branch',$branch)
        ->sum('product_qty');
        return $vale = ($total_quantity1 - (($transfer_quantity + $damage_quantity) + $sales_quantity));
   }
}
