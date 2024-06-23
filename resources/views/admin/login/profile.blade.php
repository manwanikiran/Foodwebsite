@extends('admin.layout.master')

@section('title')
Profile
@endsection

@section('main')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Profile</div>
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
                                <img src="{{URL::to('/')}}/uploads/admin/{{Session::get('adminimg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="130px" height="130px">
                                <div class="mt-3">
                                    <h4>{{Session::get('adminusername')}}</h4>
                                    <hr class="my-4" />
                                    <!-- <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm"></p> -->
                                  <div>{{$admin->admin_username}}</div>
                                </div>
                                <br><br>
                            </div>
                     

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="form1" action="/editadmin" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="editadmin" id="editadmin" value="{{$admin->admin_id}}">
                                <input type="text" hidden value="{{$admin->admin_photo}}" name="oldimg" id="oldimg">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0" style="margin-top:6px">Admin Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="adminname" name="adminname" value="{{$admin->admin_name}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="{{$admin->admin_contact}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="email" name="email" value="{{$admin->admin_username}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div><img src="{{URL::to('/')}}/uploads/admin/{{$admin->admin_photo}}" height="100px" width="100px" name="img1"></div>
                                        <input type="file" class="form-control" id="adminimg" name="adminimg" placeholder="">
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