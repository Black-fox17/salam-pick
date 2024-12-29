@extends('layouts.whole')

@section('title')
    Fashion Products
@endsection

@section('content')
<div>
    <a href = "{{ url()->previous() }}">
        <div class = "back-btn">
            <img src = "{{ asset('icons/back.svg')}}">
        </div>
    </a>
    <div class="fas-container">
        <h3 class="products-head">Fashion Products</h3>
        <p class="descr">Fashion is more than clothing; it’s an expression of identity, a canvas for creativity, and a celebration of artistry. For as long as I can remember, I’ve been drawn to the allure of timeless designs and the stories they tell. The elegance of tailored pieces, the innovation in fabric, and the confidence they bring have always inspired me. To wear fashion that embodies craftsmanship and individuality feels like donning a work of art. It’s not just about looking good—it’s about feeling empowered, making a statement, and connecting with the world in a way that only fashion can achieve.</p>
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="card mb-4">
                    <a href = "{{ route('product.show', ['id' => $product['id']]) }}">
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