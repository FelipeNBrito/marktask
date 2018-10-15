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
            <a href="#" class="brand-logo center">Marktax</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
{{--                <li><a href="{{ URL::asset('/login') }}">Login</a></li>--}}
            </ul>
            <div class="blue-pattern-secundary" style="width: 100%; height:4px;"></div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4" id="form-login">
                <div class="card blue-pattern">
                    <div class="blue-pattern-secundary" style="width: 100%; margin-top: 10px; height:4px;" ></div>
                    <div class="card-content white-text">
                        <span class="card-title">Login</span>
                        <div class="card-content white-text">
                            <form method="post" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="input-field">
                                    <input id="email" name="email" type="text" class="validate">
                                    <label class="white-text" for="email">E-mail</label>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback alert-danger red-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="input-field">
                                    <input id="password" name="password" type="password" class="validate">
                                    <label class="white-text" for="password">Senha</label>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback alert-danger red-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div>
                                    <button type="submit" class="blue-pattern-secundary waves-effect waves-light btn btn-login">
                                        Entrar
                                    </button>
                                    <div class="center button-text-other-option">OU</div>
                                    <a href="{{ route('consult.show') }}" class="blue-pattern-secundary waves-effect waves-light btn btn-login">
                                        Consultar compra
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