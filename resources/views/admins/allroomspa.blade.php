@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-3">
    
    @if(session('success') || session('deleted'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') ?? session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-3">
                
                <div class="card-body p-4 border-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="card-title fw-bold text-dark m-0 h4">Roomspa Services</h5>
                            <p class="text-muted small m-0">Manage spa treatments, room setups, pricing, and availability details.</p>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2 ms-auto">
                            <label for="branchFilter" class="text-muted small fw-bold text-nowrap m-0"><i class="fas fa-filter me-1"></i> Filter Branch:</label>
                                <select id="branchFilter" class="form-select form-select-sm shadow-sm" style="min-width: 200px;">
                                    <option value="" disabled hidden selected>Select Branch Filter</option>
                                    
                                    <option value="all">All Branches</option>
                                    
                                    @foreach($roomspa->pluck('branch.name')->unique() as $branchName)
                                        @if($branchName)
                                            <option value="{{ $branchName }}">{{ $branchName }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>

                        <a href="{{ route('roomspa.create') }}" class="btn btn-primary fw-bold px-4 py-2 shadow-sm rounded-2">
                            <i class="fas fa-plus-circle me-2"></i> Create New Spa Service
                        </a>
                    </div>
                </div>

                {{-- Table Data Block --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0 text-nowrap">
                            <thead class="table-dark text-uppercase small">
                                <tr>
                                    <th scope="col" class="py-3 w-10">Branch</th>
                                    <th scope="col" class="py-3 w-15">Image</th>
                                    <th scope="col" class="py-3 w-15">Service Name</th>
                                    <th scope="col" class="py-3 w-15">Type of Service</th>
                                    <th scope="col" class="py-3 w-15">Price</th>
                                    <th scope="col" class="py-3 text-center w-5">Pax</th>
                                    <th scope="col" class="py-3 w-25">View Type</th>
                                    <th scope="col" class="py-3 text-center w-5">Beds</th>
                                    <th scope="col" class="py-3 text-center w-5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roomspa as $spa)
                                    <tr class="spa-row" data-branch="{{ $spa->branch->name ?? '' }}">
                                        <td class="text-dark fw-semibold">
                                            {{ $spa->branch->name ?? 'No Branch Assigned' }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('assets/images/' . $spa->image) }}" class="img-thumbnail rounded-2 h-50 w-50 object-fit-cover" alt="{{ $spa->name }}">
                                        </td>
                                        <td class="fw-bold text-dark text-wrap lh-base">{{ $spa->name }}</td>
                                        <td class="text-secondary">{{ $spa->spaservice }}</td>
                                        <td class="fw-bold text-success">
                                            {{ $spa->currency_code ?? 'PHP' }} {{ number_format((float)$spa->price, 2) }}
                                        </td>
                                        <td class="text-center">{{ $spa->maxpeeps }}</td>
                                        <td class="text-muted small text-wrap">{{ $spa->view }}</td>
                                        <td class="text-center">{{ $spa->bed }}</td> 
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('roomspa.edit', $spa->id) }}" class="btn btn-warning btn-sm text-white px-3" title="Update Service">
                                                    <i class="fas fa-edit"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Edit</span>
                                                </a>
                                                <a href="{{ route('roomspa.delete', $spa->id) }}" class="btn btn-danger btn-sm px-3" title="Delete Service" 
                                                onclick="return confirm('Are you sure you want to delete this service?')">
                                                    <i class="fas fa-trash-alt"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-5 text-muted">
                                            <i class="fas fa-spa display-4 d-block mb-3 text-muted"></i>
                                            No spa services found. Create one to get started.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Pagination Footer Block (Safe Scale Architecture) --}}
                @if(method_exists($roomspa, 'links') && $roomspa->hasPages())
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-center">
                            {{ $roomspa->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection