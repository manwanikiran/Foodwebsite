@extends('restaurant.reslayout.resmaster')

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
							<th>User address </th>
							<th>Payment status</th>
							<th>Delivery boy </th>
							<!-- <th>payment method</th> -->
							<th>Total amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resorder as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->user_address}}</td>
							<td>{{$row->order_status}}</td>
							@if(($row->del_boy_id)=="")
							<td style="color: red;"><u>Delivery Boy Not Allocated</u> </td>
							@else
							<td>{{$row->del_boy_name}}</td>
							@endif
							<!-- <td>{{$row->del_boy_name}}</td> -->
							<!-- <td>{{$row->order_pay_mode}}</td> -->
							<td>{{$row->order_total_payment}}</td>
							<td><a href="/resorderdetail/{{$row->order_id}}"><button class="btn btn-primary">View More</button></a></td>
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>User </th>
							<th>User address </th>
							<th>Payment status</th>
							<th>Delivery boy </th>
							<th>Total amount</th>
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