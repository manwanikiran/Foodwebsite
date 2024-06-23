@extends('restaurant.reslayout.resmaster')

@section('title')
Add Food
@endsection

@section('css')

<style>
	#form1 label.error {
		color: red;
	}
</style>
@endsection

@section('main')

<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Food</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add Food</li>
				</ol>
			</nav>
		</div>
		<div class="ms-auto">
			<div class="btn-group">
				<a href="/resfood"><button type="button" class="btn btn-primary">Back</button></a>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-9 mx-auto">

			<hr />
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form id="form1" action="/editfood" method="post" enctype="multipart/form-data">
						@csrf
						<input type="text" hidden name="editfood" id="editfood" value="{{$food->food_id}}">
						<input type="text" hidden value="{{$food->food_img1}}" name="oldimg1" id="oldimg1">
						<input type="text" hidden value="{{$food->food_img2}}" name="oldimg2" id="oldimg2">
						<input type="text" hidden value="{{$food->food_img3}}" name="oldimg3" id="oldimg3">

						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Add Food</h5>
							</div>
							<hr />
							<div class="row mb-3">
								<label class="col-sm-3 col-form-label">Restaurant</label>
								<div class="col-sm-9">
									<select type="text" class="form-control" id="restaurant" name="restaurant">
										<option value="">Select Restaurant</option>
										@foreach($restaurant as $row)
										<option @if(($row->res_id)==($food->res_id)) selected @endif value="{{$row->res_id}}">{{$row->res_name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Subcategory</label>
								<div class="col-sm-9">
									<select type="text" class="form-control" id="subcategory" name="subcategory">
										<option value="">Select Subcategory</option>
										@foreach($subcategory as $row)
										<option @if(($row->subcate_id)==($food->subcate_id)) selected @endif value="{{$row->subcate_id}}">{{$row->subcate_name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Title</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="foodtitle" name="foodtitle" value="{{$food->food_title}}" placeholder="Enter Food Title">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Type</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="foodtype" name="foodtype" value="{{$food->food_type}}" placeholder="Enter Food Type">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Image(1)</label>
								<div class="col-sm-9">

									<img src="{{URL::to('/')}}/uploads/food/{{$food->food_img1}}" height="200px" width="200px" alt="">
									<input type="file" class="form-control" id="image1" name="image1">

								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Image(2)</label>
								<div class="col-sm-9">
									<img src="{{URL::to('/')}}/uploads/food/{{$food->food_img2}}" height="200px" width="200px" alt="">
									<input type="file" class="form-control" id="image2" name="image2">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Image(3)</label>
								<div class="col-sm-9">
									<img src="{{URL::to('/')}}/uploads/food/{{$food->food_img3}}" height="200px" width="200px" alt="">
									<input type="file" class="form-control" id="image3" name="image3">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Video Url</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="video" name="video" value="{{$food->food_video_url}}" placeholder="Enter video URL">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">About</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="about" name="about" value="{{$food->food_about}}" placeholder="Enter about food">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Main Price</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="mainprice" name="mainprice" value="{{$food->food_main_price}}" placeholder="Enter Food main price">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Sale Price</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="saleprice" name="saleprice" value="{{$food->food_sale_price}}" placeholder="Enter Food sale price">
								</div>
							</div>

							<div class="row">
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	@endsection