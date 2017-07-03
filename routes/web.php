<?php


// PUBLIC
Route::get('/',"HomeController@index");

// sementara | aslinya harus login
Route::get('/dashboard',"HomeController@dashboard");

//search
Route::get('/search',"VendorController@search")->name('vendor.search');



// Route::get('/photos/{id}',"PhotosController@show");
Route::delete('/photos/{id}',"PhotosController@destroy");

// Route::get('partials/header','AutocompleteController@index');

Route::get('vendors/profil/{id}','VendorPublicController@profil')
	->name('vendorpublic.profil');

//review
Route::get('vendors/review',"VendorController@review")->name('vendor.review');
Route::get('vendors/review',"ReviewController@store")->name('vendor.review');


// AJAX
Route::get('vendors/all','VendorController@getAll')->name('vendor.getAll');
Route::post('/like','PhotosController@likePhoto')->name('like');

//album
Route::get('vendors/profil/{id}/photos',"VendorController@getPhotos")->name('vendor.photos');

//profilvendor
Route::get('vendors/profil',"VendorController@profil")->name('vendor.profil');


Route::group(['middleware' => 'auth'], function () {
	// Admin
	Route::group(['middleware' => 'superadmin'], function () {
		Route::get('/members',"MemberController@index")->name("member.index");
		Route::get('/vendors',"VendorController@index")->name("vendor.index");
	});

	// Vendor
	Route::group(['middleware' => 'vendor'], function () {
		// Route::get('vendors/profil',"VendorController@profil")->name('vendor.profil');
		Route::get('vendors/album',"VendorController@album")->name('vendor.album');
		// Route::get('vendors/profil/{id}/photos',"VendorController@getPhotos")->name('vendor.photos');
		Route::get('vendors/profil/photo',"VendorController@fprofil");
		Route::post('vendors/profil',"VendorController@update_fprofil");
		Route::get('vendors/messages',"MessageController@getVendorMessages")->name('vendor.message');
		Route::get('vendors/readmessage/{id}',"MessageController@readMessageVendor")->name('vendor.readmessage');
		Route::post('vendors/message/sendmessage',"MessageController@sendMessageVendor")->name('vendor.sendmessage');
		//harga
		Route::get('vendors/harga',"VendorController@harga")->name('vendor.harga');
		Route::get('vendors/harga',"HargaController@store")->name('vendor.harga');
	});

	// Member
	Route::group(['middleware' => 'member'], function () {
		Route::get('members/profil',"MemberController@profil")->name('member.profil');
		Route::get('members/profil/photo',"MemberController@fprofil");
		Route::post('members/profil',"MemberController@update_fprofil");
		Route::get('members/messages',"MessageController@getMemberMessages")->name('member.message');
		Route::get('members/readmessage/{id}',"MessageController@readMessageMember")->name('member.readmessage');
		Route::post('members/profil/sendmessage',"MessageController@sendMessageMember")->name('member.sendmessage');
	});
	

	Route::get('/photos/create/{id}',"PhotosController@create");
	Route::post('/photos/store',"PhotosController@store")->name('photo.store');

	Route::resource('albums', "AlbumsController");
});
