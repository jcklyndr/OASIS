@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-0">Update Admin Account</h5>
                    <p class="text-white-50 small m-0">Modify backend profile details and update system security parameters for <strong>{{ $admin->name }}</strong>.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admins.update', $admin->id) }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Name Field --}}
                        <div class="mb-4">
                            <label for="name" class="form-label small fw-bold text-secondary">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" id="name" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       placeholder="Enter full name" value="{{ old('name', $admin->name) }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-4">
                            <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" 
                                       class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       placeholder="Enter email address" value="{{ old('email', $admin->email) }}" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Password Field with Eye Toggle --}}
                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold text-secondary">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" 
                                       class="form-control border-start-0 border-end-0 @error('password') is-invalid @enderror" 
                                       placeholder="Enter new strong password" required minlength="8" 
                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" />
                                <button class="btn btn-outline-secondary border-start-0 bg-light text-muted px-3" type="button" id="togglePassword">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="passwordHelpBlock" class="form-text text-muted small mt-2">
                                <i class="fas fa-info-circle me-1"></i> Your password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.
                            </div>
                        </div>

                        {{-- Form Action Buttons --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('admins.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-sync-alt me-2"></i> Update Admin
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
