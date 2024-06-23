@extends('admin.layout.master')

@section('title')
    Update Offer
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
								<li class="breadcrumb-item active" aria-current="page">Update Offer </li>
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
					
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<form action="/editoffer" method="post">
									@csrf
									<input type="text" hidden id="editoffer" name="editoffer" value="{{$offer->offer_id}}">

								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">UPDATE OFFER </h5>
									</div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer </label>
										<div class="col-sm-9">
											<input type="text"  class="form-control" id="offer" name="offer" value="{{$offer->offer_title}}" placeholder="Enter Offer">
										</div>
									</div>


									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Start Date  </label>
										<div class="col-sm-9">
											<input type="date"  class="form-control" id="ostartdate" name="ostartdate" value="{{$offer->offer_start_date}}"  >
										</div>
									</div>

                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer End Date  </label>
										<div class="col-sm-9">
											<input type="date"  class="form-control" id="oenddate" name="oenddate" value="{{$offer->offer_end_date}}" >
										</div>
									</div>

                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Discription  </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="odiscription" name="odiscription"  value="{{$offer->offer_description}}" placeholder="Enter Offer Discription " >
										</div>
									</div>
									
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Minimum Amount  </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="ominamount" name= "ominamount" value="{{$offer->offer_min_amont}}"  placeholder="Enter Offer Minimum Amount " >
										</div>
									</div>
									
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Maximum Amount   </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="omaxamount" name="omaxamount"  value="{{$offer->offer_max_amont}}" placeholder="Enter Offer Maximum Amount " >
										</div>
									</div>
									
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Coupon  </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="ocoupon" name="ocoupon" value="{{$offer->offer_coupon}}" placeholder="Enter Offer Coupon  " >
										</div>
									</div>

                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Discount  </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="odiscount" name="odiscount"  value="{{$offer->offer_discount}}" placeholder="Enter Offer Discount " >
										</div>
									</div>

									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer is active  </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="oactive" name="oactive"  value="{{$offer->offer_is_active}}" placeholder="Enter Offer active or not " >
										</div>
									</div>

									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Offer Added date time  </label>
										<div class="col-sm-9">
											<input type="datetime-local" class="form-control" id="oaddtime" name="oaddtime" value="{{$offer->offer_added_datetime}}"  placeholder="Enter Offer active or not " >
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