@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0">@if (trim($__env->yieldContent('edit_id'))) Edit Product @else Add Product @endif</h3>
		</div>
	</div>
	@if (Session()->has('message'))
	<div class="alert alert-success"> 
		<i class="ti-product"></i> 
		{{Session()->get('message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
	</div>
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					@if (trim($__env->yieldContent('edit_id')))
					<form  class="m-t-40" method="post" action="{{URL::to('/') }}/admin/addProducts/@yield('edit_id')" >
					@else
					<form class="m-t-40" action="{{URL::to('/') }}/admin/addProducts" method="post" data-parsley-validate>
					@endif
					{!! csrf_field() !!}
					@section('edit')
					@show
						<div class="row">
							<div class="col-md-3">
								<label for="batch_number">Product Number</label>
								<input type="text" class="form-control" id="product_number" name="product_number" required value="@yield('product_number')">
								@if ($errors->has('product_number'))
										<span class="help-inline" style="color:red">{{$errors->first('product_number')}}</span>
								@endif	
							</div>
							<div class="col-md-3">
								<label for="batch_number">Product Name</label>
								<input type="text" class="form-control" id="product_name" name="product_name" required value="@yield('product_name')">		
							</div>
							<div class="col-md-3">
								<label for="product_brand">Product Brand</label>
								<select class="form-control p-0" id="product_brand" required name="product_brand">
									<option value="">Select Brand</option>
									@foreach ($brands as $brand)
										<option value="{{ $brand->id}}" @if($__env->yieldContent('product_brand')==$brand->id) {{ 'selected' }} @endif>{{ $brand->brand_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label for="batch_number">Basic Cost</label>
								<input type="text" class="form-control" id="basic_cost" name="basic_cost" required value="@yield('basic_cost')">	
							</div>

							<div class="col-md-12"><br></div>

							<div class="col-md-3">
								<label for="batch_number">Discount</label>
								<input type="text" class="form-control" id="product_discount" name="product_discount" required value="@yield('product_discount')"></div>
							<div class="col-md-3">
								<label for="product_gst">GST</label>
								<input type="text" class="form-control" id="product_gst" data-mask="99%" required name="product_gst" value="@yield('product_gst')">
							</div>
							<div class="col-md-3">
								<label for="batch_number">MRP</label>
								<input type="text" class="form-control" id="billing_price" name="billing_price" required value="@yield('billing_price')">
							</div>
							{{-- <div class="col-md-3">
								<label for="product_brand">Billing Price</label>
								<input type="text" class="form-control" id="billing_price" name="billing_price" required value="@yield('billing_price')">
							</div> --}}
					
					
							<div class="col-md-3">
								<label for="product_brand">Product Unit</label>
								<select class="form-control p-0" id="unit_id" required name="unit_id">
									<option value="">Select Unit</option>
									@foreach ($unit as $units)
										<option value="{{ $units->id}}" @if($__env->yieldContent('unit_id')==$units->id) {{ 'selected' }} @endif>{{ $units->unit_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
							{{-- <div class="col-md-3">
								<label for="product_brand">Branch</label>
								<select class="form-control p-0" id="product_branch" required name="product_branch">
									<option value="">Select Branch</option>
									@foreach ($branch as $branchs)
										<option value="{{ $branchs->id}}" @if($__env->yieldContent('product_branch')==$branchs->id) {{ 'selected' }} @endif>{{ $branchs->branch_name }}</option>
									@endforeach
								</select>
							</div> --}}
							<div class="col-md-12"><br></div>	
							<div class="col-lg-12 col-xlg-12 col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
									</div>
								</div>
							</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	@if (trim($__env->yieldContent('edit_id')))
  	@else
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Products</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Product Name</th>
									<th>Product Number</th>
									<th>Unit</th>
									<th>Basic Cost</th>
									<th>Discount</th>	
									<th>GST</th>
									<th>Billing Price</th>
									<th>Branch</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php $sl=1;
								@endphp
								@foreach($products as $product)
								<tr>
									<td>{{$sl++}}</td>
									<td>{{$product->product_name}}</td>
									<td>{{$product->product_number}}</td>
									<td>{{$product->unit_name}}</td>
									<td>{{$product->basic_cost}}</td>
									<td>{{$product->product_discount}}</td>								
									<td>{{$product->product_gst}}</td>
									<td>{{$product->billing_price}}</td>
									<td>{{$product->branch_name}}</td>
									<td class="text-nowrap">							
										<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
											<form method="post" id="delete_form"  action="{{ URL::to('/') }}/admin/addProducts/{{ $product->id }}" >
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
											<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
											<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
											</form>
										</a>
										<a href="{{ URL::to('/') }}/admin/addProducts/{{ $product->id }}/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
											<i class="fa fa-pencil text-inverse m-r-10"></i> 
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

</div>
@endsection

@section('jquery')
<script src="{{ URL::asset('js/product.js')}}"></script>
@endsection