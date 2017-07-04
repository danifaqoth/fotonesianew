@extends('master')

@section('content')

<div style="margin: 20px"></div>
<div class="container">
  <div class="mail-box">
    @include('inc.menu_message_box')
    <aside class="lg-side">
      <div class="panel panel-default panel-read">
        <div class="Pengirim-message" style="margin: 0 10px">
          <h5>Message From : <strong>{{ $messages[0]->email }}</strong> </h5>          
        </div><hr>
        <div class="isi-message" style="margin: 0 10px">
         @foreach($messages as $key => $val)
          @if ($val->member_sender == '0')
            <blockquote class="read_pengirim">
              <p>{{$val->content}}</p>
            </blockquote>
          @else
             <blockquote class="blockquote-reverse read_penerima">
              <p class="text-left">{{$val->content}}</p>
            </blockquote>
          @endif
        @endforeach
        </div>

        <button type="button" class="btn btn-send pull-right btn-reply" data-toggle="modal" data-target="#ModalReply" data-whatever="@mdo"><i class="fa fa-reply" aria-hidden="true">
        </i>Reply</button>

        <div class="modal fade" id="ModalReply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="POST" action="{{ route('member.sendmessage') }}">
                <input type="hidden" name="vendor_id" value="ds">
                {{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">INBOX</h4>
                </div>
                <div class="form-group" style="display: none;">
                <label for="recipient-name" class="col-lg-2 control-label">Subject:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="recipient-name" value="-" name="subject">
                   <input type="text" class="form-control" id="member_sender" value="1" name="member_sender">
                   <input type="text" class="form-control" id="vendor_sender" value="0" name="vendor_sender">
                </div>
              </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="message-text" class="col-lg-2 control-label">Message:</label>
                      <input type="hidden" name="vendor_id" value="{{$messages[0]->vendor_id}}">
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