@extends('frontend.layout.listmaster')

@section('title')

Order

@endsection

@section('css')
<link href="{{URL::to('/')}}/frontassets/css/booking-sign_up.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/detail-page-delivery.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main')

<main class="bg_gray pattern">
	<div class="container margin_60_40">
		<form action="/insertorder" id="form1" method="post">
			@csrf
			@if(session()->has('userlogin'))
			<input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
			<input type="text" hidden name="payid" id="payid">

			@endif
			<div class="row justify-content-center">
				<!-- offer -->
				<div class="col-xl-4 col-lg-4" id="sidebar_fixed">
					<div class="box_booking">
						<div class="head">
							<h3>Eligible Offer</h3>
						</div>
						<div class="main">
							@foreach($offer as $row)
						

							<!-- <input type="text" value="{{$row->offerid}}"> -->
							<input type="radio" name="offer" id="offer" class="offer" value="{{$row->offer_discount}}"> {{$row->offer_title}}
							Offer Discount : {{$row->offer_discount}}
							<br>
						
							@endforeach


						</div>
					</div>
				</div>

				<!-- /col -->
				<div class="col-xl-4 col-lg-4" id="sidebar_fixed">
					<div class="box_booking">
						<div class="head">
							<h3>Order Summary</h3>
							<div>Food Plaza</div>
						</div>

						<!-- /head -->
						<div class="main">

							<ul>
								<li>
									<p id="date" name="date">Date<span>Today $date</span>
								</li>
								<li>Hour<span>08.30pm</span></li>
								<li>Type<span>Delivery</span></li>
							</ul>
							<hr>
							<ul class="clearfix">
								@foreach($fooddetailcart as $row)

								<input type="text" hidden name="res" id="res" value="{{$row->res_id}}">
								<input type="text" hidden id="item" name="fooditem" id="fooditem" value="{{$row->food_id}}"
								data-id="{{$row->food_id}}">



								<?php

								$price = $row["food_main_price"];
								$qty = $row["cart_qty"];

								$final = $price * $qty;

								//echo $price.$qty;

								?>
								<li>{{$row->cart_qty}} x {{$row->food_title}}(₹ {{$row->food_main_price}})<span>₹ <?php echo $final; ?></span></li>
								@endforeach
							</ul>

							<ul class="clearfix">
								<li>Subtotal<span>₹ {{$total}}</span></li>
								<li>Delivery fee<span>₹ 100</span></li>
							
								<input type="text" hidden value="{{$total+100}}" id="ftotal">
								<li class="total">Total<input readonly type="text" id="total" name="total" value="₹ {{$total+100}}" style="width: 80px; margin-left: 210px;padding-left: 20px;
								color: #e74747;font-size: 1.125rem;font-weight: 600;border: hidden;">
									<input type="text" hidden value="{{$total+100}}" name="finamtotal" id="finamtotal">
								</li>
							</ul>

							<button type="sumbit" id="finalorder" class="btn_1 full-width mb_5 ordernow d-none">Order Now</button>

		</form>



		<button type="button" class="btn_1 full-width mb_5 paynow">Order Now</button>
		<div class="text-center"><small>Or Call Us at <strong>0432 48432854</strong></small></div>
	</div>
	</div>
	<!-- /box_booking -->
	</div>

	</div>

	<!-- /row -->
	</div>
	<!-- /container -->

</main>

@endsection

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {

		$('.offer').on('change', function() {
			var offer = this.value;
			var total = $("#ftotal").val();

			// alert(total);

			//$("#area").html('');
			$.ajax({
				url: "/getoffer",
				type: "POST",
				data: {
					offer: offer,
					total: total,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(finaltotal) {

					$("#total").val(finaltotal);
					$("#finamtotal").val(finaltotal);

					// alert(finaltotal);
				}
			});
		});
	});
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	$(document).ready(function() {
		//alert("hello");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(".paynow").click(function(e) {
			e.preventDefault();
			var totalAmount = $("#finamtotal").val();
			var options = {
				"key": "rzp_test_yffpa5kVnpmF16",
				"amount": (totalAmount * 100), // 2000 paise = INR 20
				"name": "Tutsmake",
				"description": "Payment",
				"handler": function(response) {

					//alert("done");

					$("#payid").val(response["razorpay_payment_id"]);

					$("#finalorder").click();
					//alert(response["razorpay_payment_id"]);

					//onsole.log(response);
					// window.location.href = "/insertorder";
				},
				"prefill": {
					"contact": '9988665544',
					"email": 'tutsmake@gmail.com',
				},
				"theme": {
					"color": "#528FF0"
				}
			};
			var rzp1 = new Razorpay(options);
			rzp1.open();
		});
	});
</script>

@endsection