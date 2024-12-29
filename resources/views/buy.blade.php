@extends('layouts.whole')

@section('title')
    Payment
@endsection

@section('content')
<div>
    <a href = "{{ url()->previous() }}">
        <div class = "back-btn">
            <img src = "{{ asset('icons/back.svg')}}">
        </div>
    </a>
    <div class="payment-container">
        <div class="header">
            <h1>Buy Now</h1>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="form-gro">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>
            <div class="form-gro">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" required>
            </div>
            <div class="form-gro">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>
            <button type="submit" class="btn">Pay Now</button>
        </form>
    </div>
</div>
@endsection