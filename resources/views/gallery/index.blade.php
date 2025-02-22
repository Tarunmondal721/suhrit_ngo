@extends('layouts.main')

@section('title')
    {{ __('Suhrit | Gallery') }}
@endsection


@section('content')
    <!--  ************************* Page Title Starts Here ************************** -->

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Our Gallery</h2>
                <ul>
                    <li> <a href="{{ route('gallery') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Gallery</li>
                </ul>
            </div>
        </div>
    </div>



    <!-- ************************* Gallery Starts Here ************************** -->
<div id="portfolio" class="gallery">
    <div class="container">
        <div class="row">
            <!-- Dynamic Filter Buttons -->
            <div class="gallery-filter d-none d-sm-block">
                <button class="btn btn-default filter-button" data-filter="all">All</button>
                @foreach ($categories as $category)
                    <button class="btn btn-default filter-button" data-filter="{{ $category }}">
                        {{ ucwords(str_replace('_', ' ', strtolower($category))) }}
                    </button>
                @endforeach
            </div>
            <br />

            @foreach ($galleries as $gallery)
            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter {{ $gallery->category }}">
                <a href="{{ asset('assets/gallery/' . $gallery->image) }}" data-lightbox="gallery" data-title="{{ $gallery->title }}">
                    <img src="{{ asset('assets/gallery/' . $gallery->image) }}" class="img-responsive gallery-image" alt="{{ $gallery->title }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- ######## Gallery End ####### -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $(".filter-button").click(function () {
            var value = $(this).attr('data-filter');

            if (value === "all") {
                $(".filter").show('1000');
            } else {
                $(".filter").not('.' + value).hide('3000');
                $(".filter").filter('.' + value).show('3000');
            }

            // Toggle active class for buttons
            $(".filter-button").removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endpush
