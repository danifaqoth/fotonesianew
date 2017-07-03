<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorPublicController extends Controller
{
    public function profil($id)
    {
    	$vendor = \App\User::find($id);
        $albums = $vendor->albums;

        $data=[
            'vendor' => $vendor,
            'albums' => $albums,
            'hargas' => $vendor->hargas,
            'reviews' => $vendor->reviews,
        ];   
            
        return view('adminlte::vendors.profil', $data);
    }
}
