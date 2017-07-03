<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Harga;

class HargaController extends Controller
{

	public function index()
    {
    	$hargas = Harga::with('vendor')->get();
    	$data = ['hargas' => $hargas ];
    	return view('hargas.index', $data);
    }

    public function store(Request $request)
    {
    	$request['user_id']=auth()->user()->id;

    	$this->validate($request, [
			'user_id' => 'required|numeric',
			'nama_paket' => 'required',
			'harga_paket' => 'required|numeric',
			'deskripsi_paket' => 'required',
		]);

		Harga::create($request->all());

		return redirect()->back()->withSuccess('Harga Telah di Tambah');
    }
}
