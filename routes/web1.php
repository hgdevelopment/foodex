<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/

Route::get('/', 'auth\LoginController@showLoginForm');
Route::post('login', ['as'=>'login','uses'=>'auth\LoginController@login']);
Route::get('/logout', ['as'=>'logout','uses'=>'auth\LoginController@logout']);  

Route::group(['middleware' => ['admin']], function () 
{


    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'admin\pageController@index']);
    Route::resource('admin/addSales','admin\SalesController');
    Route::resource('admin/addProducts','admin\ProductController');
    Route::resource('admin/addBrand','admin\BrandController');
    Route::resource('admin/addBranch','admin\BranchController');
    Route::resource('admin/addUnit','admin\UnitController');
    Route::resource('admin/addUser','admin\UserController');
    Route::resource('admin/addRequest','admin\addRequestController');

    Route::get('admin/expiredproduct/seven','admin\expiredproductController@seven');
    Route::get('admin/expiredproduct/fifteen','admin\expiredproductController@fifteen');
    Route::resource('admin/expiredproduct','admin\expiredproductController');

    Route::get('admin/dash/seven','admin\dashboardController@seven');
    Route::get('admin/dash/fifteen','admin\dashboardController@fifteen');





    Route::resource('admin/purchase','admin\PurchaseController');
    Route::post('admin/purchase/select2/product','admin\PurchaseController@product_select');
    Route::post('admin/purchase/excel_upload','admin\PurchaseController@excel_upload');
    Route::get('admin/stock/list','admin\StockController@stocklist');
    Route::get('admin/stock/list/datatable','admin\StockController@stock_DataTable');
    Route::get('admin/stock/request','admin\StockTransferController@stock_request');
    Route::post('admin/stock/datatable/request','admin\StockTransferController@stock_request_datatable');


});
