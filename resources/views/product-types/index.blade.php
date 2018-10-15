@extends('layouts.master')

@section('content')
    <span class="page-title">Tipos de Produtos</span>
    <table id="table_id" class="display table-pattern">
        <thead>
        <tr>
            <th>Opções</th>
            <th>ID</th>
            <th>Descrição</th>
            <th>Taxa (%)</th>
        </tr>
        </thead>
        <tbody>
        @if($data['typesProduct']->count() == 0)
            <tr>
                <td colspan="5">Sem registros para mostrar</td>
            </tr>
        @else
            @foreach($data['typesProduct'] as $productType)
                <tr>
                    <td>
                        @include('layouts.buttons.grid.edit', [
                            'href' => route('productTypes.edit', ['productType' => $productType]),
                        ])
                        @include('layouts.buttons.grid.delete', [
                            'href' => route('productTypes.delete', ['productType' => $productType]),
                            'id'   => 'form-delete-' . $productType->id
                        ])
                    </td>
                    <td>{{ $productType->id }}</td>
                    <td>{{ $productType->description }}</td>
                    <td>{{ ValueHelper::toBrValue($productType->tax) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @include('layouts.buttons.form.create', [
        'href' => route('productTypes.create')
    ])
@endsection

@section('script')
    <script type="application/javascript" src="{{ URL::asset('js/data-tables-initialization.js') }}"></script>
@endsection
