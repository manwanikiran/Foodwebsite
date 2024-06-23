@extends('frontend.layout.listmaster')


@section('title')
Contact Us
@endsection

@section('css')
<link href="{{URL::to('/')}}/frontassets/css/contacts.css" rel="stylesheet">

<style>
	#form1 label.error {
		color: red;
	}
</style>
@endsection

@section('main')


<main>
    <div class="hero_single inner_pages background-image" data-background="url({{URL::to('/')}}/uploads/restaurantindex/contactus.png)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Contact Food Plaza</h1>
                        <!-- <p>A successful restaurant experience</p> -->
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
    </div>
    <!-- /hero_single -->

    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_lifesaver"></i>
                        <h2>Help Center</h2>
                        <a href="#0">+94 423-23-221</a> - <a href="#0">help@foodplaza.com</a>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_pin_alt"></i>
                        <h2>Address</h2>
                        <div>A-107 Apple Squre , Near katargam , Suart </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="icon_cloud-upload_alt"></i>
                        <h2>Submissions</h2>
                        <a href="#0">+94 423-23-221</a> - <a href="#0">order@foodplaza.com</a>
                    
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->

    <div class="container margin_60_40">
        <h5 class="mb_5">Drop Us a Line</h5>

        <div class="row">

            <div class="col-lg-4 col-md-6 add_bottom_25">
                <div id="message-contact"></div>
                <form action="/insertinquiry" method="post" id="form1">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Name" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" placeholder="Message" id="message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" minlength="10" maxlength="13" id="contactnumber" name="contactnumber" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Submit" id="submit-contact">
                    </div>

            </div>
            </form>
            <div class="col-lg-8 col-md-6 add_bottom_25">
            <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29748.90185108998!2d72.78436048763785!3d21.247200144990636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04bfc7f3a84bd%3A0xd8422310cd9c1eea!2sJahangir%20Pura%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1680848271059!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection

@section('js')
<script src="{{URL::to('/')}}/assets/js/jquery.validate.min.js"></script>
	<script src="{{URL::to('/')}}/assets/js/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {

        $("#form1").validate({

            rules: {

                name: {

                    required: true,
                },

                email: {

                    required: true,
                },
                message: {

                    required: true,
                },
                contactnumber: {

                    required: true,
                }
            },

            messages: {

                name: {

                    required: "Please Enter Name !!! ",
                },
                email: {

                    required: "Please Enter Email !!! ",
                },
                message: {

                    required: "Please Enter Message !!! ",
                },
                contactnumber: {

                    required: "Please Enter Contactnumber !!! ",
                },
            }
        })
    })
</script>
@endsection