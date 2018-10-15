<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @include('layouts.scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @include('layouts.style')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>

<body>
<nav class="navbar-color blue-pattern">
    <div class="nav-wrapper">
        <a href="{{ route('home') }}" class="brand-logo center">Marktax</a>
        <div class="blue-pattern-secundary" style="width: 100%; height:4px;"></div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col s12 m6 l4" id="form-login">
            <div class="card blue-pattern">
                <div class="blue-pattern-secundary" style="width: 100%; margin-top: 10px; height:4px;" ></div>
                <div class="card-content white-text">
                    <span class="card-title">Consulta de compra</span>
                    <div class="card-content white-text">
                        <form method="post" action="{{ route('consult.consult') }}">
                            {{ csrf_field() }}
                            <div class="input-field">
                                <input id="code" name="code" type="text" class="validate">
                                <label class="white-text" for="code">Código da compra</label>
                            </div>
                            @include('layouts.components.error-message.error-message', ['key' => 'code'])
                            <div>
                                <button type="submit" class="blue-pattern-secundary waves-effect waves-light btn btn-login">
                                    Consultar
                                </button>
                                <div class="center button-text-other-option">OU</div>
                                <a href="{{ route('login') }}" class="blue-pattern-secundary waves-effect waves-light btn btn-login">
                                    LOGIN
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>