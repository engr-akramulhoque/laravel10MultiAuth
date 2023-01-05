<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class VendorController extends Controller
{
    //login
    public function login(){        
        return view('backend.vendor.auth.login');
    }

    //authentication
    public function authentication(Request $request){    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $check = $request->all();
        if(Auth::guard('vendor')->attempt(['email' => $check['email'],
        'password' => $check['password'],
        'status' => 1,
        'approved' => 1]))
        {
            return redirect()->route('vendor.dashboard')->with('success', 'You are successfully login.');
        }
        else{
            return redirect()->back()->with('fail', 'Invalid Eamil or Password.');
        }
    }

    //dashboard
    public function dashboard(){        
        return view('backend.vendor.dashboard');
    }


    // logout
    public function logout(){
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with('success', 'You are successfully logout.');
    }
}
