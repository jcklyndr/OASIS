@extends('layouts.app')

@section('content')

<section class="custom-about-hero position-relative text-white d-flex align-items-center">
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    
    <div class="container position-relative custom-hero-z">
        <div class="row align-items-center justify-content-center min-vh-35">
            <div class="col-md-9 text-center">
                <p class="breadcrumbs mb-2 text-uppercase tracking-wider small fw-semibold text-white-50">
                    Want to know about the OASIS?
                </p>
                <h1 class="mb-0 display-4 fw-bold text-white text-shadow">About Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light py-5">
    <div class="container py-3">
        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4 d-flex ftco-animate">
                <div class="card w-100 border-0 shadow-sm rounded-3 overflow-hidden d-flex flex-column">
                    <div class="bg-image" style="background-image: url('{{ asset('assets/images/services-2.jpg') }}'); height: 240px; background-size: cover; background-position: center;"></div>
                    <div class="card-body p-4 d-flex flex-column flex-grow-1 text-center">
                        <h3 class="card-title h4 fw-bold mb-3">Branches</h3>
                        <p class="card-text text-muted small flex-grow-1">Discover an exquisite bouquet of spa services, where each branch extends a unique blend of pampering, healing, and indulgence, creating a tapestry of wellness for your mind, body, and soul.</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary-custom w-100 py-2 text-decoration-underline">Read more</a>
                        </div>
                    </div>
                </div>      
            </div>

            <div class="col-md-4 d-flex ftco-animate">
                <div class="card w-100 border-0 shadow-sm rounded-3 overflow-hidden d-flex flex-column">
                    <div class="bg-image" style="background-image: url('{{ asset('assets/images/aboutspaservice.jpg') }}'); height: 240px; background-size: cover; background-position: center;"></div>
                    <div class="card-body p-4 d-flex flex-column flex-grow-1 text-center">
                        <h3 class="card-title h4 fw-bold mb-3">Services</h3>
                        <p class="card-text text-muted small flex-grow-1">Immerse yourself in an oasis of well-being with our spa services, where every touch is crafted to harmonize your senses, ensuring a sanctuary of tranquility tailored just for you.</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary-custom w-100 py-2 text-decoration-underline">Read more</a>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="col-md-4 d-flex ftco-animate">
                <div class="card w-100 border-0 shadow-sm rounded-3 overflow-hidden d-flex flex-column">
                    <div class="bg-image" style="background-image: url('{{ asset('assets/images/aboutgreatexp.jpg') }}'); height: 240px; background-size: cover; background-position: center;"></div>
                    <div class="card-body p-4 d-flex flex-column flex-grow-1 text-center">
                        <h3 class="card-title h4 fw-bold mb-3">Great Experience</h3>
                        <p class="card-text text-muted small flex-grow-1">Indulge in a realm of tranquility with our spa services, where skilled therapists pamper you with tailored treatments. Book now and elevate your well-being to new heights and Experience the levelup relaxation!</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary-custom w-100 py-2 text-decoration-underline">Read more</a>
                        </div>
                    </div>
                </div>      
            </div>

        </div>
    </div>
</section>

<section class="ftco-section bg-white py-5 border-top">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            
            <div class="col-md-6 order-md-2 wrap-about">
                <div class="rounded shadow-sm" style="background-image: url('{{ asset('assets/images/aboutpic.jpg') }}'); height: 400px; background-size: cover; background-position: center;"></div>
            </div>

            <div class="col-md-6 order-md-1 wrap-about ftco-animate">
                <div class="heading-section mb-4">
                    <h2 class="mb-3 fw-bold text-dark">Who Are We?</h2>
                    <p class="text-secondary lh-base">
                        The <span class="fw-bold text-success">OASIS</span> is a spa service near airports which provides a relaxing and beneficial experience for travelers waiting for their flights. This kind of service provides comfort, and reduces travel stress especially in times of unexpected challenges and problems in flights.
                    </p>
                </div>

                <div class="row g-4">
                    
                    <div class="col-sm-6 d-flex align-items-start">
                        <div class="text-success me-3 pt-1">
                            <i class="fa-solid fa-bullseye fa-xl"></i>
                        </div>
                        <div>
                            <h4 class="h6 fw-bold text-dark mb-1">Mission</h4>
                            <p class="small text-muted mb-0">We seek to provide a sanctuary of serenity and optimism, with easy booking services and a diverse range of spa treatments.</p>
                        </div>
                    </div> 

                    <div class="col-sm-6 d-flex align-items-start">
                        <div class="text-success me-3 pt-1">
                            <i class="fa-solid fa-eye fa-xl"></i>
                        </div>
                        <div>
                            <h4 class="h6 fw-bold text-dark mb-1">Vision</h4>
                            <p class="small text-muted mb-0">At OnTheGoRelaxation, we're committed to providing outstanding service with a personal touch and creating a peaceful atmosphere.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 d-flex align-items-start">
                        <div class="text-success me-3 pt-1">
                            <i class="fa-solid fa-users-gear fa-xl"></i>
                        </div>
                        <div>
                            <h4 class="h6 fw-bold text-dark mb-1">Team</h4>
                            <p class="small text-muted mb-0">Meet our expert therapists and specialists, each dedicated to providing bespoke treatments tailored to your specific need.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 d-flex align-items-start">
                        <div class="text-success me-3 pt-1">
                            <i class="fa-solid fa-comments fa-xl"></i>
                        </div>
                        <div>
                            <h4 class="h6 fw-bold text-dark mb-1">Testimonials</h4>
                            <p class="small text-muted mb-0">Don't just take our word for it; hear from our clients about their experiences at OnTheGoRelaxation.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection