@extends('layout.layout')

@section('title', 'Sign in')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <h3>Sign In</h3>
                    <label for="name">Name</label>
                    <div class="input-group-prepend">
                    <input type="text" name="name" placeholder="Name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}">
                    </div>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password-in"
                           class="form-control @error('password') is-invalid @enderror" value="">
                </div>

                <div class="form-group">
                    <input class="new-checkbox mr-1" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>


                <label for="show-in" class="label-show">
                    <input type="checkbox" class="password-checkbox-in" id="show-in">
                    <span class="show-in"></span>
                </label>


                <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </form>
            <a href="{{ route('main') }}" class="btn btn-primary btn-block mt-2">Back</a>
            <hr>
            <div class="text-center">No account? <a href="{{ route('register') }}"> Sign Up</a></div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
