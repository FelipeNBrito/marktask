@extends('layouts.master')

@section('content')
    <span class="page-title">Usuários</span>
    {!! Form::model($data['user'], ['url' => route('users.update', ['user' => $data['user']]), 'method' => 'put']) !!}
        @include('users.parts.form')
    {!! Form::close() !!}
@endsection