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
          @include('inc/profile_member_box')
        </div>
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel">
              <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active tab-member"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Vendor Pilihan</a></li>
                  <li role="presentation" class="tab-member"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Review</a></li>
                  <li role="presentation" class="tab-member"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                  <li role="presentation" class="tab-member"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Kontak</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="vendorpilihan">...</div>
                  <div role="tabpanel" class="tab-pane fade " id="review">...</div>
                  <div role="tabpanel" class="tab-pane fade " id="messages">...</div>
                  <div role="tabpanel" class="tab-pane fade " id="kontak">...</div>
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

@endsection