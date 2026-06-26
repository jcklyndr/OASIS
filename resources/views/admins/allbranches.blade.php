@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-3">
    
    {{-- Alert Notifications --}}
    @if(session('success') || session('update') || session('deleted'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') ?? session('update') ?? session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Header Block --}}
                <div class="card-body p-4 border-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="card-title fw-bold text-dark m-0 h4">Current Branches</h5>
                            <p class="text-muted small m-0">View, add, update, or remove physical spa locations.</p>
                        </div>
                        <a href="{{ route('branches.create') }}" class="btn btn-primary fw-bold px-4 py-2 shadow-sm rounded-2">
                            <i class="fas fa-plus-circle me-2"></i> Create New Branch
                        </a>
                    </div>
                </div>

                {{-- Table Data Block --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-dark text-uppercase small">
                                <tr>
                                    <th scope="col" class="py-3 px-4" style="width: 25%;">Branch Name</th>
                                    <th scope="col" class="py-3" style="width: 25%;">Location</th>
                                    <th scope="col" class="py-3" style="width: 35%;">Description</th>
                                    <th scope="col" class="py-3 text-center" style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($branches as $branch)
                                    <tr>
                                        <td class="px-4 fw-bold text-dark">{{ $branch->name }}</td>
                                        <td class="text-secondary">{{ $branch->location }}</td>
                                        <td class="text-muted small">{{ $branch->description }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm text-white px-3" title="Update Branch">
                                                    <i class="fas fa-edit"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Update</span>
                                                </a>
                                                <a href="{{ route('branches.delete', $branch->id) }}" class="btn btn-danger btn-sm px-3" title="Delete Branch" 
                                                   onclick="return confirm('Are you sure you want to delete this branch? The services under this branch will also be deleted.')">
                                                    <i class="fas fa-trash-alt"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="fas fa-store-slash display-4 d-block mb-3 text-muted"></i>
                                            No active spa branches found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination Footer Block (Safe Check) --}}
                @if(method_exists($branches, 'links') && $branches->hasPages())
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-center ajax-pagination">
                            {{ $branches->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection