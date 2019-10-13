@extends('layouts.backend.master')

@push('additionalCSS')
<link rel="stylesheet" href="{{ asset('assets/vendor/calendar/css/fullcalendar.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/calendar/css/custom-calendar.css') }}" />
@endpush

@push('additionalJS')
<!-- Apex Charts -->
<script src="{{ asset('assets/vendor/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/apexLineChartGradient.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/apexColumnBasic.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/apexAllCustomGraphs.js') }}"></script>
@include('pages.backend.partials.fullcalendar')

@endpush

@section('content')

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Welcome back, {{ auth()->user()->name }}</h5>
            </div>
        </div>
    </div>
    <!-- Page header end -->


    <!-- Content wrapper start -->
    <div class="content-wrapper">


        <!-- ************************** Visitors and Revenue ************************** -->
        <!-- Row start -->
        <div class="row gutters justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Reservation Event Calendar</h3>
                        </div>
                        <div class="card-body">
                            <div id='calendar1'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $customersCount = App\Reservation::whereIsApproved(true)->sum('pax');
            $approved = App\Reservation::whereIsApproved(true)->count();
            $pending = App\Reservation::whereIsApproved(false)->count();
            $revenue = App\Payable::sum('payable');
        @endphp

        <div class="row gutters justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                
                <div class="daily-sales">
                    <h6>Customers</h6>
                    <h1>{{ $customersCount }}</h1>
                    <p>No. of customers based on approved reservations</p>
                    <div id="apexLineChartGradient" class="blue-graph"></div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                
                <div class="daily-sales">
                    <h6>Revenue</h6>
                    <h1>{{ $revenue }}</h1>
                    <p>Revenue based on approved reservations</p>
                    <div id="apexLineChartGradient2" class="red-graph"></div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                
                <div class="daily-sales">
                    <h6>Approved Reservations</h6>
                    <h1>{{ $approved }}</h1>
                    <p>Total Expenses</p>
                    <div id="apexLineChartGradient3" class="green-graph"></div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                
                <div class="daily-sales">
                    <h6>Pending Reservations</h6>
                    <h1>{{ $pending }}</h1>
                    <p>Total Profit</p>
                    <div id="apexLineChartGradient4" class="lavandar-graph"></div>
                </div>

            </div>
        </div>
        <!-- Row end -->


        <!-- Row start -->
        <div class="row gutters justify-content-center">
            <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">
                
                <!-- Row start -->
                <div class="row no-gutters">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                 {{-- 
                        <div class="daily-sales">
                            <h6>Emails</h6>
                            <h1>21</h1>
                            <p>Total Emails Sent</p>
                            <div id="apexColumnBasic" class="orange-graph"></div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        
                        <div class="daily-sales">
                            <h6>SMS</h6>
                            <h1>25</h1>
                            <p>Total SMS Sent</p>
                            <div id="apexColumnBasic2" class="yellow-graph"></div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        
                        <div class="daily-sales">
                            <h6>Deals</h6>
                            <h1>9</h1>
                            <p>Total Deals Claimed</p>
                            <div id="apexColumnBasic3" class="blue-graph"></div>
                        </div>
--}}
                    </div>
                </div>
                <!-- Row end -->

            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->


</div>
@endsection