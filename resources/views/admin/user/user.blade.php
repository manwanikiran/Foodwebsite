@extends('admin.layout.master')

@section('title')

User

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">User</div>

		<div class="ms-auto">

		</div>
	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. Number</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
						
							<th>Verify</th>
							<!-- <th>Date/Time</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach($user as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->user_contact}}</td>
							<td>{{$row->user_email}}</td>
						

							@if(($row->user_is_verify)=="yes")
							<td><a href="/userisverify/{{$row->user_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/userisverify/{{$row->user_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif

							<!-- <td>{{$row->user_reg_datetime}}</td> -->
						</tr>

						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
						
							<th>Verify</th>
							<!-- <th>Date/Time</th> -->
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>
	$(document).ready(function() {
		var table = $('#example2').DataTable({
			lengthChange: false,
			buttons: ['copy', 'excel', 'pdf', 'print']
		});

		table.buttons().container()
			.appendTo('#example2_wrapper .col-md-6:eq(0)');
	});
</script>

@endsection