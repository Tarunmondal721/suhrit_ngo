@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Service') }}
@endsection

@section('content')
    <!--  ************************* Page Title Starts Here ************************** -->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Popular Causes</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Service</li>
                </ul>
            </div>
        </div>
    </div>



    <!-- ################# Service Start Here#######################--->
    <section class="services">
        <div class="container">
            @if (!empty($services) && $services->count())
                <div class="scroll-wrapper" style="max-height: 800px; overflow-y: auto;">
                    <div class="row">
                        @foreach ($services->take(6) as $service)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="service-box p-3 border rounded bg-white">
                                    <img src="{{ asset('assets/service/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid">
                                    <h4 class="mt-2">{{ $service->title }}</h4>
                                    <p class="desic">{{ Str::limit($service->description, 100) }}</p>
    
                                    <button class="btn btn-primary btn-sm mt-2 btn-learn-more"  data-toggle="modal" data-target="#serviceModal"
                                        data-id="{{ $service->id }}" data-title="{{ $service->title }}"
                                        data-date="{{ $service->date }}" data-description="{{ $service->description }}"
                                        data-image="{{ asset('assets/service/' . $service->image) }}">
                                        Learn More
                                    </button>
    
                                    <button class="btn btn-success btn-sm mt-2" data-toggle="modal"
                                        data-target="#donateModal" data-id="{{ $service->id }}"
                                        data-title="{{ $service->title }}">
                                        Donate Now
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-info text-center">No Service Available!</div>
            @endif
        </div>
    </section>
    

    <!-- Service Detail Modal -->
    <div class="modal fade" id="serviceModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serviceModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <img id="service-image" class="img-fluid rounded w-100" style="height: 300px; object-fit: cover;">
                    <h4 id="service-title" class="mt-3"></h4>
                    <p id="service-date" class="text-muted"></p>
                    <p id="service-description"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-learn-more').on('click', function() {
                var title = $(this).data('title');
                var date = $(this).data('date');
                var description = $(this).data('description');
                var image = $(this).data('image');

                $('#serviceModalLabel').text(title);
                $('#service-title').text(title);
                $('#service-date').text('Date: ' + date);
                $('#service-description').text(description);
                $('#service-image').attr('src', image);
            });
        });
    </script>
@endpush
