<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slider/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slider/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

</head>

<body>
    <header class="continer-fluid header-sticky ">
        <div class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li>
                                <a href="mailto:suhritorganization@gmail.com"><i
                                        class="far fa-envelope"></i>suhritorganization@gmail.com</a>
                                <span>|</span>
                            </li>
                            <li>
                                <a href="tel:+918653681154">
                                    <i class="fas fa-phone-volume"></i>
                                    +91 865 368 1154
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 folouws">

                        <ul class="ulright">
                            <li> <small>Folow Us </small>:</li>
                            <li>
                                <a href="https://www.facebook.com/share/151kwnAnug/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <i class="fab fa-twitter-square"></i>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/suhritorganization?igsh=MzB5MzNuMDNpNWdp">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/@suhrit2023?si=a4LJeVNLSl_Jxa8U">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 d-none d-md-block col-md-6 btn-bhed">
                        <a class="btn btn-sm btn-success" href="https://forms.gle/WkFu42EJG7Q97vXk9">Join Us</a>
                        <button class="btn btn-sm btn-default" data-toggle="modal"
                            data-target="#donateModal">Donate</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-lg-3 col-md-12 logo">
                        <a href="{{ route('home') }}">
                            <img class="img_logo" src="{{ asset('assets/images/logo.jpg') }}" alt="">
                            <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                                    class="fas d-block d-lg-none  small-menu fa-bars"></i></a>
                        </a>

                    </div>
                    <div id="menu" class="col-lg-9 col-md-12 d-none d-lg-block nav-col">

                        <ul class="navbad">
                            <li class="nav-item {{ Request::route()->getName() == 'home' ? 'active' : '' }} ">
                                <a class="nav-link" href="{{ route('home') }}">Home
                                </a>
                            </li>
                            <li class="nav-item {{ Request::route()->getName() == 'about' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item {{ Request::route()->getName() == 'service' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('service') }}">Services</a>
                            </li>

                            <li class="nav-item {{ Request::route()->getName() == 'gallery' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                            </li>

                            <li class="nav-item {{ Request::route()->getName() == 'blog' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item {{ Request::route()->getName() == 'events' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('events') }}">Event</a>
                            </li>
                            <li class="nav-item {{ Request::route()->getName() == 'contact' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>




                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            toastr.success("{{ session('success') }}", "Success");
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}", "Error");
            @endforeach
        });
    </script>
@endif


    <!-- Donate Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donateModalLabel">Bank Details</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="bank-details">
                        <h4 class="bank-title">Bank Details</h4>
                        <p><strong>Bank Name:</strong> IOB Bank</p>
                        <p><strong>Branch:</strong> Contai</p>
                        <p><strong>Account Holder:</strong> SERPUR SUHRIT WELFARE ORGANISATION</p>
                        <p><strong>Account No:</strong> 476121489134</p>
                        <p><strong>IFSC Code:</strong> PNB259300</p>
                    </div>

                    <div class="whatsapp-info">
                        <p class="share-text">Share A Screenshot to <a href="https://bit.ly/3KRjqUm"
                                class="whatsapp-link"><strong>WhatsApp</strong></a> At <span class="phone">+91 865 368
                                1154</span> After Donating</p>
                    </div>

                    <h4 class="qr-title">Scan QR Code to Donate</h4>
                    <div class="qr-container">
                        <img src="{{ asset('assets/images/qr.jpg') }}" alt="QR CODE">
                    </div>

                    <div class="whatsapp-info">
                        <p class="share-text">Share A Screenshot to <a href="https://bit.ly/3KRjqUm"
                                class="whatsapp-link"><strong>WhatsApp</strong></a> At <span class="phone">+91 865 368
                                1154</span> After Donating</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ###### Footer Section ##### --}}

    {{-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                        Smart Eye is a leading provider of information technology, consulting, and business process
                        services. Our dedicated employees offer strategic insights, technological expertise and industry
                        experience.
                    </p>
                    <p>We focus on technologies that promise to reduce costs, streamline processes and speed
                        time-to-market, Backed by our strong quality processes and rich experience managing global...
                    </p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#/about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#/portfolio">Portfolio</a><i class="fa fa-angle-right"></i>
                        </li>
                        <li><a ui-sref="products" href="#/products">Latest jobs</a><i class="fa fa-angle-right"></i>
                        </li>
                        <li><a ui-sref="gallery" href="#/gallery">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#/contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2>Contact Us</h2>
                    <address class="md-margin-bottom-40">
                        BlueDart <br>
                        Marthandam (K.K District) <br>
                        Tamil Nadu, IND <br>
                        Phone: +91 9159669599 <br>
                        Email: <a href="mailto:info@anybiz.com" class="">info@bluedart.in</a><br>
                        Web: <a href="smart-eye.html" class="">www.bluedart.in</a>
                    </address>

                </div>
            </div>


            <div class="nav-box row clearfix">
                <div class="inner col-md-9 clearfix">
                    <ul class="footer-nav clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('service') }}">Servies</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>


                </div>
                <div class="donate-link col-md-3"><a href="donate.html" class="btn btn-primary "><span
                            class="btn-title">Donate Now</span></a></div>
            </div>

        </div>


    </footer>
    @php
        $y = \Carbon\Carbon::now()->format('Y');
    @endphp

    <div class="copy">
        <div class="container">
            <a href="{{ route('home') }}">{{ $y }} &copy; All Rights Reserved | Designed and Developed
                by</a>

            <span>
                <a class="nav"><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
            </span>
        </div>

    </div> --}}

    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Contai, 721401, West Bengal</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span><a href="tel:+918653681154">
                                        +91 865 368 1154
                                    </a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail Us</h4>
                                <span><a
                                        href="mailto:suhritorganization@gmail.com">suhritorganization@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}"><img class=""
                                        src="{{ asset('assets/images/logo.png') }}" class="img-fluid"
                                        alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                    incididuntut consec tetur adipisicing
                                    elit,Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="https://www.facebook.com/share/151kwnAnug/" class="social-icon facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://youtube.com/@suhrit2023?si=a4LJeVNLSl_Jxa8U" class="social-icon youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="https://www.instagram.com/suhritorganization?igsh=MzB5MzNuMDNpNWdp" class="social-icon instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>

                            {{-- <div class="footer-social-icon ">
                                <span >Follow Us</span>

                            </div> --}}

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('service') }}">Our Services</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $y = \Carbon\Carbon::now()->format('Y');
        @endphp
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; {{ $y }}, All Right Reserved | Develop By Suhrit Organisation</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

</body>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/plugins/slider/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Firebase SDK -->
{{-- <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js"></script> --}}

{{-- <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script> --}}
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

</script>


@stack('scripts')

</html>
