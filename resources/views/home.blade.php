@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card-panel white-text">
                    <p class="">
                        <span class="title-card">Total de Produtos</span>
                    </p>
                    <p>
                        <span class="amount-card">{{ $data['totalOfProducts'] }}</span>
                    </p>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="card-panel white-text">
                    <p>
                        <span class="title-card">Total de Vendas</span>
                    </p>
                    <p>
                        <span class="amount-card">{{ $data['totalOfSales'] }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .card-panel {
            background-color: #3949ab;
        }

        .title-card {
            font-size: 2em;
        }

        .amount-card {
            font-size: 3em;
        }
    </style>
@endsection
