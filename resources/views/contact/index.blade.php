@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Contact') }}
@endsection
@section('content')
    <!--  ************************* Page Title Starts Here ************************** -->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2> Our Contact</h2>
                <ul class="navbad">
                    <li class="nav-item {{ Request::route()->getName() == 'home' ? 'active' : '' }}"> <a
                            href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>

                    <li><i class="fas fa-angle-double-right"></i>Contact</li>
                </ul>
            </div>
        </div>
    </div>

    <!--  ************************* Contact Us Starts Here ************************** -->


    <div style="margin-top:0px;" class="row no-margin">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29640.633256523994!2d87.72926300047399!3d21.777197227377773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0326e5394d8237%3A0x7bb6b4d525857f71!2sContai%2C%20West%20Bengal%20721401!5e0!3m2!1sen!2sin!4v1682266776184!5m2!1sen!2sin"
            width="100%" height="450" style="border:0;" allowfullscreen=""></iframe>


    </div>

    <div class="row contact-rooo no-margin">
        <div class="container">
            <div class="row">


                <div style="padding:20px" class="col-sm-7">
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
                    <h2>Contact Form</h2> <br>
                    <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row cont-row">
                            <div class="col-sm-3"><label>Enter Name </label><span>:</span></div>
                            <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="name" required
                                    class="form-control input-sm"></div>
                        </div>
                        <div class="row cont-row">
                            <div class="col-sm-3"><label>Email Address </label><span>:</span></div>
                            <div class="col-sm-8"><input type="text" name="address" placeholder="Enter Email Address"
                                    required class="form-control input-sm"></div>
                        </div>
                        <div class="row cont-row">
                            <div class="col-sm-3"><label>Mobile Number</label><span>:</span></div>
                            <div class="col-sm-8"><input type="text" name="phone" placeholder="Enter Mobile Number"
                                    required class="form-control input-sm"></div>
                        </div>
                        <div class="row cont-row">
                            <div class="col-sm-3"><label>Enter Message</label><span>:</span></div>
                            <div class="col-sm-8">
                                <textarea rows="5" name="message" placeholder="Enter Your Message" class="form-control input-sm"></textarea>
                            </div>
                        </div>
                        <div style="margin-top:10px;" class="row">
                            <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary btn-sm">Send Message</button>
                            </div>
                        </div>
                </div>
                </form>
                <div class="col-sm-5">

                    <div style="margin:50px" class="serv">

                        <h2 style="margin-top:10px;">Address</h2>

                        NH116B Road, <br>
                        Contai, West Bengal, Purba Medinipur<br>
                        Pin: 721401<br>
                        Phone:+91 865 368 1154<br>
                        Email:suhritorganization@gmail.com<br>
                        Website:<a href="https://suhrit-organization.onrender.com/">www.suhrit.com</a>
                        <br>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
