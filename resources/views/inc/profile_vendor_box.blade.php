<div class="panel panel-default">
  <div class="panel-heading">
    <div><span class="glyphicon glyphicon-user"></span> <a href="#" style="color: #000000;">{{ $user->metas->where('key', 'name_vendor')->first()['value'] }}</a> 
    </div>
  </div>
  <div class="panel-body" align="center">
    <img src="/uploads/avatars/{{ $user->avatar }}" align="center" class="img-thumbnail" style="width: 80%;  ">
    @if($user->role === "vendor")
      <form enctype="multipart/form-data" action="/vendors/profil" method="POST">
        <label>Update Profil Image</label>
        <input type="file" name="avatar" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-sm btn-primary" name="" value="Upload">
      </form>
    @endif
    <br>
    <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#ModalInbox" data-whatever="@mdo"> <i class="fa fa-envelope" aria-hidden="true"></i> Tanya Vendor</button>
    <hr>
    <p>Dans Production</p> 
             
    
    
    <div class="modal fade" id="ModalInbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="POST" action="{{ route('member.sendmessage') }}">
        {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">INBOX</h4>
          </div>
          <div class="modal-body">
              <div class="form-group float left">
                <label for="recipient-name" class="control-label">Subject:</label>
                <input type="text" class="form-control" id="recipient-name" name="subject">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Message:</label>
                <textarea class="form-control" id="message-text" rows="10" name="content"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
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
