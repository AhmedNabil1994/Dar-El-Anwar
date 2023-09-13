@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Payment Successful</h2>
        <p>Your payment for {{ $subscription->name }} has been successfully processed.</p>
        <!-- Add any additional details or actions here -->
    </div>
@endsection
