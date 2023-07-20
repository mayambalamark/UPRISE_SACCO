<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

use App\Http\Controllers\UserController;
use App\Models\customer;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/csv',[CustomerController::class,'index']);
Route::get('/import',[CustomerController::class,'import']);
// Route::get('/import', function () {
//     return view('import');
// });


Route::get('/home', function () {
    
    return view('home');
});
// Route::get('/', function () {
//     return view('login');
// });

Route::get('/register', [UserController::class,'register']) 
    

;
Route::get('/log',[UserAuth::class,'login']);
// ->middleware('isLoggedIN');
// Route::get('/log',[LoginController::class,'attemptLogin']);
// Route::get('/login',function(){
//     if(session()->has('email')){
//        return redirect('/home');
//     }else{
//     return view('login');
//     }
// });
// Route::get('/log', function () {
//     return view('home');
// });

Route::get('/login', function () {
    return view('login');
});


Route::view("home",'home' );

Route::get('/', function () {
    return view('index');
});


Route::get('/regist', function () {
    return view('register');
});



Route::get('/home',[UserController::class,'viewform']);


Route::get('/home',[UserController::class,'index']);


Route::get('/logout',[UserAuth::class,'logout']);
// Route::get('/import',[customer::class,'import']);
 

