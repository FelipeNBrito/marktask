<!-- Modal Structure -->
<div id="{{ $id }}" class="modal add-events-modal">
    <div class="modal-content">
        <h4>{{ $title }}</h4>
        <table id="table_id_1" class="display table-pattern">
        <thead>
        <tr>
            <th>Selecionar</th>
            <th>Nome</th>
            <th>Tipo de produto</th>
            <th>Valor</th>
            <th>Taxa(%)</th>
        </tr>
        </thead>
        <tbody>
        @if($products->count() == 0)
            <tr>
                <td colspan="5">Sem registros para mostrar</td>
            </tr>
        @else
            @foreach($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" id="{{$product->id}}" value="{{$product->id}}" name="products[]" />
                        <label for="{{$product->id}}"></label>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->productType->description }}</td>
                    <td>{{ ValueHelper::toBrValue($product->value) }}</td>
                    <td>{{ ValueHelper::toBrValue($product->productType->tax) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a onclick="addProducts()" class="waves-effect waves-green btn-flat">Adicionar</a>
    </div>
</div>