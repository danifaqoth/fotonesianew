<?php

namespace App\Http\Controllers;

use App\Album;
use App\User;
use App\Usermeta;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;


class VendorController extends Controller
{
    public function index()
    {
    	$vendors = User::where('role', 'vendor')
    			->with('metas')
    			->orderBy('created_at', 'desc')
    			->get();

    	$data = [
    		'vendors' => $vendors
    	];

    	return view("adminlte::vendors.index", $data);
    }

    public function update(Request $request, $id)       
    {
        if(empty($request->password))
        {
            // dd($id);
            $vendors = \App\User::find($id);           
            $vendors->email = $request->email;
            $vendors->save();

            $nama = Usermeta::where('key', 'name_vendor')
                            ->where('user_id', $id)
                            ->first();
            $nama->value = $request->nama;
            $nama->save();

            $kota = Usermeta::where('key', 'kota')
                            ->where('user_id', $id)
                            ->first();
            $kota->value = $request->kota;
            $kota->save();
        }
        else
        {
            $vendors = \App\User::find($id);
            $vendors->email = $request->email;
            $vendors->password = bcrypt($request->password);
            $vendors->save();

            $nama = Usermeta::where('key', 'name_vendor')
                            ->where('user_id', $id)
                            ->first();
            $nama->value = $request->nama;
            $nama->save();

            $kota = Usermeta::where('key', 'kota')
                            ->where('user_id', $id)
                            ->first();
            $kota->value = $request->kota;
            $kota->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $vendors = \App\User::find($id);

        $vendors->delete();

        return redirect()->back();
        //
    }

    public function profil()
    {
        $user = auth()->user();
        $albums = Album::where('user_id', $user->id)->with('photos')->get();
        $review = Review::where('vendor_id', $user->id)->get();

        $data = [
            'albums' => $albums,
            'vendor' => $user,
            'hargas' => $user->hargas,
            'reviews' => $review,
        ];

    	return view("adminlte::vendors.profil", $data);
    }

    public function album()
    {
       $user = auth()->user();
       $albums = Album::where('user_id', $user->id)->with('photos')->get();

       $data = [
       'albums' => $albums,
       'vendor' => $user
       ];
        return view("vendor.adminlte.vendors.album", $data);
    }

    public function harga()
    {
        // $user = vendor;
        return view("vendor.adminlte.vendors.harga");
    }

    // public function review()
    // {
    //     // $user = vendor;
    //     return view("vendor.adminlte.vendors.harga");
    // }

    public function getPhotos($album_id)
    {
        $album = Album::with('photos')->find($album_id);
        $user = $album->vendor;

        $data = [
            'photos' => $album->photos, 
            'album' => $album,
            'vendor' => $user,
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
            Image::make($avatar)->resize(360, 390)->save( public_path('/uploads/avatars/' .$filename));

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

        $queries = Usermeta::join('users', 'users.id', '=', 'usermetas.user_id')
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

    public function search(Request $request)
    {
        $vendors = User::where('role', 'vendor')
            ->with('metas')
            ->orderBy('created_at', 'desc');

//      FILTER
//      lokasi 
        if ($lokasi = $request->lokasi) {
            $vendors = $vendors->where(function ($query) use ($lokasi) {
                $query->whereHas('metas', function ($q) use ($lokasi) {
                    $q->where('key', 'kota')->where('value', 'LIKE', "%$lokasi%");
                });
            });
        }
//      category
        if ($category = $request->category) {
            $vendors = $vendors->where(function ($query) use ($category) {
                $query->whereHas('albums', function ($album) use ($category) {
                    $album->whereHas('category', function ($q) use ($category) {
                        $q->where('slug', 'LIKE', "%$category%");
                    });
                });
            });
        } 
//      harga
        if ($harga = $request->harga) {
            $vendors = $vendors->where(function ($query) use ($harga) {
                $query->whereHas('hargas', function ($h) use ($harga) {
                    $realHarga = substr($harga, 1);
                    $operator = str_replace($realHarga, '', $harga);
                    $h->where('harga_paket', $operator, $realHarga);
                });
            });
        } 


        $vendors = $vendors->get();

        $data = [
            'vendors' => $vendors
        ];


        return view("adminlte::vendors.search", $data);
    }
}
