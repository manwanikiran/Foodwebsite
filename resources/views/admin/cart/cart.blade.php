@extends('admin.layout.master')

@section('title')

Cart

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Cart</div>

		<div class="ms-auto">
			<!-- <div class="btn-group">
							<button type="button" class="btn btn-primary">ADD STATE</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div> -->
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
							<th>User id</th>
							<th>Food id</th>
							<th>Cart Qty</th>
							<!-- <th>Cart add date/time</th> -->

						</tr>
					</thead>
					<tbody>
						@foreach($cart as $row)
						<tr>
							<td>{{$loop->index +1}}</td> 
							<td>{{$row->user_name}}</td>
							<td>{{$row->food_title}}</td>
							<td>{{$row->cart_qty}}</td>
							<!-- <td>{{$row->cart_added_datetime}}</td> -->

						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>User id</th>
							<th>Food id</th>
							<th>Cart Qty</th>
							<!-- <th>Cart add date/time</th> -->
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