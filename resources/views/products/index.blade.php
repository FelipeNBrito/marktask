@extends('layouts.master')

@section('content')
    <span class="page-title">Produtos</span>
    <table id="table_id" class="display table-pattern">
        <thead>
        <tr>
            <th>Opções</th>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Tipo de Produto</th>
        </tr>
        </thead>
        <tbody>
        @if($data['products']->count() == 0)
            <tr>
                <td colspan="5">Sem registros para mostrar</td>
            </tr>
        @else
            @foreach($data['products'] as $product)
                <tr>
                    <td>
                        @include('layouts.buttons.grid.edit', [
                            'href' => route('products.edit', ['product' => $product]),
                        ])
                        @include('layouts.buttons.grid.delete', [
                            'href' => route('products.delete', ['product' => $product]),
                            'id'   => 'form-delete-' . $product->id
                        ])
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ ValueHelper::toBrValue($product->value) }}</td>
                    <td>{{ $product->productType->description }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @include('layouts.buttons.form.create', [
        'href' => route('products.create')
    ])
@endsection

@section('script')
    <script type="application/javascript" src="{{ URL::asset('js/data-tables-initialization.js') }}"></script>
@endsection
