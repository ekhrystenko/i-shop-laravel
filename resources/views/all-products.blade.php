@extends('layout.layout')

@section('title', 'All Products')

@section('header')
    @include('layout.header')
@endsection

@section('content')
    <div class="container mt-2 mb-2 bg-category">
        <div class="row">
            <div class="col-6 mt-3">
                <form action="{{ route('allProducts') }}" method="GET" class="form-group">
                    <label for="price_from">From
                        <input type="text" name="price_from" size="6" value="{{ request()->price_from }}" class="form-control">
                    </label>
                    <label for="price_to">To
                        <input type="text" name="price_to" size="6" value="{{ request()->price_to }}" class="form-control">
                    </label>
                    <label for="new" class="pl-3 pr-3">New
                        <input type="checkbox" name="new" @if(request()->has('new')) checked @endif>
                    </label>
                    <button type="submit" class="btn btn-primary" >Filter</button>
                    <a href="{{ route('allProducts') }}" class="btn btn-warning">Reset</a>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 search">
                <form action="{{ route('allProducts') }}" method="GET">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search" value="{{ request()->search }}" class="form-control" >
                        <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 pb-2 pl-3">
                @if($products->count() < 2)
                    <h6 style="color: white; padding-top: 15px">Showing {{ $products->count() }} result</h6>
                @else
                    <h6 style="color: white; padding-top: 15px">Showing {{ $products->count() }} results</h6>
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
                                        <img class="prod" src="{{ Storage::url($product->images[0]['img']) }}" alt="{{ $product->title }}"></a>
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
                                    <span class="product-text-category"
                                          style="color: red">Old: <s>${{ $product->price }}</s></span>
                                    <span class="product-text-category"> / New: ${{$product->new_price}}</span>
                                @else
                                    <span class="product-text-category">Price: ${{ $product->price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-11 block-btn">
                                <a href="{{ route('product', [isset($category) ? $category->alias : $product->category->alias, $product->alias]) }}" class="btn btn-primary mt-2 btn-block"><i class="fa fa-bars" aria-hidden="true"></i>More</a>
                                <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success mt-2 btn-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Buy</button>
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
