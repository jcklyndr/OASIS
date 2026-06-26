@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-0">Create New Branch</h5>
                    <p class="text-white-50 small m-0">Establish and deploy a new physical spa branch location into the framework.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('branches.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Branch Name Input --}}
                        <div class="mb-4">
                            <label for="branch_name" class="form-label small fw-bold text-secondary">Branch Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-store"></i></span>
                                <input type="text" name="name" id="branch_name" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       placeholder="Enter branch name" value="{{ old('name') }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Branch Image Upload --}}
                        <div class="mb-4">
                            <label for="branch_image" class="form-label small fw-bold text-secondary">Branch Wallpaper / Image</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-image"></i></span>
                                <input type="file" name="image" id="branch_image" 
                                       class="form-control border-start-0 @error('image') is-invalid @enderror" required />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text text-muted small mt-1">
                                <i class="fas fa-info-circle me-1"></i> Supported file formats: JPG, JPEG, or PNG.
                            </div>
                        </div>

                        {{-- Location Input --}}
                        <div class="mb-4">
                            <label for="branch_location" class="form-label small fw-bold text-secondary">Physical Location / Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="location" id="branch_location" 
                                       class="form-control border-start-0 @error('location') is-invalid @enderror" 
                                       placeholder="e.g. Pandi, Bulacan" value="{{ old('location') }}" required />
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Description Textarea --}}
                        <div class="mb-4">
                            <label for="branch_description" class="form-label small fw-bold text-secondary">Branch Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      name="description" id="branch_description" rows="4" 
                                      placeholder="Provide a brief introductory description of the branch environment and available rooms..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Form Action Buttons --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('branches.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-plus-circle me-2"></i> Create Branch
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection