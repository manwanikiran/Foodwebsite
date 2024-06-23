@extends('frontend.layout.listmaster')

@section('title')

Cart

@endsection
@section('css')
<link href="{{URL::to('/')}}/frontassets/css/booking-sign_up.css" rel="stylesheet">
<link href="{{URL::to('/')}}/frontassets/css/detail-page-delivery.css" rel="stylesheet">
@endsection

@section('main')
<main class="bg_gray pattern">

    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="box_booking_2 style_2">
                    <div class="head">

                        <div class="title">
                            <h3>Cart</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <form action="/frontorder" method="post">
                        @csrf

                        @if(count($fooddetailcart) == 0)
                        <br>
                        <div style="text-align: center;font-size: 30px;">Empty Cart</div>

                        @endif

                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fooddetailcart as $row)
                              
                                <tr height="130px">
                                    @if(session()->has('userlogin'))
                                    <input type="text" hidden name="user" id="user" value="{{Session::get('userid')}}">
                                    @endif
                                    <input type="text" hidden name="cartid" id="cartid" value="{{$row->cart_id}}">
                                    <td> <input type="text" hidden name="food" id="food" value="{{$row->food_id}}"></td>

                                    <td> <input type="text" hidden name="res" id="res" value="{{$row->res_id}}"></td>
                                    <td width="200px"> <img src="{{URL::to('/')}}/uploads/food/{{$row->food_img1}}" style="height:100px ; width:100px;margin-left: 20px;border-radius: 10px;" data-src="" alt="" class="lazy"></td>
                                    <td width="250px">{{$row->food_title}}</td>
                                    <td width="200px"> 
                                        <input type="number" min="1" max="5" readonly class="changeqty" name="qty" id="qty" cart-id="{{$row->cart_id}}" value="{{$row->cart_qty}}" style="width: 70px;margin-left: 9px;border-radius: 20px;border-color: black; text-align: center;">
                                        <input type="text"  hidden value="{{$row->cart_id}}" name="cartid" id="cartid" style="width: 50px;">
                                    </td>
                                    <td width="150px">₹<input type="text" readonly id="price" name="price" style="border: hidden;width: 100px;" value="{{$row->food_main_price}}"></td>
                                    <td width="150px"><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" data-id="{{$row->cart_id}}">Delete</button>
                                    </td>
                                    <td>
                                        <hr style="color: #C0C0C0;">
                                    </td>

                                </tr>

                               



                                @endforeach
                                <tr>
                                <td colspan="5" align="right">
                                     <a href="/restaurantlist"> <button type="button" class="btn btn-primary" value="">Back</button></a> 
                                 
                                   
                                       <button type="submit" class="btn btn-success" value="Go To Order">Go To Order</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </form>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

    </div>


    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are You Sure You Want To Delete ??</div>
                <div class="modal-footer">

                    <form action="/deletecart" method="post">
                        @csrf
                        <input type="text" hidden name="deleteid" id="deleteid">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-primary" name="deletebutton" id="deletebutton">YES</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</main>


@endsection

@section('js')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="{{URL::to('/')}}/frontassets/js/sticky_sidebar.min.js"></script>
<script src="{{URL::to('/')}}/frontassets/js/specific_detail.js"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', ".deletebtn", function() {

            var id = $(this).attr('data-id');

            $("#deleteid").val(id);
        })
    });
</script>




@endsection