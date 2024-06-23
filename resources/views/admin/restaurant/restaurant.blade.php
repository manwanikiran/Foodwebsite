@extends('admin.layout.master')

@section('title')

Restaurant

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Restaurant</div>

		<div class="ms-auto">

			<div class="btn-group">

			</div>
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
							<th>Restaurant Name</th>
							<th>Area</th>
							<th>Phone no</th>
							<th>Pincode</th>
							<th>Block</th>
							<th>Approve</th>
							<th>Verify</th>
							<th>Type of Restaurant</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($restaurant as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->res_name}}</td>
							<td>{{$row->area_name}}</td>
							<td>{{$row->res_contact1}} </td>
							<td>{{$row->res_pincode}}</td>

							@if(($row->res_is_block)=="yes")
							<td><a href="/restaurantisblock/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/restaurantisblock/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif

							@if(($row->res_is_approve)=="yes")
							<td><a href="/restaurantisapprove/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/restaurantisapprove/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif

							@if(($row->res_is_verify)=="yes")
							<td><a href="/restaurantisverify/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></td>
							@else
							<td><a href="/restaurantisverify/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></td>
							@endif

							<td>{{$row->res_type_name}}</td>
							<td><a href="/restaurantdetail/{{$row->res_id}}"><button class="btn btn-primary">View More</button></a></td>
						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Restaurant Name</th>
							<th>Area</th>
							<th>Phone no</th>
							<th>Pincode</th>
							<th>Block</th>
							<th>Approve</th>
							<th>Verify</th>
							<th>Type of Restaurant</th>
							<th>Action</th>
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