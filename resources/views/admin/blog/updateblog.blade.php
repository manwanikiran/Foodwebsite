@extends('admin.layout.master')

@section('title')

Update Blog

@endsection

@section('main')

			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">  Blog</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Blog</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="/adminblog"><button type="button" class="btn btn-primary">Back</button></a>
							
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-xl-9 mx-auto">
					
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<form action="/editblog" method="post" enctype="multipart/form-data">
									@csrf

									<input type="text" hidden value="{{$blog->blog_id}}" name="editblog" id="editblog">
									<input type="text" hidden  value="{{$blog->blog_img}}" name="oldimg" id="oldimg">

								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">Update Blog</h5>
									</div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label"> Blog</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="{{$blog->blog_description}}" id="discription" name="discription" placeholder="Enter Category">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">  Image</label>
										<div class="col-sm-9">
										<img src="{{URL::to('/')}}/uploads/blog/{{$blog->blog_img}}" height="200px" width="200px" alt="">
											<input type="file" class="form-control" id="blogimg" name="blogimg">
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