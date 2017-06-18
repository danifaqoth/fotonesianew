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

					<div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<thead>	
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
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
								<td>{{ $vendor->first_name }}</td>
								<td>{{ $vendor->last_name }}</td>
								<td>{{ $vendor->metas->where('key', 'name_vendor')->first()['value'] }}</td>
								<td>{{ $vendor->email }}</td>
								<td>{{ $vendor->metas->where('key', 'kota')->first()['value'] }}</td>
								<td>{{ $vendor->created_at->diffForHumans() }}</td>
								<td>Edit/Hapus</td>
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

@endsection
