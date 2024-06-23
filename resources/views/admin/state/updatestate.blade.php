@extends('admin.layout.master')

@section('title')
    Update State
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
								<li class="breadcrumb-item active" aria-current="page">Update State</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="/state"><button type="button" class="btn btn-primary">Back</button></a>
							
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-xl-9 mx-auto">
					
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<form action="/editstate" method="post">
									@csrf
									
									<input type="text" hidden id="editstate" name="editstate" value="{{$state->state_id}}">

								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">UPDATE STATE</h5>
									</div>
									<hr/>
									<div class="row mb-3">


										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> State</label>
										<div class="col-sm-9">
											<input type="text" value="{{$state->state_name}}" class="form-control" id="statename" name="statename" placeholder="Enter Your State">
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