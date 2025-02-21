@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Home') }}
@endsection

@section('content')
    <!-- ******************** Slider Starts Here ******************* -->
    <div class="slider">
        <!-- Set up your HTML -->
        <div class="owl-carousel ">
            <div class="slider-img">
                <div class="item">
                    <div class="slider-img"><img src="assets/images/slider/slider-3.jpg" alt=""></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                <div class="animated bounceInDown slider-captions">
                                    <h1 class="slider-title">Together We Can Save Lives.</h1>
                                    <p class="slider-text hidden-xs">We know only too well that what we are doing is nothing
                                        more than a drop in the ocean. But if the drop were not there, the ocean would be
                                        missing something.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-img"><img src="assets/images/slider/slider-1.jpg" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="slider-captions ">
                                <h1 class="slider-title">It's time for better help.</h1>
                                <p class="slider-text hidden-xs">Too often we underestimate the power of a touch, a smile, a
                                    kind word, a listening ear, an honest compliment, or the smallest act of caring, all of
                                    which have the potential to turn a life around.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slider-img"><img src="assets/images/slider/slider-2.jpg" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="slider-captions ">
                                <h1 class="slider-title">No one has ever become poor from giving.</h1>
                                <p class="slider-text hidden-xs">Too often we underestimate the power of a touch, a smile, a
                                    kind word, a listening ear, an honest compliment, or the smallest act of caring, all of
                                    which have the potential to turn a life around.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  ************************* About Us Starts Here ************************** -->

    <div class="about-us container-fluid">
        <div class="container">

            <div class="row natur-row no-margin w-100">
                <div class="text-part col-md-6">
                    <h2>About Our Ngo</h2>
                    <p>At Suhrit Organization, we are dedicated to improving the lives of individuals and communities in
                        need. Our mission is to provide support, resources, and hope to those facing challenges, whether
                        through humanitarian aid, education, or healthcare initiatives.</p>
                    <p>We believe that lasting change comes from empowering people at the grassroots level. By working
                        directly with communities, we are able to understand their unique needs and develop solutions that
                        foster sustainable growth and development. Our dedicated team and volunteers work tirelessly to
                        ensure that our programs make a tangible difference in the lives of those we serve.</p>
                    <p>Through collaboration, compassion, and a commitment to social justice, we aim to build a better world
                        where every individual has access to the opportunities and resources they need to thrive. Join us in
                        our efforts to create positive change and uplift communities, one step at a time.</p>
                </div>

                <div class="image-part col-md-6">
                    <div class="about-quick-box row">
                        <div class="col-md-6">
                            <div class="about-qcard">
                                <i class="fas fa-user"></i>
                                <p>Become a Volunteer</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-qcard ">
                                <i class="fas fa-search-dollar red"></i>
                                <p>Quick Fundrais</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-qcard ">
                                <i class="fas fa-donate yell"></i>
                                <p>Give Donation</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-qcard ">
                                <i class="fas fa-hands-helping blu"></i>
                                <p>Help Someone</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ################# Mission Vision Start Here #######################--->

    <section class="container-fluid mission-vision">
        <div class="container">
            <div class="row mission">
                <div class="col-md-6 mv-det">
                    <h1>Our Mission</h1>
                    <p>At Suhrit Organization, our mission is to empower vulnerable communities and individuals by providing
                        essential resources, education, and support. We strive to create sustainable solutions that address
                        critical issues such as poverty, healthcare, education, and environmental conservation. Through
                        compassion, collaboration, and integrity, we aim to make a lasting, positive impact on the lives of
                        those we serve.

                    </p>
                </div>
                <div class="col-md-6 mv-img">
                    <img src="assets/images/misin.jpg" alt="">
                </div>
            </div>
            <div class="row vision">
                <div class="col-md-6 mv-img">
                    <img src="assets/images/vision.jpg" alt="">
                </div>
                <div class="col-md-6 mv-det">
                    <h1>Our Vision</h1>
                    <p>We envision a world where every person, regardless of their background or circumstances, has access
                        to opportunities that allow them to thrive. A world where communities are resilient, empowered, and
                        self-sufficient, and where social justice and equality are at the forefront of global progress. Our
                        goal is to be a catalyst for change, inspiring hope and fostering sustainable development for future
                        generations.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- ################# Events Start Here#######################--->
    <section class="events">
        <div class="container">
            <div class="session-title row text-center">
                <h2 class="section-heading">Popular Causes</h2>
                <p class="section-subheading">We are a non-profit organization raising money for child education.</p>
            </div>
            <div class="row">
                @if (!empty($events))
                    @foreach ($events->take(3) as $cause)
                        <div class="col-lg-4 col-md-6">
                            <div class="event-box">
                                <div class="event-image">
                                    <img src="{{ asset('assets/service/' . $cause->image) }}" alt="{{ $cause->title }}">
                                </div>
                                <div class="event-content">
                                    <h4>{{ $cause->title }}</h4>
                                    <p class="raises">
                                        <span class="raised-amount">Raised: ₹{{ 10000 }}</span> /
                                        ₹{{ 100000 }}
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ (1000 / 100000) * 100 }}%;"></div>
                                    </div>
                                    <p class="desic">{{ Str::limit($cause->description, 100) }}</p>
                                    <button class="btn btn-donate" data-toggle="modal" data-target="#donateModal"
                                        data-id="{{ $cause->id }}" data-title="{{ $cause->title }}">
                                        Donate Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <strong>No Data Available.</strong>
                @endif

            </div>
        </div>
    </section>



    <!-- ################# Charity Number Starts Here#######################--->


    <div class="doctor-message">
        <div class="inner-lay">
            <div class="container">
                <div class="row session-title text-center">
                    <h2 class="text-primary fw-bold">Our Achievements in Numbers</h2>
                    <p class="text-muted">
                        We can talk for a long time about the advantages of our Dental Clinic.
                        But you can read the following facts to see why we stand out:
                    </p>
                </div>
                <div class="row text-center">
                    <div class="col-sm-3 numb">
                        <h3 class="count text-warning" data-count="12">0+</h3>
                        <span>YEARS OF EXPERIENCE</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3 class="count text-success" data-count="1812">0+</h3>
                        <span>HAPPY CHILDREN</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3 class="count text-danger" data-count="52">0+</h3>
                        <span>EVENTS</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3 class="count text-info" data-count="48">0+</h3>
                        <span>FUNDS RAISED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- ################# Our Blog Starts Here#######################--->

    <section class="our-blog py-5">
        <div class="container">
            <div class="row session-title text-center">
                <h2 class="text-primary fw-bold">Our Blog</h2>
                <p class="text-muted">Take a look at what people say about us</p>
            </div>
            <div class="blog-row row">
                @if (!empty($blogs))
                    @foreach ($blogs->take(3) as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <figure>
                                    <img src="{{ asset('assets/blog/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </figure>
                                <div class="blog-detail">
                                    <small class="text-secondary"><i class="far fa-calendar-alt"></i>
                                        {{ date('F d, Y', strtotime($blog->date)) }}</small>
                                    <h4 class="blog-title">{{ $blog->title }}</h4>
                                    <p>{{ Str::limit($blog->description, 100) }}</p>
                                    <div class="read-more">
                                        <a href="{{ route('blog', $blog->id) }}">Read More</a>
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <strong>No Data Available.</strong>
                @endif

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".count").each(function() {
                var $this = $(this),
                    countTo = $this.attr("data-count");
                $({
                    countNum: 0
                }).animate({
                    countNum: countTo
                }, {
                    duration: 30000, // Animation duration (3 seconds)
                    easing: "swing",
                    step: function() {
                        $this.text(Math.floor(this.countNum) + "+");
                    },
                    complete: function() {
                        $this.text(this.countNum + "+"); // Ensure final value
                    },
                });
            });
        });
    </script>
@endpush
