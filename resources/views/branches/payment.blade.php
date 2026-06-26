@extends('layouts.app')

@section('content')

{{-- Payment Hero Wrapper --}}
<div class="hero-wrap js-fullheight payment-custom-bg">
    <div class="overlay"></div>
    <div class="container js-fullheight d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            
            {{-- Gitnang Column para sa Invoice/Receipt Card Layout --}}
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded p-4 p-md-5 text-dark bg-white">
                    
                    <h2 class="h4 font-weight-bold mb-3 text-center text-dark">
                        Your Booking Details
                    </h2>
                    <hr class="mb-4">
                    
                    {{-- Grid List para sa Detalye ng Booking --}}
                    <div class="row small mb-4">
                        <div class="col-6 font-weight-bold mb-2">Name:</div>
                        <div class="col-6 text-muted mb-2 text-right">{{ $bookingDetails['name'] }}</div>
                        
                        <div class="col-6 font-weight-bold mb-2">Email:</div>
                        <div class="col-6 text-muted mb-2 text-right text-truncate">{{ $bookingDetails['email'] }}</div>
                        
                        <div class="col-6 font-weight-bold mb-2">Branch:</div>
                        <div class="col-6 text-muted mb-2 text-right">{{ $bookingDetails['branchname'] }}</div>
                        
                        <div class="col-6 font-weight-bold mb-2">Service:</div>
                        <div class="col-6 text-muted mb-2 text-right">{{ $bookingDetails['roomspaname'] }}</div>
                        
                        <div class="col-6 font-weight-bold mb-2">Check-In:</div>
                        <div class="col-6 text-muted mb-2 text-right">
                            {{ $bookingDetails['checkin'] }} <span class="badge badge-light">{{ $bookingDetails['checkin_time'] }}</span>
                        </div>
                        
                        <div class="col-6 font-weight-bold mb-2">Check-Out:</div>
                        <div class="col-6 text-muted mb-2 text-right">
                            {{ $bookingDetails['checkout'] }} <span class="badge badge-light">{{ $bookingDetails['checkout_time'] }}</span>
                        </div>
                        
                        <div class="col-6 font-weight-bold mb-2">Duration:</div>
                        <div class="col-6 text-muted mb-2 text-right">
                            {{ $bookingDetails['days'] }} {{ Str::plural('Day', $bookingDetails['days']) }}
                        </div>
                    </div>
                    
                    {{-- Total Amount Breakdown Box --}}
                    <div class="p-3 bg-light rounded d-flex justify-content-between align-items-center mb-4">
                        <span class="font-weight-bold text-uppercase small">Total Amount:</span>
                        <span class="h4 font-weight-bold text-success mb-0">
                            PHP {{ number_format((float)$bookingDetails['price'], 2) }}
                        </span>
                    </div>

                    <hr class="mb-4">
                    
                    {{-- PayPal SDK & Button Element --}}
                    <div class="form-group mb-0">
                        <script src="https://www.paypal.com/sdk/js?client-id={!! config('paypal.sandbox.client_id') !!}&currency=PHP"></script>
                        
                        <div id="paypal-button-container"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- PayPal Javascript Handler --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        paypal.Buttons({
            createOrder: function(data, actions) {
                return fetch('{{ route("paypal.createOrder") }}', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        price: '{{ Session::get("price") }}'
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },
            onApprove: function(data, actions) {
                return fetch('{{ route("paypal.captureOrder") }}', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    window.location.href = '{{ route("branches.success") }}';
                });
            }
        }).render('#paypal-button-container');
    });
</script>

@endsection