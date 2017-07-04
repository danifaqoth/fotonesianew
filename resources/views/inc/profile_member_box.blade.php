<div class="panel panel-default">
  <div class="panel-heading">
    <div><span class="glyphicon glyphicon-user"></span>
      {{ !empty(auth()->user()->first_name)
                ? auth()->user()->first_name
                : auth()->user()->metas->where('key', 'name_vendor')->first()['value'] }}
    </div>
  </div>
  <div class="panel-body" align="center">
  <img src="/uploads/avatars/{{ $user->avatar }}" align="center" class="img-thumbnail" style="width: 80%;  ">
  <form enctype="multipart/form-data" action="/members/profil" method="POST">
    <label>Update Profil Image</label>
    <input type="file" name="avatar">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-sm btn-primary" name="" value="Upload">
  </form>
<hr>

   {{--  <p>Dans Production</p> 
           
    <a href="#"><i class="fa fa-laptop" aria-hidden="true"></i> www.dans.production.com</a><br>
    <a href="#"><i class="fa fa-at" aria-hidden="true"></i> dans.production@gmail.com</a><br>               
    <h5>Media Sosial</h5>
    <a href="#"><i class="fa fa-facebook" style="font-size: 20px"> | </i></a>
    <a href="#"><i class="fa fa-youtube" style="font-size: 20px"> | </i></a>
    <a href="#"><i class="fa fa-google-plus" style="font-size: 20px"> | </i></a> --}}
  </div>
</div>