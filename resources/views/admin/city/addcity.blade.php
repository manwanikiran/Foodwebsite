@extends('admin.layout.master')

@section('title')
Add City
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
		<div class="breadcrumb-title pe-3">City</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add City</li>
				</ol>
			</nav>
		</div>

		<div class="ms-auto">
			<div class="btn-group">
				<a href="/city"><button type="button" class="btn btn-primary">Back</button></a>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-9 mx-auto">

			<hr />
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form id="form1" action="/insertcity" method="post">
						@csrf
						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Add city</h5>
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
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">State</label>
								<div class="col-sm-9">
									<select type="text" class="form-select" id="state" name="state" placeholder="Enter Your State">
										<option value="">Select State</option>

										@foreach($state as $row)
										<option value="{{$row->state_id}}">{{$row->state_name}}</option>
										@endforeach

									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">City</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="cityname" name="cityname" placeholder="Enter Your State">
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

	@section('js')
	<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
	<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
	<script>
		$(document).ready(function() {

			$("#form1").validate({

				rules: {

					state: {

						required: true,
					},

					cityname: {

						required: true,
					}
				},

				messages: {

					state: {

						required: "Please Enter City !!! ",
					},
					cityname: {

						required: "Please Enter Area Name !!! ",
					}

				}
			})
		})
	</script>
	@endsection