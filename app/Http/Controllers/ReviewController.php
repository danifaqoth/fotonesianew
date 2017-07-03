<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index()
    {
    	$reviews = Review::with('vendor')->get();
    	$data = ['reviews' => $reviews ];
    	return view('reviews.index', $data);
    }

    public function store(Request $request)
    {
    	$request['user_id']=auth()->user()->id;

    	$this->validate($request, [
			'user_id' => 'required|numeric',
			'content' => 'required',
		]);

		Review::create($request->all());

		return redirect()->back()->withSuccess('Review Telah di Tambah');
    }
}
