@extends('admin.layout.master')

@section('title')

Food

@endsection

@section('css')

<style>
	#example2 img {
		height: 100px;
		width: 100px;
	}
</style>
@endsection

@section('main')
<div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Food</div>

		
	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. Number</th>
							<th>Restaurant </th>
							<!-- <th>Subcategory </th> -->
							<th>Food title</th>
							
							<th>Food image</th>
							<th>Food main price</th>
							
							<th>Approve</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($food as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->res_name}}</td>
							<!-- <td>{{$row->subcate_name}}</td> -->
							<td>{{$row->food_title}}</td>
							
							<td><img src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" alt=""></td>
							<td>₹{{$row->food_main_price}}</td>
						

							
							@if(($row->food_is_approve)=="yes")
							<td><a href="/foodisapprove/{{$row->food_id}}/no"><button class="btn btn-primary" >Yes</button></a></td>
							@else
							<td><a href="/foodisapprove/{{$row->food_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif
							<td><a href="/fooddetail/{{$row->food_id}}"><button class="btn btn-primary">View More</button></a></td>
						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Restaurant </th>
							<!-- <th>Subcategory </th> -->
							<th>Food title</th>
							<!-- <th>Food Type</th> -->
							<th>Food image</th>
							<th>Food main price</th>
							<!-- <th>Food sale price</th> -->
							<th>Approve</th>
							<th>Action</th>
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
				<div class="modal-body">Only Restaurant can Active This Field</div>
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

	
		$(document).on('click', "#active", function() {

			// alert ("Only Admin can Approve");
		})
	});
</script>

@endsection