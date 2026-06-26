@extends('layouts.admin')

@section('content')

{{-- Fluid layout para sagad sa buong screen ng admin side niyo --}}
<div class="container-fluid px-4 py-3">
    
    {{-- Bootstrap 5 Alert Handler --}}
    @if(session('update') || session('deletebook'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('update') ?? session('deletebook') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Header inside card --}}
                <div class="card-body p-4 border-bottom">
                    <h5 class="card-title fw-bold text-dark m-0 h4">Master Bookings List</h5>
                    <p class="text-muted small m-0">Monitor, track payments, update statuses, or delete system-wide reservations.</p>
                </div>

                {{-- Table Section --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        {{-- Ginamit ang table-layout fixed logic at fluid widths sa standard BS5 structure --}}
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-dark text-uppercase small">
                                <tr>
                                    <th scope="col" class="py-3 px-4" style="width: 20%;">Service Details</th>
                                    <th scope="col" class="py-3" style="width: 20%;">Customer Information</th>
                                    <th scope="col" class="py-3" style="width: 12%;">Check-In</th>
                                    <th scope="col" class="py-3" style="width: 12%;">Check-Out</th>
                                    <th scope="col" class="py-3" style="width: 13%;">Payment</th>
                                    <th scope="col" class="py-3" style="width: 13%;">Booked At</th>
                                    <th scope="col" class="py-3 text-center" style="width: 5%;">Status</th>
                                    <th scope="col" class="py-3 text-center" style="width: 5%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $book)
                                    <tr>
                                        {{-- Service Details --}}
                                        <td class="px-4">
                                            <span class="d-block fw-bold text-dark text-wrap">{{ $book->roomspaname }}</span>
                                            <span class="text-muted small text-wrap">{{ $book->branchname }}</span>
                                        </td>
                                        
                                        {{-- Customer Info --}}
                                        <td>
                                            <span class="d-block fw-bold text-dark text-wrap">{{ $book->name }}</span>
                                            <span class="text-muted small d-block">{{ $book->phone_number }}</span>
                                        </td>
                                        
                                        {{-- Schedule Dates --}}
                                        <td class="text-nowrap">{{ $book->checkin }}</td>
                                        <td class="text-nowrap">{{ $book->checkout }}</td>
                                        
                                        {{-- Payment --}}
                                        <td class="fw-bold text-success text-nowrap">
                                            PHP {{ number_format((float)$book->price, 2) }}
                                        </td>
                                        
                                        {{-- Created At --}}
                                        <td class="text-muted small text-nowrap">
                                            {{ $book->created_at ? $book->created_at->format('Y-m-d H:i') : 'N/A' }}
                                        </td>
                                        
                                        {{-- Pure Bootstrap 5 Badges (`bg-*` modifiers) --}}
                                        <td class="text-center">
                                            @if(strtolower($book->status) == 'completed' || strtolower($book->status) == 'approved')
                                                <span class="badge bg-success px-3 py-2 rounded-pill text-uppercase">Approved</span>
                                            @elseif(strtolower($book->status) == 'pending')
                                                <span class="badge bg-warning px-3 py-2 rounded-pill text-uppercase text-dark">Pending</span>
                                            @else
                                                <span class="badge bg-secondary px-3 py-2 rounded-pill text-uppercase">{{ $book->status }}</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Actions Panel --}}
                                        <td class="text-center px-4">
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Status Trigger --}}
                                                <a href="{{ route('bookings.updatestatus', $book->id) }}" class="btn btn-warning btn-sm text-white px-3" title="Change Status">
                                                    <i class="fas fa-sync-alt"></i> <span class="d-none d-xl-inline ms-1">Status</span>
                                                </a>
                                                {{-- Delete Trigger --}}
                                                <a href="{{ route('bookings.delete', $book->id) }}" class="btn btn-danger btn-sm px-3" title="Delete Booking" onclick="return confirm('Are you sure you want to delete this booking?')">
                                                    <i class="fas fa-trash-alt"></i> <span class="d-none d-xl-inline ms-1">Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5 text-muted">
                                            <i class="fas fa-calendar-times display-4 d-block mb-3 text-muted"></i>
                                            No system reservations recorded yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection