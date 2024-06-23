@extends('admin.layout.master')

@section('title')

Delivery Boy

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
		<div class="breadcrumb-title pe-3">Delivery Boy</div>

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
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Adharcard no.</th>
							<th>Adharcard </th>
							<th>profile</th>
							<th>Is Active</th>
							<th>block</th>
						</tr>
					</thead>
					<tbody>
						@foreach($deliveryboy as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->del_boy_name}}</td>
							<td>{{$row->del_boy_contact}}</td>
							<td>{{$row->del_boy_email}}</td>
							<td>{{$row->del_boy_aadharcard_no}}</td>
							<td><img src="{{URL::to('/')}}/uploads/deliveryboy/{{$row->del_boy_aadharcard}}" alt=""></td>

							<td><img src="{{URL::to('/')}}/uploads/deliveryboy/{{$row->del_boy_photo}}" alt=""></td>

							@if(($row->del_boy_isactive)=="yes")
							<td><a href="/boyisactive/{{$row->del_boy_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/boyisactive/{{$row->del_boy_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif

							@if(($row->del_boy_isblock)=="yes")
							<td><a href="/boyisblock/{{$row->del_boy_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
							@else
							<td><a href="/boyisblock/{{$row->del_boy_id}}/yes"><button class="btn btn-danger">No</button></a></td>
							@endif
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Adharcard no.</th>
							<th>Adharcard </th>
							<th>profile</th>
							<th>Is Active</th>
							<th>block</th>
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