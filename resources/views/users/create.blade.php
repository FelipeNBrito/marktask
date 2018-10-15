@extends('layouts.master')

@section('content')
    <span class="page-title">Usuários</span>
    {!! Form::open(['url' => route('users.store')]) !!}
        @include('users.parts.form')
    {!! Form::close() !!}
@endsection