<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //login
    public function login(){        
        return view('backend.admin.auth.login');
    }

    //authentication
    public function authentication(Request $request){    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'],
        'password' => $check['password'],
        'status' => 1]))
        {
            return redirect()->route('admin.dashboard')->with('success', 'You are successfully login.');
        }
        else{
            return redirect()->back()->with('fail', 'Invalid Eamil or Password.');
        }
    }

    //dashboard
    public function dashboard(){        
        return view('backend.admin.dashboard');
    }


    // logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'You are successfully logout.');
    }
}
