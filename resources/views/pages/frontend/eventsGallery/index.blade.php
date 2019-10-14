@extends('layouts.frontend.master')

@section('gallery')
<div class="my-3 my-md-5">
    <div class="container">
        <div class="page-header">
            <h2 class="section-heading text-uppercase">Gallery</h2>
        </div>
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-1">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-2">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-3">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-4">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-5">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-6">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-7">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-7">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{ asset('assets/img/user.png') }}" data-src="{{ asset('/assets/img/user.png') }}" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                    <a href="#">
                        <img class="img-responsive" src="{{ asset('assets/img/user.png') }}" alt="Thumb-7">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>
@endsection


@push('additionalCSS')
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/fonts/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> --}}
            
    <link href="{{ asset('assets/frontend/css/dashboard.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/frontend/plugins/gallery/gallery.css') }}" rel="stylesheet">
    <!---Font icons-->
    <link href="{{ asset('assets/frontend/plugins/iconfonts/plugin.css') }}" rel="stylesheet" />
@endpush
@push('additionalJS')
            
    {{-- <script src="{{ asset('assets/frontend/js/vendors/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendors/bootstrap.bundle.min.js') }}"></script> --}}
        
    <script src="{{ asset('assets/frontend/plugins/gallery/picturefill.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lightgallery.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-pager.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-autoplay.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-fullscreen.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-zoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-hash.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/gallery/lg-share.js') }}"></script>

    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
@endpush
