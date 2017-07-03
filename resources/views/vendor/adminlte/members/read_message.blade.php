@extends('master')

@section('content')

<div style="margin: 20px"></div>
<div class="container">
  <div class="mail-box">
    @include('inc.menu_message_box')
    <aside class="lg-side">
      <div class="panel panel-default panel-read">
        <div class="panel-body">
          <strong>{{ $message->subject }}</strong>
        </div><hr>
        <div class="Pengirim-message" style="margin: 0 10px">
          <h5>Message From : <strong>{{ $metas->where('key', 'name_vendor')->first()['value'] }}</strong> </h5>          
        </div><hr>
        <div class="isi-message" style="margin: 0 10px">
        <blockquote>
          <p> {{ $message->content }} </p>
        </blockquote>
        </div>
        <hr>

        <div>
          <button type="button" class="btn btn-send pull-right btn-reply" data-toggle="modal" data-target="#ModalReply" data-whatever="@mdo"><i class="fa fa-reply" aria-hidden="true"></i>  Reply</button>
        </div>

        <div class="modal fade" id="ModalReply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="POST" action="{{ route('vendor.sendmessage') }}">
                <input type="hidden" name="member_id" value="{{ $member->id }}">
                {{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">INBOX</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-lg-2 control-label">Subject:</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="recipient-name" name="subject">
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label for="message-text" class="col-lg-2 control-label">Message:</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" id="message-text" rows="10" name="content"></textarea>
                    </div>
                  </div>
                  <br><br><br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn " data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-send">Send message</button>
                </div>
              </form>
            </div>
          </div>
        </div>  

      </div>
      
    </aside>
</div>
</div>

<div style="margin: 20px"></div>
@endsection