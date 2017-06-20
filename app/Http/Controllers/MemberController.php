<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

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

    public function fprofil()
    {
        return view('adminlte::members.profil',array('user' => Auth::user() ));
    }

    public function update_fprofil(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' .$filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('adminlte::members.profil', array('user' => Auth::user() ));
    }

}

