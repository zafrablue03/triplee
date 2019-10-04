@extends('layouts.backend.master')


@section('content')
<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h5 class="title">Menu Gallery</h5>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="daterange-container">
                <div class="date-range">
                    <div id="reportrange">
                        <i class="icon-calendar cal"></i>
                        <span class="range-text"></span>
                        <i class="icon-chevron-down arrow"></i>
                    </div>
                </div>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Download CSV" class="download-reports">
                    <i class="icon-download1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Page header end -->


<!-- Content wrapper start -->
<div class="content-wrapper">


    <!-- Gallery start -->
    <div class="baguetteBoxThree gallery">
        <!-- Row start -->
        @foreach($types as $type)
            <div class="card d-flex">
                <div class="card-header">
                    <div class="card-title"><h4 class="text-info">{{ ucfirst($type->name) }}</h4></div>
                </div>
                @foreach($type->courses as $course)
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                                <a href="/storage/{{ $course->image }}" class="effects">
                                    <img src="/storage/{{ $course->image }}" class="img-fluid" alt="Retail Admin">
                                    <div class="overlay">
                                        <span class="expand">+</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <!-- Row end -->
    </div>
    <!-- Gallery end -->


</div>
@endsection
@push('additionalCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/gallery/gallery.css') }}" />
@endpush
@push('additionalJS')
    <script src="{{ asset('assets/vendor/gallery/baguetteBox.js') }}" async></script>
    <script src="{{ asset('assets/vendor/gallery/plugins.js') }}" async></script>
    <script src="{{ asset('assets/vendor/gallery/custom-gallery.js') }}" async></script>
@endpush

