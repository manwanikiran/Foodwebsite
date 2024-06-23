@extends('admin.layout.master')

@section('title')
    Update Area
@endsection

@section('main')

			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Local Area</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Local Area</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="/area"><button type="button" class="btn btn-primary">Back</button></a>
							
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-xl-9 mx-auto">
					
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<form action="/editarea" method="post">
									@csrf
									<input type="text" hidden name="editarea" value="{{$area->area_id}}">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">UPDATE LOCAL AREA</h5>
									    </div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">City</label>
										<div class="col-sm-9">
											<select type="text" class="form-control" id="city" name="city">
                                            <option value="">Enter Your City</option>
											@foreach($city as $row)
                                            <option @if(($row->city_id)==($area->city_id)) selected @endif value="{{$row->city_id}}">{{$row->city_name}}</option>
											@endforeach
                                            </select>
										</div>
									</div>
									
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Local Area</label>
										<div class="col-sm-9">
											<input type="text"  value="{{$area->area_name}}" class="form-control" id="localarea" name="localarea" placeholder="Enter Your State">
										</div>
									</div>
									
									 
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary px-5">Submit</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
@endsection