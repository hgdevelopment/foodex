@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0">@if (trim($__env->yieldContent('edit_id'))) Edit Unit @else Add Unit @endif</h3>
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
					<form  class=" m-t-40" method="post" action="{{URL::to('/') }}/admin/addUnit/@yield('edit_id')" data-parsley-validate>
					@else
					<form class=" m-t-40" action="{{URL::to('/') }}/admin/addUnit" method="post" data-parsley-validate>
					@endif
						{!! csrf_field() !!}
						@section('edit')
						@show
						<div class="row">
							<div class="col-md-6">
								<div class="form-group m-b-40">
									<label for="brand_name">Unit Name</label>
									<input type="text" class="form-control" id="unit_name" name="unit_name" value="@yield('unit_name')" required data-parsley-required-message="Please enter unit name" >
									@if ($errors->has('unit_name'))
										<span class="help-inline" style="color:red">{{$errors->first('unit_name')}}</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group m-b-40">
									<label for="brand_description">Branch</label>
									<select class="form-control p-0" id="branch_name" required name="branch_name">
									<option value="">Select Branch</option>
									@foreach ($branch as $branchs)
										<option value="{{ $branchs->id}}" @if($__env->yieldContent('branch_name')==$branchs->id) {{ 'selected' }} @endif>{{ $branchs->branch_name }}</option>
									@endforeach
								</select>
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
					<h4 class="card-title">Units</h4>
					<div class="table-responsive m-t-40">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Unit Name</th>
									<th>Branch</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $sl=1;?>
								@foreach ($unit as $units)
									<tr>
										<td>{{$sl++}}</td>
										<td>{{$units->unit_name}}</td>
										<td>{{$units->branch_name}}</td>
										<td class="text-nowrap">							
											<a href="" data-toggle="tooltip" data-original-title="Delete" style="float:left;"> 
												<form method="post" id="delete_form"  action="{{ URL::to('/') }}/admin/addUnit/{{ $units->id }}" >
												{{ method_field('DELETE') }}
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="DELETE">
												<button id="delete-btn" type="submit" class="active deletbtn" style="border: none;">
												<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
												</form>
											</a>
											<a href="{{ URL::to('/') }}/admin/addUnit/{{ $units->id }}/edit" data-toggle="tooltip" data-original-title="Edit" style="margin-left:2%; "> 
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
<script src="{{ URL::asset('js/unit.js')}}"></script>
@endsection