@extends('layout.layout')

@section('title', 'G6-Store')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="row down">
    <div class="col-lg-7 col-md-12">
        <div class="title-main">
            <h6>Welcome To</h6>
            <h1>G6-Store</h1>
        </div>
    </div>
    <div class="col-lg-7 col-md-12 search">
        <form action="{{ route('allProducts') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
