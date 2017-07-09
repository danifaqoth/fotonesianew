<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Photo;
use App\Like;
use Validator;
use Response;
use Redirect;
use Session;
use Auth;

	


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
			'photo' => 'image|max:7000'	
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

			return redirect()->route('vendor.photos', $photo->album_id)->with('success', 'Photo Deletes');
		}
	}
	public function likePhoto(Request $request)
	{
		$photo_id = $request['photoId'];
		$is_like = $request['isLike'] === 'true';
		$update = false;
		$photo = Photo::find($photo_id);

		if (!$photo) {
			return null;
		}

		$user = Auth::user();
		$like = $user->likes()->where('photo_id', $photo_id)->first();

		if ($like) {
			$already_like = $like->like;
			$update = true;
			if ($already_like == $is_like) {
				$like->delete();
				return null;
			}
		} else {
			$like = new Like();
		}

		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->photo_id = $photo->id;



		if ($update) {
			$like->update();
			// return response()->json('b');

		}else {
			$like->save();
			// return response()->json('a');
		}

		// if ($is_like)
		// 	return response()->json('1');
		// else
		// 	return response()->json('0');
		// return $is_like ?  : ;
			// return response()->json($is_like);

		return null;


	}
	// public function likeCount()
	// {
	// 	$count = Like::join('photos', 'likes.photo_id', '=', 'photos.id')
	// 				->select('*', 'count(photo_id) as maks')
	// 				->groupBy('photo_id')
	// 				->get();

		
	// }
    
}
