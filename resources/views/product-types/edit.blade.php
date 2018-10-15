@extends('layouts.master')

@section('content')
    <span class="page-title">Tipos de Produtos</span>
    {!! Form::model($data['productType'], ['url' => route('productTypes.update', ['productType' => $data['productType']]), 'method' => 'put']) !!}
        @include('product-types.parts.form')
    {!! Form::close() !!}
@endsection