@extends('admin.layout.master')

@section('title')
Add Offer
@endsection


@section('css')

<style>
	#form1 label.error {
		color: red;
	}
</style>
@endsection

@section('main')

<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Offer</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Add Offer </li>
				</ol>
			</nav>
		</div>
		<div class="ms-auto">
			<div class="btn-group">
				<a href="/offer"><button type="button" class="btn btn-primary">Back</button></a>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-9 mx-auto">

			<hr />
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form id="form1" action="/insertoffer" method="post">
						@csrf
						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
								</div>
								<h5 class="mb-0 text-primary">Add Offer </h5>
							</div>
							<hr />
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="offer" name="offer" placeholder="Enter Offer">
								</div>
							</div>


							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Start Date </label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="ostartdate" name="ostartdate">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer End Date </label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="oenddate" name="oenddate">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Discription </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="odiscription" name="odiscription" placeholder="Enter Offer Discription ">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Minimum Amount </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="ominamount" name="ominamount" placeholder="Enter Offer Minimum Amount ">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Maximum Amount </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="omaxamount" name="omaxamount" placeholder="Enter Offer Maximum Amount ">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Coupon </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="ocoupon" name="ocoupon" placeholder="Enter Offer Coupon  ">
								</div>
							</div>

							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Discount </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="odiscount" name="odiscount" placeholder="Enter Offer Discount ">
								</div>
							</div>

						
							<div class="row">
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		@endsection

		@section('js')
		<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
		<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
		<script>
			$(document).ready(function() {

				$("#form1").validate({

					rules: {

						offer: {

							required: true,
						},

						ostartdate: {

							required: true,
						},
						oenddate: {

							required: true,
						},
						odiscription: {

							required: true,
						},
						ominamount: {

							required: true,
						},
						omaxamount: {

							required: true,
						},
						ocoupon: {

							required: true,
						},
						odiscount: {

							required: true,
						},
						oactive: {

							required: true,
						},
						oaddtime: {

							required: true,
						},
					},

					messages: {

						offer: {

							required: "Please Enter Offer !!! ",
						},
						ostartdate: {

							required: "Please Enter Start Date !!! ",
						},
						oenddate: {

							required: "Please Enter End Date !!! ",
						},
						odiscription: {

							required: "Please Enter Discription !!! ",
						},
						ominamount: {

							required: "Please Enter Minimum Amount !!! ",
						},
						omaxamount: {

							required: "Please Enter MAximum Amount !!! ",
						},
						ocoupon: {

							required: "Please Enter Coupon !!! ",
						},
						odiscount: {

							required: "Please Enter Discount !!! ",
						},
					
						oaddtime: {

							required: "Please Enter Date Time !!! ",
						}

					}
				})
			})
		</script>
		@endsection