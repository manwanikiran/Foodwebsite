@extends('frontend.layout.listmaster')

@section('css')

<link href="{{URL::to('/')}}/frontassets/css/detail-page.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/review.css" rel="stylesheet">
<style>
    #form1 label.error {
        color: red;
    }

    #form2 label.error {
        color: red;
    }
</style>
@endsection

@section('title')
Restaurant Detail
@endsection


@section('main')

<main>

    <div class="hero_in detail_page background-image" data-background="url({{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_coverimg}})">
        <!-- <img src="" style="height: 100%;width: 100%;" class="img-fluid lazy" alt=""> -->

        <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">

            <div class="container">
                <div class="main_info">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6">
                            <div class="head">
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>{{$restaurant->res_type_name}}</strong></div>
                            </div>
                            <h1>{{$restaurant->res_name}}</h1>
                            {{$restaurant->res_address}}
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-6 position-relative">
                            <div class="buttons clearfix">
                                <span class="magnific-gallery">
                                    <a href="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img1}}" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
                                    <a href="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img2}}" title="Photo title" data-effect="mfp-zoom-in"></a>
                                    <a href="{{URL::to('/')}}/uploads/restaurant/{{$restaurant->res_img3}}" title="Photo title" data-effect="mfp-zoom-in"></a>
                                </span>
                                <!-- <a href="#0" class="btn_hero wishlist"><i class="icon_heart"></i>Wishlist</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main_info -->
            </div>

        </div>
    </div>

    <!--/hero_in-->

    <div class="container margin_detail">
        <div class="row">
            <div class="col-lg-8">

                <div class="tabs_detail">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Information</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                        </li>
                    </ul>

                    <div class="tab-content" role="tablist">
                        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                            <div class="card-header" role="tab" id="heading-A">
                                <h5>
                                    <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                        Information
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">

                                <div class="card-body info_content">
                                    <div class="row">
                                        <div class="col-10">
                                            <p>{{$restaurant->res_about}}</p>
                                        </div>

                                        <div class="col-2">
                                            @foreach($menu as $row)
                                            
                                            @if($row->menu_img == '')

                                            <div><h4>No Menu Available</h4></div>

                                            @else

                                            <img src="{{URL::to('/')}}/uploads/menu/{{$row->menu_img}}" width="100px" height="100px" alt="">

                                            @endif

                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="add_bottom_25"></div>

                                    <!-- /pictures -->
                                    <h2>{{$restaurant->res_name}} Menu</h2>

                                    <!-- /menu-gallery -->
                                    <hr>
                                    <h3>Main Course</h3>
                                    <div class="menu-gallery">
                                        @foreach($food as $row)
                                        <form action="/insertcart" method="post">
                                            @csrf
                                            @if(session()->has('userlogin'))
                                            <input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
                                            @endif

                                            <input type="text" hidden id="qty" name="qty" value="{{$row->cart_qty}}">

                                            <input type="text" hidden name="res" id="res" value="{{$row->res_id}}">

                                            <!-- <input type="text" hidden name="foodqty" id="foodqty" value="1"> -->

                                            <input type="text" hidden name="foodid" id="foodid" value="{{$row->food_id}}">

                                            <div class="menu_item thumbs">
                                                <input type="text" hidden name="foodid" id="foodid" value="{{$row->food_id}}">

                                                <figure>
                                                    <a href="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" width="800" height="600" title="{{$row->food_title}}" data-effect="mfp-zoom-in">
                                                        <img src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" style="height:150px;width:150px;align-items: center;" data-src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" alt="" class="lazy">
                                                    </a>
                                                </figure>

                                                <div class="row">
                                                    <div class="col-8">

                                                        <h4>{{$row->food_title}}</h4>
                                                        <p>{{$row->food_about}}</p>

                                                    </div>

                                                    <input type="number" min="1" max="5" class="changeqty" name="foodqty" id="foodqty" value="1" style="width: 60px;height:30px;border-radius: 20px;border-color: black; text-align: center;">

                                                    <div class="col-1">

                                                        <em>₹{{$row->food_main_price}}</em>
                                                        <!-- <input type="number" min="1" class="changeqty" name="foodqty" id="foodqty" value="1" style="width: 70px;margin-left: 9px;border-radius: 20px;border-color: black; text-align: center;"> -->


                                                    </div>




                                                    <div class="col-2">

                                                        <button type="submit" style="width: 100px;  height: 50px; font-size: small; margin-left: 30px ;" class="btn_1">Add to cart</button>

                                                    </div>

                                                    <hr style="color: #C0C0C0;">

                                                </div>
                                            </div>
                                        </form>
                                        @endforeach

                                        <!-- viewmore  -->
                                        <div class="content_more">
                                            @foreach($foodmore as $row)

                                            <form action="/insertcart" method="post">
                                                @csrf
                                                @if(session()->has('userlogin'))
                                                <input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
                                                @endif
                                                <input type="text" hidden name="foodqty" id="foodqty" value="1">

                                                <input type="text" hidden name="foodid" id="foodid" value="{{$row->food_id}}">

                                                <div class="menu_item thumbs">
                                                    <input type="text" hidden name="foodid" id="foodid" value="{{$row->food_id}}">

                                                    <figure>
                                                        <a href="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" width="800" height="600" title="{{$row->food_title}}" data-effect="mfp-zoom-in">
                                                            <img src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" style="height:150px;width:150px;align-items: center;" data-src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" alt="" class="lazy">
                                                        </a>
                                                    </figure>

                                                    <div class="row">
                                                        <div class="col-8">

                                                            <h4>{{$row->food_title}}</h4>
                                                            <p>{{$row->food_about}}</p>

                                                        </div>

                                                        <input type="number" min="1" class="changeqty" name="foodqty" id="foodqty" value="1" style="width: 60px;height:30px;border-radius: 20px;border-color: black; text-align: center;">

                                                        <div class="col-1">

                                                            <em>₹{{$row->food_main_price}}</em>
                                                            <!-- <input type="number" min="1" class="changeqty" name="foodqty" id="foodqty" value="1" style="width: 70px;margin-left: 9px;border-radius: 20px;border-color: black; text-align: center;"> -->


                                                        </div>




                                                        <div class="col-2">

                                                            <button type="submit" style="width: 100px;  height: 50px; font-size: small; margin-left: 30px ;" class="btn_1">Add to cart</button>

                                                        </div>

                                                        <hr style="color: #C0C0C0;">

                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach


                                        </div>
                                        <!-- /content_more -->
                                        <a href="#0" class="show_hide" data-content="toggle-text">Read More</a>

                                    </div>
                                    <!-- /menu-gallery -->

                                    <!-- /menu-gallery -->

                                    <!-- /menu-gallery -->
                                    <hr>

                                    <div class="other_info">

                                        <h2>How to get to {{$restaurant->res_name}}</h2>

                                        <div class="row">

                                            <div class="col-md-4">

                                                <h3>Address</h3>
                                                <p>{{$restaurant->res_address}}<br></p>
                                                <strong>Follow Us</strong><br>
                                                <p class="follow_us_detail"><a href="#0"><i class="social_facebook_square"></i></a><a href="#0"><i class="social_instagram_square"></i></a><a href="#0"><i class="social_twitter_square"></i></a></p>

                                            </div>

                                            <div class="col-md-4">
                                                <h3>Opening Time</h3>
                                                <p><strong>Timing</strong><br> {{$restaurant->res_timing}}</p>
                                                <p>

                                                <p><span class="loc_closed">Sunday Closed</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Services</h3>
                                                <p><strong>Credit Cards</strong><br> Mastercard, Visa, Amex</p>
                                                <p><strong>Other</strong><br> Wifi, Parking, Wheelchair Accessible</p>
                                            </div>

                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab -->

                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5>
                                    <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                        Reviews
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body reviews">
                                    <!-- <div class="row add_bottom_45 d-flex align-items-center">
                                        <div class="col-md-3">
                                            <div id="review_summary">
                                                 <strong>8.5</strong>
                                                <em>Superb</em>
                                                <small>Based on 4 reviews</small> 
                                            </div>
                                        </div>
                                        <div class="col-md-9 reviews_sum_details">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Food Quality</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.0</strong></div>
                                                    </div>
                                              
                                                    <h6>Service</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>9.5</strong></div>
                                                    </div>
                                                 
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Location</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
                                                    </div>
                                         
                                                    <h6>Price</h6>
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-9 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div> -->

                                    <div id="reviews">

                                        @foreach($review as $row)


                                        <input type="text" hidden name="isdisplay" id="isdisplay" value="{{$row->review_is_display}}">
                                        <div class="review_card">
                                            <div class="row">
                                                <div class="col-md-2 user_info">

                                                    <figure><img src="{{URL::to('/')}}/uploads/restaurantindex/user1.png" width="150px" alt=""></figure>

                                                    <h5>{{$row->user_name}}</h5>
                                                </div>
                                                <div class="col-md-10 review_content">
                                                    <div class="clearfix add_bottom_15">
                                                        <span class="rating">{{$row->review_star}}<small>/10</small> <strong>Rating average</strong></span>
                                                        <!-- <em>Published 54 minutes ago</em> -->
                                                    </div>
                                                    <h4>{{$row->review_desc}}</h4>
                                                    <!-- <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.</p> -->
                                                    <!-- <ul>
                                                        <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
                                                        <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                                        <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                            <!-- /row -->
                                        </div>



                                        @endforeach

                                        <!-- /review_card -->

                                        <!-- /review_card -->

                                        <!-- /review_card -->
                                    </div>


                                    <!-- /reviews -->
                                    <form action="/insertreview" method="post" id="form1">
                                        @csrf
                                        <input type="text" hidden name="restaurant" id="restaurant" value="{{$restaurant->res_id}}">
                                        @if(session()->has('userlogin'))
                                        <input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
                                        @endif
                                        <div class="box_general write_review">
                                            <div class="form-group">
                                                <label style="font-size: 20px;">Your Review</label>
                                                <textarea class="form-control" style="height: 180px;border-style:inset;border-width: medium;" placeholder="Write your review to help others learn about Restaurant." name="review" id="review"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Rating</label>
                                                <input class="form-control" style="border-style:inset;border-width: medium;" type="text" placeholder="Rating out of 10" name="rating" id="rating">
                                            </div>
                                            <div class="text-end">
                                                @if(session()->has('userlogin'))
                                                <button type="submit" class="btn_1">Leave a review</button>
                                                @else
                                                <a href="/userlogin"> <button type="button" class="btn_1">Log In </button></a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tab-content -->

                </div>
                <!-- /tabs_detail -->
            </div>
            <!-- /col -->

            <div class="col-lg-4" id="sidebar_fixed">
                <div class="box_booking mobile_fixed">
                    <div class="head">
                        <h3>Contact Us</h3>
                        <small>Or Call us at 0434 3432245</small>
                        <a href="#0" class="close_panel_mobile"><i class="icon_close"></i></a>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <div id="message-detail-contact"></div>
                        <form method="post" action="/insertresinquiry" id="form2">
                            @csrf
                            <input type="text" hidden name="restaurant" id="restaurant" value="{{$restaurant->res_id}}">

                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name and Last Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="tel" minlength="10" maxlength="13" name="contact" id="contact" class="form-control" placeholder="Contact">
                            </div>
                            <div class="form-group add_bottom_15">
                                <textarea class="form-control" name="message" id="message" placeholder="Your message"></textarea>
                            </div>
                            <div class="" style="position: relative;">
                                <button class="btn_1 full-width" type="submit" value="">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /box_booking -->

            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>


@endsection

@section('js')
<script src="{{URL::to('/')}}/frontassets/js/specific_review.js"></script>

<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>

<script src="{{URL::to('/')}}/frontassets/js/sticky_sidebar.min.js"></script>
<script src="{{URL::to('/')}}/frontassets/js/specific_detail.js"></script>

<script>
    $(document).ready(function() {

        $("#form1").validate({

            rules: {

                review: {

                    required: true,
                },

                rating: {

                    required: true,

                }
            },

            messages: {

                review: {

                    required: "Please Enter Review !!! ",
                },
                rating: {

                    required: "Please Enter Rating !!! ",
                }
            }
        })
    })

    $(document).ready(function() {

        $("#form2").validate({

            rules: {

                name: {

                    required: true,
                },

                email: {

                    required: true,

                },
                contact: {

                    required: true,

                },
                message: {

                    required: true,

                }
            },

            messages: {

                name: {

                    required: "Please Enter Name !!! ",
                },
                email: {

                    required: "Please Enter Email !!! ",
                },

                contact: {

                    required: "Please Enter Contact !!! ",
                },
                message: {

                    required: "Please Enter Message !!! ",
                }
            }
        })
    })
</script>

@endsection