<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>

	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/rocket.png') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/slick/slick-theme.css') }}"/>
    <!-- My file -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>

<header>
    <div class="container-fluid mt-4 mb-5">
        @yield('header')
        @yield('search')
    </div>
</header>

<section>
    <div class="container mt-4 mb-5">
        @include('message')
        @yield('content')
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
{{--                @yield('footer')--}}
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap -->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!-- Fonts -->
<script src="{{ asset('https://kit.fontawesome.com/827ea944e3.js') }}" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{ asset('https://code.jquery.com/jquery-3.5.1.min.js') }}" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('//code.jquery.com/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('//code.jquery.com/jquery-migrate-1.2.1.min.js') }}"></script>
<!-- Slick -->
<script type="text/javascript" src="{{ asset('/slick/slick.min.js') }}"></script>
<!-- My file -->
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
