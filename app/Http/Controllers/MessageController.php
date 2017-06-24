<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
    	
    	$message = new Message;
    	// $message->user_id = auth()->user()->id;
    	$message->subject = $request->input('subject');
    	$message->content = $request->input('content');

    	$message->save();

    	return redirect('vendors/profil')->with('succes' , 'Pesan Terkirim');
    }
}	
