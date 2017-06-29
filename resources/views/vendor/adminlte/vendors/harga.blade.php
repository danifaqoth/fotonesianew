@extends('master')

@section('foot')

@endsection

@section('content')

<br><br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            @include('inc/profile_vendor_box')
          </div>

          <div class="col-md-9">
            <div class="panel panel-default panel-profil">
              <div class="panel">
                <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="tab-vendor"><a href="#portofolio" aria-controls="portofolio" role="tab" data-toggle="tab">Portofolio</a></li>
                    <li role="presentation" class="active tab-vendor"><a href="#daftar-harga" aria-controls="daftar-harga" role="tab" data-toggle="tab">Daftar Harga</a></li>
                    <li role="presentation" class="tab-vendor"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Info/ulasan</a></li>
                    <li role="presentation" class="tab-vendor"><a href="#tentang-kami" aria-controls="tentang-kami" role="tab" data-toggle="tab">Tentang Kami</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade" id="portofolio">
                    <br>
                    <div class="row col-md-12 col-md-offset-5">
                      <a href="/vendors/album" class="btn btn-primary">Create Album</a>
                    </div>
                    <br><hr>    
                        {{-- @foreach ($albums as $album)
                            <div class="col-md-4 col-fav">
                                <a href="{{ route('vendor.photos', $album->id) }}">
                                    <div style="background-image: url('/storage/album_covers/{{ $album->cover_image }}')" class="porto-vendor"></div>
                                </a>
                                <div class="portfolio-box-caption">
                                  <div class="portfolio-box-caption-content">
                                    <div class="nama_album">
                                      <h5 class="text-center" style="color: black"><strong>{{ $album->name }}</strong></h5>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        @endforeach --}}
                        
                    </div>

                     
                    
                   

                    <div role="tabpanel" class="tab-pane fade in active " id="daftar-harga">

                    <div class="row col-md-12 col-md-offset-5">
                      <a href="/vendors/harga" class="btn btn-primary">Edit Harga</a>
                    </div>
                    <hr><hr>

                     <div class="row">
                        <div class="col-md-7 col-md-offset-2">
                          
                          {!!Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!} <br>
                          {{ Form::text('name','',['placeholder' => 'Nama Paket', 'class' => 'form-control']) }} <br>
                          {{ Form::textarea('description','',['placeholder' => 'Deskripsi', 'class' => 'form-control'])}} <br>
                          <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="category_id">
                                              <option >Kategori Foto</option>
                                              <option value="1">Wedding/Prewedding</option>
                                              <option value="2">Produk/Iklan</option>
                                              <option value="3">Company Profil</option>
                                              <option value="4">Event</option>
                                            </select>
                                        </div>
                                    </div> <br>
                          {{ Form::file('cover_image') }} <br>
                          {{ Form::submit('submit',['class' => 'btn btn-primary']) }} &nbsp;
                          <a href="{{ route('vendor.profil') }}" class="btn btn-default ">
                            Cancel
                          </a>
                          {!! Form::close() !!}
                        </div>
                      </div>

                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="info">...</div>
                    <div role="tabpanel" class="tab-pane fade " id="tentang-kami">...</div>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <section>
      
    </section>  
@endsection