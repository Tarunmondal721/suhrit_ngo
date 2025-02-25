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
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>





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
                                <a href="https://www.facebook.com/share/151kwnAnug/" target="_blank"
                                    rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
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
    {{-- <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
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
                                class="whatsapp-link"><strong>WhatsApp</strong></a> At <span class="phone">+91 865
                                368
                                1154</span> After Donating</p>
                    </div>

                    <h4 class="qr-title">Scan QR Code to Donate</h4>
                    <div class="qr-container">
                        <img src="{{ asset('assets/images/qr.jpg') }}" alt="QR CODE">
                    </div>

                    <div class="whatsapp-info">
                        <p class="share-text">Share A Screenshot to <a href="https://bit.ly/3KRjqUm"
                                class="whatsapp-link"><strong>WhatsApp</strong></a> At <span class="phone">+91 865
                                368
                                1154</span> After Donating</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    <!-- Donate Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold">❤️ Donate Now</h5>
                    <button type="button" class="close btn-close text-white" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="donationForm" class="p-3">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name" required
                            class="form-control mb-2 shadow-sm">
                        <input type="email" name="email" placeholder="Email" required
                            class="form-control mb-2 shadow-sm">
                        <input type="tel" name="phone" placeholder="Phone Number" required
                            class="form-control mb-2 shadow-sm">
                        <textarea name="address" placeholder="Address" required class="form-control mb-2 shadow-sm"></textarea>
                        <input type="number" id="amount" name="amount" placeholder="Enter donation amount"
                            required class="form-control mb-3 shadow-sm" min="1">
                        <button type="submit" id="generateUPI"
                            class="btn btn-success w-100 shadow-sm fw-bold">Generate Payment Link</button>
                    </form>

                    <!-- UPI Payment Section -->
                    <div id="upiContainer" class="mt-3 text-center" style="display: none;">
                        <h5 class="text-success fw-bold">Scan & Pay</h5>
                        <canvas id="upiQR" class="shadow-lg rounded mb-2"></canvas>
                        <a id="upiLink" href="#" class="btn btn-primary w-100 shadow-sm fw-bold"
                            target="_blank">Pay with UPI</a>
                    </div>

                    <!-- Transaction Confirmation Section -->
                    <div id="paymentConfirmation" class="mt-3 text-center" style="display: none;">
                        <h6 class="fw-bold">Enter Transaction ID</h6>
                        <input type="text" id="transaction_id" class="form-control mb-2 shadow-sm text-center"
                            placeholder="Transaction ID">
                        <button type="button" id="confirmPayment"
                            class="btn btn-success w-100 shadow-sm fw-bold">Confirm Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ###### Footer Section ##### --}}



    <footer class="footer-section">
        <!-- Background Animation -->
        <div id="particles-js"></div>

        <div class="container position-relative">
            <div class="footer-top py-5">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="footer-title">Find Us</h4>
                        <div class="footer-contact">
                            <p><span class="contact-icon"><i class="fas fa-map-marker-alt"></i></span> Contai, 721401,
                                West Bengal</p>
                            <p><span class="contact-icon"><i class="fas fa-phone"></i></span>
                                <a href="tel:+918653681154">+91 865 368 1154</a>
                            </p>
                            <p><span class="contact-icon"><i class="far fa-envelope"></i></span>
                                <a href="mailto:suhritorganization@gmail.com">suhritorganization@gmail.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4 class="footer-title">Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('service') }}">Our Services</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="footer-title">Follow Us</h4>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/share/151kwnAnug/" class="social-icon facebook"
                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://youtube.com/@suhrit2023?si=a4LJeVNLSl_Jxa8U" class="social-icon youtube"
                                target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.instagram.com/suhritorganization?igsh=MzB5MzNuMDNpNWdp"
                                class="social-icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>

                        <h4 class="footer-title mt-3">Subscribe</h4>
                        <form class="subscribe-form">
                            <input type="email" placeholder="Enter your email" required>
                            <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center py-3">
            <p>&copy; {{ now()->year }} All Rights Reserved | Developed by Suhrit Organisation</p>
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

    // document.addEventListener("DOMContentLoaded", function() {
    //     const canvas = document.getElementById("backgroundCanvas");
    //     const ctx = canvas.getContext("2d");

    //     let particles = [];
    //     const particleCount = 120; // Increase for more particles

    //     function setCanvasSize() {
    //         canvas.width = window.innerWidth;
    //         canvas.height = document.querySelector(".footer-section").offsetHeight;
    //     }

    //     setCanvasSize();
    //     window.addEventListener("resize", setCanvasSize);

    //     function Particle() {
    //         this.x = Math.random() * canvas.width;
    //         this.y = Math.random() * canvas.height;
    //         this.radius = Math.random() * 3 + 1; // Varying sizes
    //         this.alpha = Math.random() * 0.5 + 0.3; // Soft glow effect
    //         this.speedX = (Math.random() - 0.5) * 0.7;
    //         this.speedY = (Math.random() - 0.5) * 0.7;
    //         this.flicker = Math.random() * 0.02 + 0.01; // Flickering effect

    //         this.draw = function() {
    //             ctx.beginPath();
    //             ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    //             ctx.fillStyle = `rgba(255, 255, 255, ${this.alpha})`;
    //             ctx.shadowBlur = 5; // Soft glow
    //             ctx.shadowColor = "white";
    //             ctx.fill();
    //         };

    //         this.update = function() {
    //             this.x += this.speedX;
    //             this.y += this.speedY;
    //             this.alpha += this.flicker * (Math.random() > 0.5 ? 1 : -1);

    //             if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
    //             if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;

    //             this.draw();
    //         };
    //     }

    //     function initParticles() {
    //         particles = [];
    //         for (let i = 0; i < particleCount; i++) {
    //             particles.push(new Particle());
    //         }
    //     }

    //     function animate() {
    //         ctx.clearRect(0, 0, canvas.width, canvas.height);
    //         particles.forEach(p => p.update());
    //         requestAnimationFrame(animate);
    //     }

    //     initParticles();
    //     animate();
    // });


    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": ["#ff7eb3", "#ff758c", "#ff6a88", "#ff5e81", "#ff5079"] // Gradient colors
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                }
            },
            "opacity": {
                "value": 0.5,
                "random": true,
                "anim": {
                    "enable": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 2,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out"
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "repulse": {
                    "distance": 100,
                    "duration": 0.4
                }
            }
        },
        "retina_detect": true
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

