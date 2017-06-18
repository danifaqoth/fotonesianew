<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
    	$vendors = \App\User::where('role', 'vendor')
    			->with('metas')
    			->orderBy('created_at', 'desc')
    			->get();

    	// foreach ($vendors as $key => $vendor) {
    	// 	if (!$vendor->metas->isEmpty()) {
    	// 		foreach ($vendor->metas as $meta_key => $meta_value) {
    	// 			// $vendor['metas']['test'] = 'hello';
    	// 			$vendor['metas'][$meta_key] = $meta_value;
    	// 		}
    	// 	}
    	// }

    	$data = [
    		'vendors' => $vendors
    	];

    	return view("adminlte::vendors.index", $data);
    }

    public function profil()
    {
        $albums = Album::with('photos')->get();

        $data = [
            'albums' => $albums
        ];

    	return view("adminlte::vendors.profil", $data);
    }

     public function album()
    {
        return view("vendor.adminlte.vendors.album");
    }

    public function getPhotos($album_id)
    {
        $album = Album::with('photos')->find($album_id);

        $data = [
            'photos' => $album->photos,
            'album_id' => $album_id
        ];

        return view('adminlte::vendors.photos', $data);
    }
}
