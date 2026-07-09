<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerStore(Request $request){
       // dd($request->all());
       $validator=Validator::make($request->all(),[
           'name'=>'required|string|max:255',
           'email'=>'required|string|email|max:255|unique:users',
           'password'=>'required|string|min:8|confirmed',
           
       ]);
       if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }

       $user=new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->save();
       return redirect()->route('login')->with('success','Registration Successfully');
    }
    public function login(){
        return view('auth.login');
    }
    public function loginstore(Request $request){
       //dd($request->all());
       $credentials=Validator::make($request->all(),[
           'email'=>'required|string|email|max:255',
           'password'=>'required|string|min:8',
       ]);

       if($credentials->fails()){
           return redirect()->back()->withErrors($credentials)->withInput();
       }

       //email exists or not
       $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()
            ->withErrors([
                'email' => 'Email does not exist.',
            ])
            ->withInput($request->except('password'));
    }

    //password match or not
    if (!Hash::check($request->password, $user->password)) {
        return back()
            ->withErrors([
                'password' => 'Password does not match.',
            ])
            ->withInput($request->except('password'));
    }

       if(Auth::attempt($credentials->validated(),$request->boolean('remember'))){
        $request->session()->regenerate();
        return redirect()->route('user.dashboard')->with('success','Login Successfully');
           
       }
      
    }
    public function dashboard(){
        return view('auth.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Logout Successfully');
        
    }


}
