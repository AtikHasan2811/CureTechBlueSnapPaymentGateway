<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function userTest(){
        $data =User::all();
    }
}
