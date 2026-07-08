@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-">Update Services</h5>
                    <p class="text-white-50 small m-0">Modify service name, type, price and view type for <strong>{{ $service->name }}</strong>.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('roomspa.update', $service->id) }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Service Name Input --}}
                        <div class="mb-4">
                            <label for="service_name" class="form-label small fw-bold text-secondary">Service Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-star-of-life"></i></span>
                                <input type="text" name="name" id="service_name" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       placeholder="Enter service name" value="{{ old('name', $service->name) }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Service Image Input --}}
                        <div class="mb-4">
                            <label for="service_image" class="form-label small fw-bold text-secondary">Service Image</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-image"></i></span>
                                <input type="file" name="image" id="service_image" 
                                       class="form-control border-start-0 @error('image') is-invalid @enderror" 
                                       placeholder="Upload service image" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Service Type Input --}}
                        <div class="mb-4">
                            <label for="service_type" class="form-label small fw-bold text-secondary">Type of Service</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-tags"></i></span>
                                <input type="text" name="type" id="service_type" 
                                       class="form-control border-start-0 @error('type') is-invalid @enderror" 
                                       placeholder="Enter service type" value="{{ old('type', $service->spaservice) }}" required />
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Price Input --}}
                        <div class="mb-4">
                            <label for="service_price" class="form-label small fw-bold text-secondary">Price</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-peso-sign"></i></span>
                                <input type="number" name="price" id="service_price" 
                                       class="form-control border-start-0 @error('price') is-invalid @enderror" 
                                       placeholder="Enter service price" value="{{ old('price', $service->price) }}" required />
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                        </div>

                        {{-- Max Pax Input --}}
                        <div class="mb-4">
                            <label for="maxpeeps" class="form-label small fw-bold text-secondary">Max Pax</label>
                            <input type="number" name="maxpeeps" id="maxpeeps" 
                                   class="form-control @error('maxpeeps') is-invalid @enderror" 
                                   placeholder="Enter max pax" value="{{ old('maxpeeps', $service->maxpeeps) }}" required />
                            @error('maxpeeps')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--bed Input --}}
                        <div class="mb-4">
                            <label for="bed" class="form-label small fw-bold text-secondary">Beds</label>
                            <input type="number" name="bed" id="bed" 
                                   class="form-control @error('bed') is-invalid @enderror" 
                                   placeholder="Enter number of beds" value="{{ old('bed', $service->bed) }}" required />
                            @error('bed')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                         </div>

                        {{-- View Type Input --}}
                        <div class="mb-4">
                            <label for="view" class="form-label small fw-bold text-secondary">View Type</label>
                            <input type="text" name="view" id="view" 
                                   class="form-control @error('view') is-invalid @enderror" 
                                   placeholder="Enter view type" value="{{ old('view', $service->view) }}" required />
                            @error('view')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Type of Service --}}
                        <div class="mb-4">
                            <label for="spaservice" class="form-label small fw-bold text-secondary">Service Branch</label>
                            
                            <select name="spaservice" id="spaservice" class="form-select @error('spaservice') is-invalid @enderror" required>
                                <option value="" disabled hidden {{ is_null(old('spaservice', $service->spaservice)) || old('spaservice', $service->spaservice) == '' ? 'selected' : '' }}>
                                    Select where this service will be offered
                                </option>
                                
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->name }}" {{ old('spaservice', $service->spaservice) == $branch->name ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('spaservice')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        {{-- Form Action Control Links --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('roomspa.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-sync-alt me-2"></i> Update Services
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection