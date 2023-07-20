<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Session\Session as SessionSession;


class UserAuth extends Controller
{
    public function userlogin(Request $request)
    {
       
        return redirect('/home');
        // $request->validate([
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:5|max:12'
        //  ]);
        //    $user=User::Where('email','=',$request->email)->first();
        //    if($user){
        //     $request->session()->put('LoginId',$user->id);
        //     return redirect('/home');
        //    }else{
        //     return back()->with('Fail','This E-mail is not Registered.');
        //    }
    }

    public function log(Request $req)
    {
     $req->validate([
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5|max:12'
     ]);
       $user=User::where('email','=',$req->email)->first();
       if($user){
           if(Hash::check($req->password,$user->password)){
            $req->session()->put('LoginId',$user->id);
            return redirect('/home');

           }else{
            return back()->with('Fail','Wrong PassWord.');
           }
       }else{
        return back()->with('Fail','This E-mail is not Registered.');
       }
    }

    public function home(Request $request)
    {
        $data=Array();
        if(Session::has('loginId'))
        {
            $data=User::where('email','=',$request->email)->first();
        }
        return view('home',compact('data'));
    }

    public function logout()
    {
        if(session()->has('loginId')){
            session()->pull('loginId');
        }
      return  redirect ('login');
    }
    
    public function login(Request $request){
        validator($request->all(),[
            'email'=>'required|email|unique:users',
        'password'=>'required|min:5|max:12'
        ])->validate();
        if(auth()->attempt($request->only(['email','password'])));{
        return redirect('/home');
      }
        return redirect()->back()->withError(['email'=>'Invalid Email']);
    }

}



   