<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Products;
use Illuminate\Support\Facades\Notification;
use App\Product;
use App\Brand;
use App\Unit;
use App\branch;
use App\User;
use Auth;
use Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit=Unit::all();
        $brands = brand::all();
        $branch = branch::all();
        $branchid = Auth::guard('admin')->user()->branch;
        if($branchid==0){
        $products = \DB::table('products')
        ->join('brands', 'brands.id', '=', 'products.product_brand')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->join('branches','branches.id','=','products.added_branch')
        ->select('products.*', 'brands.brand_name','units.unit_name','branches.branch_name')
        ->get();
        }else{
        $products = \DB::table('products')->where('products.added_branch','=',$branchid)
            ->join('brands', 'brands.id', '=', 'products.product_brand')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('branches','branches.id','=','products.added_branch')
            ->select('products.*', 'brands.brand_name','units.unit_name','branches.branch_name')
            ->get();
        }
        return view('admin.product.index', compact('brands', 'products','unit','branch'));
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
        // 
            $user = Auth::guard('admin')->user()->id;
            $branch = Auth::guard('admin')->user()->branch;
            $request->validate([
            'product_name' => 'required',
            'product_brand' => 'required',
            'product_number' => 'required|unique:products,product_number',
            'basic_cost' => 'required',
            'product_discount' => 'required',
            'product_gst' => 'required',
            'billing_price' => 'required',
            // 'product_mrp' => 'required',
            'unit_id' => 'required',
       
        ]);
        $products = new Product();
        $products->product_name = $request->product_name;
        $products->product_number = $request->product_number;
        $products->product_brand = $request->product_brand;
        $products->basic_cost = $request->basic_cost;
        $products->product_discount = $request->product_discount;
        $products->product_gst = $request->product_gst;
        $products->billing_price = $request->billing_price;
        $products->unit_id = $request->unit_id;    
        $products->added_by=$user;
        $products->added_branch =$branch;
        $products->save();
        $product_id=$products->id;


        //notification
        $branch=branch::find($branch);
        // if( strtoupper($branch->branch_name)!='HYDERABAD')
        // {
            $login=Auth::guard('admin')->user();

            $userids=User::where('userType','VN')->get();
            foreach ($userids as $key => $value)
            {
                $array_userids[]=$value->id;
            }
            $notification_users=User::whereIn('id',$array_userids)->get();


             $product=Product::find($product_id);

            Notification::send($notification_users,new Products($product,['url'=>'#','perminssions'=>$array_userids,'message'=>
                '<b>New Product Added</b><br>
                    '.$product->product_name.'<br>
                    '.$branch->branch_name.'<br>
                    ['.$login->username.'] '.$login->employee_name.'<br>','auth_user'=>$login->username]));
        // }

        $type='Product';
        $report='Add New Product .Product Name: '. $request->product_name;
        Controller::logReport($type,$report);
        //flash
        Alert::Success('message', 'Product Added Successfully'); 

        return redirect('/admin/addProducts');
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
        $unit=Unit::all();
        $brands = brand::all();
        $branch = branch::all();
        $editProducts = \DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.product_brand')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('branches','branches.id','=','products.added_branch')
            ->select('products.*', 'brands.brand_name','units.unit_name','branches.branch_name')
            ->where('products.id', $id)
            ->first();
        return view('admin.product.editProduct',compact('editProducts','brands','unit','branch'));
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
        
        $user = Auth::guard('admin')->user()->id;
        $branch = Auth::guard('admin')->user()->branch;
        $request->validate([
            'product_name' => 'required',
            'product_brand' => 'required',
            'basic_cost' => 'required',
            'product_discount' => 'required',
            'product_gst' => 'required',
            // 'product_mrp' => 'required', 
            'billing_price' => 'required',           
            'unit_id' => 'required',
            
        ]);
        $products =Product::find($id);
        $products->product_name = $request->product_name;
        $products->product_number = $request->product_number;
        $products->product_brand = $request->product_brand;
        $products->basic_cost = $request->basic_cost;
        $products->product_discount = $request->product_discount;
        $products->product_gst = $request->product_gst;
        $products->billing_price = $request->billing_price;
        $products->unit_id = $request->unit_id;
   /*     $products->added_by = session()->getId();*/
        $products->added_by=$user;
        $products->added_branch =$branch;
        $products->save();

        //notification
        $branch=branch::find($branch);
        // if( strtoupper($branch->branch_name)!='HYDERABAD')
        // {
            $login=Auth::guard('admin')->user();

             $userids=User::where('userType','VN')->get();
            foreach ($userids as $key => $value)
            {
                $array_userids[]=$value->id;
            }
                $notification_users=User::whereIn('id',$array_userids)->get();


             $product=Product::find($id);

            Notification::send($notification_users,new Products($product,['url'=>'#','perminssions'=>$array_userids,'message'=>
                '<b>Product Updated</b><br>
                    '.$product->product_name.'<br>
                    '.$branch->branch_name.'<br>
                    ['.$login->username.'] '.$login->employee_name.'<br>','auth_user'=>$login->username]));
        // }
        $type='Product';
        $report='Edit & Updated Product .Product Name: '. $request->product_name;
        Controller::logReport($type,$report);
        Alert::success('message', 'Product Updated Successfully');
        return redirect('/admin/addProducts');
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
        $product = Product::find($id); 

        $type='Product';
        $report='Deleted  Product .Product Name: '. $product->product_name;
        Controller::logReport($type,$report);

        $purchase = \DB::table('purchase_products')->where('product_id','=',$id)->count();
        if($purchase==0){
        $product->delete();
        Alert::success('message', 'Product Deleted Succesfully'); 
        }else{
        Alert::success('message', 'Sorry,this product is already in use');
        }
        return redirect('/admin/addProducts');
    }
}
