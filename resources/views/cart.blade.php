@extends('layouts.whole')

@section('title')
    cart
@endsection

@section('content')
<div>
    <a href = "{{ url()->previous() }}">
        <div class = "back-btn">
            <img src = "{{ asset('icons/back.svg')}}">
        </div>
    </a>
    <div class="cart-container">
    <h1>Your Cart</h1>
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        @php
            $total = 0;
        @endphp
        @foreach($cart as $productId => $item)
            @php
                $total += $item['price'] * $item['quantity'];
            @endphp
            <div class="cart-item">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                <h2>{{ $item['name'] }}</h2>
                <p>Price: ${{ $item['price'] }}</p>
                <p>Quantity: {{ $item['quantity'] }}</p>
                <p>Total: ${{ $item['price'] * $item['quantity'] }}</p>
                <button onclick="removeFromCart('{{ $productId }}')">Remove</button>
            </div>
        @endforeach
        <div class="total-payment">
            <h3>Total Payment: ${{ $total }}</h3>
        </div>
        <div class="btn-buy">
            <a href = "{{ route('buy') }}" class="add-link" target = "_blank">
                    <button  class="add-to-cart">Checkout</button>
            </a>
        </div>
        <div class="google-btn">
            <div id ="payment"></div>
        <div<
    @endif
</div>
@endsection

@section('scripts')
    <script>
        const paymentprice = String({{ $total }});
    </script>
    <script src  = "{{ asset('pay.js')}}"> 
    </script>
@endsection