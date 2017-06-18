<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Photo;
use Validator;
use Response;
use Redirect;
use Session;




class PhotosController extends Controller
{
    public function create($album_id)
    {
    	return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
			// 'title' => 'required',
			'photo' => 'image|max:1999'	
		]);

		// Get filename with extension
		$filenameWithExt = $request->file('photo')->getClientOriginalName();

		//Get Just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		//Get Extension
		$extension = $request->file('photo')->getClientOriginalExtension();

		//Create new filename
		$filenameToStore = $filename.'_'.time().'.'.$extension;

		//Upload Image
		$path= $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);


		//upload Photo
		$photo = new Photo;
		$photo->album_id = $request->input('album_id');
		$photo->photo = $filenameToStore;
		$photo->title = '';
		$photo->size = $request->file('photo')->getClientSize();
		$photo->description = '';

		$photo->save();

		return redirect()->route('vendor.photos', $photo->album_id)->with('success', 'Photo Uploaded');
		// {{ $photo->album_id }}/{{ $photo->photo }}
	}

	public function show($id)
	{
		$photo = Photo::find($id);
		return view('photos.show')->with('photo', $photo);
	}

	public function destroy($id)
	{
		$photo = Photo::find($id);

		if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
			$photo->delete();

			return redirect('/albums')->with('success', 'Photo Deletes');
		}
	}
    
}

// class PhotosController extends Controller 
// {
// 	public function index ()
// 	{
// 		return view('albums');
// 	}

// 	 public function create($album_id)
//     {
//     	return view('photos.create')->with('album_id', $album_id);
//     }

// 	public function store(Request $request)
// 	{
// 		//multiple all of the post data
// 		$files = Input::file('photo');
// 		//counting uploaded image 
// 		$file_count = count($files);
// 		//count how many uploaded
// 		$uploadcount = 0;

// 		foreach ($files as $file) {
// 			$rules = array('file' => 'required');
// 			$validator = Validator::make(array('file'=>$file), $rules);
// 			if($validator->passes()){
// 				$destinationPath = 'uploads';
// 				$filename = $file->getClientOriginalName();
// 				$upload_succes = $file->move($destinationPath, $filename);
// 				$uploadcount ++;

// 				$extension = $file->getClientOriginalExtension();
// 				$photo = new Photo();
// 				$photo->album_id = $request->input('album_id');
// 				$photo->photo = $filename;
// 				$photo->title = $request->input('title');
// 				$photo->size = $request->file('photo');
// 				$photo->description = $request->input('description');

// 				$photo->save();


// 				// $entry->mime = $file->getClientMimeType();
// 				// $entry->original_filename = $filename;
// 				// $entry->filename = $file->getFilename().'.'.$extension;
// 				// $entry->save();

// 			}
// 		}

// 		if ($uploadcount == $file_count) {
// 			Session::flash('Succes', 'Upload succesfully');
// 			return Redirect::to('/albums');
// 		} else {
// 			return Redirect::to('/albums')->withInput()->withErrors($validator);
// 		}

// 	}

// 	public function show($id)
// 	{
// 		$photo = Photo::find($id);
// 		return view('photos.show')->with('photo', $photo);
// 	}



// } 