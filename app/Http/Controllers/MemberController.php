<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Http\Request;
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

    public function update(Request $request, $id)       
    {
        if(empty($request->password))
        {
            $members = \App\User::find($id);
            $members->first_name = $request->first_name;
            $members->last_name = $request->last_name;
            $members->email = $request->email;
            $members->save();
        }
        else
        {
            $members = \App\User::find($id);
            $members->first_name = $request->first_name;
            $members->last_name = $request->last_name;
            $members->email = $request->email;
            $members->password = bcrypt($request->password);
            $members->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $members = \App\User::find($id);

        $members->delete();

        return redirect()->back();
        //
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

    public function review()
    {
        // $user = vendor;
        return view("vendor.adminlte.vendors.profil");
    }

}

