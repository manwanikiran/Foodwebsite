@extends('admin.layout.master')

@section('title')
    Restaurant Detail
@endsection

@section('css')

<style>
	#example2 img{
		height:100px;
		width:100px;
	}
</style>
@endsection

@section('main')
<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Restaurant</div>
				
					<div class="ms-auto">
						<div class="btn-group">
							<a href="/restaurant">
							<button type="button" class="btn btn-primary">Back </button></a>
			
						</div>
					</div>
				</div>
    
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								
								<tbody>
									
									<tr>
										<td>Restaurant Name</td>
										<td>{{$restaurant->res_name}}</td>
									</tr>

									<tr>
										<td>Contact Number(R)</td>
										<td>{{$restaurant->res_contact1}}</td>
									</tr>

									<tr>
										<td>Contact Number(O)</td>
										<td>{{$restaurant->res_contact2}}</td>
									</tr>

									<tr>
										<td>Email Address</td>
										<td>{{$restaurant->res_email}}</td>
									</tr>

									<tr>
										<td>Password</td>
										<td>{{$restaurant->res_password}}</td>
									</tr>

									<tr>
										<td>Address</td>
										<td>{{$restaurant->res_address}}</td>
									</tr>

									<tr>
										<td>Area</td>
										<td>{{$restaurant->area_name}}</td>
									</tr>

									<tr>
										<td>City</td>
										<td>{{$restaurant->city_name}}</td>
									</tr>

									<tr>
										<td>Landmark</td>
										<td>{{$restaurant->res_landmark}}</td>
									</tr>

									<tr>
										<td>Pincode</td>
										<td>{{$restaurant->res_pincode}}</td>
									</tr>

									<tr>
										<td>Lattitude</td>
										<td>{{$restaurant->res_latitude}}</td>
									</tr>

									<tr>
										<td>Longitude</td>
										<td>{{$restaurant->res_longitude}}</td>
									</tr>

									<tr>
										<td>Image(1)</td>
										<td><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img1}}" alt=""></td>
										<!-- <td>{{$restaurant->res_img1}}</td> -->
									</tr>

									<tr>
										<td>Image(2)</td>
										<td><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img2}}" alt=""></td>
										<!-- <td>{{$restaurant->res_img2}}</td> -->
									</tr>

									<tr>
										<td>Image(3)</td>
										<td><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img3}}" alt=""></td>
										<!-- <td>{{$restaurant->res_img3}}</td> -->
									</tr>

									<tr>
										<td>Cover Image</td>
										<td><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_coverimg}}" alt="coverimg"></td>
										<!-- <td>{{$restaurant->res_coverimg}}</td> -->
									</tr>

									<tr>
										<td>Logo</td>
										<td><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_logo}}" alt="logo"></td>
										<!-- <td>{{$restaurant->res_logo}}</td> -->
									</tr>

									<tr>
										<td>Video url</td>
										<td>{{$restaurant->res_web_url}}</td>
									</tr>

									<tr>
										<td>About</td>
										<td>{{$restaurant->res_about}}</td>
									</tr>

									<tr>
										<td>Pick up line</td>
										<td>{{$restaurant->res_pickup_line}}</td>
									</tr>
									
									
									<tr>
										<td>Is Approve</td>
										@if(($restaurant->res_is_approve)=="yes")
											<td><button class="btn btn-primary">Yes</button></td>
										@else
											<td><button class="btn btn-danger">No</button></td>
										@endif
								
									</tr>

									<tr>
										<td>Is-Block</td>

										@if(($restaurant->res_is_block)=="yes")
											<td><button class="btn btn-primary">Yes</button></td>
										@else
											<td><button class="btn btn-danger">No</button></td>
										@endif

									</tr>

									<tr>
										<td>Is Verify</td>
									
										@if(($restaurant->res_is_verify)=="yes")
											<td><button class="btn btn-primary">Yes</button></td>
										@else
											<td><button class="btn btn-danger">No</button></td>
										@endif
									</tr>

									<tr>
										<td>Register Date</td>
										<td>{{$restaurant->res_reg_datetime}}</td>
									</tr>

									<tr>
										<td>Gst Number</td>
										<td>{{$restaurant->res_gst_number}}</td>
									</tr>

									<tr>
										<td>Gst Certificate</td>
										<td>{{$restaurant->res_gst_certi}}</td>
									</tr>

									<tr>
										<td>Restaurant type</td>
										<td>{{$restaurant->res_type_name}}</td>
									</tr>

									<tr>
										<td>Timing</td>
										<td>{{$restaurant->res_timing}}</td>
									</tr>

									
								</tbody>
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