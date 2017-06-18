@extends('master')

@section('content')
<br><br>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('inc/profile_vendor_box')
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <a href="{{ route('vendor.profil') }}" class="btn btn-default">
                        <i class="fa fa-angle-left"></i> Back
                    </a>
                    <h3>Upload Photo To Album {{ $album_id }}</h3>
                    {!!Form::open(['url' => route('photo.store'),'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                    {{Form::hidden('album_id', $album_id)}}
                    {{Form::file('photo', ['multiple' => 'multiple'])}} <br>
                    {{Form::submit('submit', ['class' => 'btn btn-primary'] )}}
                    {!! Form::close() !!}
                    
                </div>

                <div class="photos-wrapper">
                @if (!$photos->isEmpty())
                    @foreach ($photos as $photo)
                        <div class="panel panel-default">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-12 col-fav">
                                        <a href="">
                                            <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" 
                                                class="img-responsive"/>
                                        </a>
                                        <span class="glyphicon glyphicon-thumbs-up"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger">Tidak ditemukan foto apapun!.</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>

      @endsection