@extends('layouts.backend.master')

@push('additionalCSS')
<style>
    .card-profile-img {
        max-width: 6rem;
        margin-bottom: 1rem;
        border: 3px solid #fff;
        border-radius: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }

    .status-icon {
        content: '';
        width: 0.5rem;
        height: 0.5rem;
        display: inline-block;
        background: currentColor;
        border-radius: 50%;
        transform: translateY(-1px);
        margin-right: .375rem;
        vertical-align: middle;
    }
    .bg-success {
        background-color: #4ecc48 !important;
    }
    .bg-danger {
        background-color: #c21a1a !important;
    }
    .bg-warning {
        background-color: #ecb403 !important;
    }
</style>
@endpush

@section('content')
    
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-profile "  style="background-image: url({{ asset('assets/img/listing-bg.png') }}); background-position: center; background-size:cover;">
                    <div class="card-body text-center">
                        <img class="card-profile-img" src="/storage/{{ $user->profile->image }}">
                        <h3 class="mb-3 text-white">{{ $user->name }}</h3>
                        <p class="mb-4 text-white">{{ $user->profile->title }}</p>
                        <p>@if($user->is_admin == true)<span class="badge badge-pill badge-success">Administrator</span> @endif</p><br><br>
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-5 ">
                    <div class="card-title">
                        Sites &amp; Social Media
                    </div>
                    <div class="media-list">
                        <div class="media mt-1 pb-2">
                            <div class="mediaicon">
                                <i class="icon-mail" aria-hidden="true"></i>
                            </div>
                            <div class="media-body ml-5 mt-1">
                                <h6 class="mediafont text-dark">Email Address</h6><span class="d-block">{{ $user->email }}</span>
                            </div>
                            <!-- media-body -->
                        </div>
                        <!-- media -->
                        <div class="media mt-1 pb-2">
                            <div class="mediaicon">
                                <i class="icon-twitter" aria-hidden="true"></i>
                            </div>
                            <div class="media-body ml-5 mt-1">
                                <h6 class="mediafont text-dark">Twitter</h6><a class="d-block" href="{{ $user->profile->twitter }}">@ {{ $user->name }}</a>
                            </div>
                        </div>
                        <div class="media mt-1 pb-2">
                            <div class="mediaicon">
                                <i class="icon-facebook" aria-hidden="true"></i>
                            </div>
                            <div class="media-body ml-5 mt-1">
                                <h6 class="mediafont text-dark">Facebook</h6><a class="d-block" href="{{ $user->profile->facebook }}">@ {{ $user->name }}</a>
                            </div>
                        </div>
                        <div class="media mt-1 pb-2">
                            <div class="mediaicon">
                                <i class="icon-instagram" aria-hidden="true"></i>
                            </div>
                            <div class="media-body ml-5 mt-1">
                                <h6 class="mediafont text-dark">Instagram</h6><a class="d-block" href="{{ $user->profile->instagram }}">@ {{ $user->name }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- media-list -->
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class=" " id="profile-log-switch">
                            <div class="fade show active " >
                                <div class="table-responsive border pt-4 pb-4">
                                    <table class="table row table-borderless w-100 m-0">
                                        <tbody class="col-lg-6 p-0">
                                            <tr>
                                                <td><strong>Full Name :</strong> {{ $user->name }}</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-6 p-0">
                                            <tr>
                                                <td><strong>Email :</strong> {{ $user->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-5 profie-img">
                                    <div class="col-md-12">
                                        <div class="media-heading">
                                        <h5><strong>About</strong></h5>
                                    </div>
                                    {!! $user->profile->about ?? '<p> nothing to view </p>'!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Customer</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter border text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Service</th>
                                        <th>Setting</th>
                                        <th>Number of Pax</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations->take(6) as $reservation)
                                        <tr>
                                            <td><a href="store.html" class="text-inherit">{{ $reservation->name }}</a></td>
                                            <td>{{ Carbon\Carbon::parse($reservation->date)->toFormattedDateString() }}</td>
                                            <td>
                                                @if($reservation->is_approved == true)
                                                    <span class="status-icon bg-success"></span> Approved

                                                @elseif (Carbon\Carbon::parse($reservation->date) == Carbon\Carbon::now() )

                                                    <span class="status-icon bg-danger"></span> On Going

                                                @else
                                                    <span class="status-icon bg-warning"></span> Pending
                                                @endif
                                            </td>
                                            <td>{{ $reservation->service->name ?? '' }}</td>
                                            <td>{{ $reservation->setting->name ?? '' }}</td>
                                            <td>{{ $reservation->pax }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection