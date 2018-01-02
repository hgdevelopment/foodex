<?php

namespace App\Http\Controllers\Auth;
use Session;
use URL;
$empName = Session::get('empName');
?>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile" style="background: url({{ URL::asset('img/images/background/user-info.jpg') }}) no-repeat;">
            <div class="profile-img"> <img src="{{ URL::asset('img/images/users/profile.png') }}"  alt="user" /> </div>
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> {{ $empName }}</a>
            <div class="dropdown-menu animated flipInY">
            <a href="{{ \URL::to('admin/addSales') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
            </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(Session::get('userType') == 'OI')
                <li class="nav-small-cap"></li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ \URL::to('admin/dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                </li>
                
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/addBrand') }}">Brands</a></li>
                        <li><a href="{{ \URL::to('admin/addProducts') }}">Products</a></li>
                        <li><a href="{{ \URL::to('admin/purchase') }}">Stock Entry</a></li>
                        <li><a href="{{ \URL::to('admin/stock/list') }}">Stock List</a></li>
                        <li><a href="{{ \URL::to('admin/purchase/create') }}">Import Products</a></li>
                        <li><a href="{{ \URL::to('admin/expiredproduct/1') }}">Expired Products</a></li>
                        <li><a href="{{ \URL::to('admin/damageproduct/damaged_product') }}">Damaged Products</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('userType') == 'SE' || Session::get('userType') == 'RE' || Session::get('userType') == 'OI')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Order Request</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/addOrder') }}">Order Request</a></li>
                        <li><a href="{{ \URL::to('admin/viewOrder') }}">View Order</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('userType') == 'SE' || Session::get('userType') == 'OI')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Sales Request</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/addSales') }}"> Add Sales</a></li>
                        <li><a href="{{ \URL::to('admin/viewOrderConfirm') }}">View Bill</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Bills </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/salesBill') }}">Sales Bill</a></li>
                        <li><a href="{{ \URL::to('admin/deleteBill') }}">Delete Bill</a></li>
                    </ul>
                </li>
                 <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Update Amount </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/updatecreditBill') }}"> Credit/partial</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('userType') == 'OI' || Session::get('userType') == 'VN')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Stock Transfer</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/stock/request') }}">Add Request</a></li>
                        <li><a href="{{ \URL::to('admin/stock/request/list') }}">View Request</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('userType') == 'OI')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Masters</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/addBranch') }}">Branch</a></li>
                        <li><a href="{{ \URL::to('admin/addUser') }}">User</a></li>
                        <li><a href="{{ \URL::to('admin/addUnit') }}">Unit</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('userType') == 'VN' || Session::get('userType') == 'OI')
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ \URL::to('admin/report') }}">Sales Report</a></li>
                        <li><a href="{{ \URL::to('admin/stockReport/stockReport') }}">Stock Report</a></li>
                        <li><a href="{{ \URL::to('admin/stockReport/productwiseReport') }}">Product wise Report</a></li>
                        <li><a href="{{ \URL::to('admin/stockReport/stockMovingReport') }}">Stock Moving Report</a></li>
                        <li><a href="{{ \URL::to('admin/stockReport/stockTransferReport') }}">Stock Transfer Report</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            </li>
            </ul>
        </nav>
        </div>
</aside>
<div class="page-wrapper">
