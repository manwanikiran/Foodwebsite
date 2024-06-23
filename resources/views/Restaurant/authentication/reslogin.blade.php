<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/foodlogo.png" type="image/png" />
	<!--plugins-->
	<link href="{{URL::to('/')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{URL::to('/')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{URL::to('/')}}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{URL::to('/')}}/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{URL::to('/')}}/assets/css/app.css" rel="stylesheet">
	<link href="{{URL::to('/')}}/assets/css/icons.css" rel="stylesheet">
	<title>index</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">

						<div class="card shadow-none">
							<div class="card-body">
								
								<div class="border p-4 rounded">
									<div class="text-center mb-4">
										<h3 class="">Restaurant Sign in</h3>
										<p class="mb-0">Login to your account</p>
									</div>

									<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr />
										
										
									</div>
									<div class="form-body">
									<form action="/restaurantlogin"class="row g-4" method="post">
									@csrf
									@if($error = Session::get('error'))

										<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
											<div class="text-white">{{ $error  }}</div>
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
										@endif
										<!-- <form class="row g-4"> -->
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="resemail" name="resemail" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="respassword" id="resinputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end"> <a href="/resforgetpassword">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
											<div class="col-12 text-center">
												<p class="mb-0">Don't have an account yet? <a href="/resregistration">Sign up here</a>
												</p>
											</div>
										<!-- </form> -->
									</div>
								</div>
								</form>
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
	<script src="{{URL::to('/')}}/assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

</html>