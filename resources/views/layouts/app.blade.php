<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> NGO - @yield('title') </title>
    <link rel="shortcut icon" href="{{('/assets/images/fav.png" type="image/x-icon')}}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{('/assets/images/fav.jpg')}}">
    <link rel="stylesheet" href="{{('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{('/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{('/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{('/assets/plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{('/assets/plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{('/assets/css/style.css')}}" />
</head>

<body>

    <header class="continer-fluid ">
        <div class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li>
                                <i class="far fa-envelope"></i>
                                ngocharity@gmail.com
                                <span>|</span>
                            </li>
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                +8888 888 888
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 d-none d-md-block col-md-6 btn-bhed">
                        @if(!Auth::user())
                        <a href="/user/login" class="btn btn-sm btn-success">Login</a>
                        <a href="/user/register" class="btn btn-sm btn-default">Register</a>
                        @else
                        <a href="/user/logout" class="btn btn-sm btn-warning">Logout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-lg-3 col-md-12 logo">
                        <a href="/">
                            <img src="{{('/assets/images/logo.jpg')}}" alt="">
                            <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-lg-none  small-menu fa-bars"></i></a>
                        </a>

                    </div>
                    <div id="menu" class="col-lg-9 col-md-12 d-none d-lg-block nav-col">

                        <ul class="navbad">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/services">Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/gallery">Gallery</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact-us">Contact US</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                        We are trust is a Non-Governmental Organisation located in Hanoi,Vietnam .
                    </p>
                    <p>We focus on technologies that promise to reduce costs, streamline processes and speed time-to-market, Backed by our strong quality processes and rich experience managing global... </p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#/about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#/portfolio">Portfolio</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="#/products">Latest jobs</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#/gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#/contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">
                        Punchman <br>
                        8 Ton That Thuyet ( detech District) <br>
                        NTung, VN <br>
                        Phone: +8888888<br>
                        Email: <a href="ngo@charity.com" class="">ngo@charity.com</a><br>

                    </address>

                </div>
            </div>


            <div class="nav-box row clearfix">
                <div class="inner col-md-9 clearfix">
                    <ul class="footer-nav clearfix">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>


                </div>
                <div class="donate-link col-md-3"><a href="donate" class="btn btn-primary "><span class="btn-title">Donate Now</span></a></div>
            </div>

        </div>


    </footer>
    <div class="copy">
        <div class="container">
            <a href="https://www.smarteyeapps.com/">2021 ; All Rights Reserved | Designed and Developed by 8 Detech </a>


        </div>

    </div>

</body>

<script src="{{('/assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{('/assets/js/popper.min.js')}}"></script>
<script src="{{('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{('/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{('/assets/plugins/slider/js/owl.carousel.min.js')}}"></script>
<script src="{{('/assets/js/script.js')}}"></script>

</html>