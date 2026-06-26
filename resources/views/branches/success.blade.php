@extends('layouts.app')

@section('content')


{{-- Inalis natin ang 'hero-wrap' at ginamit ang purong Bootstrap utilities para sa fluid alignment --}}
<div class="success-fullscreen-bg d-flex align-items-center justify-content-center py-5">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 10;">
        <div class="row justify-content-center">
            
            {{-- Success Card Container --}}
            <div class="col-lg-6 col-md-8 text-center">
                <div class="card border-0 shadow-lg bg-white rounded-3 p-5">
                    
                    {{-- SVG Check Icon --}}
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#3b5949" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    
                    {{-- Success Headers --}}
                    <h1 class="h3 font-weight-bold text-dark mb-3">
                        Booking Successful!
                    </h1>
                    
                    {{-- Success Message --}}
                    <p class="text-muted mb-4 px-lg-3">
                        You have successfully booked this spa service. Please check your email or phone for the complete details as we process your booking shortly. Thank you!
                    </p>
                    
                    <hr class="mb-4">
                    
                    {{-- Action Button --}}
                    <div class="form-group mb-0">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg w-100 font-weight-bold py-3 shadow-sm rounded-3">
                            Go Back to Home
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection