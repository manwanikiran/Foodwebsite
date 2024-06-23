<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/foogra/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Feb 2023 12:39:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Ansonika">


    <!-- Favicons-->
    <link rel="icon" href="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" type="image/png" />
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

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

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/css/settings.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/css/navigation.css">

    <!-- SPECIFIC CSS -->
    <link href="{{URL::to('/')}}/frontassets/css/home.css" rel="stylesheet">

    <!-- SPECIFIC CSS Listing-->
    <link href="{{URL::to('/')}}/frontassets/css/listing.css" rel="stylesheet">

    <!-- ALTERNATIVE COLORS CSS -->
    <link href="#" id="colors" rel="stylesheet">

    <!-- REVOLUTION SLIDER CUSTOM CSS -->
    <style type="text/css">
        .tiny_bullet_slider .tp-bullet:before {
            content: " ";
            position: absolute;
            width: 100%;
            height: 25px;
            top: -12px;
            left: 0px;
            background: transparent
        }

        .bullet-bar.tp-bullets:before {
            content: " ";
            position: absolute;
            width: 100%;
            height: 100%;
            background: transparent;
            padding: 10px;
            margin-left: -10px;
            margin-top: -10px;
            box-sizing: content-box
        }

        .bullet-bar .tp-bullet {
            width: 60px;
            height: 3px;
            position: absolute;
            background: #aaa;
            background: rgba(204, 204, 204, 0.5);
            cursor: pointer;
            box-sizing: content-box
        }

        .bullet-bar .tp-bullet:hover,
        .bullet-bar .tp-bullet.selected {
            background: rgba(204, 204, 204, 1)
        }
    </style>

    @yield('css')
    <title>@yield('title')</title>

</head>

<body>

    <header class="header clearfix element_to_stick">
        <div class="container-fluid">


            <div id="logo">


                <img src="{{URL::to('/')}}/uploads/restaurantindex/weblogo2.png" height="50px" alt="" class="logo_normal">
                <img src="{{URL::to('/')}}/uploads/restaurantindex/fplogo2345.png" height="40px" style="margin-top: 10px;" alt="" class="logo_normal">

                <img src="{{URL::to('/')}}/uploads/restaurantindex/weblogo.png" height="50px" alt="" class="logo_sticky">
                <img src="{{URL::to('/')}}/uploads/restaurantindex/fplogo234.png" height="40px" style="margin-top: 10px;" alt="" class="logo_sticky">


                <!-- <img src="{{URL::to('/')}}/uploads/restaurantindex/changelogo1.png"  height="50px" alt=""> -->
                <!-- <img src="{{URL::to('/')}}/frontassets/img/logo_sticky.svg" width="140" height="35" alt="" class="logo_sticky"> -->

            </div>
            <!-- session  -->
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


                <!-- <li><a href="/userlogin" id="sign-in" class="login" title="Login">Sign In</a></li> -->
                <!-- <ul id="top_menu"> -->
                    <li><a href="/userlogin" style="color:red;">
                            <h6 class="" style="margin-top: 10px;font-size: 14PX;">Log in

                        </a></li>
                    <!-- <li><a href="/userlogin" id="sign-in" class="login" title="Sign in">Sign In</a></li> -->
                    <!-- <li><a href="/wishlist" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li> -->
                <!-- </ul> -->

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
                    <a href="index-2.html"><img src="img/logo.svg" width="140" height="35" alt=""></a>
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
                    <ul class="footer-selector clearfix">
                        <li>
                           
                        </li>
                        <li>
                            <div class="styled-select currency-selector">
                                <select>
                                    <option value="US Dollars" selected>US Dollars</option>
                                    <option value="Euro">Euro</option>
                                </select>
                            </div>
                        </li>
                        <!-- <li><img src="{{URL::to('/')}}/frontassets/data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li> -->
                    </ul>
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


    <!-- /Sign In Modal -->

    <!-- COMMON SCRIPTS -->
    <script src="{{URL::to('/')}}/frontassets/js/common_scripts.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/js/common_func.js"></script>
    <script src="{{URL::to('/')}}/frontassets/assets/validate.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
    <script src="{{URL::to('/')}}/frontassets/html_rtl/revolution-slider/js/extensions/revolution.addon.slicey.min.js"></script>
    <script>
        var tpj = jQuery;
        var revapi45;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_45_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_45_1");
            } else {
                revapi45 = tpj("#rev_slider_45_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "bullet-bar",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 50,
                            space: 5,
                            tmp: ''
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "0px",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
            if (revapi45) revapi45.revSliderSlicey();
        });
    </script>

    <!-- COLOR SWITCHER  -->
    <script src="{{URL::to('/')}}/frontassets/js/switcher.js"></script>

    @yield('js')

</body>

<!-- Mirrored from www.ansonika.com/foogra/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Feb 2023 12:39:59 GMT -->

</html>