<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class fondendController extends Controller
{
    public function index(){
        $data=array();
        $data['product']=Product::where('status',1)->get();
        return view('welcome',$data);

    }
}
