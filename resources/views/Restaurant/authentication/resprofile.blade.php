@extends('restaurant.reslayout.resmaster')

@section('title')
Profile
@endsection

@section('main')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Restaurant Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">

            </nav>
        </div>
  
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <br><br>
                                <img src="{{URL::to('/')}}/uploads/restaurant/{{Session::get('reslogo')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="100px" height="100px">
                               
                                <div class="mt-3">
                                    <h4>{{Session::get('restaurantname')}}</h4>
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm"></p>
                                    <hr class="my-4" />
                                    <div>{{$restaurant->res_email}}</div>
                                    <div>{{$restaurant->res_contact1}}</div>
                                </div>
                                <br><br>
                            </div>
                           
                            <ul class="list-group list-group-flush">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <form id="form1" action="/editrestaurant" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="editrestaurant" id="editrestaurant" value="{{$restaurant->res_id}}">
                                <input type="text" hidden value="{{$restaurant->res_img1}}" name="oldimg1" id="oldimg1">
                                <input type="text" hidden value="{{$restaurant->res_img2}}" name="oldimg2" id="oldimg2">
                                <input type="text" hidden value="{{$restaurant->res_img3}}" name="oldimg3" id="oldimg3">

                                <input type="text" hidden value="{{$restaurant->res_gst_certi}}" name="oldimg4" id="oldimg4">
                                <input type="text" hidden value="{{$restaurant->res_coverimg}}" name="oldimg5" id="oldimg5">
                                <input type="text" hidden value="{{$restaurant->res_logo}}" name="oldimg6" id="oldimg6">

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Restaurant Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="restaurantname" name="restaurantname" value="{{$restaurant->res_name}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Contact Number(R)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="phone1" name="phone1" value="{{$restaurant->res_contact1}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Contact Number(O)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="phone2" name="phone2" value="{{$restaurant->res_contact2}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Email Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="email" name="email" value="{{$restaurant->res_email}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="address" name="address" value="{{$restaurant->res_address}}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">City</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select" id="city" name="city">
                                            <option value="">Select city</option>
                                            @foreach($city as $row)
                                            <option @if(($row->city_id)==($restaurant->city_id)) selected @endif value="{{$row->city_id}}">{{$row->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Area</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select" id="area" name="area">
                                            <option value="{{$restaurant->area_id}}">{{$restaurant->area_name}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Landmark</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="landmark" name="landmark" value="{{$restaurant->res_landmark}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Pincode</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="pincode" name="pincode" value="{{$restaurant->res_pincode}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Lattitude</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{$restaurant->res_latitude}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Longitude</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{$restaurant->res_longitude}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Image(1)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img1}}" height="90px" width="100px" name="img1"></div>
                                        <input type="file" class="form-control" id="img1" name="img1" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Image(2)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img2}}" height="90px" width="100px" name="img2"></div>
                                        <input type="file" class="form-control" id="img2" name="img2" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Image(3)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img3}}" height="90px" width="100px" name="img3"></div>
                                        <input type="file" class="form-control" id="img3" name="img3" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Cover Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_coverimg}}" height="90px" width="100px" alt="logo"></div>
                                        <input type="file" class="form-control" id="coverimg" name="coverimg" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Logo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_logo}}" height="90px" width="100px" alt="logo"></div>
                                        <input type="file" class="form-control" id="logo" name="logo" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Video url</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="video" name="video" value="{{$restaurant->res_web_url}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">About</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="about" name="about" value="{{$restaurant->res_about}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Pick up line</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="pickupline" name="pickupline" value="{{$restaurant->res_pickup_line}}" />
                                    </div>
                                </div>

                                <!-- <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0" style="margin-top:6px">Register Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="datetime" name="datetime" value="{{$restaurant->res_reg_datetime}}" />
                                        </div>
                                    </div> -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Gst Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="gstnumber" name="gstnumber" value="{{$restaurant->res_gst_number}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Gst Certificate</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_gst_certi}}" height="90px" width="100px" alt="logo"></div>

                                        <input type="file" class="form-control" id="gstcerti" name="gstcerti" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Restaurant type</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <!-- <input type="text" class="form-control" id="restype" name="restype" value="{{$restaurant->res_type_name}}" /> -->
                                        <select class="form-select" id="restype" name="restype" aria-label="Default select example">
                                            <option value="">Select Restauranttype</option>
                                            @foreach($restauranttype as $row)
                                            <option @if(($row->res_type_id)==($restaurant->res_type_id)) selected @endif value="{{$row->res_type_id}}">{{$row->res_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Timing</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="restiming" name="restiming" value="{{$restaurant->res_timing}}" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </form>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>


<script>
    $(document).ready(function() {

        $('#city').on('change', function() {
            var city = this.value;

            $("#area").html('');
            $.ajax({
                url: "/getarea",
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