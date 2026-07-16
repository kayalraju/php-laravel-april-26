<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminlogin(){
        return view('admin.login');
    }
    public function adminregister(){
        return view('admin.register');
    }
    public function adminregisterCreate(Request $request){
       $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Auth::guard('admin')->login($admin);

        return redirect()->route('admin.login')->with('success', 'Registration successful. You can now log in.');
    }


    public function adminloginstore(Request $request){
        {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
        }

    }


    public function admindashboard(){
        return view('admin.dashboard');
    }


    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
        
    }
}
