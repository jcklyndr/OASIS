@extends('layouts.admin')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4 p-md-5">
                    
                    <h3 class="card-title text-center mb-5 fw-bold text-dark text-uppercase tracking-wide">Login Admin</h3>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('see.login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="adminEmail" class="form-label small fw-bold text-secondary text-uppercase">Email Address</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0 text-muted">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="adminEmail" class="form-control border-start-0 ps-0 fs-6" placeholder="admin@oasis.com" required value="{{ old('email') }}" />
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="adminPassword" class="form-label small fw-bold text-secondary text-uppercase">Password</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0 text-muted">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="adminPassword" placeholder="••••••••" class="form-control border-start-0 border-end-0 ps-0 fs-6" required />
                                <button class="btn btn-outline-secondary bg-white border-start-0 text-muted" type="button" id="togglePassword">
                                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold shadow-sm text-uppercase fs-6">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>Sign In
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection