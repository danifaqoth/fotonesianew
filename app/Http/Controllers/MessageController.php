<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function getVendorMessages()
    {
        $messages = Message::where('vendor_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'messages' => $messages
        ];

        return view("vendor.adminlte.vendors.message", $data);
    }

    public function sendMessageMember(Request $request)
    {
        $request['member_id'] = auth()->user()->id;
    	$message = Message::create($request->all());

    	return redirect()->back()->with('success' , 'Pesan Terkirim');
    }

    public function sendMessageVendor(Request $request)
    {
        $request['vendor_id'] = auth()->user()->id;
        $message = Message::create($request->all());

        return redirect()->back()->with('success' , 'Pesan Terkirim');
    }

    public function readMessageVendor($id)
    {
        $message = new Message();
        $messages = $message->where('vendor_id', auth()->user()->id)->get();
        $message = $message->where('vendor_id', auth()->user()->id)->find($id);

        $data = [
            'messages' => $messages,
            'message' => $message,
            'member' => $message->member
        ];

        return view("adminlte::vendors.read_message", $data);
    }
}	
