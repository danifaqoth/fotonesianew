@extends('master')

@section('content')

    

<div class="container-fluid" style="background-color:#e8e8e8">
<div class="container container-pad" id="property-listings">
    
    <div class="row">
      <div class="col-md-12">
        <h1>Search Result</h1>
        <p>Vendor </p>
      </div>
    </div>
    
    <div class="row">
        @foreach ($vendors as $vendor)
        
        <div class="col-sm-4"> 
            <!-- Begin Listing: 609 W GRAVERS LN-->
            <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                <div class="media">
                    <a class="pull-right" href="javascript:;" target="_parent">
                        <img alt="image" 
                            class="img-responsive img-search" 
                            src="/uploads/avatars/{{ $vendor->avatar }}"
                        />
                    </a>

                    <div class="clearfix visible-sm"></div>

                    <div class="media-body fnt-smaller">
                        <a href="javascript:;" target="_parent"></a>

                        <h4 class="media-heading">
                        

                        @php
                            $name_vendor = '';
                            $lokasi_vendor = '';

                            if (!empty($vendor->metas->where('key', 'name_vendor')->first()->value)) {
                                $name_vendor = $vendor->metas
                                    ->where('key', 'name_vendor')
                                    ->first()
                                    ->value;
                            }

                            if (!empty($vendor->metas->where('key', 'kota')->first()->value)) {
                                $lokasi_vendor = $vendor->metas
                                    ->where('key', 'kota')
                                    ->first()
                                    ->value;
                            }
                        @endphp

                        

                        <a href="{{ route('vendorpublic.profil', $vendor->id) }}" target="_parent">{{ $name_vendor }}<small class="pull-right">{{-- Rp2.000.000 --}}</small></a></h4>

                        <h5>{{ $lokasi_vendor }}</h5>

                       {{--  <p class="hidden-xs">Menerima jasa foto dan video dokumentasi untuk acara pernikahan anda </p> --}}
                    </div>
                </div>
            </div><!-- End Listing-->
        </div>
        @endforeach

        
    </div><!-- End row -->
</div><!-- End container -->
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{--     <script src="js/jquery-3.2.0.min.js"></script>
    Include all compiled plugins (below), or include individual files as needed
    <script src="js/bootstrap.min.js"></script>
 --}}
@endsection
