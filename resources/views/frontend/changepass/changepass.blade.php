@extends('frontend.layout.listmaster')

@section('css')

<link href="{{URL::to('/')}}/frontassets/css/home.css" rel="stylesheet">


<style>
	#form1 label.error {
		color: red;
	}
</style>

@endsection

@section('title')
Change Password
@endsection


@section('main')
<!-- <main class="bg_gray pattern"> -->
<!-- Sign In Modal -->
<main class="bg_gray pattern">
	<div class="container margin_60_40">
		<form action="/usercheckchangepass" method="post" id="form1">
			@csrf
			<div class="row justify-content-center">
				<div class="col-lg-4">
					<div id="sign-in-dialog">
						<div class="modal_header" style="background-color: forestgreen;">
							<h3>Change Password </h3>
						</div>
						<form>
							<div class="sign-in-wrapper">
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

								<div class="form-group">
									<label>Old Password</label>
									<input type="password" class="form-control" name="oldpassword" id="oldpassword">
									<i class="icon_lock_alt"></i>
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="password" class="form-control" name="newpassword" id="newpassword">
									<i class="icon_lock_alt"></i>
								</div>
								<div class="form-group">
									<label>confirm Password</label>
									<input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
									<i class="icon_lock_alt"></i>
								</div>
								<div class="clearfix add_bottom_15">
									<div class="checkboxes float-start">

									</div>
									<div class="float-end"><a id="forgot" href="/userforgetpass">Forgot Password?</a></div>
								</div>
								<div class="text-center">
									<input type="submit" value="Submit" class="btn_1 full-width mb_5">

								</div>

								<div id="forgot_pw">
									<div class="form-group">

									</div>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>
@endsection

@section('js')
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
@endsection