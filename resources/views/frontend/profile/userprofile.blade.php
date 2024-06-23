@extends('frontend.layout.listmaster')

@section('title')

Profile

@endsection

@section('css')
<link href="{{URL::to('/')}}/frontassets/css/booking-sign_up.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/detail-page-delivery.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/help.css" rel="stylesheet">

<style>
    #form1 label.error {
        color: red;
    }
</style>
@endsection

@section('main')
<main>
    <div class="hero_single inner_pages background-image" data-background="url({{URL::to('/')}}/uploads/restaurantindex/res5.png)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-8 col-lg-10 col-md-8">
                       <h1>My Profile</h1>

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
                    </div>
                 
                </div>

            </div>
        </div>
    </div>

    <div class="container margin_60_40">
        <center>
            <div class="main_title version_2">
                <span><em></em></span>
               <b> <h2>My Profile</h2></b>

            </div>
        </center>
    
        <form action="/edituser" method="post" id="form1">

            @csrf
            @if(session()->has('userlogin'))
            <input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
            @endif
            <div class="list_articles add_bottom_25 clearfix">


                <ul>
                    <li><i class="icon_profile"></i>Name</li>
                    <li><i class=""></i><input type="text" name="username" value="{{$user->user_name}}" style="border:hidden;width: 550px;"></li>
                    <li><br><i class="icon_mail"></i>Email</li>
                    <li><i class=""></i><textarea style="border:hidden;width: 550px;" name="email" value="{{$user->user_email}}">{{$user->user_email}}</textarea></li>
                    <li><i class="icon_phone"></i>Contact Number</li>
                    <li><i class=""></i>+91<input type="text" style="border:hidden;width: 500px;" name="contactnumber" value="{{$user->user_contact}}"></li>

                    <li><i class="icon_building"></i>City</li>
                    @if($useradd == null)

                    <li><i class=""></i><select type="text" class="" style="border:hidden;width: 550px;" id="city" name="city" aria-label="Default select example">
                            <option value="">Select City</option>
                            @foreach($city as $row)
                            <option value="{{$row->city_id}}">{{$row->city_name}}</option>
                            @endforeach
                        </select>
                    </li>

                    @else

                    <li><i class=""></i><select type="text" style="border:hidden;width: 550px;" id="city" name="city" aria-label="Default select example">
                            <option value="">Select City</option>
                            @foreach($city as $row)
                            <option @if(($row->city_id)==($useradd->city_id)) selected @endif value="{{$row->city_id}}"->{{$row->city_name}}</option>

                            @endforeach
                        </select>
                    </li>
                    @endif


                    <li><i class="arrow_move"></i>Area</li>
                    @if($useradd == null)
                    <li><i class=""></i><select type="text" style="border:hidden;width: 550px;" id="area" name="area" aria-label="Default select example">
                            <option value="">Select Area</option>

                        </select></li>
                    @else

                    <li><i class=""></i><select type="text" style="border:hidden;width: 550px;" id="area" name="area" aria-label="Default select example">
                            <option value="{{$useradd->area_id}}">{{$useradd->area_name}}</option>
                            @foreach($area as $row)
                            <option value="{{$row->area_id}}">{{$row->area_name}}</option>
                            @endforeach
                        </select>
                    </li>
                    @endif



                    <li><br><i class="icon_building_alt"></i><label style="width: 500px;">Address</label> </li>
                    @if($useradd == null)
                    <li><i class=""></i><textarea style="border:hidden;width: 550px;" id="address" name="address"></textarea></li>
                    @else
                    <li><i class=""></i><textarea style="border:hidden;width: 550px;" id="address" name="address" value="{{$useradd->user_address}}">{{$useradd->user_address}}</textarea></li>
                    @endif

                    <li><i class="icon_compass"></i>Landmark</li>
                    @if($useradd == null)
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="landmark" name="landmark"></li>
                    @else
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="landmark" name="landmark" value="{{$useradd->user_address_landmark}}"></li>
                    @endif

                    <li><i class="icon_pin"></i>Pincode</li>
                    @if($useradd == null)
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="pincode" name="pincode"></li>
                    @else
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="pincode" name="pincode" value="{{$useradd->user_address_pincode}}"></li>
                    @endif

                    <li><i class="icon-food_icon_shop"></i>Type</li>
                    @if($useradd == null)
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="type" name="type" value=""></li>
                    @else
                    <li><i class=""></i><input type="text" style="border:hidden;width: 550px;" id="type" name="type" value="{{$useradd->user_address_type}}"></li>
                    @endif


                </ul>

            </div>
            <center>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                </div>
            </center>
      
        </form>
      
        <!-- /list_articles -->
        <div>
            </br>
            <center>
                <div class="main_title version_2">
                    <span><em></em></span>
                   <b ><h2>My Order</h2></b>
            </center>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">

                        <thead>
                            <th>sr no.</th>
                            <th>Item</th>
                            <th>Payment Mode</th>
                            <th>payment Status</th>
                            <th>total paymant</th>
                            <th>Delivery Boy</th>
                            <th>Deliver status</th>
                        </thead>
                        <tbody>
                            @foreach($orderprofile as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$row->foodname}}</td>
                                <td>{{$row->order_pay_mode}}</td>
                                
                                <td>{{$row->order_status}}</td>
                                <td>{{$row->order_total_payment}}</td>
                                @if(($row->del_boy_id)=="")
                                <td style="color: red;"><u>Delivery Boy Not Allocated</u> </td>
                                @else
                                <td>{{$row->del_boy_name}}</td>
                                @endif
                                @if(($row->log_status)=="done")
                                <td><button class="btn btn-primary"  id="logstatus" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">Done</button></td>

                                @else
                                <td><button class="btn btn-danger"  id="logstatus" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal2">Pending</button></td>
                                @endif
                            </tr>


                            @endforeach
                        </tbody>
                        <tfoot>
                        <th>sr no.</th>
                            <th>Item</th>
                            <th>Payment Mode</th>
                            <th>payment Status</th>
                            <th>total paymant</th>
                            <th>Delivery Boy</th>
                            <th>Deliver status</th>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleVerticallycenteredModal2" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Warning!!!</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<div class="modal-body">You can not access this Field</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>
</main>


@endsection

@section('js')
<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {

        $("#form1").validate({

            rules: {

                address: {

                    required: true,
                },

                landmark: {

                    required: true,
                },
                pincode: {

                    required: true,
                },
                type: {

                    required: true,
                }
            },

            messages: {

                address: {

                    required: "Please Enter Address !!! ",
                },
                landmark: {

                    required: "Please Enter Landmark !!! ",
                },
                pincode: {

                    required: "Please Enter Pincode !!! ",
                },
                type: {

                    required: "Please Enter Address Type !!! ",
                },
            }
        })
    })
</script>

<script>
	$(document).ready(function() {

	
		$(document).on('click', "#logstatus", function() {

			// alert ("Only Admin can Approve");
		})
	});
</script>

<script>
    $(document).ready(function() {

        $('#city').on('change', function() {
            var city = this.value;

            $("#area").html('');
            $.ajax({
                url: "/getareauser",
                type: "POST",
                data: {
                    city: city,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {


                    $('#area').html('<option value="">-- Select Area --</option>');
                    $.each(result.area, function(key, value) {
                        $("#area").append('<option value="' + value
                            .area_id + '">' + value.area_name + '</option>');
                    });

                }
            });
        });


    });
</script>

@endsection