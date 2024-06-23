@extends('admin.layout.master')

@section('title')

Offer Deatail

@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Offer</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a href="/offer"><button type="button" class="btn btn-primary">Back </button></a>
				<!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button> -->
				<!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div> -->
			</div>
		</div>
	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">

					<tbody>
						<tr>
							<td>Offer Title</td>
							<td>{{$offer->offer_title}}</td>
						</tr>

						<tr>
							<td>Offer Description</td>
							<td>{{$offer->offer_description}}</td>
						</tr>

						<tr>
							<td>Offer Start Date</td>
							<td>{{$offer->offer_start_date}}</td>
						</tr>

						<tr>
							<td>Offer End Date</td>
							<td>{{$offer->offer_end_date}}</td>
						</tr>

						<tr>
							<td>Offer Minimum Amount </td>
							<td>{{$offer->offer_min_amont}}</td>
						</tr>

						<tr>
							<td>Offer Maximum Amount</td>
							<td>{{$offer->offer_max_amont}}</td>
						</tr>

						<tr>
							<td>Offer Coupon</td>
							<td>{{$offer->offer_coupon}}</td>
						</tr>

						<tr>
							<td>Offer Discount</td>
							<td>{{$offer->offer_discount}}</td>
						</tr>

						<tr>
							<td>Offer is Active</td>

							@if(($offer->offer_is_active)=="yes")
							<td><button class="btn btn-primary">Yes</button></td>
							@else
							<td><button class="btn btn-danger">No</button></td>
							@endif

						</tr>

						<tr>
							<td>Offer Added Date/Time</td>
							<td>{{$offer->offer_added_datetime}}</td>
						</tr>

					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Warning!!!</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">Are You Sure You Want To Delete ??</div>
			<div class="modal-footer">

				<form action="/deleteoffer" method="post">
					@csrf
					<input type="text" hidden name="deleteid" id="deleteid">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
					<button type="submit" class="btn btn-primary" name="deletebutton" id="deletebutton">YES</button>
				</form>

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

		$(document).on('click', ".deletebtn", function() {

			var id = $(this).attr('data-id');

			$("#deleteid").val(id);
		})
	});
</script>

@endsection