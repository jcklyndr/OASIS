<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}"> <!--animation mga fadein-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" style="background-color: #42604e "> <!--rgb(0, 0, 83)-->

        <nav class="p-0 navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar" id="new">
            <div class="container">
                <h4 class="customtext"><span>O</span><span>n</span><span>-</span><span>T</span><span>h</span><span>e<span>-</span></span><span>G</span><span>o </span>
                <span>S</span><span>p</span><span>a</span>
                <span>R</span><span>e</span><span>l</span><span>a</span><span>x</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span></h4>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
              </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{route ('home')}}" class="nav-link"><b class="font-size">Home</b></a></li>
                    <li class="nav-item"><a href="{{route ('about')}}" class="nav-link"><b class="font-size">About</b></a></li>
                    <li class="nav-item"><a href=" {{route ('services')}}" class="nav-link"><b class="font-size">Services</b></a></li>
                  <li class="nav-item"><a href="{{route ('contact.form')}}" class="nav-link"><b class="font-size">Contact</b></a></li>

                  @guest
                  @if (Route::has('login'))
                  <li class="nav-item"><a href="{{ route ('login')}}" class="nav-link"><b class="font-size">Login</b></a></li>
                  @endif
                  @if (Route::has('register'))
                  <li class="nav-item"><a href="{{route ('register')}}" class="nav-link"><b class="font-size">Register</b></a></li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-size" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('users.bookings') }}">
                        My Reservations
                     </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
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
        <main class="py-0">
            @yield('content')
        </main>
        
    </div>


    <!--Footer-->
    <footer class="footer pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">On-the-GO Relaxation</a></h2>
                    <p>On-the-Go Relaxation offers a rejuvenating escape from the hustle and bustle,
                       providing convenient and blissful relaxation experiences tailored to fit seamlessly into your busy lifestyle.</p>
                    <a href="#">Read more <span class="fa fa-chevron-right" style="font-size: 11px;"></span></a>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Branches</h2>
                  <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Serene So</a>
            <a href="#" class="tag-cloud-link">Spa Sanctuary</a>
            <a href="#" class="tag-cloud-link">Havens Spa</a>
            <a href="#" class="tag-cloud-link">Pure Relaxation</a>
          </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Upcoming project</h2>
                    <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Pool</a>
            <a href="#" class="tag-cloud-link">Stay room</a>
            <a href="#" class="tag-cloud-link">Foods</a>
            <a href="#" class="tag-cloud-link">New Beverages</a>
            <a href="#" class="tag-cloud-link">New Spa</a>
          </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Subcribe</h2>
                    <form action="#" class="subscribe-form">

        </form>
        <h2 class="footer-heading mt-5">Follow us</h2>
        <ul class="ftco-footer-social p-0">
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Google"><span class="fa fa-google"></span></a></li>
        </ul>
                </div>
            </div>
        </div>
    </footer>

  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset ('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset ('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset ('assets/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset ('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset ('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset ('assets/js/scrollax.min.js') }}"></script>
  <script src="{{ asset ('assets/js/main.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
