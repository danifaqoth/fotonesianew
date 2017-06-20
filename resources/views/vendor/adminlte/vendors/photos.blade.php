@extends('master')


@section('content')
<style type="text/css">
    .foto-del {
        
        z-index: 1;
        right: 523px;
        top: 253px;
    }  
</style>

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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Upload Photo Ke Album {{ $album->name }} </button>
                    <button class="btn btn-xs "> {!!Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete Album', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content" style="width: 65%; margin-left: 20%">
                                <div class="modal-body">
                                    <br>
                                  {!!Form::open(['url' => route('photo.store'),'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                                  {{Form::hidden('album_id', $album->id)}}
                                  {{Form::file('photo', ['multiple' => 'multiple'])}} <br>
                                  {{Form::submit('submit', ['class' => 'btn btn-primary'] )}}
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        </a><hr>
                                        <a href="" class="fa fa-thumbs-o-up fa-3x" aria-hidden="true"></a>
                                        <a href="" class="fa fa-thumbs-up fa-3x" aria-hidden="true"></a>
                                        
                                            {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete Photo', ['class' => 'btn btn-danger foto-del' ])}}
                                            {!!Form::close()!!}
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