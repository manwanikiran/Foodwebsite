@extends('restaurant.reslayout.resmaster')

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

		<div class="ms-auto">
			<div class="btn-group">
				<a href="/addfood"><button type="button" class="btn btn-primary">Add Food</button></a>

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
							<th>Food title</th>
							<th>Subcategory </th>
						
							<th>Food image</th>
							<th>Food main price</th>
							<th>Active</th>
							<th>Approve</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resfood as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->food_title}}</td>
							<td>{{$row->subcate_name}}</td>
						
							<td><img src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" alt=""></td>
							<td>{{$row->food_main_price}}</td>

							@if(($row->food_is_active)=="yes")
							<td><a href="/foodisactive/{{$row->food_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/foodisactive/{{$row->food_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif

							@if(($row->food_is_approve)=="yes")
							<td><button class="btn btn-primary" id="approve" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">Yes</button></a></td>
							@else
							<td><button class="btn btn-danger" id="approve" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">No</button></a></td>
							@endif

							<td><button class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" data-id="{{$row->food_id}}" data-img1="{{$row->food_img1}}" data-img2="{{$row->food_img2}}" data-img3="{{$row->food_img3}}">Delete</button>
								<br><a href="/updatefood/{{$row->food_id}}"><button class="btn btn-primary">Update</button></a>
								<br><a href="/resfooddetail/{{$row->food_id}}"><button class="btn btn-success">View More</button></a>
							</td>
						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
						<th>Sr. Number</th>
							<th>Food title</th>
							<th>Subcategory </th>
						
							<th>Food image</th>
							<th>Food main price</th>
							<th>Active</th>
							<th>Approve</th>
							<th>Action</th>
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

				<form action="/deletefood" method="post">
					@csrf
					<input type="text" hidden name="deleteid" id="deleteid">
					<input type="text" hidden name="deleteimg1" id="deleteimg1">
					<input type="text" hidden name="deleteimg2" id="deleteimg2">
					<input type="text" hidden name="deleteimg3" id="deleteimg3">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
					<button type="submit" class="btn btn-primary" name="deletebutton" id="deletebutton">YES</button>
				</form>

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
				<div class="modal-body">Only Admin can Approve This Field</div>
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

		$(document).on('click', ".deletebtn", function() {

			var id = $(this).attr('data-id');
			var img1 = $(this).attr('data-img1');
			var img2 = $(this).attr('data-img2');
			var img3 = $(this).attr('data-img3');

			$("#deleteid").val(id);
			$("#deleteimg1").val(img1);
			$("#deleteimg2").val(img2);
			$("#deleteimg3").val(img3);
		})
	});
</script>
<script>
	$(document).ready(function() {

	
		$(document).on('click', "#approve", function() {

			// alert ("Only Admin can Approve");
		})
	});
</script>
@endsection