@extends('layouts.backend.master')

@push('additionalCSS')
<link rel="stylesheet" href="{{ asset('assets/css/pricing.css') }}">
@endpush

@section('content')
<div class="main-container">


    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">{{ ucfirst($reservation->name) }}</h5>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="daterange-container pr-5">
                    <a href="{{ route('reservation.pdf', $reservation->id) }}" class="btn btn-info" target="_blank"><i class="icon-export"></i>Export PDF</a>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-area-graph"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reservation.index') }}">Reservations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($reservation->name) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page header end -->


    <!-- Content wrapper start -->
    <div class="content-wrapper">


        <!-- Row start -->
        <div class="row gutters">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="pricing-plan">
                    <div class="pricing-header">
                        <h4 class="pricing-title">Service</h4>
                        <div class="pricing-cost">{{ ucfirst($reservation->service->name) }}</div>
                        <div class="pricing-save">Number of Pax: {{ $reservation->pax }}</div>
                    </div>
                    <ul class="pricing-features">
                        <li>Name: {{ $reservation->name }}</li>
                        <li>Email: {{ $reservation->email }}</li>
                        <li>Phone: {{ $reservation->contact }}</li>
                        <li>Venue: {{ ucfirst($reservation->venue) }}</li>
                        <li>Date: {{ Carbon\Carbon::parse($reservation->date)->toFormattedDateString() }}</li>
                        <li>Payable(pax * set price): &#8369;{{ number_format($reservation->payable(), 2) }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="pricing-plan">
                    <div class="pricing-header green">
                        <h4 class="pricing-title">Setting</h4>
                        <div class="pricing-cost">{{ $reservation->setting->name }}</div>
                        <div class="pricing-save">&#8369;{{ number_format($reservation->setting->price, 2) }}</div>
                    </div>
                    <ul class="pricing-features">
                        @foreach( $reservation->courses as $courses )
                            <li>{{ $courses->type->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="pricing-plan">
                    <div class="pricing-header orange">
                        <h4 class="pricing-title">Choosen Menu</h4>
                        <div class="pricing-cost">Menus</div>
                        <div class="pricing-save">Details</div>
                    </div>
                    <ul class="pricing-features">
                        @foreach( $reservation->courses as $menu )
                            <li class="pb-2">
                                {{ $menu->type->name }} - {{ $menu->name }} <br>
                                <img src="/storage/{{ $menu->image }}" class="w-50 pt-2">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Row end -->


    </div>
    <!-- Content wrapper end -->


</div>
@endsection