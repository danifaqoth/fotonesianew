@extends('master')

@section('foot')
<!-- Script Tab-vendor -->
<script>
  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
    $('#myTabs a[href="#vendorpilihan"]').tab('show') // Select tab by name
    $('#myTabs a:first').tab('show') // Select first tab
    $('#myTabs a:last').tab('show') // Select last tab
    $('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)

  </script> 
  <!-- End Script Tab-Vendor -->
  @endsection

  @section('content')

  @include('inc.messages')

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
                  <li role="presentation" class="active tab-vendor"><a href="#portofolio" aria-controls="portofolio" role="tab" data-toggle="tab">Portofolio</a></li>
                  <li role="presentation" class="tab-vendor"><a href="#daftar-harga" aria-controls="daftar-harga" role="tab" data-toggle="tab">Daftar Harga</a></li>
                  <li role="presentation" class="tab-vendor"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Review</a></li>
                  <li role="presentation" class="tab-vendor"><a href="#tentang-kami" aria-controls="tentang-kami" role="tab" data-toggle="tab">Tentang Kami</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                  <div role="tabpanel" class="tab-pane fade in active" id="portofolio">
                    <br>
                    @if(auth()->check() && Auth::user()->role == "vendor")
                    <div class="row col-md-12 col-md-offset-5">
                      <a href="/vendors/album" class="btn btn-send">Create Album</a>
                    </div>
                    <br><hr>   
                    @endif 
                    @foreach ($albums as $album)
                    <div class="col-md-4 col-album">
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
                                {{-- <img src="/storage/album_covers/{{ $album->cover_image }}" 
                                    alt="" 
                                    class="porto-vendor img-thumbnail"
                                    /> --}}
                                  </div>
                                  @endforeach

                                </div>

                                <div role="tabpanel" class="tab-pane fade " id="daftar-harga">
                                  <div class="inbox-body row col-md-offset-5">
                                   @if(auth()->check() && Auth::user()->role == "vendor")
                                   <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-send ">
                                    Edit Harga
                                  </a>
                                  @endif 
                                  <!-- Modal -->
                                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title ">Edit Harga</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form role="form" class="form-horizontal" action="{{ route('vendor.harga') }}" >
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                              <label class="col-lg-3 control-label">Nama Paket</label>
                                              <div class="col-lg-9">
                                                <input type="text" placeholder="" id="inputPassword1" class="form-control" name="nama_paket">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-lg-3 control-label">Harga Paket</label>
                                              <div class="col-lg-8">
                                                <div class="form-group">
                                                  <label class="sr-only" for="exampleInputAmount">Harga
                                                  </label>
                                                  <div class="input-group" style="margin-left: 16px">
                                                    <div class="input-group-addon" 
                                                    >Rp</div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Harga" name="harga_paket">
                                                    <div class="input-group-addon" >,00</div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-lg-3 control-label">Deskripsi Paket</label>
                                              <div class="col-lg-9">
                                                <textarea rows="10" cols="30" class="form-control" id="" name="deskripsi_paket"></textarea>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-send" type="submit">Submit</button>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                  </div><!-- /.modal -->
                                </div>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                  @foreach ($hargas as $harga)
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $harga->id }}" aria-expanded="true" aria-controls="collapseOne">
                                          <p>{{ $harga->nama_paket }} - <strong> Rp. {{ $harga->harga_paket }} </strong></p>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseOne{{ $harga->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        <p> {{ $harga->deskripsi_paket }} </p>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach


                                </div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade " id="info">

                                <div class="inbox-body row ">
                                  <form role="form" class="form-horizontal" action="{{ route('vendor.review') }}" >
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                      <div class="col-md-9 col-md-offset-1">
                                        <textarea rows="3" cols="10" class="form-control" id="" name="content" placeholder="Review Vendor Ini"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-offset-5 col-lg-10">
                                        <button class="btn btn-send" type="submit">Review</button>
                                      </div>
                                    </div>
                                  </form>

                                  @foreach ($reviews as $review)
                                  <div class="well well-lg">
                                   <p> {{ $review->content }} </p>
                                 </div>
                                 @endforeach
                                </div>
                              </div><!-- /.modal-content -->

                             

                            

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