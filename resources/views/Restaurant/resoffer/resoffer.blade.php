@extends('restaurant.reslayout.resmaster')

@section('title')

Offer

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Offer</div>

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
							<th>Tittle</th>
							<th>Start Date</th>
							<th>End Date</th>
							<!-- <th>Discription</th> -->
							<th>Minimum amo.</th>
							<th>Maximum amo.</th>
							<th>Coupon</th>
							<th>Discount</th>
							<th>Active</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						@foreach($offer as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->offer_title}}</td>
							<td>{{$row->offer_start_date}}</td>
							<td>{{$row->offer_end_date}}</td>
							<!-- <td>{{$row->offer_description}}</td> -->
							<td>{{$row->offer_min_amont}}</td>
							<td>{{$row->offer_max_amont}}</td>
							<td>{{$row->offer_coupon}}</td>
							<td>{{$row->offer_discount}}</td>
							<td>{{$row->offer_is_active}}</td>

							<td><a href="/resofferdetail/{{$row->offer_id}}"><button class="btn btn-primary">View more</button></a></td>

							@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Tittle</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Minimum amo.</th>
							<th>Maximum amo.</th>
							<th>Coupon</th>
							<th>Discount</th>
							<th>Active</th>
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