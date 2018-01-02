@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0">@if (trim($__env->yieldContent('edit_id'))) Edit Brand @else Add Brand @endif</h3>
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
					<form  class=" m-t-40" method="post" action="{{URL::to('/') }}/admin/addBrand/@yield('edit_id')" data-parsley-validate>
					@else
					<form class=" m-t-40" action="{{URL::to('/') }}/admin/addBrand" method="post" data-parsley-validate>
					@endif
						{!! csrf_field() !!}
						@section('edit')
						@show
						<div class="row">
							<div class="col-md-6">
								<div class="form-group m-b-40">
									<label for="brand_name">Brand Name</label>
									<input type="text" class="form-control" id="brand_name" name="brand_name" value="@yield('brand_name')" required data-parsley-required-message="Please enter brand name" >
									@if ($errors->has('brand_name'))
										<span  class="help-inline" style="color:red">{{$errors->first('brand_name')}}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group m-b-40">
									<label for="brand_description">Brand Description</label>
									<input type="text" class="form-control" id="brand_description" name="brand_description" value="@yield('brand_description')" required data-parsley-required-message="Please enter brand description">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xlg-12 col-md-12">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
									</div>
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
					<h4 class="card-title">Brands</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Brand Name</th>
									<th>Brand Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								@foreach ($brands as $brand)
									<tr>
										<td>{{$sl++}}</td>
										<td>{{$brand->brand_name}}</td>
										<td>{{$brand->brand_description}}</td>
										<td class="text-nowrap">
											<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
												<form method="post" id="delete_form"  action="{{ URL::to('/') }}/admin/addBrand/{{ $brand->id }}" >
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE">
												<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
												<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
												</form>
											</a>
											<a href="{{ URL::to('/') }}/admin/addBrand/{{ $brand->id }}/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
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
<script src="{{ URL::asset('js/brand.js')}}"></script>
@endsection