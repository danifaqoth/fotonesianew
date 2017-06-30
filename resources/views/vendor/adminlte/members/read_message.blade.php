@extends('master')

@section('content')

<div style="margin: 20px"></div>
<div class="container">
  <div class="mail-box">
    @include('inc.menu_message_box')
    <aside class="lg-side">
      <div class="panel panel-default panel-read">
        <div class="panel-body">
          <strong>INBOX</strong>
        </div><hr>
        <div class="Pengirim-message" style="margin: 0 10px">
          <h5>Message From : <strong>Alhamdani</strong> </h5>          
        </div><hr>
        <div style="margin: 0 10px">
          <p>
            ini adalah pesan brooo. hahahahha
          </p>
        </div>
      </div>
      
    </aside>
</div>
</div>

<div style="margin: 20px"></div>
@endsection