@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
        <h2>Payment for {{ $subscription->name }}</h2>
        <form action="{{ route('payment.process', $subscription->id) }}" method="post">
            @csrf
            <!-- Payment form fields (e.g., card details, amount) -->
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="expiration_date">Expiration Date</label>
                <input type="text" name="expiration_date" class="form-control" placeholder="MM/YY" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" value="{{ $subscription->amount }}" disabled>
            </div>

            <!-- You can add more fields as needed -->

            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
        </form>
    </div>
    </div>
@endsection
