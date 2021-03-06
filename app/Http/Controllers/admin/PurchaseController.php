<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase_order;
use App\Purchase_product;
use App\Unit;
use App\Brand;
use Carbon\Carbon;
use Alert;
use Auth;
use DB;
use Excel;

class PurchaseController extends Controller
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
            return view('admin.purchase.purchase_order');
        }
        return redirect('/');
    }
    public function create()
    {
         
        return view('admin.purchase.purchase_order_excel');

    }
    public function stocklist(){
         // $branch_id=Auth::guard('admin')->user()->branch;
          // $data=DB::table('purchase_products')
          //           ->join('products',function($join) use ($branch_id){
          //                $join->on('purchase_products.product_id', '=', 'products.id')->where('products.added_branch',$branch_id);
          //           })
          //           ->select(DB::raw('SUM(purchase_products.product_qty) as quantity'),
          //               'products.product_number',
          //               'products.product_name',
          //               'products.basic_cost',
          //               'products.product_discount',
          //               'products.product_gst',
          //               'products.product_mrp',
          //               'products.billing_price')
          //           ->groupBy('purchase_products.product_id')
          //           ->get();
    }
    public function store(Request $request){
       $id=DB::table('purchase_orders')->max('id');
      if($id==null){
         $code=str_pad(1,10,"0",STR_PAD_LEFT);
      }else{
         $code=str_pad(($id+1),10,"0",STR_PAD_LEFT);
      }
       //$code=str_pad(,10,"0",STR_PAD_LEFT);
       $purchase_order= new Purchase_order;
       $purchase_order->purchase_no=$code;
       $purchase_order->branch_id=Auth::guard('admin')->user()->branch;
       $purchase_order->addedById=Auth::guard('admin')->user()->id;
       $purchase_order->save();
       $id=$purchase_order->id;

        for ($i=0; $i<count($request->product); $i++ ) {
            if($request->product[$i]!=''){
            $manufacture_date=Carbon::createFromFormat('d/m/Y', $request->expiry[$i])->format('Y-m-d');
            $manufacture_date=Carbon::parse($manufacture_date)->addDays($request->expiry_days[$i]);
            $purchase_products= new Purchase_product;
            $purchase_products->product_id=$request->product[$i];
            $purchase_products->order_id=$id;
            $purchase_products->branch_id=Auth::guard('admin')->user()->branch;
            $purchase_products->product_qty=$request->qty[$i];
            $purchase_products->basic_cost=$request->basic_cost[$i];
            $purchase_products->discount=$request->discount[$i];
            $purchase_products->gst=$request->gst[$i];
            $purchase_products->billing_price=$request->billing_price[$i];
            $purchase_products->manufacture_date=Carbon::createFromFormat('d/m/Y', $request->expiry[$i])->format('Y-m-d');
            $purchase_products->expiry_date=$manufacture_date;
            $purchase_products->expiry_days=$request->expiry_days[$i];
            $purchase_products->save();

            $product=Product::find($request->product[$i]);
            $product->basic_cost=$request->basic_cost[$i];
            $product->product_discount=$request->discount[$i];
            $product->product_gst=$request->gst[$i];
            $product->billing_price=$request->billing_price[$i];
            // $product->billing_price=$request->billing[$i];
            $product->save();

           
         }
         $product_name = product::where('products.id',$request->product[$i])->select('product_name')->get();
         foreach($product_name as $name){
          
          $type='Stock';
            $report='Add New Stock.Product Name: '. $name;
            Controller::logReport($type,$report);
         }
          
        }
       

        return response()->json(['result'=>true,'msg'=>'successfully','last_id'=>$id]);

    }
    public function product_select(Request $request){
       $data= Product::where('added_branch',Auth::guard('admin')->user()->branch)
                        ->where(function( $query ) use ($request)
                          {
                              $query->where('product_number', 'LIKE', '%'.$request->search.'%')
                                  ->orWhere('product_name', 'LIKE', '%'.$request->search.'%');
                          })
                       ->get();
        $_make_array=[];
        foreach ($data as $key => $value) {
            $_make_array[]=['id'=>$value->id,
                            'code'=>$value->product_number,
                            'text'=>$value->product_name,
                            'basic_cost'=>$value->basic_cost,
                            'gst'=>$value->product_gst,
                            // 'mrp'=>$value->product_mrp,
                            'billing_price'=>$value->billing_price,
                            'product_discount'=>$value->product_discount];
        }
        return response()->json(['results'=>$_make_array]);
                       
        
    }
    public function excel_upload(Request $request){
           if($request->hasFile('upload_excel')){
            $path = $request->file('upload_excel')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

 
            if($data->count()){
              $keys = $data[0]->toArray();
                if(!array_key_exists('uom',$keys) || !array_key_exists('barcode',$keys) || 
                  !array_key_exists('brand',$keys) || !array_key_exists('productname',$keys) || 
                  !array_key_exists('basiccost',$keys)  || !array_key_exists('igst',$keys) || 
                  !array_key_exists('billprice',$keys) || !array_key_exists('mrp',$keys)){
                    return response()->json(['result'=>false,'msg'=>'Excel is invalid format']);
                }
                $products_excel= array();
                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        //unit already exist
                        
                        $unit_exist=Unit::where('unit_name',strtolower(trim($value['uom'])))->where('branch_id',Auth::guard('admin')->user()->branch)->first();
                        if(count($unit_exist)>0){
                           $unit_id=$unit_exist->id;
                        }else{
                          $unit=new Unit;
                          $unit->branch_id=Auth::guard('admin')->user()->branch;
                          $unit->unit_name=strtolower(trim($value['uom']));
                          $unit->save();
                          $unit_id=$unit->id;
                        }
                        //brand
                         $brand_exist=Brand::where('brand_name',strtolower(trim($value['brand'])))->first();
                         if(count($brand_exist)>0){
                           $brand_id=$brand_exist->id;
                        }else{
                          $brand = new Brand;
                          $brand->brand_name=$value['brand'];
                          $brand->brand_description=strtolower(trim($value['brand']));
                          $brand->save();
                          $brand_id=$brand->id;
                        }
                        //product already exist
                        $billing_price=round((($value['basiccost']*$value['igst'])/100)+$value['basiccost']);
                        $product_exist=Product::where('product_number',strtolower(trim($value['barcode'])))->where('added_branch',Auth::guard('admin')->user()->branch)->first();
                        $discount_per=0;
                        if(count($product_exist)>0){
                           $product_id=$product_exist->id;
                           $discount_per=$product_exist->product_discount;
                        }else{
                           $product = new Product;
                           $product->product_number=$value['barcode'];
                           $product->unit_id=$unit_id;
                           $product->product_name=$value['productname'];
                           $product->product_brand=$brand_id;
                           $product->basic_cost=$value['basiccost'];
                           $product->product_discount=isset($value['discount'])?$value['discount']:$discount_per;
                           $product->product_gst=$value['igst'];
                           $product->billing_price=$billing_price;
                           // $product->billing_price=$value['billprice'];
                           $product->added_branch=Auth::guard('admin')->user()->branch;
                           $product->added_by=Auth::guard('admin')->user()->id;
                           $product->save();
                        }
                        $products_excel[]=['barcode'=>$value['barcode'],
                                           'brand'=>$value['brand'],
                                           'productname'=>$value['productname'],
                                           'basiccost'=>$value['basiccost'],
                                           'igst'=>$value['igst'],
                                           'billing_price'=>$billing_price,
                                           // 'billprice'=>$value['billprice'],
                                           'unit'=>$value['uom']];
                       
                    }
                }
               return response()->json(['result'=>true,'msg'=>'Excel importing successfully','products'=>$products_excel]);
                
            }else{
               return response()->json(['result'=>false,'msg'=>'Excel is Empty']);
            }
         }else{
              return response()->json(['result'=>false,'msg'=>'Error']);
         }
        

    }
    public function stock_upload(Request $request)
    {
     if($request->hasFile('stock_upload'))
     {
        $path = $request->file('stock_upload')->getRealPath();
        $data = Excel::load($path, function($reader) {})->get();
        if($data->count())
        {
          $keys = $data[0]->toArray();
          if(!array_key_exists('batchno',$keys) || !array_key_exists('productname',$keys) || 
          !array_key_exists('quantity',$keys) || !array_key_exists('manufacturedate',$keys) || 
          !array_key_exists('expirydays',$keys))
          {
            //return 'invalid format';
             Alert::success('Excel is invalid format', 'info');
          return redirect('admin/purchase/create');
          }

          foreach ($data->toArray() as $key => $value) 
          {
            $purchase_order= new Purchase_order;
            $purchase_order->purchase_no=$value['batchno'];
            $purchase_order->branch_id=Auth::guard('admin')->user()->branch;
            $purchase_order->addedById=Auth::guard('admin')->user()->id;
            $purchase_order->save();
            $id=$purchase_order->id;

           // return $manufacture_date=Carbon::createFromFormat('d/m/Y', $value['manufacturedate'])->format('Y-m-d');
            $manufacture_date=Carbon::parse($value['manufacturedate'])->addDays($value['expirydays']);
            $product_id = product::where('product_name',$value['productname'])->first();
            $purchase_products= new Purchase_product;

            $purchase_products->product_id=$product_id->id;
            $purchase_products->order_id=$id;
            $purchase_products->branch_id=Auth::guard('admin')->user()->branch;
            $purchase_products->product_qty=$value['quantity'];
            $purchase_products->basic_cost=$product_id->basic_cost;
            $purchase_products->discount=$product_id->product_discount;
            $purchase_products->gst=$product_id->product_gst;
            $purchase_products->billing_price=$product_id->billing_price;
            $purchase_products->manufacture_date=date("Y-m-d", strtotime($value['manufacturedate']));
            $purchase_products->expiry_date=$manufacture_date;
            $purchase_products->expiry_days=$value['expirydays'];
            $purchase_products->save();
          }
          Alert::success('Excel importing successfully', 'Success');
          return redirect('admin/purchase/create');
        }else
        {
          Alert::success('Excel is Empty', 'Success');
          return redirect('admin/purchase/create');
        }
      }
      else
      {
       Alert::success('Error', 'Success');
       return redirect('admin/purchase/create');
      }
    }
  }

