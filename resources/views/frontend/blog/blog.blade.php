@extends('frontend.layout.listmaster')

@section('title')

Blog

@endsection

@section('css')
<link href="{{URL::to('/')}}/frontassets/css/blog.css" rel="stylesheet">
@endsection

@section('main')

<main>
    <div class="page_header element_to_stick">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <div class="breadcrumbs blog">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Blog</a></li>
                         
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                  
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->

    <div class="container margin_30_40">
        <div class="row">
            <div class="row">

                <div class="row">
                    @foreach($blog as $row)
                    <div class="col-md-6">

                        <article class="blog">
                            <figure>
                                <img src="{{URL::to('/')}}/uploads/blog/{{$row->blog_img}}" alt="">
                                <!-- <div class="preview"><span>Read more</span></div>
                              -->
                            </figure>
                            <div class="post_info">
                                <!-- <small>Category - 20 Nov. 2017</small> -->
                                <!-- <h2><a href="blog-post.html">Ea exerci option hendrerit</a></h2> -->
                                <p>{{$row->blog_description}}</p>
                                <ul>

                                    <li>
                                        <div class="thumb"><img src="{{URL::to('/')}}/uploads/admin/{{$row->admin_photo}}" alt=""></div>{{$row->admin_name}}

                                        <div class="thumb"><img src="{{URL::to('/')}}/uploads/restaurant/{{$row->res_logo}}" alt=""></div>{{$row->res_name}}
                                    </li>

                                    <!-- <li>
                                        <div class="thumb"><img src="{{URL::to('/')}}/uploads/restaurant/{{$row->res_logo}}" alt=""></div>{{$row->res_name}}
                                    </li> -->

                                    <li><i class=""></i></li>
                                </ul>
                            </div>
                        </article>

                        <!-- /article -->
                    </div>
                    @endforeach
                    <!-- /col -->

                    <!-- /col -->
                </div>

                <!-- /row -->

            </div>
            <!-- /col -->

            
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection