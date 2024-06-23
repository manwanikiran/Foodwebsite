@extends('restaurant.reslayout.resmaster')

@section('title')
Add Menu
@endsection



@section('main')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Menu</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Menu</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/resmenu"><button type="button" class="btn btn-primary">Back</button></a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">

            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form action="/editmenu" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" hidden name="editmenu" id="editmenu" value="{{$menu->menu_id}}">
                        <input type="text"  hidden value="{{$menu->menu_img}}" name="oldimg" id="oldimg">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Add Menu</h5>
                            </div>
                            <hr/>
                            <!-- <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Restaurant</label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-control" id="restaurant" name="restaurant">
                                        <option value="">Enter Restaurant</option>
											@foreach($restaurant as $row)
                                            <option @if(($row->res_id)==($menu->res_id)) selected @endif value="{{$row->res_id}}"->{{$row->res_name}}</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div> -->
                            @if(session()->has('restaurantlogin'))
                            <input type="text" hidden name="restaurant" id="restaurant" value="{{Session::get('restaurantid')}}">
                            @endif
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Menu Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="menutitle" name="menutitle"  value="{{$menu->menu_title}}" placeholder="Enter Food Title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Menu Image</label>
                                <div class="col-sm-9">
                                    
                                    <img src="{{URL::to('/')}}/uploads/menu/{{$menu->menu_img}}" height="200px" width="200px" alt="">
											<input type="file" class="form-control" id="image1" name="image1">
									
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Menu is Active</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="menuactive" name="menuactive" value="{{$menu->menu_is_active}}" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Menu is Approve</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="menuapprove" name="menuapprove" value="{{$menu->menu_is_approve}}" placeholder=" ">
                                </div>
                            </div> -->

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

    @endsection