@extends('layouts.backend.master')

@section('content')

<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h5 class="title">{{ ucfirst($type->name) }}</h5>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="daterange-container pr-5">
                {{-- <a class="btn btn-secondary btn-rounded" href="{{ route('types.create') }}"><span class="icon-add"></span> New Type</a> --}}
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icon-area-graph"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('types.index') }}">Types</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"><h4>ID</h4></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="inputReadOnly" value="{{ $type->id }}">
                                        </div>
                                    </div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label"><h4>Name</h4></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" value="{{ $type->name }}">
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"><h4>Slug</h4></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" value="{{ $type->slug }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label"><h4>Description</h4></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" value="{{ $type->description }}">
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label"><h4>Total No. of Courses for this type</h4></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" value="{{ $type->courses()->count() }}">
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <a href="{{ route('types.edit', $type->slug) }}"class="btn btn-secondary btn-rounded" style="float:left"> Edit </a>
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