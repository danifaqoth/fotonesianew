<?php


Route::get('/',"HomeController@index");

// sementara | aslinya harus login
Route::get('/dashboard',"HomeController@dashboard");
Route::get('/members',"MemberController@index")->name("member.index");
Route::get('/vendors',"VendorController@index")->name("vendor.index");
Route::get('members/profil',"MemberController@profil")->name('member.profil');
Route::get('members/profil/photo',"MemberController@fprofil");
Route::post('members/profil',"MemberController@update_fprofil");


Route::get('vendors/profil',"VendorController@profil")->name('vendor.profil');
Route::get('vendors/album',"VendorController@album")->name('vendor.album');
Route::get('vendors/profil/{id}/photos',"VendorController@getPhotos")->name('vendor.photos');
Route::get('vendors/profil/photo',"VendorController@fprofil");
Route::post('vendors/profil',"VendorController@update_fprofil");

Route::post('members/profil/sendmessage',"MessageController@sendMessage")->name('member.sendmessage');

// Route::get('/albums', "AlbumsController@index");
// Route::get('/albums/create',"AlbumsController@create");
// Route::get('/albums/{id}',"AlbumsController@show");
// Route::post('/albums/store',"AlbumsController@store");
// Route::delete('/albums/{id}',"AlbumsController@destroy");
Route::resource('albums', "AlbumsController");

Route::get('/photos/create/{id}',"PhotosController@create");
Route::post('/photos/store',"PhotosController@store")->name('photo.store');

Route::get('/photos/{id}',"PhotosController@show");
Route::delete('/photos/{id}',"PhotosController@destroy");



Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
