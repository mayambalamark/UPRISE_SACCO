<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index(){
        $customers = customer::all();
        return view('import',compact('customers'));
    }

    public function import(Request $request){
        Excel::import(new CustomerImport,$request->file('customer_file'));
        return back();
    }
}
