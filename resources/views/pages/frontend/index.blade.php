@extends('layouts.frontend.master')

@section('content')
     <!-- Services -->
    <section class="page-section" id="services">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
              <h2 class="section-heading text-uppercase">Gallery</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <div class="row">
            @foreach($services as $service)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="portfolio-caption text-center">
                  <h4>{{ ucfirst($service->name) }}</h4>
                  <img class="w-100" src="{{ $service->thumbnail }}" style="width:100%">
                  <small><p class="text-muted">{{ ucfirst($service->description) }}</p></small>
                </div>
                  
            </div>              
            @endforeach
          </div>
        </div>
      </section>

      {{-- <section class="bg-light page-section">
        <div class="row text-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h5>Events</h5>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                  <ol class="carousel-indicators">
                      @foreach( $services as $service)
                        <li data-target="#carouselExampleFade" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                      @endforeach
                  </ol>
                  <div class="carousel-inner">
                      @foreach( $services as $service )
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                          <img src="/storage/{{ $service->thumbnail }}" class="img-fluid d-block mx-auto" alt="Carousel">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $service->name }}</h5>
                            <p>{{ $service->description }}</p>
                          </div>
                        </div>
                      @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
      </section> --}}
      
      <!-- Portfolio Grid -->
      <section class="bg-light page-section" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
              <h2 class="section-heading text-uppercase">Services</h2>
              <h3 class="section-subheading text-muted">Corporate Meetings and Events may be taxing to all participants. Good food must be in order. Triple E Gourmet Catering Services is the caterer you can rely on.</h3>
            </div>
          </div>
          <div class="row">
            @foreach($services as $service)
              <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#modal{{ $service->id }}">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fas fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="{{ $service->thumbnail }}" alt="">
                </a>
                <div class="portfolio-caption">
                <a class="portfolio-link" data-toggle="modal" href="#modal{{ $service->id }}">
                  <h4>{{ ucfirst($service->name) }}</h4>
                </a>
                  <p class="text-muted">{{ $service->description }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    
      <!-- About -->
      <section class="page-section" id="about">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
              <h2 class="section-heading text-uppercase">About</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <ul class="timeline">
                <li>
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ ('assets/frontend/img/about/1.jpg') }}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>2009-2011</h4>
                      <h4 class="subheading">Our Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ ('assets/frontend/img/about/2.jpg') }}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>March 2011</h4>
                      <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ ('assets/frontend/img/about/3.jpg') }}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>December 2012</h4>
                      <h4 class="subheading">Transition to Full Service</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{ ('assets/frontend/img/about/4.jpg') }}" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4>July 2014</h4>
                      <h4 class="subheading">Phase Two Expansion</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <h4>Be Part
                      <br>Of Our
                      <br>Story!</h4>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Team -->
      <section class="bg-light page-section" id="team">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
              <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
              <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
          </div>
          <div class="row">
              @if(!empty($admins))
                @foreach($admins->take(3) as $admin)

                <div class="col-sm-4">
                    <div class="team-member">
                      <img class="mx-auto rounded-circle" src="{{ $admin->profile->image }}" alt="">
                      <h4>{{ $admin->name }}</h4>
                      <p class="text-muted">{{ ucfirst($admin->profile->title) }}</p>
                      <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                        <a href="{{ $admin->profile->twitter }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                        <a href="{{ $admin->profile->facebook }}" target="_blank"">
                            <i class="fab fa-facebook-f"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                        <a href="{{ $admin->profile->linkedin }}" target="_blank"">
                            <i class="fab fa-linkedin-in"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>

                @endforeach
              @endif
            

            {{-- <div class="col-sm-4">
              <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ ('assets/frontend/img/team/2.jpg') }}" alt="">
                <h4>Larry Parker</h4>
                <p class="text-muted">Lead Marketer</p>
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="team-member">
                <img class="mx-auto rounded-circle" src="{{ ('assets/frontend/img/team/3.jpg') }}" alt="">
                <h4>Diana Pertersen</h4>
                <p class="text-muted">Lead Developer</p>
                <ul class="list-inline social-buttons">
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-twitter"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div> --}}

          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Clients -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ ('assets/frontend/img/logos/envato.jpg') }}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ ('assets/frontend/img/logos/designmodo.jpg') }}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ ('assets/frontend/img/logos/themeforest.jpg') }}" alt="">
              </a>
            </div>
            <div class="col-md-3 col-sm-6">
              <a href="#">
                <img class="img-fluid d-block mx-auto" src="{{ ('assets/frontend/img/logos/creative-market.jpg') }}" alt="">
              </a>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('additionalJS')
  @if (count($errors) > 0)
      <script>
          $(function() {
              $( "#reservation" ).modal('show');
          });
      </script>
  @endif
@endpush