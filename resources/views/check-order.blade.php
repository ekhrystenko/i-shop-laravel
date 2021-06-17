@extends('layout.layout')

@section('title', 'Check Order')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="row">
    <div class="col-8 form-contact">
        <form action="{{ route('confirm') }}" method="POST">
            @csrf
            <div class="form-group">
                <h3>Order for the amount {{ $order->getTotalPrice() }}$ to confirm</h3>
                <label for="Name">Name</label>
                <input type="text" name="name" placeholder="Name" id="name" class="form-control"
                       value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" id="email" class="form-control"
                       value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control"
                       value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i>Confirm
            </button>
        </form>
        <a href="{{ route('cart') }}" class="btn btn-dark btn-block mt-2"><i class="fa fa-arrow-left"
                                                                             aria-hidden="true"></i>Back</a>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
