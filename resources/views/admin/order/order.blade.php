@extends('admin.layout.master')

@section('title')

Order

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Order</div>

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
							<th>User </th>
							<th>city</th>
							<th>Area</th>
							<th>Payment status</th>
							<th>Delivery Status</th>
							<th>Total amount</th>
							<th>Delivery boy </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->city_name}}</td>
							<td>{{$row->area_name}}</td>
							<td>{{$row->order_status}}</td>
							
							<td>{{$row->log_status}}</td>
				
							<td>{{$row->order_total_payment}}</td>
							
							@if($row->del_boy_name=="")
							<td><a href="/allocateorder/{{$row->Orderid}}"><button class="btn btn-danger">Allocate Delivery Boy </button></a></td>
							@else
							<td>{{$row->del_boy_name}}</td>
							@endif
							<td><a href="/orderdetail/{{$row->Orderid}}"><button class="btn btn-primary">View More</button></a><br>
								<!-- <a href="/allocateorder/{{$row->order_id}}"><button class="btn btn-success">Allocate Order </button></a> -->
							</td>
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<th>Sr. Number</th>
						<th>User </th>
						<th>city</th>
						<th>Area</th>
						<th>Payment status</th>
						<th>Total amount</th>
						<th>Delivery boy </th>
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