@extends('layouts.app')

@section('content')

<section class="ftco-section bg-light py-5 d-flex align-items-center min-vh-100">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="row g-0">
                        
                        <div class="col-md-6 d-none d-md-block custom-login-bg">
                            <div class="h-100 w-100 d-flex flex-column justify-content-end p-5 text-white">
                                <h2 class="fw-bold text-white text-shadow mb-2">OASIS System</h2>
                                <p class="small text-white-50 text-shadow mb-0">Experience tranquility on the move. Your gateway to exclusive relaxation parameters.</p>
                            </div>
                        </div>

                        <div class="col-md-6 bg-white d-flex align-items-center">
                            <div class="card-body p-4 p-md-5 w-100">
                                
                                <div class="mb-4">
                                    <h3 class="fw-bold text-dark mb-1">Welcome Back</h3>
                                    <p class="text-muted small">Please input your login credentials below to continue.</p>
                                </div>

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label small fw-semibold text-secondary" for="email">Email Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                                    <input id="email" type="email" placeholder="example@email.com" class="form-control py-2 border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label small fw-semibold text-secondary" for="password">Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                                                    <input id="password" type="password" placeholder="••••••••" class="form-control py-2 border-start-0 border-end-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    <button class="btn btn-outline-light bg-light border-start-0 border-top border-bottom border-end text-muted px-3" type="button" id="togglePassword">
                                                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                                    </button>
                                                    @error('password')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 pt-2">
                                            <button type="submit" class="btn btn-primary w-100 py-2.5 fw-semibold tracking-wider">
                                                Login Account
                                            </button>
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
</section>

@endsection