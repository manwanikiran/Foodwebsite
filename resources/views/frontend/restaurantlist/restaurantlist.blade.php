@extends('frontend.layout.listmaster')

@section('title')
Restaurant Listing
@endsection

@section('css')
<style>
    .button:hover {
        background-color: darkgray
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main')

<main>
    <div class="page_header element_to_stick">
        <div class="container">
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
            <div class="row">

                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Total Restaurant</a></li>
                            <!-- <li><a href="#">Category</a></li>
                            <li>Page active</li> -->
                        </ul>
                    </div>
                    <h1>{{$countrestaurant}} restaurants in Food Plaza</h1>
                </div>

                <div class="col-xl-4 col-lg-5 col-md-5">
                    <form action="/restaurantlistsearch" method="post">
                        @csrf
                        <div class="search_bar_list">
                            <input type="text" class="form-control" id="ressearch" name="ressearch" placeholder="Search again...">
                            <input type="submit" id="search" name="search" value="Search">
                        </div>
                    </form>
                </div>



            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->

    <div class="filters_full clearfix add_bottom_15">
        <div class="container">
            <div class="switch-field">
                <!-- <input type="b" id="all" name="listing_filter" checked  class="selected">
                <label for="all">All</label>
                <input type="radio" id="popular" name="listing_filter"  >
                <label for="popular">Popular</label>
                <input type="button" id="test" name="listing_filter"  >
                <label for="latest">Latest</label> -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" id="allres" style="background-color: lightgray;border-color: black;color: black;">All</button>
                    <button type="button" class="btn btn-primary" id="popularres" style="background-color: lightgray;border-color: black;color: black;">Popular</button>
                    <button type="button" class="btn btn-primary" id="latestres" style="background-color: lightgray;border-color: black;color: black;">Latest</button>
                </div>

            </div>

        </div>
    </div>
    <!-- /filters_full -->


    <!-- /Map -->


    <!-- /filters -->

    <div class="container margin_30_40 allres">
        <div class="row isotope-wrapper">
            @foreach($restaurant as $row)

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 isotope-item">

                <div class="strip">
                    <input type="text" hidden id="id" name="id" value="{{$row->res_id}}">
                    <figure>
                        <span class="ribbon off">{{$row->res_type_name}}</span>
                        <img src="{{URL::to('/')}}/uploads/restaurant/{{$row->res_coverimg}}" style="height: 100%;width: 100%;" class="img-fluid lazy" alt="">
                        <a href="/frontrestaurantdetail/{{$row->res_id}}" class="strip_info">
                            <!-- <a href="/updatecity/{{$row->city_id}}"> -->
                            <!-- <small>{{$row->city_name}}</small> -->
                            <div class="item_title">
                                <h3>{{$row->res_name}}</h3>
                                <small>Contact : +91 {{$row->res_contact1}}</small>
                                <!-- <small>{{$row->res_city}}</small> -->
                            </div>
                        </a>
                    </figure>
                    <ul>
                        <li><span></span></li>
                        <li>
                            <div class="score"> Reviews<span><em> </em></span><strong>{{$row->reviewcount}}</strong> </div>
                        </li>
                    </ul>
                </div>

            </div>
            @endforeach

        </div>
        <!-- /row -->
       
    </div>
    <!-- lateset  -->
    <div class="container margin_30_40 latest d-none">
        <div class="row">
            @foreach($restaurantlatest as $row)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

                <div class="strip">
                    <figure>
                        <span class="ribbon off">{{$row->res_type_name}}</span>
                        <img src="{{URL::to('/')}}/uploads/restaurant/{{$row->res_coverimg}}" style="height: 100%;width: 100%;" class="img-fluid lazy" alt="">
                        <a href="/frontrestaurantdetail/{{$row->res_id}}" class="strip_info">
                            <!-- <a href="/updatecity/{{$row->city_id}}"> -->
                            <!-- <small>{{$row->city_name}}</small> -->
                            <div class="item_title">
                                <h3>{{$row->res_name}}</h3>
                                <small>Contact : +91 {{$row->res_contact1}}</small>
                                <!-- <small>{{$row->res_city}}</small> -->
                            </div>
                        </a>
                    </figure>
                    <ul>
                        <li><span></span></li>
                        <li>
                        <div class="score"> Reviews<span><em> </em></span><strong>{{$row->reviewcount}}</strong> </div>
                        </li>
                    </ul>
                </div>

            </div>
            @endforeach

        </div>
        <!-- /row -->
       
    </div>
    <!-- popular  -->
    <div class="container margin_30_40 popular d-none d-none2">
        <div class="row">

            @foreach($restaurantpopular as $row)
            @if("$row->reviewcount" > 4)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <input type="text" hidden id="res" name="res" value="{{$row->res_id}}">

                <div class="strip">
                    <figure>
                        <span class="ribbon off">{{$row->res_type_name}}</span>
                        <img src="{{URL::to('/')}}/uploads/restaurant/{{$row->res_coverimg}}" style="height: 100%;width: 100%;" class="img-fluid lazy" alt="">
                        <a href="/frontrestaurantdetail/{{$row->res_id}}" class="strip_info">
                            <!-- <a href="/updatecity/{{$row->city_id}}"> -->
                            <!-- <small>{{$row->city_name}}</small> -->
                            <div class="item_title">
                                <h3>{{$row->res_name}}</h3>
                                <small>Contact : +91 {{$row->res_contact1}}</small>
                                <!-- <small>{{$row->res_city}}</small> -->
                            </div>
                        </a>
                    </figure>
                    <ul>
                        <li><span></span></li>
                        <li>
                        <div class="score"> Reviews<span><em> </em></span><strong>{{$row->reviewcount}}</strong> </div>
                        </li>
                    </ul>
                </div>

            </div>
            @endif
            @endforeach

        </div>
        <!-- /row -->
    </div>

    <!-- cpoy    -->

</main>
@endsection



@section('js')

<script>
    $(document).ready(function() {

        //alert("hello");


        $("#latestres").click(function() {
            //alert("onclick");

            $(".latest").removeClass('d-none');
            $(".allres").addClass('d-none');
            $(".popular").addClass('d-none');
        })

        $("#popularres").click(function() {
            // alert("onclick");
            $(".popular").removeClass('d-none');
            $(".latest").addClass('d-none');
            $(".allres").addClass('d-none');



        })

        $("#allres").click(function() {
            //alert("onclick");
            $(".allres").removeClass('d-none');
            $(".latest").addClass('d-none');

            $(".popular").addClass('d-none');

        })


    })
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('#ressearch').on('change', function() {
            var ressearch = this.value;
            // alert(ressearch);

            $("main").html('');
            $.ajax({
                url: "/getres",
                type: "POST",
                data: {
                    ressearch: ressearch,

                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(ressearch) {

                    alert(finaltotal);
                    $('main').html('result');

                    // $('main').html('<input type="Text">--Your Restaurant --');
                    // $.each(res.ressearch, function(key, value) {
                    //     ('<input type="text" value="res_name">')
                    // });

                }
            });
        });
    });
</script> -->
@endsection