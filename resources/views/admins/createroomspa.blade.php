@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-0">Create New Roomspa Service</h5>
                    <p class="text-white-50 small m-0">Add a new treatment pack, suite room setup, pricing, and branch allocation details.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('roomspa.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            {{-- Service Name Input --}}
                            <div class="col-md-6 mb-4">
                                <label for="spa_name" class="form-label small fw-bold text-secondary">Name of Spa Service</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-spa"></i></span>
                                    <input type="text" name="name" id="spa_name" 
                                           class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                           placeholder="e.g. Luxury Swedish Massage" value="{{ old('name') }}" required />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Type of Spa Service Offered --}}
                            <div class="col-md-6 mb-4">
                                <label for="spa_service_type" class="form-label small fw-bold text-secondary">Type of Service</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-concierge-bell"></i></span>
                                    <input type="text" name="spaservice" id="spa_service_type" 
                                           class="form-control border-start-0 @error('spaservice') is-invalid @enderror" 
                                           placeholder="e.g. Aromatherapy / Body Scrub" value="{{ old('spaservice') }}" required />
                                    @error('spaservice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Currency Code --}}
                            <div class="col-md-4 mb-4">
                                <label for="currency_code" class="form-label small fw-bold text-secondary">Currency Code</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-money-bill-wave"></i></span>
                                    <input type="text" name="currency_code" id="currency_code" 
                                           class="form-control border-start-0 @error('currency_code') is-invalid @enderror" 
                                           placeholder="PHP" value="{{ old('currency_code', 'PHP') }}" required />
                                    @error('currency_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Price Input --}}
                            <div class="col-md-8 mb-4">
                                <label for="spa_price" class="form-label small fw-bold text-secondary">Price Rate</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-tags"></i></span>
                                    <input type="number" step="0.01" name="price" id="spa_price" 
                                           class="form-control border-start-0 @error('price') is-invalid @enderror" 
                                           placeholder="0.00" value="{{ old('price') }}" required />
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Max Persons --}}
                            <div class="col-md-4 mb-4">
                                <label for="max_peeps" class="form-label small fw-bold text-secondary">Max Persons (Pax)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-users"></i></span>
                                    <input type="number" name="maxpeeps" id="max_peeps" 
                                           class="form-control border-start-0 @error('maxpeeps') is-invalid @enderror" 
                                           placeholder="e.g. 2" value="{{ old('maxpeeps') }}" required />
                                    @error('maxpeeps')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Number of Beds --}}
                            <div class="col-md-4 mb-4">
                                <label for="spa_beds" class="form-label small fw-bold text-secondary">Number of Beds</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-bed"></i></span>
                                    <input type="number" name="bed" id="spa_beds" 
                                           class="form-control border-start-0 @error('bed') is-invalid @enderror" 
                                           placeholder="e.g. 1" value="{{ old('bed') }}" required />
                                    @error('bed')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- View Type --}}
                            <div class="col-md-4 mb-4">
                                <label for="spa_view" class="form-label small fw-bold text-secondary">Room View / Vibe</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-eye"></i></span>
                                    <input type="text" name="view" id="spa_view" 
                                           class="form-control border-start-0 @error('view') is-invalid @enderror" 
                                           placeholder="e.g. Garden View" value="{{ old('view') }}" required />
                                    @error('view')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Branch Selection --}}
                        <div class="mb-4">
                            <label for="branch_allocation" class="form-label small fw-bold text-secondary">Assign to Spa Branch</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-store-alt"></i></span>
                                <select name="branch_id" id="branch_allocation" class="form-select border-start-0 @error('branch_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Choose Branch for this Spa Service...</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Image File Upload --}}
                        <div class="mb-4">
                            <label for="spa_image" class="form-label small fw-bold text-secondary">Service Banner Image</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-image"></i></span>
                                <input type="file" name="image" id="spa_image" class="form-control border-start-0 @error('image') is-invalid @enderror" required />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text text-muted small mt-1">
                                <i class="fas fa-info-circle me-1"></i> Supported standard file format wrappers: JPG, JPEG, or PNG.
                            </div>
                        </div>

                        {{-- Form Action Buttons --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('roomspa.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-plus-circle me-2"></i> Create Service
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection