<div class="panel panel-default">
  <div class="panel-heading">
    <div><span class="glyphicon glyphicon-user"></span> <a href="#" style="color: #000000;">
    
    {{ $vendor->metas->where('key', 'name_vendor')->first()['value'] }}</a> 
    </div>
  </div>
  <div class="panel-body" align="center">
    <img src="/uploads/avatars/{{ $vendor->avatar }}" align="center" class="img-thumbnail" style="width: 80%">
    
    @if(auth()->check() && Auth::user()->role == "vendor")
        <form enctype="multipart/form-data" action="/vendors/profil" method="POST">
          <label>Update Profil Image</label>
          <input type="file" name="avatar" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-sm btn-primary" name="" value="Upload">
        </form>
    @elseif(auth()->check() && Auth::user()->role == "member")
    <hr>
        <button type="button" class="btn btn-send" data-toggle="modal" data-target="#ModalInbox" data-whatever="@mdo"> <i class="fa fa-envelope" aria-hidden="true"></i> Tanya Vendor</button>
    @endif 

    <hr>
    <p>Dans Production</p> 
             
    
    
    <div class="modal fade" id="ModalInbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="POST" action="{{ route('member.sendmessage') }}">
        <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
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


    
    <a href="#"><i class="fa fa-laptop" aria-hidden="true"></i> www.dans.production.com</a><br>
    <a href="#"><i class="fa fa-at" aria-hidden="true"></i> dans.production@gmail.com</a><br>               
    <h5>Media Sosial</h5>
    <a href="#"><i class="fa fa-facebook" style="font-size: 20px"> | </i></a>
    <a href="#"><i class="fa fa-youtube" style="font-size: 20px"> | </i></a>
    <a href="#"><i class="fa fa-google-plus" style="font-size: 20px"> | </i></a>

  </div>
</div>
