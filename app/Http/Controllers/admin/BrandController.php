<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Auth;
use Alert;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
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
        $brand = new Brand();
        $brand->brand_name =strtolower( $request->brand_name);
        $brand->brand_description = $request->brand_description;
        $request->validate([
            'brand_name' => 'required|unique:brands|max:200',
        ]);
        $brand->save();

        $type='Brand';
        $report='Add New Brand: '. $request->brand_name;
        Controller::logReport($type,$report);
        Alert::success('message', 'Brand Added Successfully!');
        return redirect('/admin/addBrand');
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
        //
        $brandMaster= Brand::all();
        $editBrand = Brand::find($id);
        return view('admin.brand.editBrand',compact('brandMaster','editBrand'));
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
        //
        $brand = brand::find($id);
          $this->validate($request,[
            'brand_name' => 'required|max:200',
                      ]);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->save();

        $type='Brand';
        $report='Edit & Updated  Brand: '. $request->brand_name;
        Controller::logReport($type,$report);

        Alert::success('message', 'Brand Updated Successfully!'); 
        return redirect('/admin/addBrand');
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
        $brand = Brand::find($id); 
        $type='Brand';
        $report='Deleted Brand: '. $brand->brand_name;
        Controller::logReport($type,$report);
        $brand->delete();
        Alert::success('message', 'Brand Deleted Succesfully'); 
        return redirect('/admin/addBrand');
    }
}
