@extends('layouts.backend.master')

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
                    <li class="breadcrumb-item"><a href="{{ route('reservation.index') }}">Reservations</a></li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> Setup Settings</div>
                    </div>
                    <div class="card-body p-12">
                        <div class="wizard-container">
                            <div class="wizard-card m-0" data-color="red" id="wizardProfile">
                                <form>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#firstTab" data-toggle="tab">Customer Details</a></li></a></li>
                                            <li><a href="#secondTab" data-toggle="tab">Service</a></li>
                                            <li><a href="#thirdTab" data-toggle="tab">Menus and Sets</a></li>
                                        </ul>
                                    </div>
                
                                    <div class="tab-content">

                                        <div class="tab-pane" id="firstTab">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Name <small>(required)</small></label>
                                                                    <input name="name" type="text" class="form-control" value="{{ $reservation->name }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
    
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Contact # <small>(required)</small></label>
                                                                    <input name="phone" type="text" class="form-control" value="{{ $reservation->contact }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="date">Choose the date</label>
                                                                <input class="form-control" name="date" type='text' id="date" placeholder="yyyy-mm-dd" value="{{ $reservation->date }}" required>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Venue <small>(required)</small></label>
                                                                    <input name="venue" type="text" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="secondTab">
                                            <h4 class="info-text"> Choose Service (checkboxes) </h4>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio">
                                                        <input type="radio" name="jobb" value="Design">
                                                        <div class="icon">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <h6>Wedding</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio">
                                                        <input type="radio" name="jobb" value="Code">
                                                        <div class="icon">
                                                            <i class="fa fa-terminal"></i>
                                                        </div>
                                                        <h6>Debut</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio">
                                                        <input type="radio" name="jobb" value="Develop">
                                                        <div class="icon">
                                                            <i class="fa fa-laptop"></i>
                                                        </div>
                                                        <h6>Corporate</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="thirdTab">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 pb-5">
                                                            <h4 class="info-text"> Choose desired set</h4>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-radio">
                                                                <input type="radio" name="jobb" value="Develop">
                                                                <div class="icon">
                                                                    <i class="fa fa-laptop"></i>
                                                                </div>
                                                                <h6>Set 1 (&#8369; 150/head)</h6>
                                                                <ul>
                                                                    <li style="width:10em; float:left;"><small>&bull;Pork</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Chicken</small></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-radio">
                                                                <input type="radio" name="jobb" value="Develop">
                                                                <div class="icon">
                                                                    <i class="fa fa-laptop"></i>
                                                                </div>
                                                                <h6>Set 2 (&#8369; 185/head)</h6>
                                                                <ul>
                                                                    <li style="width:10em; float:left;"><small>&bull;Pork</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Chicken</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Beef</small></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-radio">
                                                                <input type="radio" name="jobb" value="Develop">
                                                                <div class="icon">
                                                                    <i class="fa fa-laptop"></i>
                                                                </div>
                                                                <h6>Set 3 (&#8369; 200/head)</h6>
                                                                <ul>
                                                                    <li style="width:10em; float:left;"><small>&bull;Pork</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Chicken</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Beef</small></li>
                                                                    <li style="width:10em; float:left;"><small>&bull;Chicken</small></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="form-group">
                                                    <div class="col-sm-12 pb-4 pt-4">
                                                        <h3>Package of Choosen Set Includes: </h3>
                                                    </div>
                                                    <hr>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">Pork <small>(choose one)</small></div>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Radios example -->
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadioInline1">Pork Hawaiian</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadioInline2">Pork Macha High Blood</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">Chicken <small>(choose one)</small></div>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Radios example -->
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadioInline1">Pork Hawaiian</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadioInline2">Pork Macha High Blood</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-primary btn-wd m-0' name='next' value='Next' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd m-0' name='finish' value='Finish' />
                                        </div>
                
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd m-0' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection