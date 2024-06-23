@extends('restaurant.reslayout.resmaster')

@section('title')
Add Item
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
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Food</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Item</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/resitem"><button type="button" class="btn btn-primary">Back</button></a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">

            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form id="form1" action="/insertitem" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Add Item</h5>
                            </div>
                            <hr />
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Food</label>
                                <div class="col-sm-9">
                                    <select type="text" class="form-select" id="food" name="food">
                                        <option value="">Select Food</option>
                                        @foreach($food as $row)
                                        <option value="{{$row->food_id}}">{{$row->food_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Item Qty</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="itemqty" name="itemqty" placeholder="Enter Item Qty">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Item Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="itemprice" name="itemprice" placeholder="Enter Item Price">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Item Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="itemstatus" name="itemstatus" placeholder="Enter Item Status">
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

                food: {

                    required: true,
                },
                itemqty: {

                    required: true,
                },
                itemprice: {

                    required: true,
                },
                itemstatus: {

                    required: true,
                }
            },

            messages: {

                food: {

                    required: "Please Enter Food !!! ",
                },
                itemqty: {

                    required: "Please Enter Qty !!! ",
                },
                itemprice: {

                    required: "Please Enter Price !!! ",
                },
                itemstatus: {

                    required: "Please Enter Status !!! ",
                }

            }
        })
    })
</script>
@endsection