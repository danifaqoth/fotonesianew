<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function getVendorMessages()
    {
        $messages = Message::select('users.email AS nama', 'messages.vendor_id AS vendor_id', 'messages.member_id AS member_id', 'messages.content AS content', 'messages.id AS message_id', 'messages.created_at AS created_at')
            ->join('users', 'users.id', '=', 'messages.member_id')
            ->where('vendor_id', auth()->user()->id)
            ->groupBy('users.id')
            ->orderBy('messages.created_at', 'desc')
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

    public function readMessageVendor($member_id)
    {
        $messages = Message::join('users', 'users.id', '=', 'messages.member_id')
            ->where('vendor_id', auth()->user()->id)
            ->where('member_id', $member_id)
            ->orderBy('messages.created_at', 'asc')
            ->get();

        // dd($messages);

        $data = [
            'messages' => $messages,
        ];

        return view("adminlte::vendors.read_message", $data);
    }

    

    public function getMemberMessages()
    {
        $messages = Message::select('users.email AS nama', 'messages.vendor_id AS vendor_id', 'messages.member_id AS member_id', 'messages.content AS content', 'messages.id AS message_id', 'messages.created_at AS created_at')
            ->join('users', 'users.id', '=', 'messages.vendor_id')
            ->where('member_id', auth()->user()->id)
            ->groupBy('users.id')
            ->orderBy('messages.created_at', 'desc')
            ->get();
        // dd($messages);
        // echo auth()->user()->metas->where('key', 'name_vendor')->first();
        // die();

        $data = [
            'messages' => $messages
        ];

        return view("vendor.adminlte.members.message", $data);
    }

    

    public function readMessageMember($vendor_id)
    {
       $messages = Message::join('users', 'users.id', '=', 'messages.vendor_id')
            ->where('member_id', auth()->user()->id)
            ->where('vendor_id', $vendor_id)
            ->orderBy('messages.created_at', 'asc')
            ->get();

        // dd($messages);

        $data = [
            'messages' => $messages,
        ];

        return view("adminlte::members.read_message", $data);


    }
}	
