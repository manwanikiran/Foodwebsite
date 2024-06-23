<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/foodlogo.png" type="image/png" />
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
										<h3 class="">Delivery Boy Sign Up</h3>
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
										<form id="form1" class="row g-3" action="/insertdboy" method="post" enctype="multipart/form-data">
											@csrf
											<div class="col-12">
												<label for="inputFirstName" class="form-label">Deliveryboy Name</label>
												<input type="text" class="form-control" id="deliveryboyname" name="deliveryboyname" placeholder="">
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

											<div class="col-12">

												<label class="form-label">Contact No.</label>
												<input type="tel" class="form-control" minlength="10" maxlength="13" id="phone" name="phone">
											</div>


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
												<label class="form-label">Area</label>
												<select type="text" class="form-select" id="area" name="area" aria-label="Default select example">
													<option value="">Select Area</option>

												</select>
											</div>

											<div class="col-12">
												<label class="form-label">Delivery Boy Image</label>
												<input type="file" class="form-control" id="img" name="img" placeholder="">
											</div>


											<div class="col-12">
												<label class="form-label">Adharcard Image(Front)</label>
												<input type="file" class="form-control" id="adharcardimg" name="adharcardimg" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Adharcard Image(Back)</label>
												<input type="file" class="form-control" id="adharcardimgback" name="adharcardimgback" placeholder="">
											</div>

											<div class="col-12">
												<label class="form-label">Adharcard Number</label>
												<input type="text" class="form-control" id="adharcardno" name="adharcardno" placeholder="">
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
												<p class="mb-0">Already have an account? <a href="/deliverylogin">Sign in here</a>
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
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
	<script>
		$(document).ready(function() {

			$('#city').on('change', function() {
				var city = this.value;

				$("#area").html('');
				$.ajax({
					url: "/getareadeliveryboy",
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

	<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
	<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
	<script>
		$(document).ready(function() {



			$("#form1").validate({


				rules: {

					deliveryboyname: {

						required: true,
						required: /^[A-Za-z]+$/,
					},

					email: {

						required: true,
					},
					password: {

						required: true,
					},

					phone: {

						required: true,
					},
					img: {

						required: true,
					},
					adharcardimg: {

						required: true,
					},
					adharcardno: {

						required: true,
					}


				},

				messages: {

					deliveryboyname: {

						required: "Please Enter Restaurant Name !!! ",
					},

					email: {

						required: "Please Enter Image !!! ",
					},
					password: {

						required: "Please Enter This Field !!!  ",
					},

					phone: {

						required: "Please Enter This Field !!! ",
					},

					img: {

						required: "Please Enter This Field !!! ",
					},
					adharcardimg: {

						required: "Please Enter This Field !!! ",
					},
					adharcardno: {

						required: "Please Enter This Field !!! ",
					}


				}
			})
		})
	</script>

	



</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

</html>