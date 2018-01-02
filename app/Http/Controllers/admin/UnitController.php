<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\branch;
use Auth;
use Alert;
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $branch =branch::all();
        $unit = \DB::table('units')
            ->join('branches', 'branches.id', '=', 'units.branch_id')
            ->select('units.*', 'branches.branch_name')
            ->get();

        return view('admin.unit.index', compact('unit','branch'));
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
        $unit = new Unit();
        $unit->unit_name = strtolower($request->unit_name);
        $unit->branch_id = $request->branch_name;
        $request->validate([
            'unit_name' => 'required|max:200',
        ]);
        $unit->save();

        $type='Unit ';
        $report='Add New Unit: '. $request->unit_name;
        Controller::logReport($type,$report);

        Alert::success('message', 'Unit Added Successfully!'); 
        return redirect('/admin/addUnit');
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
        $branch =branch::all();
        $editUnit= \DB::table('units')
            ->join('branches', 'branches.id', '=', 'units.branch_id')
            ->select('units.*', 'branches.branch_name')
            ->where('units.id', $id)
            ->first();
        return view('admin.unit.editUnit',compact('editUnit','branch'));
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
        $unit = Unit::find($id);
          $this->validate($request,[
            'unit_name' => 'required|max:200',
                      ]);
        $unit->unit_name = $request->unit_name;
        $unit->branch_id = $request->branch_name;
        $unit->save();

        $type='Unit';
        $report='Edit & Update Unit : '. $request->unit_name;
        Controller::logReport($type,$report);

        Alert::success('message', 'Unit Updated Successfully!'); 
        return redirect('/admin/addUnit');
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
        $unit = Unit::find($id);

        $type='Unit';
        $report='Deleted  Unit : '. $unit->unit_name;
        Controller::logReport($type,$report);

        $products = \DB::table('products')->where('unit_id','=',$id)->count();
        if($products==0){
        $unit->delete();
        Alert::success('message', 'Unit Deleted Successfully');
        }else{
        Alert::success('message', 'Sorry,this unit is already in use');
        } 
        return redirect('/admin/addUnit');
    }
}
