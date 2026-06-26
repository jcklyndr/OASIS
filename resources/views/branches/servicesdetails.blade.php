@extends('layouts.app')

@section('content')


<div class="hero-wrap js-fullheight" style="background-image:linear-gradient(rgba(15, 32, 23, 0.7), rgba(15, 32, 23, 0.3)), url('{{ asset('assets/images/' . $getservicesdetails->image) }}'); position: relative;">
    <div class="overlay"></div>
    <div class="container js-fullheight d-flex align-items-center">
        <div class="row w-100 align-items-center">
            
    <div class="col-lg-7 col-md-6 text-white mb-5 mb-md-0">
        <h2 class="text-white-50 text-uppercase small fw-bold" style="letter-spacing: 2px;">
            Welcome to On-The-Go Relaxation
        </h2>
        <h1 class="mb-4 display-4 fw-bold text-white">
            {{ $getservicesdetails->name }}
        </h1>
        <h4 class="fw-bold px-3 py-2 border border-white rounded d-inline-block text-white bg-light bg-opacity-10">
            {{ $getservicesdetails->spaservice }}
        </h4>
    </div>

            {{-- KANANG SIDE: Booking Form --}}
            <div class="col-lg-5 col-md-6 position-relative form-custom-z"> 
                <form action="{{ route('branches.roomspaservices.booking', $getservicesdetails->id) }}" method="POST" class="p-4 p-md-5 bg-white shadow rounded text-dark">
                    @csrf
                    <h3 class="mb-4 font-weight-bold text-dark h4">Book Our Spa Services</h3>

                    {{-- Validation/Session Alerts --}}
                    @if(session()->has('error_dates'))
                        <div class="alert alert-danger py-2 small">{{ session()->get('error_dates') }}</div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger py-2 small">{{ session()->get('error') }}</div>
                    @endif
                    @if(session()->has('errornodate'))
                        <div class="alert alert-danger py-2 small">{{ session()->get('errornodate') }}</div>
                    @endif

                    <input type="hidden" name="roomspa_id" value="{{ $getservicesdetails->id }}">
                    <input type="hidden" name="branch_id" value="{{ $getservicesdetails->branch_id }}">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="text-dark small font-weight-bold mb-1">Check-In Date</label>
                                <input type="text" name="checkin" class="form-control appointment_date-check-in" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label class="text-dark small font-weight-bold mb-1">Check-Out Date</label>
                                <input type="text" name="checkout" class="form-control appointment_date-check-out" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="text-dark small font-weight-bold mb-1">Check-In Time</label>
                                <input type="time" name="checkin_time" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="text-dark small font-weight-bold mb-1">Check-Out Time</label>
                                <input type="time" name="checkout_time" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-2 mb-0">
                                @if (isset(Auth::user()->id))
                                    <input type="submit" value="Book and Pay Now" class="btn btn-primary py-3 w-100 font-weight-bold">
                                @else
                                    <p class="alert alert-danger text-center mb-0 small">Login to Book this Service</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- BABA: Details Section --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 pr-md-4">
                <div class="img mb-4 details-custom-bg"></div>
                <h2 class="h3 font-weight-bold">The most recommended Services!</h2>
                <p class="text-muted">Indulge in a range of carefully curated treatments designed to pamper your senses, soothe your mind, and revitalize your body. Our spa services, highly acclaimed and trusted by many, offer a blissful escape from the stresses of everyday life. From soothing massages to invigorating facials, our expert therapists deliver an exquisite experience tailored to your well-being.</p>
            </div>
            
            <div class="col-md-6 pl-md-4">
                <div class="mb-4">
                    <h2 class="h3 font-weight-bold mb-2">What we offer</h2>
                    <p class="text-muted">The Most Recommended Services: Immerse yourself in a world of unparalleled relaxation and rejuvenation with our exceptional spa services.</p>
                </div>
                
                <div class="row">
                    {{-- Spa Massage --}}
                    <div class="col-lg-6 mb-4">
                        <h3 class="h5 font-weight-bold">Spa Massage</h3>
                        <p class="text-muted small">A spa massage that transcends relaxation, revitalizing your body and soothing your senses.</p>
                    </div>

                    {{-- Full body Massage --}}
                    <div class="col-lg-6 mb-4">
                        <h3 class="h5 font-weight-bold">Full body Massage</h3>
                        <p class="text-muted small">Experience a holistic escape with our full-body massage, designed to unwind tension, promote circulation, and leave you rejuvenated from head to toe.</p>
                    </div>

                    {{-- Romantic Enchantment --}}
                    <div class="col-lg-6 mb-4">
                        <h3 class="h5 font-weight-bold">Romantic Enchantment</h3>
                        <p class="text-muted small">Indulge in the epitome of relaxation and connection with our Romantic Enchantment Spa Service, a blissful experience designed to create unforgettable moments.</p>
                    </div>

                    {{-- Spa Treatment --}}
                    <div class="col-lg-6 mb-4">
                        <h3 class="h5 font-weight-bold">Spa treatment</h3>
                        <p class="text-muted small">Experience rejuvenation and well-being through our spa treatment, a harmonious blend of therapeutic techniques.</p>
                    </div>

                    {{-- Hot Stone --}}
                    <div class="col-lg-6 mb-4">
                        <h3 class="h5 font-weight-bold">Hot stone</h3>
                        <p class="text-muted small">Heated stones are strategically placed to melt away tension, promoting deep relaxation and vitality.</p>
                    </div>

                    {{-- Amenities --}}
                  <div class="col-12 mb-4">
                      <h3 class="h5 font-weight-bold mb-3">Amenities</h3>
                      
                      <div class="row text-muted small">
                          
                          {{-- Unang Column --}}
                          <div class="col-6">
                              <ul class="list-unstyled mb-0">
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-wifi text-primary me-2"></i> Wifi Access
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-paw text-primary me-2"></i> Pet Friendly
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-coffee text-primary me-2"></i> Free Coffee
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-user text-primary me-2"></i> Assistant Service
                                  </li>
                              </ul>
                          </div>

                          {{-- Pangalawang Column --}}
                          <div class="col-6">
                              <ul class="list-unstyled mb-0">
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-snowflake text-primary me-2"></i> Air Conditioning
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-shield-alt text-primary me-2"></i> Security Service
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-temperature-high text-primary me-2"></i> Heating
                                  </li>
                                  <li class="mb-2 d-flex align-items-center">
                                      <i class="fas fa-parking text-primary me-2"></i> Parking
                                  </li>
                              </ul>
                          </div>

                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection