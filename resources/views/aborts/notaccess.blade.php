@extends('layouts.master')

@section('content')
    <h5 class="center">Você não tem permissão de acessar essa tela</h5>
    @include('layouts.buttons.form.button', [
        'href' => route('home'),
        'classes' => 'blue-pattern btn-left-align',
        'style' => '',
        'text' => 'Voltar para home',
        'onclick' => '',
    ])
@endsection
