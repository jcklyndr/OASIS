@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-3">
    
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
                
                 <div class="card-body p-4 border-bottom">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="card-title fw-bold text-dark m-0 h4">System Administrators</h5>
                            <p class="text-muted small m-0">Manage internal accounts who can access this admin framework.</p>
                        </div>
                        <a href="{{ route('admins.create') }}" class="btn btn-primary fw-bold px-4 py-2 shadow-sm rounded-2">
                            <i class="fas fa-user-plus me-2"></i> Create Admin
                        </a>
                    </div>
                </div>

                {{-- Table Data Block --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-dark text-uppercase small">
                                <tr>
                                    <th scope="col" class="py-3 px-4" style="width: 10%;"># ID</th>
                                    <th scope="col" class="py-3" style="width: 40%;">Admin Name</th>
                                    <th scope="col" class="py-3" style="width: 30%;">Email Address</th>
                                    <th scope="col" class="py-3 text-center" style="width: 20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <th scope="row" class="px-4 text-muted">#{{ $admin->id }}</th>
                                        <td class="fw-bold text-dark">{{ $admin->name }}</td>
                                        <td class="text-secondary">{{ $admin->email }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Update Button (Standard warning class) --}}
                                                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm text-white px-3" title="Update Admin">
                                                    <i class="fas fa-edit"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Update</span>
                                                </a>
                                                {{-- Delete Button (Standard danger class) --}}
                                                <a href="{{ route('admins.delete', $admin->id) }}" class="btn btn-danger btn-sm px-3" title="Delete Admin" 
                                                   onclick="return confirm('Are you sure you want to delete this admin?')">
                                                    <i class="fas fa-trash-alt"></i> 
                                                    <span class="d-none d-lg-inline ms-1">Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="fas fa-users-slash display-4 d-block mb-3 text-muted"></i>
                                            No administrator accounts found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination Footer (Safe Check for Future Scale) --}}
                @if(method_exists($admins, 'links') && $admins->hasPages())
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-center">
                            {{ $admins->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection