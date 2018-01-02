@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0"> Expired Product</h3>
      </div>
   </div>
   <div class="card">
      <div class="card-body p-b-0"></div>
      <!-- Nav tabs -->
      <div id="nav-tabs">
         <ul class="nav nav-tabs customtab"  role="tablist">
            <li class="nav-item">
               <a class="nav-link {{ Request::segment(3) === '1' ? 'active' : null }} "  href="{{URL::to('/') }}/admin/expiredproduct/1" role="tab">
               <span class="hidden-sm-up">
               <i class="ti-email"></i>
               </span> 
               <span class="hidden-xs-down">Expired Products</span>
               </a> 
            </li>
            <li class="nav-item"> 
               <a class="nav-link {{ Request::segment(3) === '2' ? 'active' : null }}"   href="{{URL::to('/') }}/admin/expiredproduct/2"  >
               <span class="hidden-sm-up">
               <i class="ti-home"></i>
               </span> 
               <span class="hidden-xs-down">Within 7 Days</span>
               </a> 
            </li>
            <li class="nav-item"> 
               <a class="nav-link  {{ Request::segment(3) === '3' ? 'active' : null }}"   href="{{URL::to('/') }}/admin/expiredproduct/3" role="tab">
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
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-block">
               <h4 class="card-title">Expired Products</h4>
               <div class="table-responsive m-t-40 tab ">
                  <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Product Name</th>
                           <th>Product Number</th>
                           <th>Purchase Number</th>
                           <th>Branch Name</th>
                           <th>Basic Cost</th>
                           <th>Discount(%)</th>
                           <th>GST</th>
                           <th>Billing Price</th>
                           <th>Product Quantity</th>
                           <th>Expiry Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $sl=1;
                        @endphp
                        @foreach($products as $product)
                        @php

                        $damage=DB::table('damage_products')->where('product_id',$product->product_id)->where('batch_id',$product->batch_id)->where('branch_id',Auth::guard('admin')->user()->branch);

                        if($branchid!='0')
                        {
                        $damage=$damage->where('branch_id',$branchid);
                        }

                        $damage=$damage->sum('product_qty');


                        $sales=DB::table('sales_products')->where('product_id',$product->product_id)->WhereIn('status',['0','1','2'])->where('batch_id',$product->batch_id)->where('branch_id',Auth::guard('admin')->user()->branch);
                        if($branchid!='0')
                        {
                        $sales=$sales->where('branch_id',$branchid);
                        }

                        $sales=$sales->sum('product_qty');



                        $transfer=DB::table('transfer_confirm_products')->where('product_id',$product->product_id)->where('batch_id',$product->batch_id)->where('to_branch',Auth::guard('admin')->user()->branch);
                        if($branchid!='0')
                        {
                        $transfer=$transfer->where('to_branch',$branchid);
                        }

                        $transfer=$transfer->sum('product_qty');



                        $product_qty=max($product->product_qty-($damage+$sales+$transfer),0);

                        $branchName=DB::table('branches')->where('id',$product->branch_id)->select('branch_name')->get();
                        foreach ($branchName as $branchName)


                        @endphp

                        @if($product_qty!=0)
                        <tr>
                           <td>{{$sl++}}</td>
                           <td>{{$product->product_name}}</td>
                           <td>{{$product->product_number}}</td>
                           <td>{{$product->purchase_no}}</td>
                           <td>{{$branchName->branch_name}}</td>
                           <td>{{$product->basic_cost}}</td>
                           <td>{{$product->product_discount}}</td>
                           <td>{{$product->product_gst}}</td>
                           <td>{{$product->billing_price}}</td>
                           <td>{{$product_qty}}</td>
                           <td>{{date('d-m-Y',strtotime($product->expiry_date))}}</td>
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('jquery')
<script src="{{ URL::asset('js/expiredproduct.js')}}"></script>
@endsection