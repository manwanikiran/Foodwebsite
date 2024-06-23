@extends('deliveryboy.layout.master')

@section('title')

Dashboard

@endsection

@section('main')

<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-white">Order</p>
                            <h4 class="my-1 text-white">{{$countorder}}</h4>

                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-dish"></i>
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
                            <p class="mb-0 text-white">Pending Order</p>
                            <h4 class="my-1 text-white">{{$countpending}}</h4>
                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bxs-send"></i>
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
                            <p class="mb-0 text-white">Complete order</p>
                            <h4 class="my-1 text-white">{{$countdone}}</h4>

                        </div>
                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i class="bx bx-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
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
							<th>Order id </th>
							
							<!-- <th>Delivery boy</th> -->
							<th>user name</th>
							<th>user address</th>
							<th>payment status</th>
							<th>Total Payment</th>
							<th>order item</th>
							<th>Order status </th>
							<!-- <th>Action</th>  -->
						</tr>
					</thead>
					<tbody>
						@foreach($delorder as $row)
						<tr>
							<td>{{$loop->index +1}}</td>
							<td>{{$row->order_id}}</td>

						
							<!-- <td>{{$row->del_boy_name}}</td> -->
							<td>{{$row->user_name}}</td>
							<td>{{$row->user_address}}</td>
							
							<td>{{$row->order_status}}</td>
							<td>{{$row->order_total_payment}}</td>
							<td>{{$row->foodname}}</td>
							@if(($row->log_status)=="done")
							<td><a href="/logstatus/{{$row->log_id}}/pending"><button class="btn btn-primary">Done</button></a></td>

							@else
							<td><a href="/logstatus/{{$row->log_id}}/done"><button class="btn btn-danger">Pending</button></a></td>
							@endif

						</tr>

						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Sr. Number</th>
							<th>Order id </th>
							<th>Order status </th>
							<!-- <th>Delivery boy</th> -->
							<th>user name</th>
							<th>user address</th>
							<th>payment status</th>
							<th>Total Payment</th>
							<th>order item</th>
							<!-- <th>Action</th>  -->
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>


@endsection