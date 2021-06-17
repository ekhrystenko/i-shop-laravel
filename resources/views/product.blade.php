@extends('layout.layout')

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
                    @include('slider.sliderProduct')
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
                    <p class="product-card-text pl-4 pr-4">{!! $product->full_description !!}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 pt-4">
                    <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Buy</button>
                    </form>
                    <a href="{{ route('category', $product->category->alias) }}" class="btn btn-secondary btn-block mt-2 mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                </div>
            </div>

            @if(Auth::user())
                <div class="row justify-content-lg-start m-auto">
                    <div class="col-lg-12 product-card-text">
                        <form action="{{ route('saveComment', $product) }}" method="POST">
                            @csrf
                            <div class="form-group text-left">
                                <label for="comment">Comment</label>
                                <textarea name="comment" cols="30" rows="3" placeholder="Comment"
                                          class="form-control"></textarea>
                                <button type="submit" class="btn btn-primary col-lg-2 mt-2">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            <div class="row">
                @foreach($comments as $comment)
                <div class="col-lg-2 mb-3">
                    <div class="avatar-comment">
                        <img src="{{ Storage::url($comment->user->avatar) }}" alt="avatar">
                    </div>
                </div>
                <div class="col-lg-9 text-left">
                    <h6>{{ $comment->user->name }}</h6>
                    <small>{{ $comment->created_at }}</small>
                    <p class="pt-2 product-card-text">{{ $comment->description }}</p>
                </div>
                @endforeach
            </div>
        {{ $comments->links() }}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
