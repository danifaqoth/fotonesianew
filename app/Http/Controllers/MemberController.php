<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
    	$members = \App\User::where('role', 'member')
        ->orderBy('created_at', 'desc')
        ->get();

    	$data = [
    		'members' => $members
    	];

    	return view("adminlte::members.index", $data);
    }

    public function profil()
    {
    	return view("adminlte::members.profil");
    }
}

