<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Food Plaza</title>

	
	<style>
		#form1 label.error {
			color: red;
		}
	</style>
	
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<img src="{{URL::to('/')}}/uploads/restaurantindex/changelogo.png" width="200px" alt="">
										</div>
										<h4 class="mt-5 font-weight-bold">Change Password</h4>
										<form action="/delboychangepassword" method="post" id="form1">
											@csrf
											
											@if($error = Session::get('error'))
											<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
												<div class="text-white">{{ $error }}</div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											@endif
											<div class="mb-3 mt-5">
												<label class="form-label">Old Password</label>
												<input type="text" id="oldpassword" name="oldpassword" class="form-control" placeholder="Enter new password" />
											</div>
											<div class="mb-3">
												<label class="form-label">New Password</label>
												<input type="text" id="newpassword" name="newpassword" class="form-control" placeholder="Enter new password" />
											</div>
											<div class="mb-3">
												<label class="form-label">Confirm Password</label>
												<input type="text" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm password" />
											</div>
											<div class="d-grid gap-2">
												<button type="submit" class="btn btn-primary">Change Password</button> <a href="/deliverylogin" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<script src="{{URL::to('/')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{URL::to('/')}}/assets/js/jquery.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{URL::to('/')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/additional-methods.min.js"></script>
	<script>
		$(document).ready(function() {



			$("#form1").validate({


				rules: {

					oldpassword: {

						required: true,
					},
					newpassword: {

						required: true,
					},
					confirmpassword: {

						required: true,
						equalTo: "#newpassword",

					}

				},

				messages: {

					oldpassword: {

						required: "Please Enter Old Password !!! ",
					},
					newpassword: {

						required: "Please Enter New Password  !!! ",
					},

					confirmpassword: {

						required: "Please Enter  Confirm Password  !!! ",
					}

				}
			})
		})
	</script>
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:21 GMT -->

</html>