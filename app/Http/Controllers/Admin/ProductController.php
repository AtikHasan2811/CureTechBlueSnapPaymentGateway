<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data=Product::all();
        return view('layouts.backend.partial.product',compact('data'));
    }

    public function store(Request $request){


        $this->validate($request,[
            'product_name' => 'required',
            'regular_price' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
//            product_name	product_description	image	regular_price	selling_price	status	created_at	updated_at
        ]);

        $data = new Product();
        $data->product_name =$request->product_name;
        $data->product_description =$request->product_description;
        $data->regular_price =$request->regular_price;
        $data->selling_price =$request->selling_price;
        if(isset($request->status))
        {
            $data->status = true;
        }else {
            $data->status = false;
        }


        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = uniqid().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/product')){
                makeDirectory('uploads/product',0777,true);
            }
            $image->move('uploads/product',$imageName);
        }else{
            $imageName = 'default.png';
        }
        $data->image =$imageName;
        $data->save();
        return back();
    }

    public function productdestroy(Request $request,$id){
        $data= Product::find($id);
        if (file_exists('uploads/product/'.$data->image)){
            unlink('uploads/product/'.$data->image);
        }
        $data->delete();
        return redirect()->back();
    }



    public function update(Request $request){

        $data=Product::where('id',$request->id)->first();
        $data->product_name =$request->product_name;
        $data->product_description =$request->product_description;
        $data->regular_price =$request->regular_price;
        $data->selling_price =$request->selling_price;

        if(isset($request->status))
        {
            $data->status = true;
        }else {
            $data->status = false;
        }



        $image = $request->file('image');

        if (isset($image)){
            if (file_exists('uploads/product/'.$data->image)){
                unlink('uploads/product/'.$data->image);
            }
            $currentDate = Carbon::now()->toDateString();
            $imageName = uniqid().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/product')){
                mkdir('uploads/product',0777,true);
            }
            $image->move('uploads/product',$imageName);
        }else{
            $imageName = $data->image ;
        }
        $data->image =$imageName;
        $data->save();
        return redirect()->back();
    }


}
