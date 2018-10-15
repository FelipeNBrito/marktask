@extends('layouts.master')

@section('content')
    <span class="page-title">Produtos</span>
    {!! Form::open(['url' => route('products.store')]) !!}
        @include('products.parts.form')
    {!! Form::close() !!}
@endsection