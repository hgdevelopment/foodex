@extends('admin.layout.puredrops')
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection

@section('body')
<style>
  /* pagination */

.pagination {
    height: 36px;
    margin: 18px 0;
    color: #6c58bF;
}

.pagination ul {
    display: inline-block;
    *display: inline;
    /* IE7 inline-block hack */
    *zoom: 1;
    margin-left: 0;
    color: #ffffff;
    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.pagination li {
    display: inline;
    color: #6c58bF;
}

.pagination a ,.pagination span{
    float: left;
    padding: 0 14px;
    line-height: 34px;
    color: #6c58bF;
    text-decoration: none;
    border: 1px solid #ddd;
    border-left-width: 0;
}

.pagination a:hover,
.pagination .active a {
    background-color: #6c58bF;
    color: #ffffff;
}

.pagination a:focus {
    background-color: #6c58bF;
    color: #ffffff;
}


.pagination .active a {
    color: #ffffff;
    cursor: default;
}

.pagination .disabled span,
.pagination .disabled a,
.pagination .disabled a:hover {
    color: #999999;
    background-color: transparent;
    cursor: default;
}

.pagination li:first-child a,
.pagination li:first-child span {
    border-left-width: 1px;
    -webkit-border-radius: 3px 0 0 3px;
    -moz-border-radius: 3px 0 0 3px;
    border-radius: 3px 0 0 3px;
}

.pagination li:last-child a {
    -webkit-border-radius: 0 3px 3px 0;
    -moz-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
}

.pagination-centered {
    text-align: center;
}

.pagination-right {
    text-align: right;
}

.pager {
    margin-left: 0;
    margin-bottom: 18px;
    list-style: none;
    text-align: center;
    color: #6c58bF;
    *zoom: 1;
}

.pager:before,
.pager:after {
    display: table;
    content: "";
}

.pager:after {
    clear: both;
}

.pager li {
    display: inline;
    color: #6c58bF;
}

.pager a {
    display: inline-block;
    padding: 5px 14px;
    color: #6c58bF;
    background-color: #fff;
    border: 1px solid #ddd;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
}

.pager a:hover {
    text-decoration: none;
    background-color: #f5f5f5;
}

.pager .next a {
    float: right;
}

.pager .previous a {
    float: left;
}

.pager .disabled a,
.pager .disabled a:hover {
    color: #999999;
}


/* end */
</style>
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
      <h3 class="text-themecolor m-b-0 m-t-0">Notifications</h3>
    </div>
  </div>


<div class="row">
  <div class="col-12">
    <div class="card">

  <div class="wrapper bg-light lter b-b">
    <div class="btn-group pull-right">
    {{auth('admin')->user()->notifications()->paginate(10)->links()}}
    </div>
  </div>

      <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">

        @foreach(auth('admin')->user()->notifications()->paginate(10) as $note)
          <li  ng-repeat="mail in mails | filter:fold" ng-class="labelClass(mail.label)" class="list-group-item clearfix b-l-3x ng-scope b-l-info" style="background: {{ $note->read_at == null ? '#efefef' : '#fff' }}">

            <a ui-sref="app.page.profile" style="color: #ec5a5a;"  class="avatar thumb pull-left m-r" href="#/app/page/profile">
            <i class="fa fa-bell fa-3x" aria-hidden="true"></i>

            </a>&nbsp;&nbsp;

           

            <div  style="width: 80%;">
              <div>
                <a class="text-md ng-binding" style="text-decoration: none;color: #000;" href="{{ URL::to('/').$note->data['url'] }}">{!! $note->data['message'] !!}</a><span class="label  {{ $note->read_at == null ? 'bg-info' : 'bg-success' }}  m-l-sm ng-binding">{{ $note->read_at == null ? 'Unread' : 'Read' }}</span>
              </div>
            </div> 

          <div class="pull-right text-sm text-muted">
              <span class="hidden-xs ng-binding">{{$note->created_at->diffForHumans()}}</span>
            </div>
          </li>






        @endforeach

      </ul>

</div>
</div>
</div>

</div>
@endsection

@section('jquery')
<script src="{{ URL::asset('js/product.js')}}"></script>
@endsection