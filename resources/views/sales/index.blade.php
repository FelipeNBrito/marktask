@extends('layouts.master')

@section('content')
    <span class="page-title">Vendas</span>
    <table id="table_id" class="display table-pattern">
        <thead>
        <tr>
            <th>Opções</th>
            <th>ID</th>
            <th>Código</th>
            <th>Valor Total da Venda</th>
        </tr>
        </thead>
        <tbody>
        @if($data['sales']->count() == 0)
            <tr>
                <td colspan="5">Sem registros para mostrar</td>
            </tr>
        @else
            @foreach($data['sales'] as $sale)
                <tr>
                    <td>
                        @include('layouts.buttons.grid.search', [
                            'href' => route('sales.search', ['sale' => $sale]),
                        ])
                        @include('layouts.buttons.grid.delete', [
                            'href' => route('sales.delete', ['sale' => $sale]),
                            'id'   => 'form-delete-' . $sale->id
                        ])
                    </td>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->code }}</td>
                    <td>{{ ValueHelper::toBrValue($sale->totalOfSale) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @include('layouts.buttons.form.create', [
        'href' => route('sales.create')
    ])
@endsection

@section('script')
    <script type="application/javascript" src="{{ URL::asset('js/data-tables-initialization.js') }}"></script>
@endsection
