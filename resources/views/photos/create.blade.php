@extends('layouts.app')

@section('htmlheader_title')
	Data Members
@endsection

@section('content')
	<h3>Upload Photo To Album{{$album_id}}</h3>
	{!!Form::open(['action' => 'PhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
	{{-- {{Form::text('title','',['placeholder' => 'Photo Title'])}}
	{{Form::textarea('description','',['placeholder' => 'Photo Description'])}} --}}
	{{Form::hidden('album_id', $album_id)}}
	{{Form::file('photo', ['multiple' => 'multiple'])}}
	{{Form::submit('submit' )}}
{!! Form::close() !!}
@endsection