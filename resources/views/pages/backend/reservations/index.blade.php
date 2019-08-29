@extends('layouts.backend.master')

@push('additionalCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" />
@endpush

@push('additionalJS')
    <script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>
    <script>
        $(function(e) {
            $('#pending-reservations').DataTable();
        } );
    </script>
    <script>
        $(function(e) {
            $('#approved-reservations').DataTable();
        } );
    </script>
@endpush

@section('content')

<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h5 class="title">Reservations</h5>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icon-area-graph"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reservations</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    
<div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card custom-default">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved Reservations</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">

                            <div class="card">
                                <div class="card-header">
                                    <h3> <span class="badge badge-danger">Pending Reservations</span></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="pending-reservations" class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pending_reservations as $pending)
                                                <tr>
                                                    <td>{{ $pending->id }}</td>
                                                    <td>{{ $pending->name }}</td>
                                                    <td>{{ $pending->email }}</td>
                                                    <td>{{ $pending->contact }}</td>
                                                    <td>{{ str_limit($pending->message, $limit=50, $end="...") }}</td>
                                                    <td><span class="badge badge-danger">Pending</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
                                                                <i class="fa fa-cogs mr-2"></i>Actions
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                {{-- <a class="dropdown-item" href="{{ route('reservation.show', $pending->id) }}">View</a> --}}
                                                                <a class="dropdown-item" href="{{ route('reservation.edit', $pending->id) }}">Manage reservation</a>
                                                                <form action="{{ route('reservation.destroy', $pending->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3><h3> <span class="badge badge-success">Approved Reservations</span></h3></h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="approved-reservations" class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($approved_reservations as $approved)
                                                <tr>
                                                    <td>{{ $approved->id }}</td>
                                                    <td>{{ $approved->name }}</td>
                                                    <td>{{ $approved->email }}</td>
                                                    <td>{{ $approved->contact }}</td>
                                                    <td>{{ str_limit($approved->message, $limit=50, $end="...") }}</td>
                                                    <td><span class="badge badge-success">Approved</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
                                                                <i class="fa fa-cogs mr-2"></i>Actions
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('reservation.show', $approved->id) }}">View</a>
                                                                <a class="dropdown-item" href="{{ route('reservation.edit', $approved->id) }}">Edit</a>
                                                                <form action="{{ route('reservation.destroy', $approved->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
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

        </div>
    </div>
</div>


@endsection


