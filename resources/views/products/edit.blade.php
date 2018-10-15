@extends('layouts.master')

@section('content')
    <span class="page-title">Produtos</span>
    {!! Form::model($data['product'], ['url' => route('products.update', ['product' => $data['product']]), 'method' => 'put']) !!}
        @include('products.parts.form')
    {!! Form::close() !!}
@endsection