@extends('restaurant.reslayout.resmaster')

@section('title')
Review
@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Food</div>

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
							<th>review</th>
							<th>star</th>
							<th>display or not</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resreview as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->res_name}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->review_desc}} </td>
							<td>{{$row->review_star}}</td>

							@if(($row->review_is_display)=="yes")
							<td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">Yes</button></td>
							@else
							<td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">No</button></td>
							@endif

						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Restaurant</th>
							<th>User </th>
							<th>review</th>
							<th>star</th>
							<th>display or not</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleVerticallycenteredModal2" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Warning!!!</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<div class="modal-body">Only Admin can Active This Field</div>
				<div class="modal-footer">
				</div>
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
<script>
	$(document).ready(function() {

	
		$(document).on('click', "#menuisapprove", function() {

			// alert ("Only Admin can Approve");
		})
	});
</script>
@endsection