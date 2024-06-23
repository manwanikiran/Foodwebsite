@extends('admin.layout.master')

@section('title')

Dashboard

@endsection

@section('main')


<div class="page-content">
    
    <div class="ms-auto">

        <a href="/expiredpackage"><button type="button" style="margin-left: 850px;" class="btn btn-primary"> Update Package status</button></a>


    </div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

    </div>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Restaurant</p>
                            <h4 class="my-1 text-white">{{$countrestaurant}}</h4>

                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Users</p>
                            <h4 class="my-1 text-white">{{$countuser}}</h4>

                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Offer</p>
                            <h4 class="my-1 text-white">{{$countoffer}}</h4>
                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-binoculars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-0 text-white">Order</p>
                            <h4 class="my-1 text-white">{{$countorder}}</h4>
                        </div>
                        <div class="widgets-icons bg-light-transparent text-white"><i class="bx bx-line-chart-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--end row-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Order</div>

		<div class="ms-auto">

		</div>
	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. Number</th>
							<th>User </th>
							<th>city</th>
							<th>Area</th>
							<th>Payment status</th>
							<th>Delivery Status</th>
							<th>Total amount</th>
							<th>Delivery boy </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->user_name}}</td>
							<td>{{$row->city_name}}</td>
							<td>{{$row->area_name}}</td>
							<td>{{$row->order_status}}</td>
							
							<td>{{$row->log_status}}</td>
				
							<td>{{$row->order_total_payment}}</td>
							
							@if($row->del_boy_name=="")
							<td><a href="/allocateorder/{{$row->Orderid}}"><button class="btn btn-danger">Allocate Delivery Boy </button></a></td>
							@else
							<td>{{$row->del_boy_name}}</td>
							@endif
							<td><a href="/orderdetail/{{$row->Orderid}}"><button class="btn btn-primary">View More</button></a><br>
								<!-- <a href="/allocateorder/{{$row->order_id}}"><button class="btn btn-success">Allocate Order </button></a> -->
							</td>
						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<th>Sr. Number</th>
						<th>User </th>
						<th>city</th>
						<th>Area</th>
						<th>Payment status</th>
						<th>Total amount</th>
						<th>Delivery boy </th>
						<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
    <!-- end row  -->
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Restaurant</div>

            <div class="ms-auto">

                <div class="btn-group">
                    <a href="/restaurant"> <button type="button" class="btn btn-primary">View All</button></a>

                </div>
            </div>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. Number</th>
                                <th>Restaurant Name</th>
                                <th>Area</th>
                                <th>Phone no</th>
                                <th>Pincode</th>
                                <th>Block</th>
                                <th>Approve</th>
                                <th>Verify</th>
                                <th>Type of Restaurant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restaurant as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$row->res_name}}</td>
                                <td>{{$row->area_name}}</td>
                                <td>{{$row->res_contact1}} </td>
                                <td>{{$row->res_pincode}}</td>

                                @if(($row->res_is_block)=="yes")
                                <td><a href="/resisblock/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
                                @else
                                <td><a href="/resisblock/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></a></td>
                                @endif

                                @if(($row->res_is_approve)=="yes")
                                <td><a href="/resisapprove/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
                                @else
                                <td><a href="/resisapprove/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></a></td>
                                @endif

                                @if(($row->res_is_verify)=="yes")
                                <td><a href="/resisverify/{{$row->res_id}}/no"><button class="btn btn-primary">Yes</button></td>
                                @else
                                <td><a href="/resisverify/{{$row->res_id}}/yes"><button class="btn btn-danger">No</button></td>
                                @endif

                                <td>{{$row->res_type_name}}</td>
                                <td><a href="/restaurantdetail/{{$row->res_id}}"><button class="btn btn-primary">View More</button></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. Number</th>
                                <th>Restaurant Name</th>
                                <th>Area</th>
                                <th>Phone no</th>
                                <th>Pincode</th>
                                <th>Block</th>
                                <th>Approve</th>
                                <th>Verify</th>
                                <th>Type of Restaurant</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>

            <div class="ms-auto">

                <div class="btn-group">
                    <a href="/user"> <button type="button" class="btn btn-primary">View All</button></a>

                </div>
            </div>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. Number</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Verify</th>
                                <th>Date/Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$row->user_name}}</td>
                                <td>{{$row->user_contact}}</td>
                                <td>{{$row->user_email}}</td>
                                <td>{{$row->user_password}}</td>

                                @if(($row->user_is_verify)=="yes")
                                <td><a href="/userisverify/{{$row->user_id}}/no"><button class="btn btn-primary">Yes</button></a></td>
                                @else
                                <td><a href="/userisverify/{{$row->user_id}}/yes"><button class="btn btn-danger">No</button></a></td>
                                @endif

                                <td>{{$row->user_reg_datetime}}</td>
                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. Number</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Verify</th>
                                <th>Date/Time</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>






</div>


@endsection