<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function first(){
        return view();
    }


    public function check(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            return view('home');
        }else{
            return "<h2> Wrong password or Email</h2>";
        }
    }
    

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function username()
    {
        return 'email'; // Use 'email' field as the username field
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->email(), 'password');

        // Add an additional check to verify if the user exists in the database
        // $credentials['is_active'] = true;

        if(  Auth::attempt($credentials, $request->filled('remember'))){
            return redirect('/home');
           }
           else{
            return "<h2> Wrong password or Email</h2>";
             
            
             }
    }
}


