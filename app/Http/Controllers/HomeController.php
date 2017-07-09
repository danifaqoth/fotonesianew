<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Like;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $count = Like::join('photos', 'likes.photo_id', '=', 'photos.id')
                    ->join('albums', 'photos.album_id', '=', 'albums.id')
                    ->join('usermetas', 'albums.user_id', '=', 'usermetas.user_id')
                    ->select(DB::raw('*, albums.user_id as vendor_id, count(likes.photo_id) as like_count'))
                    ->where('usermetas.key', 'name_vendor')
                    ->groupBy('likes.photo_id')
                    ->orderBy('like_count', 'desc')
                    ->limit(6)
                    ->get();

        // dd($count);

        return view('home', ['photo' => $count]);
    }

    public function dashboard()
    {
        return view('adminlte::home');
    }
}