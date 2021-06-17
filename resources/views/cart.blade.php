@extends('layout.layout')

@section('title', 'Cart')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="container mt-2 mb-2 bg-category">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="product-card-text">Cart Order</h2>
            <h4>Total price - {{ $order->getTotalPrice() }}$</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <table class="table-striped table-dark cart-table">
                @foreach($order->products as $product)
                    <tr>
                        <td scope="row">
                            <div class="product-img">
                                <a href="{{ route('product', [$product->category->alias, $product->alias]) }}">
                                    <img src="{{ Storage::url($product->images[0]['img']) }}" alt="img">
                                </a>
                            </div>
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->getNewPrice()}}</td>
                        <td>{{ $product->getTotalPriceProduct() }}$</td>
                        <td>{{ $product->pivot->count }}</td>
                        <td>
                            <form action="{{ route('remove-from-cart', $product->id) }}" method="POST" class="cart-button">
                                @csrf
                                <button class="btn btn-danger add__delete"><i class="fas fa-minus"></i></button>
                            </form>
                            <form action="{{ route('add-to-cart', $product->id) }}" method="POST" class="cart-button">
                                @csrf
                                <button class="btn btn-success add__delete"><i class="fas fa-plus"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-11 pb-2">
            <a href="{{ route('check-order') }}" class="btn btn-success btn-block mt-2"><i class="fa fa-check"
                                                                            aria-hidden="true"></i>Check Order</a>
            <a href="{{ route('main') }}" class="btn btn-secondary btn-block mb-2"><i class="fa fa-arrow-left"
                                                                       aria-hidden="true"></i>Back</a>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
