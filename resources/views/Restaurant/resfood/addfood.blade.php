@extends('restaurant.reslayout.resmaster')

@section('title')
Add Food
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
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Food</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Food</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/resfood"><button type="button" class="btn btn-primary">Back</button></a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">


            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form id="form1" action="/insertfood" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(session()->has('restaurantlogin'))
                        <input type="text" hidden name="restaurant" id="restaurant" value="{{Session::get('restaurantid')}}">
                        @endif

                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Add Food</h5>
                            </div>
                            @if($message=Session::get('message'))

                            <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show">
                                <div class="text-white">{{ $message  }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if($error = Session::get('error'))

                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                <div class="text-white">{{ $error  }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <hr />
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category </label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-control" id="category" name="category" placeholder="Enter Your Area">

                                        <option value="">Select Category</option>
                                        @foreach($category as $row)
                                        <option value="{{$row->cate_id}}">{{$row->cate_name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">SubCategory</label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Enter Your Area">

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="foodtitle" name="foodtitle" placeholder="Enter Your Food Title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="foodtype" name="foodtype" placeholder="Enter Your Food Type">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Image1</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image1" name="image1" placeholder="Enter Your offer Title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Image2</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image2" name="image2" placeholder="Enter Offer Description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Image3</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image3" name="image3" placeholder="Enter Offer Minimum Amount">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Video Url</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="video" name="video" placeholder="Enter Food Web Url">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food About</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="about" name="about" placeholder="Ente Food About">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food Saleprice</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="saleprice" name="saleprice" placeholder="Enter Food Sale Price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food mainprice</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mainprice" name="mainprice" placeholder="Enter Food Main Price">
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

             
                subcategory: {

                    required: true,
                },
                foodtitle: {

                    required: true,
                },
                foodtype: {

                    required: true,
                },
                image1: {

                    required: true,
                },
                image2: {

                    required: true,
                },
                image3: {

                    required: true,
                },
                video: {

                    required: true,
                },
                about: {

                    required: true,
                },
                saleprice: {

                    required: true,
                },
                mainprice: {

                    required: true,
                },
                

            },

            messages: {


                subcategory: {

                    required: "Please Select SubCategory  !",
                },
                foodtitle: {

                    required: "Please Enter Food Title !",
                },
                image1: {

                    required: "Please Enter Food Image !",
                },
                image2: {

                    required: "Please Enter Food Image !",
                },
                image3: {

                    required: "Please Enter Food Image !",
                },
                video: {

                    required: "Please Enter Food Video Url !",
                },
                about: {

                    required: "Please Enter Food About!",
                },
                saleprice: {

                    required: "Please Enter Sale Price !",
                },
                mainprice: {

                    required: "Please Enter Main price !",
                }
                

            }
        })
    })
</script>
<script>
    $(document).ready(function() {

        $('#category').on('change', function() {
            var category = this.value;
            // alert(category);
            $("#subcategory").html('');
            $.ajax({
                url: "/getsubcategory",
                type: "POST",
                data: {
                    category: category,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {

                    //alert(result);
                    $('#subcategory').html('<option value=""> Select SubCategory </option>');
                    $.each(result.subcategory, function(key, value) {
                        $("#subcategory").append('<option value="' + value
                            .subcate_id + '">' + value.subcate_name + '</option>');
                    });

                }
            });
        });


    });
</script>
@endsection