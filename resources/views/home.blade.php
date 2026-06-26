@extends('layouts.app')

@section('content')

<div class="position-relative overflow-hidden bg-dark text-white text-center w-100 d-flex align-items-center hero-custom pb-5">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>
    
    <div class="container position-relative pt-5 pb-5">
        <div class="row justify-content-center w-100 m-0">
            <div class="col-md-10 text-md-start">
                <h2 class="text-light fw-bolder mb-3 text-uppercase tracking-wider fs-5">Welcome to OASIS</h2>
                <h1 class="display-3 fw-bold mb-4">Embark on a journey of relaxation with our On-The-Go spa retreats near airports.</h1>
                <p class="mb-0">
                    <a href="{{ route('about') }}" class="btn btn-primary btn-lg me-2 px-4 shadow-sm ">Learn more</a> 
                    <a href="{{ route('contact.form') }}" class="btn btn-outline-light btn-lg px-4 shadow-sm ">Contact us</a>
                </p>
            </div>
        </div>
    </div>
</div>

<section class="py-5 position-relative overlap-section">
    <div class="container">
        <div class="row g-4 mb-4">
            @foreach ($branches as $branch)
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card w-100 border-0 shadow-lg hover-shadow transition d-flex flex-column text-center">
                        <div class="ratio ratio-4x3 card-img-top" style="background-image: url('{{ asset('assets/images/' . $branch->image) }}'); background-size: cover; background-position: center;"></div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-2">{{ $branch->name }}</h4>
                            <p class="card-text text-muted small mb-3 flex-grow-1">{{ $branch->description }}</p>
                            <p class="card-text text-secondary fw-semibold mb-3 small"><i class="fa fa-map-marker-alt text-primary me-1"></i> Location: {{ $branch->location }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('branches.roomspaservices', $branch->id) }}" class="btn btn-primary w-100 text-capitalize">rooms & spa services</a>
                            </div>
                        </div>
                    </div>      
                </div>
            @endforeach
        </div>

        @if ($branches->total() > 4)
            <div class="d-flex justify-content-center mt-5">
                {{ $branches->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>

<section class="py-5 bg-light" id="spa-services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6">Rooms and Spa Services</h2>
            <div class="mx-auto bg-primary mt-2 custom-line rounded-2"></div>
        </div>
        
        <div class="row g-4" id="spa-cards-container">
            @include('branches.partials.spa_list')
        </div>
    </div>
</section>

<section class="py-5 bg-primary">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <div class="card border-0 overflow-hidden shadow mb-4">
                    <img src="{{ asset('assets/images/homepagebg2.jpg') }}" alt="Services" class="img-fluid w-100 object-fit-cover" style="max-height: 400px;">
                </div>
                <h2 class="fw-bold mb-3 text-white">The most recommended Services!</h2>
                <p class="text-white-50 lead-sm">Indulge in a range of carefully curated treatments designed to pamper your senses, soothe your mind, and revitalize your body. Our spa services, highly acclaimed and trusted by many, offer a blissful escape from the stresses of everyday life.</p>
            </div>
            
            <div class="col-md-6">
                <div class="ps-md-4">
                    <h2 class="fw-bold mb-4 text-white">What we offer</h2>
                    <p class="text-white-50 mb-4">Immerse yourself in a world of unparalleled relaxation and rejuvenation with our exceptional spa services.</p>
                    
                    <div class="row g-4">
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-spa fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Spa Massage</h5>
                                <p class="text-white-50 small mb-0">A spa massage that transcends relaxation, revitalizing your body.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-hot-tub fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Full body</h5>
                                <p class="text-white-50 small mb-0">Experience a holistic escape designed to unwind tension.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-heart fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Romantic</h5>
                                <p class="text-white-50 small mb-0">Indulge in connection with our Romantic Enchantment.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-leaf fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Spa treatment</h5>
                                <p class="text-white-50 small mb-0">A harmonious blend of therapeutic techniques.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-fire fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Hot stone</h5>
                                <p class="text-white-50 small mb-0">Heated stones are strategically placed to melt away tension.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start">
                            <div class="bg-primary text-white rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-concierge-bell fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-white">Amenities</h5>
                                <p class="text-white-50 small mb-0">Wifi, Pet Friendly, Free Coffee, AC, Security, Parking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-dark text-white text-center position-relative">
    <div class="container position-relative py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="fw-bold display-6 mb-3">Ready to get started?</h2>
                <p class="text-light opacity-75 mb-4 lead">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-2 shadow">Register</a> 
                    <a href="{{ route('contact.form') }}" class="btn btn-outline-light btn-lg px-4 shadow">Contact us</a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="position-fixed bottom-0 end-0 m-4 z-3 show-chatbot">
    <!-- Chatbot Toggle Button -->
    <button class="btn btn-primary rounded-circle shadow-lg d-flex align-items-center justify-content-center chatbot-btn">
        <!-- Font Awesome Chat Icon -->
        <i class="fa-solid fa-comment-dots fs-3"></i>
    </button>
    
    <!-- Chatbot Window -->
    <div class="card shadow-lg border-0 position-absolute bottom-100 end-0 mb-3 chatbot-popup hidden">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0 fw-bold d-flex align-items-center">
                Chatbot <i class="fa-solid fa-headset ms-2"></i>
            </h5>
        </div>
        
        <!-- Chat Body -->
        <div class="card-body overflow-auto p-3 bg-light chatbot-body">
            <div class="d-flex align-items-start mb-3">
                <!-- Avatar Icon -->
                <div class="bg-secondary text-white rounded-circle p-2 me-2 d-flex align-items-center justify-content-center chatbot-avatar">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div class="bg-white p-3 rounded shadow-sm small">
                    Hi there 👋<br>How may I help you today?
                </div>
            </div>
            <ul class="list-unstyled chatbox p-0 m-0"></ul>
        </div>
        
        <!-- FAQ Section -->
        <div class="p-3 bg-white border-top faq-list">
            <h6 class="fw-bold text-muted small mb-2 text-uppercase">Frequently Asked Questions</h6>
            <div class="list-group list-group-flush small">
                <button type="button" class="list-group-item list-group-item-action text-primary py-2 border-0 px-0" data-question="q1">How can I book a spa service?</button>
                <button type="button" class="list-group-item list-group-item-action text-primary py-2 border-0 px-0" data-question="q2">What spa services do you offer?</button>
                <button type="button" class="list-group-item list-group-item-action text-primary py-2 border-0 px-0" data-question="q3">Is it possible to cancel or reschedule?</button>
            </div>
        </div>
    </div>
</section>
    
@endsection