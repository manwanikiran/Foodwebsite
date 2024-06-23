@extends('frontend.layout.listmaster')

@section('css')

<link href="{{URL::to('/')}}/frontassets/css/booking-sign_up.css" rel="stylesheet">


<style>
	#form1 label.error {
		color: red;
	}
</style>


@endsection

@section('title')
User Sign Up
@endsection


@section('main')
<main class="bg_gray pattern">
	<form action="/insertuser" method="post" id="form1">
		@csrf
		<div class="container margin_60_40">
			<div class="row justify-content-center">
				<div class="col-lg-4">
					<div class="sign_up">
						<div class="head">
							<div class="title">
								<h3>Sign Up</h3>
							</div>
						</div>
						<!-- /head -->


						<div class="main">
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
								<label>First and Last Name</label>
								<input class="form-control" placeholder="First and Last Name" id="username" name="username">
								<i class="icon_pencil" style="margin-top: 23px;"></i>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
								<i class="icon_mail_alt" style="margin-top: 23px;"></i>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" id="password" value="">
								<i class="icon_lock_alt" style="margin-top: 23px;"></i>
							</div>
							<div class="form-group ">
								<label>Contact Number</label>
								<input class="form-control" placeholder="Contact Number"  id="contactnumber" name="contactnumber">
								<i class="icon_phone" style="margin-top: 23px;"></i>
							</div>
							
							<button type="submit" class="btn_1 full-width mb_5">Sign up </a>
								<!-- <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button> -->
						</div>
	</form>
	</div>
	<!-- /box_booking -->
	</div>
	<!-- /col -->

	</div>
	<!-- /row -->
	</div>
	<!-- /container -->

</main>
@endsection

@section('js')
<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
<script>
	$(document).ready(function() {

		$("#form1").validate({

			rules: {

				username: {

					required: true,
				},

				email: {

					required: true,
				},
				password: {

					required: true,
				},
				contactnumber: {

					required: true,
				},
				registerdatetime: {

					required: true,
				}
			},

			messages: {

				username: {

					required: "Please Enter Your Name !!! ",
				},
				email: {

					required: "Please Enter Email Address !!! ",
				},
				password: {

					required: "Please Enter Email Address !!! ",
				},
				contactnumber: {

					required: "Please Enter Contact Number !!! ",
				},
				registerdatetime: {

					required: "Please Enter Register Date&Time !!! ",
				}
			}
		})
	})
</script>
@endsection