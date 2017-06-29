<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use App\Album;


class AlbumsController extends Controller
{
    public function index()
    {
    	$albums = Album::with('Photos')->get();
    	return view('albums.index')->with('albums', $albums) ;
    }

    public function create()
    {
    	return view('albums.create');
    }
    
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required',
			// 'user_id' => 'required|numeric',
			'category_id' => 'required|numeric',
			'cover_image' => 'image|max:7000'	
		]);

		// Get filename with extension
		$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

		//Get Just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		//Get Extension
		$extension = $request->file('cover_image')->getClientOriginalExtension();

		//Create new filename
		$filenameToStore = $filename.'_'.time().'.'.$extension;

		//Upload Image
		$path= $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

		$album = new Album;
		$album->name = $request->input('name');
		$album->user_id = auth()->user()->id;
		$album->category_id = $request->category_id;
		$album->description = $request->input('description');
		$album->cover_image = $filenameToStore;

		$album->save();

		return redirect('vendors/profil')->with('succes', 'Album Created');
    }

    public function show($id)
    {
    	$album = Album::with('Photos')->find($id);
    	return view('albums.show')->with('album', $album);
    }

    public function destroy($id)
	{
		$album = Album::find($id);

		if(Storage::delete('public/album_covers/'.$album->cover_image)){
			$album->delete();

			return redirect('vendors/profil')->with('success', 'Album Deletes');
		}
	}
}
