@extends('admin.layout.master')

@section('title')
    Update Restaurant Type
@endsection

@section('main')

			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"> update Restaurant Type</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> Restaurant Type</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="/restauranttype"><button type="button" class="btn btn-primary">Back</button></a>
							
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-xl-9 mx-auto">
					
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<form action="/editrestauranttype" method="post" enctype="multipart/form-data">
									@csrf

									<input type="text" hidden value="{{$restype->res_type_id}}" name="editrestauranttype" id="editrestauranttype">
									<input type="text"  hidden value="{{$restype->res_type_img_url}}" name="oldimg" id="oldimg">
									
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">UPDATE RESTAURANR TYPE</h5>
									</div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Restaurant Type</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="restype" name="restype" value="{{$restype->res_type_name}}" placeholder="Enter Restauranttype">
										</div>
									</div>


									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Restaurant Type Imge</label>
										<div class="col-sm-9">
											<img src="{{URL::to('/')}}\uploads\resttype\{{$restype->res_type_img_url}}" height="200px" weight="200px" alt="">
											<input type="file" class="form-control" id="typeimg" name="typeimg">
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