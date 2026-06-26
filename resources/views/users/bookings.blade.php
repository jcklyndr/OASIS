@extends('layouts.app')

@section('content')

{{-- Main Container na may sapat na padding sa itaas at ibaba --}}
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        
        {{-- Page Header --}}
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="font-weight-bold text-dark h2">My Bookings</h1>
                <p class="text-muted small">View and track your spa service reservations below.</p>
            </div>
        </div>

{{-- table-responsive wrapper: Awtomatikong mag-a-activate lang ang scroll kapag mas maliit ang screen kaysa sa table contents --}}
        <div class="table-responsive-xl">
            <table class="table table-striped table-hover align-middle mb-0 w-100" style="min-width: 1000px;">
                <thead class="thead-dark bg-dark text-white">
                    <tr>
                        <th scope="col" class="py-3 px-4" style="width: 20%;">Service Name</th>
                        <th scope="col" class="py-3" style="width: 20%;">Branch</th>
                        <th scope="col" class="py-3" style="width: 15%;">Guest Name</th>
                        <th scope="col" class="py-3" style="width: 15%;">Contact</th>
                        <th scope="col" class="py-3" style="width: 10%;">Check-In</th>
                        <th scope="col" class="py-3" style="width: 10%;">Check-Out</th>
                        <th scope="col" class="py-3 text-center" style="width: 5%;">Duration</th>
                        <th scope="col" class="py-3" style="width: 10%;">Total Price</th>
                        <th scope="col" class="py-3 px-4 text-center" style="width: 5%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="px-4 font-weight-bold text-dark">{{ $booking->roomspaname }}</td>
                            <td class="text-wrap" style="max-width: 180px;">{{ $booking->branchname }}</td>
                            <td>{{ $booking->name }}</td>
                            <td class="text-wrap" style="max-width: 180px;">
                                <span class="d-block font-weight-bold">{{ $booking->phone_number }}</span>
                                <span class="text-muted small word-break" style="word-break: break-all;">{{ $booking->email }}</span>
                            </td>
                            <td>
                                <span class="d-block text-nowrap">{{ $booking->checkin }}</span>
                                <span class="badge badge-light text-dark font-weight-normal">{{ $booking->checkin_time }}</span>
                            </td>
                            <td>
                                <span class="d-block text-nowrap">{{ $booking->checkout }}</span>
                                <span class="badge badge-light text-dark font-weight-normal">{{ $booking->checkout_time }}</span>
                            </td>
                            <td class="text-center">{{ $booking->days }} {{ Str::plural('Day', $booking->days) }}</td>
                            <td class="font-weight-bold text-success text-nowrap">PHP {{ number_format((float)$booking->price, 2) }}</td>
                            <td class="px-4 text-center">
                                @if(strtolower($booking->status) == 'completed' || strtolower($booking->status) == 'approved')
                                    <span class="badge badge-success px-3 py-2 rounded-pill text-uppercase">Success</span>
                                @elseif(strtolower($booking->status) == 'pending')
                                    <span class="badge badge-warning px-3 py-2 rounded-pill text-uppercase text-dark">Pending</span>
                                @else
                                    <span class="badge badge-secondary px-3 py-2 rounded-pill text-uppercase">{{ $booking->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                                <i class="fas fa-calendar-times mb-3 display-4 d-block text-muted"></i>
                                You don't have any bookings yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>

@endsection