<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/foogra/grid-listing-filterscol-full-masonry.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Feb 2023 12:40:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Ansonika">


    <!-- Favicons-->
    <link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" type="image/png" />
    <link rel="apple-touch-icon" type="image/x-icon" href="{{URL::to('/')}}/frontassets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{URL::to('/')}}/frontassets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{URL::to('/')}}/frontassets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{URL::to('/')}}/frontassets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" as="fetch" crossorigin="anonymous">
    <script type="text/javascript">
        ! function(e, n, t) {
            "use strict";
            var o = "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap",
                r = "__3perf_googleFonts_c2536";

            function c(e) {
                (n.head || n.body).appendChild(e)
            }

            function a() {
                var e = n.createElement("link");
                e.href = o, e.rel = "stylesheet", c(e)
            }

            function f(e) {
                if (!n.getElementById(r)) {
                    var t = n.createElement("style");
                    t.id = r, c(t)
                }
                n.getElementById(r).innerHTML = e
            }
            e.FontFace && e.FontFace.prototype.hasOwnProperty("display") ? (t[r] && f(t[r]), fetch(o).then(function(e) {
                return e.text()
            }).then(function(e) {
                return e.replace(/@font-face {/g, "@font-face{font-display:swap;")
            }).then(function(e) {
                return t[r] = e
            }).then(f).catch(a)) : a()
        }(window, document, localStorage);
    </script>

    <!-- BASE CSS -->
    <link href="{{URL::to('/')}}/frontassets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/frontassets/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{URL::to('/')}}/frontassets/css/listing.css" rel="stylesheet">

    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <header class="header_in clearfix">
        <div class="container">
            <div id="logo">
                <img src="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" height="50px" alt="">
                <img src="{{URL::to('/')}}/uploads/restaurantindex/fplogo234.png" height="40px" style="margin-top: 10px;" alt="">

            </div>

            <ul id="top_menu" class="drop_user">
                @if(session()->has('userlogin'))
                <li>
                    <div class="dropdown user clearfix">
                        <a href="#" data-bs-toggle="dropdown">
                            <figure><img src="{{URL::to('/')}}/uploads/restaurantindex/user1.png" width="150px" alt=""></figure> <span>{{Session::get('username')}}</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-content">
                                <ul>
                                    <li><a href="/userprofile"><i class="icon_profile"></i>My Profile</a></li>
                                    <li><a href="/userchangepass"><i class="icon_key"></i>ChangePassword</a></li>
                                    <li><a href="/myorder"><i class="  icon_archive"></i>My Order</a></li>
                                    <li><a href="/frontcart"><i class="icon_cart"></i>Cart</a></li>
                                    <li><a href="/userlogout"><i class="icon_key"></i>Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /dropdown -->
                </li>

                @else

                <li><a href="/userlogin">
                        <h6 class="wishlist_bt_top" style="margin-top: 10px;font-size: 14PX;">Log in
                    </a></li>
                    

                <ul id="top_menu">
                <!-- <li><a href="/userlogin" id="sign-in" class="login" title="Login">Sign In</a></li> -->
                    <!-- <li><a href="/userlogin" id="sign-in" class="login" title="Sign in">Sign In</a></li> -->
                    <!-- <li><a href="/wishlist" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li> -->
                </ul>

                @endif

            </ul>


            <!-- /top_menu -->
            <a href="#0" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="index-2.html"><img src="{{URL::to('/')}}/frontassets/img/logo.svg" width="140" height="35" alt=""></a>
                </div>
                <ul>
                    <li class="submenu">
                        <a href="/" class="show-submenu">Home</a>

                    </li>
                    <li class="submenu">
                        <a href="/restaurantlist" class="show-submenu">Restaurant</a>

                    </li>
                    <li class="submenu">
                        <a href="/blog" class="show-submenu">Artical</a>
                    </li>
                    <li><a href="/aboutus">About Us</a></li>
                    <li class="submenu">
                        <a href="/contactus" class="show-submenu">Contact Us</a>
                    </li>
                    <!-- <li><a href="/userlogin">Log in</a></li> -->

                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->

    <main>

        @yield('main')

    </main>

    <!-- /main -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h3 data-bs-target="#collapse_1">Quick Links</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul>
                            <!-- <li><a href="submit-rider.html">Become a Rider</a></li> -->
                            <li><a href="/resregistration">Add your restaurant</a></li>
                            <li><a href="/deliveryregister">Delivery boy Registration</a></li>
                            <!-- <li><a href="help.html">Help</a></li> -->
                            <!-- <li><a href="/userprofile">My account</a></li> -->
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/contactus">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- <h3 data-bs-target="#collapse_2">Categories</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="grid-listing-filterscol.html">Top Categories</a></li>
                            <li><a href="grid-listing-filterscol-full-masonry.html">Best Rated</a></li>
                            <li><a href="grid-listing-filterscol-full-width.html">Best Price</a></li>
                            <li><a href="grid-listing-filterscol-full-masonry.html">Latest Submissions</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-bs-target="#collapse_3">Contacts</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_house_alt"></i>A-107 Apple Squre ,<br> Near katargam , Suart</li>
                            <li><i class="icon_mobile"></i>+91 9909373517</li>
                            <li><i class="icon_mail_alt"></i><a href="#0">foodplaza@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <!-- <ul class="footer-selector clearfix">
                        <li>
                            <div class="styled-select lang-selector">
                                <select>
                                    <option value="English" selected>English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Russian">Russian</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="styled-select currency-selector">
                                <select>
                                    <option value="US Dollars" selected>US Dollars</option>
                                    <option value="Euro">Euro</option>
                                </select>
                            </div>
                        </li>
                        <li><img src="{{URL::to('/')}}/frontassets/data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                    </ul> -->
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li><a href="#0">Privacy</a></li>
                        <li><span>© FoodPlaza</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->

    <div id="toTop"></div><!-- Back to top button -->

    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->

    <!-- Sign In Modal -->
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="modal_header">
            <h3>Sign In</h3>
        </div>
        <form>
            <div class="sign-in-wrapper">
                <a href="#0" class="social_bt facebook">Login with Facebook</a>
                <a href="#0" class="social_bt google">Login with Google</a>
                <div class="divider"><span>Or</span></div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div>
                <div class="clearfix add_bottom_15">
                    <div class="checkboxes float-start">
                        <label class="container_check">Remember me
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="float-end"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                </div>
                <div class="text-center">
                    <input type="submit" value="Log In" class="btn_1 full-width mb_5">
                    Don’t have an account? <a href="account.html">Sign up</a>
                </div>
                <div id="forgot_pw">
                    <div class="form-group">
                        <label>Please confirm login email below</label>
                        <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                </div>
            </div>
        </form>
        <!--form -->
    </div>
    <!-- /Sign In Modal -->

    <!-- COMMON SCRIPTS -->
    <script src="{{URL::to('/')}}/frontassets/js/common_scripts.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/js/common_func.js"></script>
    <script src="{{URL::to('/')}}/frontassets/assets/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{URL::to('/')}}/frontassets/js/sticky_sidebar.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/js/specific_listing.js"></script>
    <script src="{{URL::to('/')}}/frontassets/js/isotope.min.js"></script>
    <script>
        $(window).on("load", function() {
            var $container = $('.isotope-wrapper');
            $container.isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'masonry'
            });
        });
        $('.switch-field').on('click', 'input', 'change', function() {
            var selector = $(this).attr('data-filter');
            $('.isotope-wrapper').isotope({
                filter: selector
            });
        });
    </script>

    <!-- Map -->
    <script src="{{URL::to('/')}}/frontassets/js/main_map_scripts.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsJXlcB_yWxqnfo2fJhWzJ4TKH0Z6pTi0&amp;callback=initMap"></script>

    <!-- COLOR SWITCHER  -->
    <script src="{{URL::to('/')}}/frontassets/js/switcher.js"></script>
   
    @yield('js')
</body>

<!-- Mirrored from www.ansonika.com/foogra/grid-listing-filterscol-full-masonry.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Feb 2023 12:40:07 GMT -->

</html>