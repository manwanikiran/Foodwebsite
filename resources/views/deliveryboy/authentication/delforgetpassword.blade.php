<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/foodlogo.png" type="image/png" />
    <!-- loader-->
    <link href="{{URL::to('/')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{URL::to('/')}}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/app.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/assets/css/icons.css" rel="stylesheet">
    <title>Food Plaza</title>
</head>

<body class="bg-forgot">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box shadow-none">
                <div class="card-body">
                    <form action="/delboycheckforgetpass"  method="post" >
                        @csrf

                        <div class="p-4 rounded  border">
                            <div class="text-center">
                                <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                            </div>

                            <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                            <p class="text-muted">Enter your registered email ID to reset the password</p>
                            
                            @if($message = Session::get('message'))
							<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show">
								<div class="text-white">{{ $message }}</div>

								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif

                            @if($error = Session::get('error'))

                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                <div class="text-white">{{ $error  }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="my-4">
                                <label class="form-label">Email id</label>
                                <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="example@user.com" />
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="/deliverylogin" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
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


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

</html>