<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}"> 
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('assets/css/customstyle.css') }}">
    </head>
        <body>
            <div id="app" class="bg-primary">
                    <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3 shadow-sm bg-dark">
                        <div class="container">
                            <a class="navbar-brand fw-bold fs-5 text-uppercase m-0" href="{{ route('home') }}" style="letter-spacing: 2px;">
                                On-The-Go Spa Relaxation
                            </a>
                            
                            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-bars"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="ftco-nav">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link fw-medium px-3">Home</a></li>
                                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link fw-medium px-3">About</a></li>
                                    <li class="nav-item"><a href="{{ route('services') }}" class="nav-link fw-medium px-3">Services</a></li>
                                    {{-- Inayos ang typo dito mula 'px-3me-2' patungong 'px-3 me-2' --}}
                                    <li class="nav-item"><a href="{{ route('contact.form') }}" class="nav-link fw-medium px-3 me-2">Contact</a></li>

                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link fw-medium px-3">Login</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-light btn-sm px-4 rounded-2 ms-lg-2 my-2 my-lg-0 shadow-sm">Register</a></li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown ms-lg-2">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold px-3 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            {{-- Tinanggal ang mt-2 para dumikit ang menu sa toggle link at hindi biglang magsara kapag ginalaw ang mouse --}}
                                            <div class="dropdown-menu dropdown-menu-end shadow border-0 m-0" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item py-2" href="{{ route('users.bookings') }}">
                                                    <i class="fa fa-calendar-check-o me-2 text-muted"></i> My Reservations
                                                </a>
                                                <hr class="dropdown-divider my-1">
                                                <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out me-2"></i> {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                <main class="">
                    @yield('content')
                </main>   
            </div>

            <footer class="footer pb-3 bg-dark text-white-50">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                            <h2 class="footer-heading text-white fw-bold fs-5 mb-3">On-the-GO Relaxation</h2>
                            <p class="small">On-the-Go Relaxation offers a rejuvenating escape from the hustle and bustle,
                            providing convenient and blissful relaxation experiences tailored to fit seamlessly into your busy lifestyle.</p>
                            <a href="{{ route('about') }}" class="text-decoration-none text-primary small">
                                Read more <i class="fa-solid fa-chevron-right ms-1" style="font-size: 11px;"></i>
                            </a>
                        </div>

                     <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                        <h2 class="footer-heading text-white fw-bold fs-5 mb-3">Branches</h2>
                        <ul class="list-unstyled d-flex flex-column gap-2 m-0 p-0">
                            @isset($branches)
                                @foreach($branches as $b)
                                    <li>
                                        <a href="{{ route('branches.roomspaservices', $b->id) }}" class="text-decoration-none text-white-50 footer-link-item">
                                            {{ $b->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                        <h2 class="footer-heading text-white fw-bold fs-5 mb-3">Upcoming project</h2>
                        <ul class="list-unstyled d-flex flex-column gap-2 m-0 p-0">
                            <li><a href="#" class="text-decoration-none text-white-50 footer-link-item">Pool</a></li>
                            <li><a href="#" class="text-decoration-none text-white-50 footer-link-item">Stay room</a></li>
                            <li><a href="#" class="text-decoration-none text-white-50 footer-link-item">Foods</a></li>
                            <li><a href="#" class="text-decoration-none text-white-50 footer-link-item">New Beverages</a></li>
                            <li><a href="#" class="text-decoration-none text-white-50 footer-link-item">New Spa</a></li>
                        </ul>
                    </div>

                        <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                            <h2 class="footer-heading text-white fw-bold fs-5 mb-3">Subscribe</h2>
                            <form action="#" class="subscribe-form mb-4">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control form-control-sm border-0" placeholder="Your email" aria-label="Your email">
                                    <button class="btn btn-primary btn-sm" type="button"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>

                            <h2 class="footer-heading text-white fw-bold fs-5 mb-2 mt-4">Follow us</h2>
                            <ul class="list-unstyled d-flex gap-2 p-0 m-0 footer-social-icons">
                                <li><a href="#" class="social-link" title="X / Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#" class="social-link" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#" class="social-link" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#" class="social-link" title="Google"><i class="fa-brands fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset ('assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset ('assets/js/jquery.timepicker.min.js') }}"></script>
        <script src="{{ asset ('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/chatbot.js') }}"></script>

        </body>
</html>
