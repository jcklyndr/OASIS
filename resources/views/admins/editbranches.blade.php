@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-">Update Branch</h5>
                    <p class="text-white-50 small m-0">Modify regional positioning, internal description logs, and settings for <strong>{{ $branch->name }}</strong>.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('branches.update', $branch->id) }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Branch Name Input (Fixed value alignment bug from description to name) --}}
                        <div class="mb-4">
                            <label for="branch_name" class="form-label small fw-bold text-secondary">Branch Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-store"></i></span>
                                <input type="text" name="name" id="branch_name" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       placeholder="Enter branch name" value="{{ old('name', $branch->name) }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Location Input --}}
                        <div class="mb-4">
                            <label for="branch_location" class="form-label small fw-bold text-secondary">Physical Location / Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="location" id="branch_location" 
                                       class="form-control border-start-0 @error('location') is-invalid @enderror" 
                                       placeholder="e.g. Pandi, Bulacan" value="{{ old('location', $branch->location) }}" required />
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
                                      placeholder="Provide details about the branch ambiance..." required>{{ old('description', $branch->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Form Action Control Links --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('branches.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-sync-alt me-2"></i> Update Branch
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection