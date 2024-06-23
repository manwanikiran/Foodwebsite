@extends('frontend.layout.listmaster')

@section('css')

<link href="{{URL::to('/')}}/frontassets/css/home.css" rel="stylesheet">


@endsection

@section('title')
User Login
@endsection


@section('main')
<!-- <main class="bg_gray pattern"> -->
<!-- Sign In Modal -->
<main class="bg_gray pattern">
	<div class="container margin_60_40">
		<form action="/userchecklogin" method="post" id="form1">
			@csrf
			<div class="row justify-content-center">
				<div class="col-lg-4">
					<div id="sign-in-dialog">
						<div class="modal_header" style="background-color: forestgreen;">
							<h3>Sign In</h3>
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
									<label>Email</label>
									<input type="email" class="form-control" name="email" id="email" value="">
									<i class="icon_mail_alt"></i>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" id="password" value="">
									<i class="icon_lock_alt"></i>
								</div>
								<div class="clearfix add_bottom_15">
									<div class="checkboxes float-start">
										<label class="container_check">Remember me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="float-end"><a id="forgot" href="/userforgetpass">Forgot Password?</a></div>
								</div>

								<div class="text-center">
									<input type="submit" value="Log In" class="btn_1 full-width mb_5">
									Don’t have an account? <a href="/userregister">Sign up</a>
								</div>
								<a href="/userregister" class="btn_1 full-width mb_5">Sign up Now</a>
								<div id="forgot_pw">
									<div class="form-group">
										<label>Please confirm login email below</label>
										<input type="email" class="form-control" name="email_forgot" id="email_forgot">
										<i class="icon_mail_alt"></i>
									</div>
									<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
									<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
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