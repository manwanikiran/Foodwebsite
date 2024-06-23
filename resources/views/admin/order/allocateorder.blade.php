@extends('admin.layout.master')

@section('title')

Allocate Order

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

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
         
                <form action="/insertlog" method="post">
                    @csrf
                    <input type="text" hidden id="order" name="order" value="{{$order->order_id}}">
                    <div class="row">
                        <div class="col-5"> </div>
                        <div class="col-7"><b> Allocate Delivery Boy</b></div>
                    </div>
                    <br><br>
                  
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">City</label>
                        </div>
                        <div class="col-6">
                            <select type="text" class="form-select" id="city" name="city" aria-label="Default select example">
                                <option value="">Select City</option>
                                @foreach($city as $row)
                                <option value="{{$row->city_id}}">{{$row->city_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">

                            <label class="form-label">Area</label>
                        </div>
                        <div class="col-6">
                            <select type="text" class="form-select" id="area" name="area" aria-label="Default select example">
                                <option value="">Select Area</option>

                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Delivery Boy</label>
                        </div>
                        <div class="col-6">
                            <select type="text" class="form-select" id="delboy" name="delboy" aria-label="Default select example">
                                <option value="">Select DeliveryBoy</option>

                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-7">
                            <button type="submit" class="btn btn-success">Allocate</button>
                        </div>
                    </div>
                </form>
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
                url: "/getareaorder",
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

<script>
    $(document).ready(function() {

        $('#area').on('change', function() {
            var area = this.value;

            $("#delboy").html('');
            $.ajax({
                url: "/getdelboy",
                type: "POST",
                data: {
                    area: area,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result2) {


                    $('#delboy').html('<option value="">-- Select delboy --</option>');
                    $.each(result2.delboy, function(key, value) {
                        $("#delboy").append('<option value="' + value
                            .del_boy_id + '">' + value.del_boy_name + '</option>');
                    });

                }
            });
        });


    });
</script>
@endsection