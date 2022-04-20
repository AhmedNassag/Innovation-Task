<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.adminLogin');
    }

    public function checkAdmin(Request $request)
    {
        $this->validate($request,
        [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password]))
        {
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withInput($request->only('email'));
    }


    public function dashboard()
    {
        $admins = Admin::all();
        return view('admin.dashboard')->with('admins',$admins);
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.index')->with('admins',$admins);
    }
}
