@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Event') }}
@endsection
@section('content')
    <!--  ************************* Page Title Starts Here ************************** -->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2> Our Event</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Event</li>
                </ul>
            </div>
        </div>
    </div>




    <div class="container">

        {{-- @if ($errors->any())
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    @foreach ($errors->all() as $error)
                        toastr.error("{{ $error }}");
                    @endforeach
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('success') }}");
                });
            </script>
        @endif --}}

        <h1 class="text-center mb-4" style="margin-top: 5%;">Upcoming Events</h1>

        <div class="row">
            @if (!empty($upcomingEvents))
                @foreach ($upcomingEvents as $event)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card event-card position-relative">
                            <img src="{{ asset('assets/event/' . $event->image) }}" class="card-img-top event-image"
                                alt="{{ $event->title }}">
                            <div class="card-body">
                                <h4 class="event-title text-success">{{ $event->title }}</h4>
                                <p class="event-details">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }} <br>
                                    <i class="fas fa-clock"></i> {{ date('h:i A', strtotime($event->time)) }} <br>
                                    <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                </p>
                            </div>
                            <button class="btn btn-custom" style="float: right;" data-toggle="modal"
                                data-target="#eventModal{{ $event->id }}">View Details</button>
                            <div class="event-date">
                                {{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Event Modal -->
                    <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">{{ $event->title }}
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <!-- Event Image -->
                                        <div class="col-md-6">
                                            <img src="{{ asset('assets/event/' . $event->image) }}"
                                                class="img-fluid rounded mb-3" alt="{{ $event->title }}">
                                        </div>
                                        <!-- Event Details -->
                                        <div class="col-md-6">
                                            <div class="event-details">
                                                <h4 class="font-weight-bold mb-2">Event Details</h4>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Date:</strong>
                                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Time:</strong>
                                                    <span>{{ date('h:i A', strtotime($event->time)) }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Location:</strong>
                                                    <span class="text-justify">{{ $event->location }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Description:</strong>
                                                    <span class="text-justify">{{ $event->description }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#registerModal{{ $event->id }}">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Registration Modal -->
                    <div class="modal fade" id="registerModal{{ $event->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="registerModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Header -->
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title" id="registerModalLabel{{ $event->id }}">Register for
                                        {{ $event->title }}</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Form -->
                                <form id="registrationForm{{ $event->id }}"
                                    action="{{ route('events.register', $event->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control stylish-input"
                                                id="name" placeholder="Enter your name" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control stylish-input"
                                                id="email" placeholder="Enter your valid email" required>

                                            <button type="button" id="sendotp"
                                                class="btn btn-info mt-2 stylish-button" onclick="sendOTP()">Verify
                                                Email</button>
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group" id="add" hidden>
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control stylish-input" id="address" cols="30" rows="3"
                                                placeholder="Enter your valid address" required></textarea>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="form-group" hidden id="tel">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" class="form-control stylish-input"
                                                id="phone" placeholder="Enter your number" required
                                                oninput="validatePhoneNumber(this)">
                                            <small id="phoneError" class="text-danger" style="display: none;">Phone
                                                number
                                                must be exactly 10 digits.</small>


                                            <div id="recaptcha-container"></div>

                                        </div>

                                        <!-- OTP Section -->
                                        <div class="form-group" id="otpSection" style="display: none;">
                                            <label for="otp">Enter OTP</label>
                                            <input type="text" class="form-control stylish-input" id="otp"
                                                placeholder="Enter OTP">
                                            <button type="button" class="btn btn-success mt-2 stylish-button"
                                                onclick="verifyOTP()">Check OTP</button>
                                            <input type="hidden" id="verificationId" name="verificationId">
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary stylish-button"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" id="registerButton" class="btn btn-primary stylish-button"
                                            disabled>Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <strong>Comming Soon......</strong>
            @endif

        </div>

        <hr class="my-5">

        <h1 class="text-center mb-4">Completed Events</h1>

        <div class="row">
            @if (!empty($completedEvents))
                @foreach ($completedEvents as $event)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card event-card position-relative bg-light border-success">
                            <img src="{{ asset('assets/event/' . $event->image) }}" class="card-img-top event-image"
                                alt="{{ $event->title }}">
                            <div class="card-body">
                                <h4 class="event-title text-success">{{ $event->title }}</h4>
                                <p class="event-details">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }} <br>
                                    <i class="fas fa-clock"></i> {{ date('h:i A', strtotime($event->time)) }} <br>
                                    <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                </p>
                            </div>
                            <div class="event-status text-success fw-bold text-center py-2">✅ Completed</div>
                        </div>
                    </div>
                @endforeach
            @else
                <strong>No Data Available!</strong>
            @endif
        </div>
    </div>
    @push('scripts')
        <script>
            function sendOTP() {
                let email = $("#email").val();

                if (!email) {
                    toastr.error("Please enter a valid email address.");
                    return;
                }

                $.ajax({
                    url: "{{ route('send.otp') }}",
                    type: "POST",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.success(response.message, "OTP Sent!");
                        $("#otpSection").show();
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.error, "Error");
                    }
                });
            }


            function verifyOTP() {
                let email = $("#email").val();
                let otp = $("#otp").val();

                $.ajax({
                    url: "{{ route('verify.otp') }}",
                    type: "POST",
                    data: {
                        email: email,
                        otp: otp,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {

                        toastr.success(response.message, "OTP Verified!");

                        // Hide OTP section and verify button
                        $("#otpSection").hide();
                        $("#sendotp").hide();

                        // Show Address and Phone Number fields
                        $("#add").removeAttr("hidden");
                        $("#tel").removeAttr("hidden");

                        // Enable Register button
                        $("#registerButton").prop("disabled", false);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.error, "OTP Verification Failed");
                    }
                });
            }

            function validatePhoneNumber(input) {
                let phoneNumber = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                let errorElement = document.getElementById("phoneError");


                if (phoneNumber.length > 10) {
                    input.value = phoneNumber.slice(0, 10);
                }

                if (phoneNumber.length === 10) {
                    errorElement.style.display = "none";
                } else {
                    errorElement.style.display = "block"; // Show error if not exactly 10 digits
                }
            }
        </script>
    @endpush
@endsection
