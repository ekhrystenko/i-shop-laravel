@extends('layout.layout')

@section('title', $current_category->title)

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="container mt-2 mb-2 bg-category">
    <div class="row">
        <div class="col-lg-12 pt-2 pb-2 pl-3">
            @if($products->count() < 2)
                <h6>Showing {{ $products->count() }} result</h6>
            @else
                <h6>Showing {{ $products->count() }} results</h6>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-4">
                <div class="product">
                    <div class="row">
                        <span class="flag">{{ $product->isNew() }}</span>
                        <div class="col-lg-12">
                            <small>{{ $product->category->title }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-img">
                                <a href="{{ route('product', [$product->category->alias, $product->alias]) }}">
                                    <img src="{{ Storage::url($product->images[0]['img']) }}" alt="{{ $product->title }}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="product-text-category pt-2">
                                {{ $product->title }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @if($product->new_price != null)
                                <small class="product-text-category"
                                      style="color: red">Old: <s>${{ $product->price }}</s></small>
                                <span class="product-text-category"> / New: ${{$product->new_price}}</span>
                            @else
                                <span class="product-text-category">Price: ${{ $product->price }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <a href="{{ route('product', [isset($category) ? $category->alias : $product->category->alias, $product->alias]) }}"
                               class="btn btn-primary btn-block mt-2"><i class="fa fa-bars" aria-hidden="true"></i>More</a>
                            <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-block mt-2"><i class="fa fa-shopping-cart"
                                                                             aria-hidden="true"></i>Buy
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="col-12">
                {{ $products->links() }}
            </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
