@extends('admin.user.index')
@section('employee_name',$edituser->employee_name)
@section('employee_code',$edituser->username)
@section('employee_branch',$edituser->branch)
@section('employee_type',$edituser->userType)
@section('edit_id',$edituser->id)
@section('edit')
{{ method_field('PUT') }}
@endsection

@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 col-8 align-self-center">
			<h3 class="text-themecolor m-b-0 m-t-0">@if (trim($__env->yieldContent('edit_id'))) Edit User @else Add User @endif</h3>
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
					<form  class=" m-t-40" method="post" action="{{URL::to('/') }}/admin/addUser/@yield('edit_id')" data-parsley-validate>
						{!! csrf_field() !!}
						@section('edit')
						@show
						<div class="row">
							<div class="col-md-4">
								<label for="employee_name">Employee Name</label>
								<input type="text" class="form-control" id="employee_name" name="employee_name" value="@yield('employee_name')" required data-parsley-required-message="Please enter branch name">
								@if ($errors->has('employee_name'))
									<span class="help-inline">{{$errors->first('employee_name')}}</span>
								@endif
							</div>
							<div class="col-md-4">
								<label for="employee_code">Employee Code</label>
								<input type="text" class="form-control" id="employee_code" name="employee_code" value="@yield('employee_code')" required data-parsley-required-message="Please enter branch name">
								@if ($errors->has('employee_code'))
								<span class="help-inline" style="color:red">{{$errors->first('employee_code')}}</span>
								@endif
							</div>
							{{-- <div class="col-md-4">
								<label for="employee_code">Password</label>
								<input type="password" class="form-control" id="employee_password" name="employee_password" value="@yield('employee_password')" required data-parsley-required-message="Please enter branch name">
								@if ($errors->has('employee_password'))
								<span class="help-inline">{{$errors->first('employee_password')}}</span>
								@endif
							</div> --}}
							<div class="col-md-12"><br></div>
							<div class="col-md-4">
								<label for="employee_branch">Branch</label>
								<select class="form-control p-0" id="employee_branch" required name="employee_branch">
									<option value="">Select Branch</option>
									@foreach ($branch as $branchs)
											<option value="{{$branchs->id}}" @if($__env->yieldContent('employee_branch')==$branchs->id) {{ 'selected' }} @endif>{{$branchs->branch_name}}</option>
										@endforeach
								</select>
							</div>
							<div class="col-md-4">
								<label for="employee_type">Employee Type</label>
								<select class="form-control p-0" id="employee_type" value="@yield('employee_type')"  required name="employee_type">
									<option value="">Select Type</option>
									<option value="OI" @if(strtoupper($__env->yieldContent('employee_type'))=='OI') {{ 'selected' }} @endif>Office Incharge</option>
									<option value="SE" @if(strtoupper($__env->yieldContent('employee_type'))=='SE') {{ 'selected' }} @endif>Sales Employee</option>
									<option value="RE" @if(strtoupper($__env->yieldContent('employee_type'))=='RE') {{ 'selected' }} @endif>Request Employee</option>
									<option value="VN" @if(strtoupper($__env->yieldContent('employee_type'))=='VN') {{ 'selected' }} @endif>Verification</option>
								</select>
							</div>
							<div class="col-md-12"></div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success pull-left" value="Submit" name="submit" style="margin-top:7%">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection