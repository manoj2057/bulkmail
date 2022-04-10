<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
  public function adminlogin(Request $request  ){
    if($request->isMethod('post')){
    $data=$request->all();
    if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
       return redirect('/admin/dashboard');
    }else{
        return  redirect()->back();
    }
   
           }
           return view('admin.auth.login');
       }
  public function dashboard()
  {
      return view('admin.dashboard');
  }


}
