@extends('admin.layout.master')

@section('title')

Review

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Review</div>

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
							<th>Restaurant</th>
							<th>User </th>
							<th>Review</th>
							<th>Star</th>
							<th>display or not</th>

						</tr>
					</thead>
					<tbody>

						@foreach($review as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->res_name}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->review_desc}} </td>
							<td>{{$row->review_star}}</td>

							@if(($row->review_is_display)=="yes")
							<td><a href="/reviewisdisplay/{{$row->review_id}}/no"><button class="btn btn-primary">Yes</button></td>
							@else
							<td><a href="/reviewisdisplay/{{$row->review_id}}/yes"><button class="btn btn-danger">No</button></td>
							@endif

						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Restaurant </th>
							<th>User </th>
							<th>Review</th>
							<th>Star</th>
							<th>display or not</th>

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