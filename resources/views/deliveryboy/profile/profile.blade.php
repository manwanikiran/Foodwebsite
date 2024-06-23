@extends('deliveryboy.layout.master')

@section('title')
Profile
@endsection

@section('main')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Deliveryboy Profile</div>
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
                                <img src="{{URL::to('/')}}/uploads/deliveryboy/{{Session::get('deliveryboyimg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="130px" height="130px">
                                <div class="mt-3">
                                    <h4>{{Session::get('deliveryboyname')}}</h4>
                                    <hr class="my-4" />
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm"></p>
                                    <div>{{$deliveryboy->del_boy_email}}</div>
                                    <div>{{$deliveryboy->del_boy_contact}}</div>
                                    <br><br>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="form1" action="/editdeliveryboy" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="editadmin" id="editadmin" value="{{$deliveryboy->del_boy_id}}">
                                <input type="text" hidden value="{{$deliveryboy->del_boy_photo}}" name="oldimg" id="oldimg">
                                <input type="text" hidden value="{{$deliveryboy->del_boy_aadharcard}}" name="oldimg1" id="oldimg1">
                                <input type="text" hidden value="{{$deliveryboy->del_boy_adhar_back}}" name="oldimg2" id="oldimg2">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Admin Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$deliveryboy->del_boy_name}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="{{$deliveryboy->del_boy_contact}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="email" name="email" value="{{$deliveryboy->del_boy_email}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">City</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select type="text" class="form-select" id="city" name="city" aria-label="Default select example">
                                            <option value="">Select City</option>
                                            @foreach($city as $row)
                                            <!-- <option value="{{$row->city_id}}">{{$row->city_name}}</option> -->
                                            <option @if(($row->city_id)==($deliveryboy->city_id)) selected @endif value="{{$row->city_id}}"->{{$row->city_name}}</option>

                                            @endforeach
                                        </select>
                                      
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Area</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select type="text" class="form-select" id="area" name="area" aria-label="Default select example">
                                            <option value="{{$deliveryboy->area_id}}">{{$deliveryboy->area_name}}</option>
                                            @foreach($area as $row)
                                            <option value="{{$row->city_id}}">{{$row->city_name}}</option>
                                            <!-- <option @if(($row->area_id)==($deliveryboy->area_id)) selected @endif value="{{$row->area_id}}"->{{$row->area_name}}</option> -->

                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/deliveryboy/{{$deliveryboy->del_boy_photo}}" height="100px" width="100px" name="img1"></div>
                                        <input type="file" class="form-control" id="img" name="img" placeholder="">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Adharcard (Front) </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/deliveryboy/{{$deliveryboy->del_boy_aadharcard}}" height="100px" width="100px" name="img1"></div>
                                        <input type="file" class="form-control" id="img1" name="img1" placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Adharcard(Back) </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/deliveryboy/{{$deliveryboy->del_boy_adhar_back}}" height="100px" width="100px" name="img1"></div>
                                        <input type="file" class="form-control" id="img2" name="img2" placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Adharcard Number </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="adharcardno" name="adharcardno" value="{{$deliveryboy->del_boy_aadharcard_no}}" />

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </form>
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

        $('#city').on('change', function() {
            var city = this.value;

            $("#area").html('');
            $.ajax({
                url: "/getareadeliveryboyprofile",
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