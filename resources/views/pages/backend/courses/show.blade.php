@extends('layouts.backend.master')

@section('content')

<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h5 class="title">{{ ucfirst($course->name) }}</h5>
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
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
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
                                        <label class="col-sm-2 col-form-label"><h5>ID</h5></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="inputReadOnly" value="{{ $course->id }}">
                                        </div>
                                    </div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><h5>Name</h5></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" value="{{ $course->name }}">
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><h5>Slug</h5></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" value="{{ $course->slug }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label"><h5>Description</h5></label>
										<div class="col-sm-10">
											<input type="text" readonly class="form-control" value="{{ $course->description }}">
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><h5>Course Type</h5></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" value="{{ $course->type->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><h5>Image</h5></label>
                                        <div class="col-sm-10">
                                            <img src="{{ $course->image }}" class="w-50">
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <a href="{{ route('courses.edit', $course->slug) }}"class="btn btn-secondary btn-rounded" style="float:right"> Edit </a>
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