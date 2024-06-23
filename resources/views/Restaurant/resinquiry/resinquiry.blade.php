@extends('restaurant.reslayout.resmaster')

@section('title')

Inquiry

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
		<div class="breadcrumb-title pe-3">Inquiry</div>

		<div class="ms-auto">
			<div class="btn-group">

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
							<th>User Name</th>
							<th>Email </th>
							<th>Contact Number </th>
							<th >Message</th>
							
							<th >Response</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resinquiry as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->username}}</td>
							<td>{{$row->email}}</td>
							<td>{{$row->contactno}}</td>
							<td style="width: 50px;">{{$row->message}}</td>


							</td>
							@if($row->response_message=="")
							<td> <button class="btn btn-danger" id="response" name="response" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2" data-id="{{$row->resinquiry_id}}" data-email="{{$row->email}}">Response</button>
							</td>
							@else
							<td>{{$row->response_message}} </td>
							@endif
							<td><button class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" data-id="{{$row->resinquiry_id}}">Delete</button>

						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>User Name</th>
							<th>Email </th>
							<th>Contact Number </th>
							<th>Message</th>
						
							<th>Response</th>
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

				<form action="/deleteresinquiry" method="post">
					@csrf
					<input type="text" hidden name="deleteid" id="deleteid">


					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
					<button type="submit" class="btn btn-primary" name="deletebutton" id="deletebutton">YES</button>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- //response  -->

<div class="modal fade" id="exampleVerticallycenteredModal2" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Send Response</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<form action="/inquiryresponse" method="post">
					@csrf
					<input type="text" hidden name="email" id="email">

					<input type="text" hidden name="inquiryid" id="inquiryid">

					<label for="">Message :</label>
					<textarea name="messages" id="messages" style="width: 450px;"></textarea>
			</div>
			<div class="modal-footer">

				<button type="submit" class="btn btn-primary" name="send" id="send">Send</button>
			</div>
			</form>
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

		});

		$(document).on('click', "#response", function() {

			var id = $(this).attr('data-id');
			var email = $(this).attr('data-email');

			$("#inquiryid").val(id);
			$("#email").val(email);

		})
	});
</script>

@endsection