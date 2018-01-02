<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\login;
use Auth;
use Session;
class LoginController extends Controller
{
  use AuthenticatesUsers;
  public function __construct()
  {
    $this->middleware('guest', ['except' => 'logout']);
  }
  public function showLoginForm()
  {
    if (auth()->guard('admin')->user()) return redirect()->route('admin.dashboard');
    return view('index');
  }
  public function login(Request $request)
  {    
    $this->validate($request,[
    'username'=>'required',
    'password'=>'required'
    ]);
    if(auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
    {
      $user = Auth::guard('admin')->user();
      Session::put('userId', $user->id); 
      Session::put('userName', $user->username);
      Session::put('empName', $user->employee_name);
      Session::put('userType', $user->userType);
      if($user->branch != "")
        Session::put('branch', $user->branch);
      else
        Session::put('branch', 'all');

      if($user->userType == 'OI')
        return  redirect()->route('admin.dashboard');
      if($user->userType == 'VN')
        return redirect('admin/report');
      if($user->userType == 'SE')
        return redirect('admin/addSales');
      if($user->userType == 'RE')
        return redirect('admin/addOrder');

    }
    else
    {
      session()->flash('message','Your Username and Password are Wrong.');
      return redirect('/')->withInput($request->only('username','remember'));
    }
    $type='Login ';
    $report=$user->username.'is login :';
    Controller::logReport($type,$report);
  }
  public function logout()
  {
    if(Auth::guard('admin')->check())
    { 
      Auth::guard('admin')->logout();
      Session::flush();
      return redirect('/');
    }
    else
    {
      return redirect('');
    }
  }
}