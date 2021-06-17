@extends('layout.layout')

@section('title', 'Sign up')

@section('header')
    @include('layout.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 form-contact">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h3>Sign Up</h3>
                    <label for="login">Name</label>
                    <input type="text" name="name" placeholder="Name" id="name" class="form-control"
                           value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group-prepend">
                    <input type="email" name="email" placeholder="Email" id="email" class="form-control"
                           value="{{ old('email') }}">
                        <div class="input-group-text">@</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password-one"
                           class="form-control" value="">
                </div>

                <label for="show-one" class="label-show">
                    <input type="checkbox" class="password-checkbox-one" id="show-one">
                    <span class="show-one"></span>
                </label>

                <div class="form-group">
                    <label for="password_confirmation">Confrim Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confrim Password"
                           id="confrim-password" class="form-control" value="">
                </div>

                <label for="show-two" class="label-show">
                    <input type="checkbox" class="password-checkbox-two" id="show-two">
                    <span class="show-two"></span>
                </label>

                <div class="form-group-file">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control-file" value="">
                </div>

                <button type="submit" class="btn btn-success btn-block mt-2">Sign Up</button>
            </form>
            <a href="{{ route('login') }}" class="btn btn-primary btn-block mt-2">Back</a>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
