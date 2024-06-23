@extends('restaurant.reslayout.resmaster')

@section('title')
Restaurant Dashboard
@endsection

@section('main')


<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
            <div class="card radius-10 bg-primary">
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
                        <div class="widgets-icons bg-light-transparent text-white"><i class="bx bx-dish"></i>
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
                            <p class="mb-0 text-white">Cart</p>
                            <h4 class="my-1 text-white">{{$countcart}}</h4>
                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
        @foreach($package as $row)
        @if("$row->package_title" == 'Sliver')
        <div class="col">

            <div class="card radius-10" style="background: gray;">

                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Current Package</p>

                            <h4 class="my-1 text-white">{{$row->package_title}}</h4>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @elseif("$row->package_title" == 'Golden')
        <div class="col">

            <div class="card radius-10" style="background: yellow;">

                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Current Package</p>

                            <h4 class="my-1 text-white">{{$row->package_title}}</h4>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @else("$row->package_title" == 'Diamond')
        <div class="col">

            <div class="card radius-10" style="background: purple;">

                <div class="card-body">

                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Current Package</p>

                            <h4 class="my-1 text-white">{{$row->package_title}}</h4>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @endif
        @endforeach


    </div>

    <div class="page-content">
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
                                <th>User address </th>
                                <th>payment status</th>
                                <th>Delivery boy </th>
                                <th>payment method</th>
                                <!-- <th>Offer </th>
							<th>Order discount</th> -->
                                <th>Total amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resorder as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$row->user_name}}</td>
                                <td>{{$row->user_address}}</td>
                                <td>{{$row->order_status}}</td>
                                @if(($row->del_boy_id)=="")
                                <td style="color: red;"><u>Delivery Boy Not Allocated</u> </td>
                                @else
                                <td>{{$row->del_boy_name}}</td>
                                @endif
                                <td>{{$row->order_pay_mode}}</td>
                                <!-- <td>{{$row->offer_title}}</td>
							<td>{{$row->order_discount}}</td> -->
                                <td>{{$row->order_total_payment}}</td>
                                <td><a href="/resorderdetail/{{$row->order_id}}"><button class="btn btn-primary">View More</button></a></td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. Number</th>
                                <th>User </th>
                                <th>User address </th>
                                <th>payment status</th>
                                <th>Delivery boy </th>
                                <th>payment method</th>
                                <!-- <th>Offer </th>
							<th>Order discount</th> -->
                                <th>Total amount</th>
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
            <div class="breadcrumb-title pe-3">Offer</div>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th>Sr. Number</th>
                                <th>Tittle</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <!-- <th>Discription</th> -->
                                <th>Minimum amo.</th>
                                <th>Maximum amo.</th>
                                <!-- <th>Coupon</th> -->
                                <th>Discount</th>
                                <th>Active</th>
                                <!-- <th>Date/time</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offer as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$row->offer_title}}</td>
                                <td>{{$row->offer_start_date}}</td>
                                <td>{{$row->offer_end_date}}</td>

                                <td>{{$row->offer_min_amont}}</td>
                                <td>{{$row->offer_max_amont}}</td>

                                <td>{{$row->offer_discount}}</td>
                                <td>{{$row->offer_is_active}}</td>

                                <td><a href="/resofferdetail/{{$row->offer_id}}"><button class="btn btn-primary">View more</button></a></td>


                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. Number</th>
                                <th>Tittle</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Minimum amo.</th>
                                <th>Maximum amo.</th>
                                <!-- <th>Coupon</th> -->
                                <th>Discount</th>
                                <th>Active</th>
                                <!-- <th>Date/time</th> -->
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection