<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;

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
        $user = auth()->user();
        $albums = Album::where('user_id', $user->id)->with('photos')->get();

        $data = [
            'albums' => $albums
            // 'user' => $user
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
            'album' => $album
        ];

        return view('adminlte::vendors.photos', $data);
    }

    public function fprofil()
    {
        return view('adminlte::vendors.profil',array('user' => Auth::user() ));
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

        return redirect()->back();
        //return view('adminlte::vendors.profil');
    }

    public function getAll(Request $request)
    {
        
        $term = $request->term;

        $queries = \App\Usermeta::join('users', 'users.id', '=', 'usermetas.user_id')
                        ->where('value', 'like', '%'.$term.'%' )
                        ->take(6)
                        ->get();

     //    $queries = User::where(function($query)
     //    {
        //  $query->where('first_name', 'like', '%'.$term.'%' );
        // })->take(6)->get();

        $results = array();

        foreach ($queries as $query) 
        {
            $results[] = [ 'id' => $query->id, 'avatar' =>$query->avatar, 'value' => $query->value];
        }

        return response()->json($results);
    }
}
