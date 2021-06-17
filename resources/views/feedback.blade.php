@extends('layout.layout')

@section('title', 'Feedback')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="row">
    <div class="col-8 form-contact">
        <form action="{{ route('feedback') }}" method="post">
            @csrf
            <div class="form-group">
                <h3>Feedback</h3>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Email" class="form-control"
                       value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" cols="30" rows="3" placeholder="Message"
                          class="form-control">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success btn-block feedback">Send</button>
        </form>
        <a href="{{ route('main') }}" class="btn btn-primary btn-block mt-2">Back</a>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
