<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        

        // $user = new User();
        // $user->name =$request->name; 
        // $user->email =$request->email; 
        // $user->password =$request->password;
        // $request = $user->save() ;
        //  
        User::create($data);
        if($request){
                return back()->with('Success','Client Registered Successfully.');
             }else{
                return back()->with('Fail','Client Not Registered!');
             }

        return redirect('/login')->with('success', 'You can now Log in !');
    }


    public function viewform()
    {
        return view('home');
    }


    public function index()
    {
        $student = DB::select('select * from users');
        return view('home',['student'=>$student]);
    }
}
 