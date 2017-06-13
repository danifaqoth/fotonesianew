<?php


Route::get('/',"HomeController@index");

// sementara | aslinya harus login
Route::get('/dashboard',"HomeController@dashboard");
Route::get('/members',"MemberController@index")->name("member.index");
Route::get('/vendors',"VendorController@index")->name("vendor.index");

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
