@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3">
                
                {{-- Card Header --}}
                <div class="card-body p-4 border-bottom bg-primary rounded-top">
                    <h5 class="card-title fw-bold text-white m-0 h4">Update Booking Status</h5>
                    <p class="text-white-50 small m-0">Modify the operational workflow state for this client reservation platform.</p>
                </div>

                {{-- Form Content --}}
                <div class="card-body p-4">
                    
                    {{-- Current Status Display Box --}}
                    <div class="mb-4 p-3 bg-light rounded-2 d-flex justify-content-between align-items-center">
                        <span class="text-secondary small fw-bold">Current Status:</span>
                        <span class="badge px-3 py-2 fs-6 rounded-pill 
                            @if($booking->status == 'Booked Successfully') bg-success 
                            @elseif($booking->status == 'Processing') bg-warning text-dark 
                            @else bg-secondary @endif">
                            <i class="fas fa-info-circle me-1"></i> {{ $booking->status }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('bookings.updatedstatus', $booking->id) }}" enctype="multipart/form-data"> 
                        @csrf
                        
                        {{-- Dropdown Select Input --}}
                        <div class="mb-4">
                            <label for="status_select" class="form-label small fw-bold text-secondary">Select New Status</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fas fa-tasks"></i></span>
                                <select name="status" id="status_select" class="form-select border-start-0 @error('status') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Choose Status Option --</option>
                                    <option value="Processing" {{ old('status', $booking->status) == 'Processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="Booked Successfully" {{ old('status', $booking->status) == 'Booked Successfully' ? 'selected' : '' }}>Booked Successfully</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Form Action Control Buttons --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a href="{{ route('bookings.all') }}" class="btn btn-light border px-4 fw-bold text-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                <i class="fas fa-sync-alt me-2"></i> Update Status
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection