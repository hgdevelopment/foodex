@extends('admin.branch.index')
@section('branch_name',$editBranch->branch_name)
@section('edit_id',$editBranch->id)
@section('edit')
{{ method_field('PUT') }}
@endsection