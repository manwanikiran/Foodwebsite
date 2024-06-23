<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- ajax  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Package</title>


    <style>
        #form1 label.error {
            color: red;
        }
    </style>

</head>

<body class="bg-login">


    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">

                        <div class="card shadow-none">
                            <div class="card-body">
                                <form action="/insertpackageorder" class="row g-4" method="post">
                                    @csrf
                                    <input type="text" hidden name="payid" id="payid">
                                    <div class="form-body">
                                    <div class="row mb-3">
                                       <h3 style="margin-left: 80px;color: blue;margin-top: 50px;"> Select Your Package</h3>
                                    </div>

                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Restaurant</label>
                                            <div class="col-sm-9">
                                                <select type="text" class="form-select" id="res" name="res" placeholder="Enter Your State">
                                                    <option value="">Select Your Restaurant</option>

                                                    @foreach($res as $row)
                                                    <option value="{{$row->res_id}}">{{$row->res_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        @foreach($package as $div)
                                        <div class="border s-4 rounded">
                                            <div class="text-center mb-4">
                                                <br>
                                                <input type="text" hidden checked  name="packageid" id="packageid" value="{{$div->package_id}}">
                                                <h3 class=""> {{$div->package_title}}</h3>
                                                <p class="mb-0">{{$div->package_discription}}</p>
                                                <input type="text" hidden id="day" name="day" value="{{$div->package_days}}">
                                                <input type="text" readonly id="totalamount" name="totalamount" style="border: hidden;margin-left: 130PX;" value="{{$div->package_amount}}"></p>

                                               
                                                <input type="radio" class="amount" name="amount" id="amount" value="{{$div->package_amount}}" >
                                            
                                            </div>
                                            <div class="login-separater text-center mb-4">

                                            </div>
                                            <div class="form-body">
                                                <!-- <form class="row g-4"> -->

                                                <!-- </form> -->
                                            </div>

                                        </div>
                                        @endforeach

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" name="finalorder" id="finalorder" class="btn btn-primary px-5 d-none">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button type="submit" name="finalorder" id="finalorder" class="btn btn-primary px-5 paynow">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--wrapper-->

    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{URL::to('/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{URL::to('/')}}/assets/js/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{URL::to('/')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script src="assets/js/app.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
    <!--app JS-->



    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function() {
            //alert("hello");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".paynow").click(function(e) {
                e.preventDefault();
                var totalAmount = $("input[type='radio']:checked").val();
                // var packageid =$("#packageid").val();
                // alert(packageid);
                // alert(totalAmount);
                var options = {
                    "key": "rzp_test_yffpa5kVnpmF16",
                    "amount": (totalAmount * 100), // 2000 paise = INR 20
                    "name": "Tutsmake",
                    "description": "Payment",
                    "handler": function(response) {

                        //alert("done");

                        $("#payid").val(response["razorpay_payment_id"]);

                        $("#finalorder").click();
                        //alert(response["razorpay_payment_id"]);

                        //onsole.log(response);
                        // window.location.href = "/insertorder";
                    },
                    "prefill": {
                        "contact": '9988665544',
                        "email": 'tutsmake@gmail.com',
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            });
        });
    </script>



</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/authentication-signup-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Jan 2023 08:56:20 GMT -->

</html>