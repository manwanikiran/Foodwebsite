@extends('restaurant.reslayout.resmaster')

@section('title')

Menu

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
		<div class="breadcrumb-title pe-3">Menu</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a href="/addmenu"><button type="button" class="btn btn-primary">Add Menu</button></a>

			</div>
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
						<th>Restaurant </th>
						<th>Menu Title</th>
						<th>Menu Image</th>
						<th>Menu Apporve</th>
						<th>Menu Active</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					@foreach($menu as $row)
					<tr>
						<td>{{$loop->index +1}}</td>
						<td>{{$row->res_name}}</td>
						<td>{{$row->menu_title}}</td>
						<td><img src="{{URL::to('/')}}/uploads/menu/{{$row->menu_img}}" alt=""></td>

						@if(($row->menu_is_approve)=="yes")
						<td><button class="btn btn-primary" id="menuisapprove" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">Yes</button></td>
						@else
						<td><button class="btn btn-danger" id="menuisapprove" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">No</button></td>
						@endif

						@if(($row->menu_is_active)=="yes")
						<td><a href="/menuisactive/{{$row->menu_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
						@else
						<td><a href="/menuisactive/{{$row->menu_id}}/yes"><button class="btn btn-danger">No</button></a></td>
						@endif


						<td><button class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" data-id="{{$row->menu_id}}" data-img="{{$row->menu_img}}">Delete</button>
							<a href="/updatemenu/{{$row->menu_id}}"><button class="btn btn-primary">Update</button></a>
						</td>

					</tr>

					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Sr. Number</th>
						<th>Restaurant </th>
						<th>Menu Title</th>
						<th>Menu Image</th>
						<th>Menu Apporve</th>
						<th>Menu Active</th>
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

				<form action="/deletemenu" method="post">
					@csrf
					<input type="text" hidden name="deleteid" id="deleteid">
					<input type="text" hidden name="deleteimg" id="deleteimg">

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
			var img = $(this).attr('data-img');

			$("#deleteid").val(id);
			$("#deleteimg").val(img);
		});

		$(document).on('click', "#menuisapprove", function() {

			// alert ("Only Admin can Approve");
		})
	});
</script>



@endsection