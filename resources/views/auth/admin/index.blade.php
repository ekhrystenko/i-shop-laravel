@extends('auth.layout.master')

@section('title', 'Admin')

@section('content')
<div class="row">
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('category.index') }}" class="btn btn-success btn-block">CATEGORIES</a>
    </div>
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('product.index') }}" class="btn btn-success btn-block">PRODUCTS</a>
    </div>
    <div class="col-lg-3 pb-2 pr-0">
        <a href="{{ route('orders') }}" class="btn btn-primary btn-block">ORDERS</a>
    </div>
</div>
@endsection
