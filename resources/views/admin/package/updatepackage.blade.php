@extends('admin.layout.master')

@section('title')
Update Package
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
        <div class="breadcrumb-title pe-3">State</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Package</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/package"><button type="button" class="btn btn-primary">Back</button></a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">

            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form action="/editpackage" method="post">
                        @csrf

                        <input type="text" hidden id="editpackage" name="editpackage" value="{{$package->package_id}}">

                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Update Package</h5>
                            </div>
                            <hr />
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label"> Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$package->package_title}}" placeholder="Enter Your State">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label"> Discription</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$package->package_discription}}" class="form-control" id="package" name="package" placeholder="Enter Your Package">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Package Days</label>
                                <div class="col-sm-9">
                                    <input class="form-check-input" type="radio" name="packagedays" id="30day" value="30day" {{ $package->package_days == '30day' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        30day
                                    </label>
                                    <input class="form-check-input" type="radio" name="packagedays" id="181day" value="181day" {{ $package->package_days == '181day' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        181day
                                    </label>
                                    <input class="form-check-input" type="radio" name="packagedays" id="365day" value="365day" {{ $package->package_days == '365day' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        365day
                                    </label>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label"> Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$package->package_amount}}" class="form-control" id="packageamount" name="packageamount" placeholder="Enter Your Package">
                                </div>
                            </div>
                            
                          

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection