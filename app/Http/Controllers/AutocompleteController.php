<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usermeta;
use Illuminate\Http\Response;
// use App\Http\Controllers\Input;

class AutocompleteController extends Controller
{
    public function index()
    {
    	return view('partials.header');
    }

    public function autocomplete(Request $request)
    {
    	
        $term = $request->term;

        $queries = Usermeta::join('users', 'users.id', '=', 'usermetas.user_id')
                        ->where('value', 'like', '%'.$term.'%' )
                        ->take(6)
                        ->get();

     //    $queries = User::where(function($query)
     //    {
    	// 	$query->where('first_name', 'like', '%'.$term.'%' );
    	// })->take(6)->get();

        $results = array();

    	foreach ($queries as $query) 
    	{
    		$results[] = [ 'id' => $query->id, 'avatar' =>$query->avatar, 'value' => $query->value];
    	}

    	return response()->json($results);
    }

    public function profil_vendor($id) 
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
