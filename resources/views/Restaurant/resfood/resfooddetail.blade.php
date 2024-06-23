@extends('restaurant.reslayout.resmaster')

@section('title')

Food Detail

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
					<div class="breadcrumb-title pe-3">Food Detail</div>
				
					<div class="ms-auto">
						 <div class="btn-group">
							<a href="/resfood"><button type="button" class="btn btn-primary">Back</button></a>
							
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
										<td>Food Title</td>
										<td>{{$food->food_title}}</td>
									</tr>
									<tr>
										<td>Restaurant Name</td>
										<td>{{$food->res_name}}</td>
									</tr>
									<tr>
										<td>Subcategory Name</td>
										<td>{{$food->subcate_name}}</td>
									</tr>
									<tr>
										<td>Food Type </td>
										<td>{{$food->food_type}}</td>
									</tr>
									<tr>
									<td>Image(1)</td>
										<td><img src="{{URL::to('/')}}/uploads/food/{{$food->food_img1}}" alt=""></td>
									</tr>
									<tr>
									<td>Image(2)</td>
										<td><img src="{{URL::to('/')}}/uploads/food/{{$food->food_img2}}" alt=""></td>
									</tr>

									<tr>
									<td>Image(3)</td>
										<td><img src="{{URL::to('/')}}/uploads/food/{{$food->food_img3}}" alt=""></td>
									</tr>

									<tr>
										<td>Video url</td>
										<td>{{$food->food_video_url}}</td>
									</tr>

									<tr>
										<td>About</td>
										<td>{{$food->food_about}}</td>
									</tr>

									<tr>
										<td>Sale Price</td>
										<td>{{$food->food_sale_price}}</td>
									</tr>

									<tr>
										<td>Main Price</td>
										<td>{{$food->food_main_price}}</td>
									</tr>

									<tr>
										<td>Active</td>
										@if(($food->food_is_active)=="yes")
											<td><button class="btn btn-primary">Yes</button></td>
										@else
											<td><button class="btn btn-danger">No</button></td>
										@endif
									
									</tr>

									<tr>
										<td>Approve</td>
										@if(($food->food_is_approve)=="yes")
											<td><button class="btn btn-primary">Yes</button></td>
										@else
											<td><button class="btn btn-danger">No</button></td>
										@endif
									
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