@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Blogs') }}
@endsection

@section('content')

    <!--  ************************* Page Title Starts Here ************************** -->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Our Blog</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Blog</li>
                </ul>
            </div>
        </div>
    </div>



    <!-- ################# Our Blog Starts Here#######################--->

    <section class="our-blog">
        <div class="container">
            <div class="row scrollable-gallery" style="max-height: 700px; overflow-y: auto; padding-right: 10px;">                @if (!empty($blogs))
                    @foreach ($blogs as $blog)
                        <div class="col-md-4 mb-4">
                            <div class="single-blog card shadow-sm">
                                <div class="img-container">
                                    <img src="{{ asset('assets/blog/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        class="img-fluid blog-image">
                                </div>
                                <div class="card-body blog-detail">
                                    <small class="d-block mb-2">By Suhrit |
                                        {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }}</small>
                                    <h4 class="card-title">{{ $blog->title }}</h4>
                                    <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                                    <div class="link d-flex justify-content-between align-items-center">
                                        <a href="#" class="read-more" data-toggle="modal" data-target="#blogModal"
                                            data-title="{{ $blog->title }}" data-date="{{ $blog->date }}"
                                            data-description="{{ $blog->description }}"
                                            data-image="{{ asset('assets/blog/' . $blog->image) }}">Read more</a>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <strong>No Data Available!</strong>
                @endif
            </div>
        </div>

        <!-- Blog Modal -->
        <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="blogModalLabel">Blog Title</h5>
                        <button type="button" class="close text-white hide" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <img id="blogModalImage" src="" class="img-fluid rounded mb-3" alt="Blog Image">
                            </div>
                            <div class="col-md-6">
                                <strong style="color: black;">Describe</strong>
                                <p id="blogModalDescription" class="text-justify"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary hide" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



    </section>


@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.read-more').on('click', function() {
                var title = $(this).data('title');
                var date = $(this).data('date');
                var description = $(this).data('description');
                var image = $(this).data('image');

                $('#blogModalLabel').text(title + " | " + date);
                $('#blogModalImage').attr('src', image);
                $('#blogModalDescription').text(description);

                $('#blogModal').modal('show');
            });
        });
        $('.hide').on('click' ,function () {
            $('#blogModal').modal('hide');
        });
    </script>
@endpush
