@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
<img src="image/logo/fotonesia5.png" alt="" class="center-block" style="margin: 60px auto" >
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div>

                  <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#member-tab" aria-controls="member-tab" role="tab" data-toggle="tab">Member</a>
                    </li>

                    <li role="presentation">
                        <a href="#vendor-tab" aria-controls="vendor-tab" role="tab" data-toggle="tab">Vendor</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="member-tab">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register.member') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('first-name') ? ' has-error' : '' }}">
                                    <label for="first-name" class="col-md-4 control-label">First Name</label>

                                    <div class="col-md-6">
                                        <input id="first-name" type="text" class="form-control" name="first_name" value="{{ old('first-name') }}" required autofocus>

                                        @if ($errors->has('first-name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first-name') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last-name') ? ' has-error' : '' }}">
                                    <label for="last-name" class="col-md-4 control-label">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last-name" type="text" class="form-control" name="last_name" value="{{ old('last-name') }}" required autofocus>

                                        @if ($errors->has('last-name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last-name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                        <hr>
                                        <a class="btn btn-link" href="login">I have already membership</a>
                                    </div>
                                </div>

                            </form>
                        </div>    
                    </div>

                    {{-- Register Vendor --}}

                    <div role="tabpanel" class="tab-pane" id="vendor-tab">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="panel-body">


                                <form class="form-horizontal" role="form" method="POST" action="{{ route('register.vendor') }}">
                                    {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('first-name') ? ' has-error' : '' }}">
                                    <label for="first-name" class="col-md-4 control-label">First Name</label>

                                    <div class="col-md-6">
                                        <input id="first-name" type="text" class="form-control" name="first_name" value="{{ old('first-name') }}" required autofocus>

                                        @if ($errors->has('first-name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first-name') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last-name') ? ' has-error' : '' }}">
                                    <label for="last-name" class="col-md-4 control-label">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last-name" type="text" class="form-control" name="last_name" value="{{ old('last-name') }}" required autofocus>

                                        @if ($errors->has('last-name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last-name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="form-group{{ $errors->has('name-vendor') ? ' has-error' : '' }}">
                                        <label for="name-vendor" class="col-md-4 control-label">Nama Vendor</label>

                                        <div class="col-md-6">
                                            <input id="name-vendor" type="text" class="form-control" name="metas[name_vendor]" value="{{ old('metas[name_vendor]') }}" required autofocus>

                                            @if ($errors->has('name-vendor'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name-vendor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('kategori-foto') ? ' has-error' : '' }}">
                                        <label for="Kategori" class="col-md-4 control-label">Kategori</label>
                                        <div class="col-md-6">
                                          <select class="form-control" name="category_id" 
                                          value="{{ old('category_id') }}" >
                                            <option> Kategori Foto</option>
                                            <option value="1">Wedding/Prewedding</option>
                                            <option value="2">Produk/Iklan</option>
                                            <option value="3">Company Profil</option>
                                            <option value="4">Event</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('kota-vendor') ? ' has-error' : '' }}">
                                        <label for="kota-vendor" class="col-md-4 control-label">Kota</label>

                                        <div class="col-md-6">

                                            <select class="form-control" value="{{ old('metas[kota]') }}" name="metas[kota]">
                                              <option>Pilih Kota</option>
                                              <option>Surabaya</option>
                                              <option>Jakarta</option>
                                              <option>Jogja</option>
                                              <option>Bandung</option>
                                            </select>

                                            @if ($errors->has('metas[kota]'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('metas[kota]') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>    
                        </div>   
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

</body>

@endsection
