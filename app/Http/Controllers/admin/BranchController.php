<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use Auth;
use Session;
use Alert;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branch.index', compact('branches'));
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
        $Branch = new Branch();
        $Branch->branch_name = $request->branch_name;
        $Branch->gst_no=$request->gst_no;
        $Branch->address=$request->address;
        $Branch->pin_number=$request->pin_number;
        $Branch->phone_number=$request->phone_number;
        $request->validate([
            'branch_name' => 'required|unique:branches|max:200',
        ]);
        $Branch->save();

        $type='Branch ';
        $report='Add New Branch: '. $request->branch_name;
        Controller::logReport($type,$report);

        Alert::success('message', 'Branch Added Successfully!');
        return redirect('/admin/addBranch');
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
        $BranchMaster= Branch::all();
        $editBranch = Branch::find($id);
        return view('admin.branch.editBranch',compact('BranchMaster','editBranch'));
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
        $Branch = Branch::find($id);
        $Branch->branch_name = $request->branch_name;
        $Branch->gst_no=$request->gst_no;
        $Branch->address=$request->address;
        $Branch->pin_number=$request->pin_number;
        $Branch->phone_number=$request->phone_number;
        $Branch->save();

        $type='Branch';
        $report='Edit  & Update Branch Details. branch Name : '. $request->branch_name;
        Controller::logReport($type,$report);

        Alert::success('message', 'Branch Updated Successfully!');
        return redirect('/admin/addBranch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Branch = Branch::find($id);

        $type='Branch ';
        $report='Deleted Branch . Delete Branch: '. $Branch->branch_name;
        Controller::logReport($type,$report);

        $products = \DB::table('products')->where('added_branch','=',$id)->count();
        if($products==0){
        $Branch->delete();

        Alert::success('message', 'Branch Deleted Succesfully');
        }else{
        Alert::success('message', 'Sorry,this branch is already in use');

        }
        return redirect('/admin/addBranch');
    }
}
