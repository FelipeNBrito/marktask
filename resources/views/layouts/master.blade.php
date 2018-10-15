<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marktax') }}</title>

    <!-- Styles -->
    @include('layouts.style')
    @yield('style')

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

{{--Navbar--}}
@include('layouts.navbar')

{{--Menu--}}
@include('layouts.menu')

{{--Content--}}
<main class="content">
    @if(Session::has('error-feedback'))
        @include('layouts.feedback.error')
    @elseif(Session::has('success-feedback'))
        @include('layouts.feedback.success')
    @endif
    @yield('content')
</main>

<!-- Scripts -->
@include('layouts.scripts')
@yield('script')

</body>
</html>