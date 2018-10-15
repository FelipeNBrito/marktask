<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/sales/sales.css') }}">

    <!-- Styles -->
    @include('layouts.style')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
</head>

<body>
<?php $totalTax = $totalSaleValue = $totalAmount = 0; ?>
<div class="container">
    <div class="row">
        <h5 class="center">
            Código da compra: {{ $data['sale']->code }}
        </h5>
        <h5>Produtos</h5>
        @foreach($data['sales'] as $sale)
            <div class="product-box">
                <?php $taxValue = (($sale->value * $sale->amount) * ($sale->tax / 100)); ?>
                <?php $saleValue =  $taxValue + ($sale->value * $sale->amount); ?>

                <p>Nome do produto: {{ $sale->name }} </p>
                <p>Tipo : {{ $sale->producttype }} </p>
                <p>Quantidade: {{ $sale->amount }} </p>
                <p>Valor Unitário: {{ ValueHelper::toBrValue($sale->value) }} </p>
                <p>Taxa: {{ ValueHelper::toBrValue($sale->tax) }} </p>
                <p>Valor da compra: {{ ValueHelper::toBrValue($saleValue) }} </p>

                {{-- Totalizadores --}}
                <?php $totalAmount +=  $sale->amount; ?>
                <?php $totalTax +=  $taxValue; ?>
                <?php $totalSaleValue += ($sale->value * $sale->amount); ?>
            </div>
            <hr width="100%">
        @endforeach
        <h5 class="center">Totais da compra </h5>
        <div class="product-box">
            <p>Valor em produtos: {{ ValueHelper::toBrValue($totalSaleValue) }} </p>
            <p>Quantidade total: {{ $totalAmount }} </p>
            <p>Valor total pago em taxa: {{ ValueHelper::toBrValue($totalTax) }} </p>
            <p>Valor total : {{ ValueHelper::toBrValue($totalSaleValue + $totalTax) }} </p>
            <p>Atendente : {{ $data['sale']->user->name }} </p>
        </div>
    </div>
</div>
</body>
</html>