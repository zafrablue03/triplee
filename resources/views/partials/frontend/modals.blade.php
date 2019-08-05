
<!-- Modals -->

{{-- Reservation --}}

<div class="portfolio-modal modal fade" id="reservation" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                        <!-- Project Details Go Here -->
                            <div class="container">
                                <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date">Choose the date</label>
                                                        <input class="form-control" type='text' id="date" placeholder="mm-dd-yyyy" readonly required="required" data-validation-required-message="Please enter the target date."/>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" id="phone" type="tel" placeholder="Contact Number" required="required" data-validation-required-message="Please enter your phone number.">
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="menu">Choose a Menu</label>
                                                    <div class="form-group">
                                                        <select class="form-control selectpicker" data-style="btn-info" name="type" required>
                                                            <option selected disabled>Select Type</option>
                                                            @foreach( $services->pluck('name','id') as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                                        <p class="help-block text-danger"></p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-lg-12 text-center">
                                                <div id="success"></div>
                                                <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
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

    <!-- Modal 1 -->

@foreach($services as $service)
<div class="portfolio-modal modal fade" id="modal{{ $service->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">{{ $service->name }}</h2>
                <p class="item-intro text-muted">{{ $service->description }}</p>
                <img class="img-fluid d-block mx-auto" src="/storage/{{ $service->image }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach

    <!-- Modal 2 -->
{{-- <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/portfolio/02-full.jpg') }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Modal 3 -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/portfolio/03-full.jpg') }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Modal 4 -->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/portfolio/04-full.jpg') }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Modal 5 -->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/portfolio/05-full.jpg') }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

    <!-- Modal 6 -->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
            <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="{{ asset('assets/frontend/img/portfolio/06-full.jpg') }}" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div> --}}


@push('additionalJS')
<script src="{{ asset('assets/frontend/vendor/datepicker/datepicker.js') }}"></script>
<script>
    $(function() {
        $( "#date" ).datepicker({  
            'format': 'mm-dd-yyyy',
            'autoclose': true,
            'todayHighlight': true
        });
    });
</script>
@endpush