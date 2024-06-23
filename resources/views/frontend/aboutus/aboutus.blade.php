@extends('frontend.layout.listmaster')

@section('title')

About us

@endsection

@section('css')
<link href="{{URL::to('/')}}/frontassets/css/booking-sign_up.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/detail-page-delivery.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/help.css" rel="stylesheet">
@endsection

@section('main')

<main>
		<div class="hero_single inner_pages background-image" data-background="url({{URL::to('/')}}/uploads/restaurantindex/res6.png)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-10 col-md-8">
							<h1>About Food Plaza</h1>
							
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_60_40">
				<div class="main_title center">
					<span><em></em></span>
					<h2>Food Plaza</h2>
					<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_building"></i>
							<h3>Restaurant</h3>
							<p>In Food plaza you can get any types of restautrant according to your mood.
							</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_wallet"></i>
							<h3>Payment System</h3>
							<p>We offer safe online payment method.We use razorpay for our online payment .
							</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_phone"></i>
							<h3>Contact Us</h3>
							<p>If you have any query about our website you can simply message us through contact us page.
							</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6" style="margin-left: 200px;">
						<a class="box_topic" href="#0">
							<b><i class="arrow_left-right_alt"></i></b>
							<h3>Fast Delivery</h3>
							<p>We offer 1 hour delivery within you send order.if somehow your delivery gat dealyed , we will gave you 50% off.
							</p>
						</a>
					</div>
					<!-- <div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_document_alt"></i>
							<h3>Cancellation</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.
							</p>
						</a>
					</div> -->
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_comment_alt"></i>
							<h3>Reviews</h3>
							<p>In our website review section is handle by admin so you can get honest review of restaurant and their food.	 
							</p>
						</a>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
@endsection