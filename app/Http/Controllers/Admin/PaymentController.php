<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index(){
        $data=Payment::all();
        return view('layouts.backend.partial.payment',compact('data'));
//        return view('layouts.backend.partial.payment');
    }

    public function store(Request $request){
        $data = new Payment();
        $data->name =$request->name;
        $data->email =$request->email;
//        $data->item_code =$request->item_code;
        $data->item_price =$request->item_price;
//        $data->currency =$request->currency;
        $data->address_line_1 =$request->address_line_1;
        $data->address_line_2 =$request->address_line_2;
        $data->country =$request->country;
        $data->city =$request->city;
        $data->state =$request->state;
        $data->zip =$request->zip;
//        $data->txn_id =$request->txn_id;
        if(isset($request->status))
        {
            $data->status = true;
        }else {
            $data->status = false;
        }
        $url=$request->card_url;
        $data->save();
        return redirect($url);

    }

    public function paymentdestroy(Request $request,$id){
        $data= Payment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update(Request $request){
        $data=Payment::where('id',$request->id)->first();
        $data->name =$request->name;
        $data->email =$request->email;
        $data->item_code =$request->item_code;
        $data->item_price =$request->item_price;
        $data->currency =$request->currency;
        $data->address_line_1 =$request->address_line_1;
        $data->address_line_2 =$request->address_line_2;
        $data->country =$request->country;
        $data->city =$request->city;
        $data->state =$request->state;
        $data->zip =$request->zip;
        $data->txn_id =$request->txn_id;
        if(isset($request->status))
        {
            $data->status = true;
        }else {
            $data->status = false;
        }

        $data->save();
        return redirect()->back();
    }



}
