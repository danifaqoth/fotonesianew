@extends('layouts.app')

@section('content')
	<h3>Create Album</h3>
	{!!Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!} <br>
	{{ Form::text('name','',['placeholder' => 'Album Name']) }} <br>
	{{ Form::textarea('description','',['placeholder' => 'Album Description'])}} <br>
	{{ Form::file('cover_image') }} <br>
	{{ Form::submit('submit') }} <br>
	{!! Form::close() !!}

@endsection