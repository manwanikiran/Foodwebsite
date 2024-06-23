@extends('restaurant.reslayout.resmaster')

@section('title')
Item
@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Item</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a href="/additem"><button type="button" class="btn btn-primary">Add Item</button></a>

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
							<th>User</th>
							<th>Food </th>
							<th>Item Qty</th>
							<th>Item Price</th>
							<th>Item status</th>

						</tr>
					</thead>
					<tbody>
						@foreach($resitem as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->food_title}}</td>
							<td>{{$row->item_qty}}</td>
							<td>{{$row->item_price}}</td>
							<td>{{$row->item_status}}</td>

						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>User</th>
							<th>Food </th>
							<th>Item Qty</th>
							<th>Item Price</th>
							<th>Item status</th>
						</tr>
					</tfoot>
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

				<form action="/deleteitem" method="post">
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