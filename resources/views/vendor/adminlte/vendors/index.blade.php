@extends('adminlte::layouts.app')

@section('htmlheader_title')
Data Vendors
@endsection


@section('main-content') 
<h1>Data vendor</h1>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><span class="text-danger">{{ $vendors->count() }}</span> Data Vendors</h3>

				
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>	
						<th>ID</th>
							{{-- <th>First Name</th>
							<th>Last Name</th> --}}
							<th>Nama Vendor</th>
							<th>Email</th>
							<th>Kota</th>
							<th>Waktu Daftar</th>
							<th>Kelola</th>
						</thead>

						<tbody>	
							@foreach ($vendors as $key => $vendor)
							<tr>
								<td>{{ $key++ + 1 }}</td>
								{{-- <td>{{ $vendor->first_name }}</td>
								<td>{{ $vendor->last_name }}</td> --}}
								<td>{{ $vendor->metas->where('key', 'name_vendor')->first()['value'] }}</td>
								<td>{{ $vendor->email }}</td>
								<td>{{ $vendor->metas->where('key', 'kota')->first()['value'] }}</td>
								<td>{{ $vendor->created_at->diffForHumans() }}</td>
								<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{$vendor->id}}">Edit</button>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$vendor->id}}" >Hapus</button>
								</td>
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
	@foreach ($vendors as $vendor)
	<div class="modal fade" id="modalEdit{{$vendor->id}}" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" role="form" method="POST" action="{{route('vendor.update', 
				$vendor->id) }}">
				{{ csrf_field() }}
				<div class="modal-header btn-info">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Edit</h4>
				</div>

				<div class="modal-body">
					<div class="form-group{{ $errors->has('name-vendor') ? ' has-error' : '' }}">
						<label for="name-vendor" class="col-md-4 control-label">Nama Vendor</label>

						<div class="col-md-6">
							<input id="name-vendor" type="text" class="form-control" name="nama" value="{{ $vendor->metas->where('key', 'name_vendor')->first()['value'] }}" required autofocus>

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
							<input id="email" type="email" class="form-control" name="email" 
							value="{{ $vendor->email }}" required>

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

					<div class="form-group{{ $errors->has('kota-vendor') ? ' has-error' : '' }}">
						<label for="kota-vendor" class="col-md-4 control-label">Kota</label>

						<div class="col-md-6">

							<select class="form-control" value="{{ $vendor->metas->where('key', 'kota')->first()['value'] }}" name="kota">
								<option>{{ $vendor->metas->where('key', 'kota')->first()['value'] }}</option>
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

@foreach ($vendors as $vendor)
<div class="modal fade" id="modalDelete{{$vendor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" action="{{ route('vendor.destroy',$vendor->id )}}" method="POST" role="form">
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
