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
use App\User;
use Carbon\Carbon;
use DB;
use Auth;
use Alert; 

class updateOrderController extends Controller
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
        return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales_product = new sales_product;
        $ids = sales_order::where('bill_number','=',$request->bill_number)->first();
        $branch_id=Auth::guard('admin')->user()->branch;
        $sales_id=$ids->id;
        $sales_product->sales_id=$sales_id;
        $sales_product->branch_id=$branch_id;
        $sales_product->batch_id=$request->batch_no;
        $sales_product->product_id = $request->product_id;
        $sales_product->product_qty = $request->product_quantity;
        $sales_product->basic_cost = $request->product_price;
        $sales_product->discount = $request->discount_per;
        $sales_product->gst = $request->product_gst;
        $sales_product->mrp = $request->product_total;
        $sales_product->unit_id = 0;
        $sales_product->status = '0';
        $sales_product->save();

    
        $type='Order Request';
        $report='Update New Product In Order Request .Bill Number: '. $request->bill_number . 'Added Product: '. $request->product_name;
        Controller::logReport($type,$report);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch_id=Auth::guard('admin')->user()->branch;
        $view_order=sales_order::join("customers","customers.id","=","sales_orders.customer_id")->where("sales_orders.branch_id",$branch_id)->where("sales_orders.id","=",$id)->select('customers.*','sales_orders.id as sales_id','sales_orders.*')->first();


        $product_payment_details=sales_product::join('products','products.id','=','sales_products.product_id')
         ->where("sales_products.branch_id",$branch_id)
         ->where("sales_products.status","!=","3")
         ->where("sales_products.sales_id","=",$id)->select('products.product_name as name','sales_products.id as sales_ids','sales_products.*')->get();
        $pay_details = payment_mode::where('sales_id',$id)->get();  

        $login_id=$view_order->addedById;

        $sales_person=User::where("logins.id",$login_id)->first();
        $total_amount=sales_product::where('sales_id',$id)->where('status','0')->sum('mrp');
        $Po=Purchase_order::all();
        $count=count($product_payment_details);

            return view('admin.order.updateOrder',compact('count','view_order','product_payment_details','sales_person','Po','product_name','total_amount','pay_details'));

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
    public function update(Request $request, $userId)
    {

        $payment_mode = payment_mode::where('sales_id',$userId)->first();
        $sales_order = sales_order::where('id',$userId)->first();
        $customer = customer::where('id',$sales_order->customer_id)->first();
        $branch_id=Auth::guard('admin')->user()->branch;
        $addedById=Auth::guard('admin')->user()->id;

        $sales_order->me_code=$request->me_code;
        $sales_order->total_amount = $request->total_amount;
        $sales_order->save();

        $customer->branch_id = $branch_id;
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->shipping_address = $request->shipping_address;
        $customer->customer_gst = $request->customer_gst_no;
        $customer->addedById = $addedById;
        $customer->save();

        $payment_mode->sales_id = $userId;
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
        $report='Update Amount & Customer Details .Bill Number: '. $sales_order->bill_number ;
        Controller::logReport($type,$report);

        Alert::success('save Successfully', 'Success');
        return redirect('admin/viewOrder');
    }
    public function confirm_order($id)

    {

        $sales_product = sales_product::where('sales_id','=',$id)->where('status','0')->update(['status'=>'1']);
        $bill_number = sales_order::find($id);
        $type='Order Request';
        $report='Confirm Order Request .Bill Number: '. $bill_number->bill_number ;
        Controller::logReport($type,$report);

        Alert::success('Success','Order Confirm','success');
        return redirect('admin/viewOrder');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)

    {

        $id = $request->id;
        $sales_id = $request->sales_id;
        $sales_product = sales_product::where('id','=',$id)->first();

        $type='Order Request';
        $report='Deleted Order Request Product. Deleted Id: '. $id ;
        Controller::logReport($type,$report);

        $sales_product->status='3';
        $sales_product->save();

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

}
