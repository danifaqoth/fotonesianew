@extends('adminlte::layouts.app')

@section('htmlheader_title')
Data Members
@endsection


@section('main-content') 
<h1>Data Member</h1>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><span class="text-danger">{{ $members->count() }}</span> Data Members</h3>

				<div class="box-tools">
					
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>	
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Waktu Daftar</th>
						<th>Kelola </th>
						<th></th>
					</thead>

					<tbody>	
						@foreach ($members as $key => $member)
						<tr>
							<td>{{ $key++ +1 }}</td>
							<td>{{ $member->first_name }}</td>
							<td>{{ $member->last_name }}</td>
							<td>{{ $member->email }}</td>
							<td>{{ $member->created_at->diffForHumans() }}</td>
							<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$member->id}}">Edit</button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$member->id}}" >Hapus</button></td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

{{-- Modal Tambah --}}
@foreach ($members as $member)
<div class="modal fade" id="modalEdit{{$member->id}}" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" role="form" method="POST" action="{{route('member.update', 
			$member->id) }}">
				{{ csrf_field() }}
				<div class="modal-header btn-info">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">

					<div class="form-group{{ $errors->has('first-name') ? ' has-error' : '' }}">
						<label for="first-name" class="col-md-4 control-label">First Name</label>

						<div class="col-md-6">
							<input id="first-name" type="text" class="form-control" name="first_name" value="{{$member->first_name}}" required autofocus>

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
							<input id="last-name" type="text" class="form-control" name="last_name" 
							value="{{$member->last_name}}" required autofocus>

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
							<input id="email" type="email" class="form-control" name="email" 
							value="{{$member->email}}" required>

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
							<input id="password" type="password" class="form-control" name="password">

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
					</div>

					{{-- <div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
						</div>
					</div> --}}



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->							
@endforeach

{{-- Modal Delete --}}

@foreach ($members as $member)
<div class="modal fade" id="modalDelete{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="form-horizontal" action="{{ route('member.destroy',$member->id )}}" method="POST" role="form">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('DELETE') }}

      <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body btn-danger">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
      <div class="modal-footer center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection
