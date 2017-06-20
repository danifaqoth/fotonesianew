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

  <br><br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            @include('inc/profile_vendor_box')
          </div>

          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel">
                <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active tab-vendor"><a href="#portofolio" aria-controls="portofolio" role="tab" data-toggle="tab">Portofolio</a></li>
                    <li role="presentation" class="tab-vendor"><a href="#daftar-harga" aria-controls="daftar-harga" role="tab" data-toggle="tab">Daftar Harga</a></li>
                    <li role="presentation" class="tab-vendor"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Info/ulasan</a></li>
                    <li role="presentation" class="tab-vendor"><a href="#tentang-kami" aria-controls="tentang-kami" role="tab" data-toggle="tab">Tentang Kami</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="portofolio"><br>
                      <div class="row">
                        <div class="col-md-9 col-md-offset-1">
                          
                          <h3 class="text-center">Create Album</h3>
                          {!!Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!} <br>
                          {{ Form::text('name','',['placeholder' => 'Album Name', 'class' => 'form-control']) }} <br>
                          {{ Form::textarea('description','',['placeholder' => 'Album Description', 'class' => 'form-control'])}} <br>
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
                    <div role="tabpanel" class="tab-pane fade " id="daftar-harga">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Paket A
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in lectus vitae ipsum accumsan euismod. Sed justo nulla, luctus in odio non, pretium egestas purus. 
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Paket B
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in lectus vitae ipsum accumsan euismod. Sed justo nulla, luctus in odio non, pretium egestas purus.
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Paket C
                              </a>
                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in lectus vitae ipsum accumsan euismod. Sed justo nulla, luctus in odio non, pretium egestas purus.
                            </div>
                          </div>
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
      <footer>
          <div class="footer" id="footer">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                          <h3> Contact </h3>
                          <ul>
                              <li> <a href="#">www.fotonesia.com</a> </li>
                              <li> <a href="#">IG :@fotonesia</a> </li>
                           </ul>
                      </div>
                      <div class="col-md-4 col">
                          <h3> Location </h3>
                          <ul>
                              <li> <a href="#"> Jl. semolowaru Utara Gg. 1 No. 51 </a> </li>
                              <li> <a href="#"> Surabaya</a> </li>
                          </ul>
                      </div>
                  </div>
                  <!--/.row-->
              </div>
              <!--/.container-->
          </div>
          <!--/.footer-->

          <div class="footer-bottom">
              <div class="container">
                  <p class="pull-left"> Copyright © 2017, Fotonesia. All rights reserved.</p>
                  <div class="pull-right">
                      <ul class="nav nav-pills payments">
                          <li><img src="/image/logo/fotonesia.png" alt="" style="width: 80%"></li>
                      </ul>
                  </div>
              </div>
          </div>
          <!--/.footer-bottom-->
      </footer>
    </section>  
@endsection