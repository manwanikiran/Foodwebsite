<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- ajax  -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>FOOD PLAZA</title>


	<style>
		#form1 label.error {
			color: red;
		}
	</style>

</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">

		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="card shadow-none mt-5">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center mb-4">
										<h3 class="">Sign Up</h3>
										<p class="mb-0">Create your account</p>

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
									</div>

									<div class="form-body">
										<form id="form1" class="row g-3" action="/insertrestaurant" method="post" enctype="multipart/form-data">
											@csrf
											<div class="col-12">
												<label for="inputFirstName" class="form-label">Restaurant Name</label>
												<input type="text" class="form-control" id="restaurantname" name="restaurantname" placeholder="">
											</div>

											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="example@user.com">
											</div>

											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>

											<div class="row g-2">
												<div class="col-sm-6">
													<label for="inputSelectCountry" class="form-label">Contact No.</label>
													<input type="tel" class="form-control" minlength="10" maxlength="13" id="phone1" name="phone1">
												</div>

												<div class="col-sm-6">
													<label for="inputSelectCountry" class="form-label">Contact No.(2)</label>
													<input type="tel" class="form-control" minlength="10" maxlength="13" id="phone2" name="phone2">
												</div>
											</div>

											<div class="col-12">
												<label for="inputEmailAddress" class="form-label"> Address</label>
												<input type="text" class="form-control" id="address" name="address" placeholder="Restaurant Address">
											</div>


											<div class="row g-2">
												<div class="col-sm-6">
													<label class="form-label">Pincode</label>
													<input type="text" id="pincode" name="pincode" class="form-control">
												</div>

												<div class="col-sm-6">
													<label class="form-label">Landmark</label>
													<input type="text" id="landmark" name="landmark" class="form-control">
												</div>
											</div>

											<div class="row g-2">
												<div class="col-sm-6">
													<label class="form-label">Latitude</label>
													<input type="text" id="latitude" name="latitude" class="form-control">
												</div>

												<div class="col-sm-6">
													<label class="form-label">Longitude</label>
													<input type="tel" id="longitude" name="longitude" class="form-control">
												</div>
											</div>

											<div class="row g-2">
												<div class="col-sm-6">
													<label class="form-label">City</label>
													<select type="text" class="form-select" id="city" name="city" aria-label="Default select example">
														<option value="">Select City</option>
														@foreach($city as $row)
														<option value="{{$row->city_id}}">{{$row->city_name}}</option>
														@endforeach
													</select>
												</div>

												<div class="col-sm-6">
													<label for="inputSelectCountry" class="form-label">Area</label>
													<select type="text" class="form-select" id="area" name="area" aria-label="Default select example">
														<option value="">Select Area</option>

													</select>
												</div>
											</div>


											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Restaurant Type</label>
												<select class="form-select" id="restype" name="restype" aria-label="Default select example">
													<option value="">Select Restarant Type</option>
													@foreach($restauranttype as $row)
													<option value="{{$row->res_type_id}}">{{$row->res_type_name}}</option>
													@endforeach
												</select>
											</div>


											<div class="col-12">
												<label class="form-label">Gst Number</label>
												<input type="text" class="form-control" id="gstnumber" name="gstnumber" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Gst Certificate </label>
												<input type="file" class="form-control" id="gstcerti" name="gstcerti" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Image(1) </label>
												<input type="file" class="form-control" id="img1" name="img1" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Image(2) </label>
												<input type="file" class="form-control" id="img2" name="img2" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Image(3) </label>
												<input type="file" class="form-control" id="img3" name="img3" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Cover Image</label>
												<input type="file" class="form-control" id="coverimg" name="coverimg" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Logo Image</label>
												<input type="file" class="form-control" id="logo" name="logo" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Video Url</label>
												<input type="text" class="form-control" id="video" name="video" placeholder="">
											</div>

											<!-- <div class="col-12">
												<label class="form-label">Register Date & Time</label>
												<input type="datetime-local" class="form-control" id="datetime" name="datetime" placeholder="">
											</div> -->

											<div class="col-12">
												<label class="form-label">About</label>
												<input type="text" class="form-control" id="about" name="about" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Pick-up Line</label>
												<input type="text" class="form-control" id="pickupline" name="pickupline" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Restaurant Timing</label>
												<input type="text" class="form-control" id="restiming" name="restiming" placeholder="">
											</div>

											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
											<div class="col-12 text-center">
												<p class="mb-0">Already have an account? <a href="/restaurantindex">Sign in here</a>
												</p>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>

	</div>

	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{URL::to('/')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{URL::to('/')}}/assets/js/jquery.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
	<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
	<script>
		$(document).ready(function() {
			
			$("#form1").validate({


				rules: {

					restaurantname: {

						required: true,
					},
					restiming: {

						required: true,
					},
					email: {

						required: true,
					},
					password: {

						required: true,
					},

					phone1: {

						required: true,
					},
					phone2: {

						required: true,
					
					},
					address: {

						required: true,
					},
					pincode: {

						required: true,
					},

					landmark: {

						required: true,
					},
					latitude: {

						required: true,
					},
					longitude: {

						required: true,
					},
					city: {

						required: true,
					},
					area: {

						required: true,
					},
					restype: {

						required: true,
					},
					gstnumber: {

						required: true,
					},
					gstcerti: {

						required: true,
					},
					img1: {

						required: true,
					},
					img2: {

						required: true,
					},
					img3: {

						required: true,
					},
					coverimg: {

						required: true,
					},
					logo: {

						required: true,
					},
					video: {

						required: true,
					},
					datetime: {

						required: true,
					},
					about: {

						required: true,
					},
					pickupline: {

						required: true,
					}

				},

				messages: {

					restaurantname: {

						required: "Please Enter Restaurant Name !!! ",
					},
					restiming: {

						required: "Please Enter This Field !!! ",
					},

					email: {

						required: "Please Enter Image !!! ",
					},
					password: {

						required: "Please Enter This Field !!!  ",
					},

					phone1: {

						required: "Please Enter This Field !!! ",
					},

					phone2: {

						required: "Please Enter This Field !!! ",
					},
					address: {

						required: "Please Enter This Field !!! ",
					},
					pincode: {

						required: "Please Enter This Field !!! ",
					},
					landmark: {

						required: "Please Enter This Field !!! ",
					},

					latitude: {

						required: "Please Enter This Field !!! ",
					},
					longitude: {

						required: "Please Enter This Field !!! ",
					},
					city: {

						required: "Please Enter This Field !!! ",
					},

					area: {

						required: "Please Enter This Field !!! ",
					},
					restype: {

						required: "Please Enter This Field !!! ",
					},

					gstnumber: {

						required: "Please Enter This Field !!! ",
					},
					gstcerti: {

						required: "Please Enter This Field !!! ",
					},
					img1: {

						required: "Please Enter This Field !!! ",
					},
					img2: {

						required: "Please Enter This Field !!! ",
					},
					img3: {

						required: "Please Enter This Field !!! ",
					},
					coverimg: {

						required: "Please Enter This Field !!! ",
					},
					logo: {

						required: "Please Enter This Field !!! ",
					},
					video: {

						required: "Please Enter This Field !!! ",
					},
					about: {

						required: "Please Enter This Field !!! ",
					},
					pickupline: {

						required: "Please Enter This Field !!! ",
					}

				}
			})
		})
	</script>


	<script>
		$(document).ready(function() {

			$('#city').on('change', function() {
				var city = this.value;

				$("#area").html('');
				$.ajax({
					url: "/getarea",
					type: "POST",
					data: {
						city: city,
						_token: '{{csrf_token()}}'
					},
					dataType: 'json',
					success: function(result) {


						$('#area').html('<option value="">-- Select Area --</option>');
						$.each(result.area, function(key, value) {
							$("#area").append('<option value="' + value
								.area_id + '">' + value.area_name + '</option>');
						});

					}
				});
			});


		});
	</script>

</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

</html>