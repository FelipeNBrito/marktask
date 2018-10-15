@extends('layouts.master')

@section('content')
    <span class="page-title">Tipos de Produtos</span>
    {!! Form::open(['url' => route('productTypes.store')]) !!}
        @include('product-types.parts.form')
    {!! Form::close() !!}
@endsection