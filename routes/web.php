<?php


// PUBLIC
Route::get('/',"HomeController@index");

// sementara | aslinya harus login
Route::get('/dashboard',"HomeController@dashboard");
Route::post('members/profil/sendmessage',"MessageController@sendMessage")->name('member.sendmessage');


// Route::get('/photos/{id}',"PhotosController@show");
// Route::delete('/photos/{id}',"PhotosController@destroy");

// Route::get('partials/header','AutocompleteController@index');

Route::get('vendors/profil/{id}','VendorPublicController@profil');

// AJAX
Route::get('vendors/all','VendorController@getAll')->name('vendor.getAll');


Route::group(['middleware' => 'auth'], function () {
	// Admin
	Route::group(['middleware' => 'superadmin'], function () {
		Route::get('/members',"MemberController@index")->name("member.index");
		Route::get('/vendors',"VendorController@index")->name("vendor.index");
	});

	// Vendor
	Route::group(['middleware' => 'vendor'], function () {
		Route::get('vendors/profil',"VendorController@profil")->name('vendor.profil');
		Route::get('vendors/album',"VendorController@album")->name('vendor.album');
		Route::get('vendors/profil/{id}/photos',"VendorController@getPhotos")->name('vendor.photos');
		Route::get('vendors/profil/photo',"VendorController@fprofil");
		Route::post('vendors/profil',"VendorController@update_fprofil");
	});

	// Member
	Route::group(['middleware' => 'member'], function () {
		Route::get('members/profil',"MemberController@profil")->name('member.profil');
		Route::get('members/profil/photo',"MemberController@fprofil");
		Route::post('members/profil',"MemberController@update_fprofil");
	});
	

	Route::get('/photos/create/{id}',"PhotosController@create");
	Route::post('/photos/store',"PhotosController@store")->name('photo.store');

	Route::resource('albums', "AlbumsController");
});
