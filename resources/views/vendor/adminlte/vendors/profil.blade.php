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
                                          {{ $harga->nama_paket }} - <strong> Rp. {{ $harga->harga_paket }} </strong>
                                        </a>


                                        <form method="POST" class="form-booking" action="{{ route('member.sendbooking') }}">
                                          <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                          {{ csrf_field() }}
                                          <div class="button-booking">
                                            <div class="form-group" style="display: none;">
                                              <label for="recipient-name" class="col-lg-2 control-label">Subject:</label>
                                              <div class="col-lg-10">
                                                <input type="text" class="form-control" id="recipient-name" value="-" name="subject">
                                                <input type="text" class="form-control" id="member_sender" value="1" name="member_sender">
                                                <input type="text" class="form-control" id="vendor_sender" value="0" name="vendor_sender">
                                              </div>


                                              <div class="form-group">
                                                <label for="message-text" class="col-lg-2 control-label">Message:</label>
                                                <div class="col-lg-10">
                                                  <textarea class="form-control" id="message-text" rows="10" name="content">
                                                    Halo, saya ingin memesan {{ $harga->nama_paket }}
                                                  </textarea>
                                                </div>
                                              </div>
                                              <br><br><br>
                                            </div>
                                            <button type="submit" class="btn btn-send">Booking</button>
                                          </div>
                                        </form>

                                      </h4>
                                    </div>
                                    <div id="collapseOne{{ $harga->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        <?php $deskripsi = explode(PHP_EOL, $harga->deskripsi_paket); ?>
                                        @for($i=0; $i < count($deskripsi); $i++)
                                        <p><?php echo $deskripsi[$i]; ?><p>
                                          @endfor
                                        </div>
                                      </div>
                                    </div>

                                    

                                    @endforeach


                                  </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="info">
                                  <div class="inbox-body row ">
                                  @if(auth()->check() && Auth::user()->role == "member")
                                    <form method="POST" action="{{ route('member.review') }}">
                                      <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                      {{ csrf_field() }}
                                      <div class="text-review">
                                        <div class="form-group">
                                          <div class="col-lg-offset-1 col-lg-9">
                                            <textarea class="form-control" id="message-text" rows="5" name="content"></textarea>
                                          </div>
                                        </div>
                                      </div>
                                        <button type="submit" class="btn btn-send button-review">Review</button>
                                    </form>
                                  @endif

                                    <br><br><br>
                                  @foreach ($reviews as $review)
                                    <div class="well well-lg">
                                     <p> {{ $review->content }} </p>
                                     <h6 class="text-right text-capitalize"> <strong>{{ $review->member->first_name }} {{ $review->member->last_name }}</strong></h6>
                                   </div>
                                  @endforeach
                                 </div>
                               </div><!-- /.modal-content -->
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