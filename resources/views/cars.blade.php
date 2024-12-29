@extends('layouts.whole')

@section('title')
    Autos
@endsection

@section('content')
<div>
    <a href = "{{ url()->previous() }}">
        <div class = "back-btn">
            <img src = "{{ asset('icons/back.svg')}}">
        </div>
    </a>
    <div class="fas-container">
        <h3 class="products-head">Autos</h3>
        <p class="descr">Lexus and Mercedes vehicles epitomize a blend of luxury, innovation, and performance, making them the perfect choice for those who dream of both comfort and adventure. For as long as I can remember, owning a Lexus or a Mercedes has been more than just a goal—it’s been a vision of the journeys I wish to take. Whether navigating long highways, exploring city streets, or embracing off-road terrains, these brands promise experiences defined by elegance, reliability, and unmatched engineering.

The thought of sitting behind the wheel, feeling the smooth power of a Lexus or the refined sophistication of a Mercedes, aligns perfectly with my aspiration to travel far and live fully. These dream cars represent not just modes of transport, but companions for the road ahead—vehicles that embody both style and substance, ready to elevate every journey into an unforgettable adventure.</p>
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="card mb-4">
                    <a href = "{{ route('auto.show', ['id' => $product['id']]) }}">
                            <img 
                                src="{{ asset($product['image_url']) }}" 
                                class="card-img-top" 
                                alt="{{ $product['name'] ?? 'Product Image' }}">
                                <h3 >{{ $product['name'] }}</h5>
                                <p class="card-text">{{ $product['description'] }}</p>
                                <p class="price">${{ number_format($product['price'], 2) }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
 @endsection