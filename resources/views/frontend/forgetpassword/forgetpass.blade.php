@extends('frontend.layout.listmaster')

@section('css')

<link href="{{URL::to('/')}}/frontassets/css/home.css" rel="stylesheet">


@endsection

@section('title')
Forget Password
@endsection


@section('main')

<main class="bg_gray pattern">
	<div class="container margin_60_40">
		<form action="/usercheckforgetpass" method="post" id="form1">
			@csrf
			<div class="row justify-content-center">
				<div class="col-lg-4">
					<div id="sign-in-dialog">
						<div class="modal_header" style="background-color: forestgreen;">
							<h3>Forget Password </h3>
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
									<input type="email" class="form-control" name="email" id="email" placeholder="user@gmail.com">
									<i class="icon_mail_alt"></i>
								</div>
							
								<div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="/userlogin" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
									
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