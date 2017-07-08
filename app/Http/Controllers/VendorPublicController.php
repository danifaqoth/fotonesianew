<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;

class VendorPublicController extends Controller
{
    public function profil($id)
    {
    	$vendor = \App\User::find($id);
        $albums = $vendor->albums;
        $review = Review::where('vendor_id', $vendor->id)->get();

        $data=[
            'vendor' => $vendor,
            'albums' => $albums,
            'hargas' => $vendor->hargas,
            'reviews' => $review,
        ];   
            
        return view('adminlte::vendors.profil', $data);
    }
}
