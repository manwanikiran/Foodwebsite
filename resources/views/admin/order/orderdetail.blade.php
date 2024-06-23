@extends('admin.layout.master')

@section('title')

Order

@endsection

@section('main')
<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Order</div>
				
					<div class="ms-auto">
						<div class="btn-group">
							 <a href="/order"><button type="button" class="btn btn-primary">Back</button> </a>
						
						</div> 
					</div>
				</div>
    
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								
								<tbody>
										<tr>
                                            <td>User Name</td>
                                            <td>{{$order->user_name}}</td>
                                        </tr>

                                        <tr>
                                            <td>User address</td>
                                            <td>{{$order->user_address}}</td>
                                        </tr>

                                        <tr>
                                            <td>Payment Status</td>
                                            <td>{{$order->order_status}}</td>
                                        </tr>
                                         
                                        <tr>
                                            <td>Delivery Boy</td>
                                            <td>{{$order->del_boy_name}}</td>
                                        </tr>

                                        <tr>
                                            <td>Order is pay </td>
                                            <td>{{$order->order_is_pay}}</td>
                                        </tr>

                                        <tr>
                                            <td>Paymanet Mode</td>
                                            <td>{{$order->order_pay_mode}}</td>
                                        </tr>

                                        <tr>
                                            <td>Transcation number</td>
                                            <td>{{$order->order_transcation_no}}</td>
                                        </tr>

                                        <tr>
                                            <td>Date & Time</td>
                                            <td>{{$order->order_datetime}}</td>
                                        </tr>
<!-- 
                                        <tr>
                                            <td>Offer Title</td>
                                            <td>{{$order->offer_title}}</td>
                                        </tr> -->

                                        <tr>
                                            <td>Total Payment</td>
                                            <td>{{$order->order_total_payment}}</td>
                                        </tr>
<!--                                        
                                        <tr>
                                            <td>Order Discount</td>
                                            <td>{{$order->order_discount}}</td>
                                        </tr> -->
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
</div>

@endsection

@section('js')

<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

@endsection