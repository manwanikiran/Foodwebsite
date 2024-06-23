@extends('admin.layout.master')

@section('title')

Local Area

@endsection

@section('main')
<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Local Area</div>
				
					<div class="ms-auto">
						<div class="btn-group">
						<a href="/addarea">	<button type="button" class="btn btn-primary">Add Area</button></a>
							
						</div>
					</div>
				</div>
    
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. Number</th>
										<th>City Name</th>
										<th>Area Name</th>
										<th>Action</th>																		
									</tr>
								</thead>
								<tbody>
								@foreach($area as $row)
									<tr>
										<td>{{$loop->index +1}}</td>
										<td>{{$row->city_name}}</td>
                                        <td>{{$row->area_name}}</td>
										
										<td><button class="btn btn-danger deletebtn"  data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" data-id="{{$row->area_id}}">Delete</button>
                                        <a href="/updatearea/{{$row->area_id}}"><button class="btn btn-primary">Update</button></a></td>
									</tr>
										@endforeach
								</tbody>
								<tfoot>
                                    <tr>
										<th>Sr. Number</th>
										<th>City Name</th>
										<th>Area Name</th>
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

														<form action="/deletearea" method="post">
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

<script>

	$(document).ready(function(){

		$(document).on('click',".deletebtn",function(){

			var id = $(this).attr('data-id');

				$("#deleteid").val(id);
		})
	});

</script>

@endsection