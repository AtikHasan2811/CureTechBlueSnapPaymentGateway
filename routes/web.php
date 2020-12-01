<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::get('/','fondendController@index');


Auth::routes();


//
//....................................admin route group......................................
//as=route er jonn ex : admon.index
//'namespace'=>'Admin'kno folder e thakle admin/adminController@index
//'as'=>'admin.' name er jonno
//'prefix'=>'admin', url er jonno
//
Route::post('/payment/store','Admin\PaymentController@store')->name('store');

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    //...................Product.................
    Route::get('product','ProductController@index')->name('product');
    Route::post('/product/store','ProductController@store')->name('store');
    Route::delete('productdestroy/{id}','ProductController@productdestroy');
    Route::post('/product/update','ProductController@update');

    //...................Payment.................
    Route::get('payment','PaymentController@index')->name('payment');

    Route::delete('paymentdestroy/{id}','PaymentController@paymentdestroy');
    Route::post('/payment/update','PaymentController@update');
});


//..............................author route group.............................................

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});



