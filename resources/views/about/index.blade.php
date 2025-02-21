@extends('layouts.main')

@section('title')
    {{ __('Suhrit | About') }}
@endsection
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->

     <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>About Our Ngo</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> About Us</li>
                </ul>
            </div>
        </div>
    </div>


     <!--  ************************* About Us Starts Here ************************** -->

    <div class="about-us container-fluid">
        <div class="container">

            <div class="row natur-row no-margin w-100">
                <div class="text-part col-md-6">
                    <h2>About Our Ngo</h2>
                    <p>At Suhrit Organization, we are dedicated to improving the lives of individuals and communities in need. Our mission is to provide support, resources, and hope to those facing challenges, whether through humanitarian aid, education, or healthcare initiatives.</p>
                    <p>We believe that lasting change comes from empowering people at the grassroots level. By working directly with communities, we are able to understand their unique needs and develop solutions that foster sustainable growth and development. Our dedicated team and volunteers work tirelessly to ensure that our programs make a tangible difference in the lives of those we serve.</p>
                    <p>Through collaboration, compassion, and a commitment to social justice, we aim to build a better world where every individual has access to the opportunities and resources they need to thrive. Join us in our efforts to create positive change and uplift communities, one step at a time.</p>
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


    <!--################### Our Team Starts Here #######################--->
    <section class="our-team team-11">
        <div class="container">
            <div class="session-title row">
                <h2>Meet our Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit velit</p>
            </div>
            <div class="row team-row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{ asset('assets/images/team/team-memb1.jpg') }}" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>CEO </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{ asset('assets/images/team/team-memb2.jpg') }}" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>CFO</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{ asset('assets/images/team/team-memb3.jpg') }}" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Team Leader</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{ asset('assets/images/team/team-memb4.jpg') }}" alt="">
                        <div class="det-o">
                            <h4>David Kanuel</h4>
                            <i>Project Manager</i>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ################# Mission Vision Start Here #######################--->

    <section class="container-fluid mission-vision">
        <div class="container">
            <div class="row mission">
                <div class="col-md-6 mv-det">
                    <h1>Our Mission</h1>
                    <p>At Suhrit Organization, our mission is to empower vulnerable communities and individuals by providing essential resources, education, and support. We strive to create sustainable solutions that address critical issues such as poverty, healthcare, education, and environmental conservation. Through compassion, collaboration, and integrity, we aim to make a lasting, positive impact on the lives of those we serve.

                    </p>
                </div>
                <div class="col-md-6 mv-img">
                    <img src="{{ asset('assets/images/misin.jpg') }}" alt="">
                </div>
            </div>
            <div class="row vision">
                <div class="col-md-6 mv-img">
                    <img src="{{ asset('assets/images/vision.jpg') }}" alt="">
                </div>
                <div class="col-md-6 mv-det">
                    <h1>Our Vision</h1>
                    <p>We envision a world where every person, regardless of their background or circumstances, has access to opportunities that allow them to thrive. A world where communities are resilient, empowered, and self-sufficient, and where social justice and equality are at the forefront of global progress. Our goal is to be a catalyst for change, inspiring hope and fostering sustainable development for future generations.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