<script>
    document.getElementById("donationForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('donation.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    let upiURL =
                        `upi://pay?pa=SERPURSUHRITWELFARE@IOB&pn=Donation&am=${formData.get('amount')}&cu=INR&tn=Donation`;
                    document.getElementById("upiLink").href = upiURL;
                    document.getElementById("upiContainer").style.display = "block";
                    // document.getElementById("generateUPI").style.display = "none";

                    // Generate QR Code
                    let qr = new QRious({
                        element: document.getElementById("upiQR"),
                        value: upiURL,
                        size: 200
                    });

                    localStorage.setItem("donation_id", data.donation_id);
                    document.getElementById("paymentConfirmation").style.display = "block";
                } else {
                    alert("Error: " + data.error);
                }
            })
            .catch(error => {
                console.error("Fetch Error:", error);
                alert("❌ Something went wrong. Please try again.");
            });
    });


    document.getElementById("confirmPayment").addEventListener("click", function() {
        let transactionId = document.getElementById("transaction_id").value.trim();

        if (transactionId === "") {
            alert("⚠️ Please enter the transaction ID.");
            return;
        }

        fetch("{{ route('donation.updatePayment') }}", {
                method: "POST",
                body: JSON.stringify({
                    donation_id: localStorage.getItem("donation_id"),
                    transaction_id: transactionId
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("✅ Payment confirmed! Thank you for your donation.");

                    // Hide confirmation input & button after success
                    document.getElementById("paymentConfirmation").style.display = "none";

                    // Optional: Clear transaction ID input
                    document.getElementById("transaction_id").value = "";

                    $('#donateModal').modal('hide');
                } else {
                    alert("❌ " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("⚠️ Something went wrong. Please try again.");
            });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@stack('scripts')

</html>
