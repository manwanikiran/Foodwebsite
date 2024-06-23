@extends('deliveryboy.layout.master')

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
							<th>Order id </th>
							
							<!-- <th>Delivery boy</th> -->
							<th>user name</th>
							<th>user address</th>
							<th>payment status</th>
							<th>Total Payment</th>
							<th>order item</th>
							<th>Order status </th>
							<!-- <th>Action</th>  -->
						</tr>
					</thead>
					<tbody>
						@foreach($delorder as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->order_id}}</td>

						
							<!-- <td>{{$row->del_boy_name}}</td> -->
							<td>{{$row->user_name}}</td>
							<td>{{$row->user_address}}</td>
							
							<td>{{$row->order_status}}</td>
							<td>{{$row->order_total_payment}}</td>
							<td>{{$row->foodname}}</td>
							@if(($row->log_status)=="done")
							<td><a href="/logstatus/{{$row->log_id}}/pending"><button class="btn btn-primary">Done</button></a></td>

							@else
							<td><a href="/logstatus/{{$row->log_id}}/done"><button class="btn btn-danger">Pending</button></a></td>
							@endif

						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Order id </th>
							<th>Order status </th>
							<!-- <th>Delivery boy</th> -->
							<th>user name</th>
							<th>user address</th>
							<th>payment status</th>
							<th>Total Payment</th>
							<th>order item</th>
							<!-- <th>Action</th>  -->
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