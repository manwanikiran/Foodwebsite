@extends('admin.layout.master')

@section('title')

User Address

@endsection

@section('main')
<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Address</div>
				
					<div class="ms-auto">
						<div class="btn-group">
							
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
										<th>User </th>
										<th>User Address</th>	
                                        <th>Address landmark</th>
										<th>Address pincode</th>
										<!-- <th>Latitude</th>	
                                        <th>Longitute</th> -->
										<th>Address Type</th>																
									</tr>
								</thead>
								<tbody>
								@foreach($useradd as $row)
									<tr>

										<td>{{$loop->index +1}}</td>
									
										<td>{{$row->user_name}} </td>
                                        <td>{{$row->user_address}} </td>	
                                        <td>{{$row->user_address_landmark}}</td>
										<td>{{$row->user_address_pincode}}</td>
										<!-- <td>{{$row->user_address_latitude}}</td>	
                                        <td> {{$row->user_address_longitude}}</td> -->
										<td>{{$row->user_address_type}}</td>
										
                                    </tr>
									@endforeach		
									
								</tbody>
								<tfoot>
                                <tr>
                                        <th>Sr. Number</th>
										<th>User </th>
										<th>User Address</th>	
                                        <th>Address landmark</th>
										<th>Address pincode</th>
										<!-- <th>Latitude</th>	
                                        <th>Longitute</th> -->
										<th>Address Type</th>
											
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

@endsection