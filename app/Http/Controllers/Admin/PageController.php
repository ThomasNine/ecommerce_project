<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }
    public function showLoginForm(){
        return view('admin.login');
    }
    // public function login(Request $request){
    //     $request->validate([
    //         'email'=>'required|email',
    //         'password'=>'required'
    //     ]);
    //     $credentials = $request->only('email','password');
    //     if(auth()->guard("admin")->attempt($credentials)){
    //         return redirect('/admin');
    //     }
    //     return redirect()->back()->with('error','Invalid email or password');
    // }
    public function login(Request $request){
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        $credentials=$request->only('email','password');
        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect('/admin')->with('success','Welcome Admin');
        }
        return redirect()->back()->with('error','Invalid email or password');
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}
