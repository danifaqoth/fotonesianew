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
        ];   
        return view('adminlte::vendors.profil', $data);
    }
}
