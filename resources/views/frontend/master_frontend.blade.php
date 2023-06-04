<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
    @yield('page_header')
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_asset') }}/assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/default.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend_asset') }}/assets/css/responsive.css">
    <!-- tostr css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->


    @php
        $route_name = Route::current()->getName();
    @endphp

    <!-- header-area -->
    <header>
        <div id="sticky-header" class="menu__area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu__wrap">
                            <nav class="menu__nav">
                                <div class="logo">
                                    <a href="{{ url('/') }}" class="logo__black"><img src="{{ asset('frontend_asset') }}/assets/img/logo/logo_black.png"
                                            alt=""></a>
                                    <a href="{{ route('index') }}" class="logo__white"><img src="{{ asset('frontend_asset') }}/assets/img/logo/logo_white.png"
                                            alt=""></a>
                                </div>
                                <div class="navbar__wrap main__menu d-none d-xl-flex">
                                    <ul class="navigation">
                                <li class="{{ ($route_name == 'index')?'active':'' }}"><a href="{{ route('index') }}">Home</a></li>
                                <li class="{{ ($route_name == 'about')?'active':'' }}"  ><a href="{{ route('about') }}">About</a></li>
                                <li class="{{ ($route_name == 'service')?'active':'' }}" ><a href="{{ route('service') }}">Services</a></li>
                                <li class="menu-item-has-children   {{ ($route_name == 'show_portfolio')?'active':'' }}"><a href="{{ route('show_portfolio') }}">Portfolio</a>

                                        </li>
                                        <li class="menu-item-has-children  {{ ($route_name == 'blog')?'active':'' }}"><a href="{{ route('blog') }}">Our Blog</a>

                                        </li>
                                        <li  class="{{ ($route_name == 'contact')?'active':'' }}" ><a href="{{ route('contact') }}">contact me</a></li>
                                    </ul>
                                </div>
                                <div class="header__btn d-none d-md-block">
                                    <a href="{{ route('contact') }}" class="btn">Contact me</a>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile__menu">
                            <nav class="menu__box">
                                <div class="close__btn"><i class="fal fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="index.html" class="logo__black"><img src="{{ asset('frontend_asset') }}/assets/img/logo/logo_black.png"
                                            alt=""></a>
                                    <a href="index.html" class="logo__white"><img src="{{ asset('frontend_asset') }}/assets/img/logo/logo_white.png"
                                            alt=""></a>
                                </div>
                                <div class="menu__outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu__backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->

    @yield('content')



    @php
        $footer = App\Models\Footer::findorFail(1);
    @endphp
    <!-- Footer-area -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Contact us</h5>
                            <h4 class="title">{{ $footer->mobile_number }}</h4>
                        </div>
                        <div class="footer__widget__text">
                            <p>{!! $footer->footer_description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">my address</h5>
                            <h4 class="title">{{ $footer->country }}</h4>
                        </div>
                        <div class="footer__widget__address">
                            <p>{{ $footer->address }}</p>
                            <a href=""
                                class="mail"><span class="__cf_email__"
                                    data-cfemail="9ff1f0edfaeff3e6dffaf1e9feebf0b1fcf0f2">{{ $footer->email }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Follow me</h5>
                            <h4 class="title">{{ $footer->social }}</h4>
                        </div>
                        <div class="footer__widget__social">
                            <p>{!! $footer->social_description !!}</p>
                            <ul class="footer__social__list">
                                <li><a href="{{ $footer->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $footer->behence }}"><i class="fab fa-behance"></i></a></li>
                                <li><a href="{{ $footer->linkdin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $footer->instagram }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright__wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright__text text-center">
                            <p>Copyright @ Service Key 2023 All right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area-end -->




    <!-- JS here -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/element-in-view.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/ajax-form.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('frontend_asset') }}/assets/js/main.js"></script>
    <!-- Tostr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @yield('footer_script')



</body>

</html>
