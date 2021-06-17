@extends('auth.layout.master')

@section('title', $product->title)

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="container mt-4 mb-4">
    <div class="row pt-4 pb-4">
        <div class="col-lg-11 body_card m-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="slider-product-card">
                        @foreach($product->images as $image)
                            <div class="product-img-cart">
                                <img src="{{ Storage::url($image->img) }}" alt="{{ $product->title }}">
                                <form action="{{ route('imageDestroy', $image) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger mt-2 mb-3 col-lg-4">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 text-left">
                    <p class="product-card-text">
                    <h4>{{ $product->title }}</h4>
                    </p>
                    @if($product->new_price != null)
                        <span class="product-price" style="color: red">Old: <s>${{ $product->price }}</s></span>
                        <span class="product-price"> / New: ${{$product->new_price}} </span>
                    @else
                        <span class="product-price">Price: ${{ $product->price }}</span>
                    @endif
                    <p class="pt-3 product-card-text">{{ $product->description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-left pt-4">
                    <p class="product-card-text pl-4">{!! $product->description !!} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-4">
                    <form action="{{ route('admin.destroy', $product->alias) }}" method="POST">
                        <a href="{{ route('admin.edit', $product->alias) }}" class="btn btn-primary">Update</a>
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
