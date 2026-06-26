@extends('layouts.app')

@section('content')

<section class="custom-roomspaservices-hero custom-spa-services-bg d-flex align-items-center justify-content-center position-relative overflow-hidden text-center text-white py-5">
    <div class="container position-relative z-index-2 py-5">
        <div class="row justify-content-center">
            <div class="col-md-9 ftco-animate">
                <span class="text-uppercase tracking-wider fw-bold small text-light opacity-75 mb-2 d-block">Current Available</span>
                <h1 class="display-4 fw-bold mb-0 text-uppercase">Room & Spa Services</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid px-md-0">
        <div class="row g-0">
            @foreach ($getroomspaservices as $sparooms)
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex h-100 align-items-stretch overflow-hidden border-top border-light-subtle">
                        
                        <a href="{{ route('branches.roomspaservices.details', $sparooms->id) }}" 
                           class="d-block w-100 min-vh-35 spa-card-img" 
                           style="background-image: url('{{ asset('assets/images/'.$sparooms->image) }}');">
                        </a>
                        
                        <div class="w-100 bg-white d-flex align-items-center p-4 p-xl-5">
                            <div class="text-center w-100">
                                <p class="mb-2 spa-stars small">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </p>
                                
                                <span class="d-block text-success fw-bold fs-5 mb-2">
                                    ₱{{ number_format($sparooms->price, 2) }} / Session
                                </span>
                                
                                <h3 class="h4 mb-3 fw-bold">
                                    <a href="{{ route('branches.roomspaservices.details', $sparooms->id) }}" class="text-dark text-decoration-none transition-color">
                                        {{ $sparooms->spaservice }}
                                    </a>
                                </h3>
                                
                                <ul class="list-unstyled mb-4 text-secondary small text-start mx-auto border-top pt-3" style="max-width: 280px;">
                                    <li class="mb-2 d-flex justify-content-between">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-users me-2 text-muted"></i>Max Occupancy:</span> 
                                        <span>{{ $sparooms->maxpeeps }} Persons</span>
                                    </li>
                                    <li class="mb-2 d-flex justify-content-between">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-door-open me-2 text-muted"></i>Room Type:</span> 
                                        <span>{{ $sparooms->name }}</span>
                                    </li>
                                    <li class="mb-2 d-flex justify-content-between">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-mountain-sun me-2 text-muted"></i>View:</span> 
                                        <span>{{ $sparooms->view }}</span>
                                    </li>
                                    <li class="mb-0 d-flex justify-content-between">
                                        <span class="fw-bold text-dark"><i class="fa-solid fa-bed me-2 text-muted"></i>Bed Layout:</span> 
                                        <span>{{ $sparooms->bed }}</span>
                                    </li>
                                </ul>
                                
                                <p class="mb-0">
                                    <a href="{{ route('branches.roomspaservices.details', $sparooms->id) }}" class="btn btn-primary px-4 py-2 rounded-2 shadow-sm text-uppercase fs-6">
                                        View Details <i class="fa-solid fa-long-arrow-right ms-2 spa-btn-icon"></i>
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection