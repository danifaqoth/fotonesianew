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
								<td><button>Edit/Hapus</button></td>
								<td></td>
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
