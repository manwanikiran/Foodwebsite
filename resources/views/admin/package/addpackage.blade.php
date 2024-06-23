@extends('admin.layout.master')

@section('title')
Add Package
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
		<div class="breadcrumb-title pe-3">Package</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add Package</li>
				</ol>
			</nav>
		</div>


		<div class="ms-auto">
			<div class="btn-group">
				<a href="/package"><button type="button" class="btn btn-primary">Back</button></a>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-9 mx-auto">

			<hr />
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form id="form1" action="/insertpackage" method="post">
						@csrf
						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Add Package</h5>
							</div>
							@if($message = Session::get('message'))
							<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show">
								<div class="text-white">{{ $message }}</div>

								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif

							@if($error = Session::get('error'))
							<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
								<div class="text-white">{{ $error }}</div>

								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif
							<hr />
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Discription</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="package" name="package" placeholder="Enter Your package discription">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Package Days</label>
								<div class="col-sm-9">
									<input class="form-check-input" type="radio" name="packagedays" id="30day" value="30day">
									<label class="form-check-label" for="flexRadioDefault1">
										30 days
									</label>
									<input class="form-check-input" type="radio" name="packagedays" id="181day" value="181day">
									<label class="form-check-label" for="flexRadioDefault1">
										181 days
									</label>
									<input class="form-check-input" type="radio" name="packagedays" id="365day" value="365day">
									<label class="form-check-label" for="flexRadioDefault1">
										365 days
									</label>
								</div>


							</div>
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Package Amount</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="packageamount" name="packageamount" placeholder="Enter Your packageamount">
								</div>
							</div>

							<div class="row">
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-info px-5">Submit</button>
								</div>
							</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
<script>
	$(document).ready(function() {

		$("#form1").validate({

			rules: {

				title: {

					required: true,
				},
				package: {

					required: true,
				},
				packagedays: {

					required: true,
				},
				packageamount: {

					required: true,
				}
			},

			messages: {

				title: {

					required: "Please Enter title !!! ",
				},
				package: {

					required: "Please Enter Discription !!! ",
				},
				packagedays: {

					required: "Please Enter package days !!! ",
				},
				packageamount: {

					required: "Please Enter Amount !!! ",
				}
			}
		})
	})
</script>
@endsection