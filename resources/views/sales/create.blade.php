@extends('layouts.master')

@section('content')
    {{ Form::open(['url' => route('sales.store'), 'method' => 'POST']) }}
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                {!! Form::text('code', $data['code'],  ['id' => 'code', 'class' => 'validate', 'disabled' => 'disabled'] ) !!}
                {!! Form::label('code', 'Código da venda') !!}
            </div>
            <table id="table_id" class="display table-pattern">
                <thead>
                <tr>
                    <th>Opções</th>
                    <th>Produto</th>
                    <th>Valor Produto</th>
                    <th>Quantidade</th>
                    <th>Taxa (%)</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

                    @include('layouts.buttons.form.previous', [
                        'href' => route('sales.show'),
                    ])
                    @include('layouts.buttons.form.save')
                    @include('layouts.buttons.form.button', [
                        'href' => '#teste',
                        'text' => 'Adicionar Produtos',
                        'classes' => 'blue-pattern btn-right-align modal-trigger',
                        'style' => 'margin-right: 1em;',
                        'onclick' => '',
                    ])
            </div>
        </div>
    </div>
    @include('layouts.components.modal.add-products-modal', [
        'id' => 'teste',
        'title' => 'Produtos',
        'products' => $data['products']
    ])

    {{ Form::close() }}
@endsection

@section('script')
    <script type="application/javascript">
        $(document).ready(function(){
            reloadDataTables();
        });

        function addProducts() {
            let ids = [];

            //Le o input do modal que esta selecionado
            let $products = $("[name='products[]']:checked");

            $.each($products, function (index, value){
                ids.push($(value).prop('id'));

                let table1 = $('#table_id_1').DataTable();
                let row = table1.row( $($products).parent().parent() );
                row.remove().draw();

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('sales.addProductsAjax') }}",
                data: {
                    'productsIds' : JSON.stringify(ids),
                    'code' : $('#code').val()
                }
            }).done(function(dataResponse) {
                let dataResponseArray = JSON.parse(dataResponse);

                let table = $('#table_id').DataTable();

                //Limpa toda tabela
                table.clear().draw();

                //Monta as linhas da tabela
                for (let i = 0; i < dataResponseArray.length; i++) {
                    //Adiciona uma linha na tabela
                    table.row.add( {
                        "opcao": dataResponseArray[i].opcao,
                        "productName": dataResponseArray[i].productName,
                        "productValue": dataResponseArray[i].productValue,
                        "amount": dataResponseArray[i].amount,
                        "tax": dataResponseArray[i].tax,
                        "total": dataResponseArray[i].total,
                    }).draw();
                }

                //close modal
                $('#teste').modal('close');
            });
        }

        //Recarrega as informacoes no datatables
        function reloadDataTables() {
            let table_id = $('#table_id').DataTable({
                "ajax": {
                    'url' : '{{ route('sales.dataTables') }}',
                    'dataSrc': ''
                },
                'columns': [
                    {"data" : 'opcao'},
                    {"data" : "productName"},
                    {"data" : "productValue"},
                    {"data" : "amount"},
                    {"data" : "tax"},
                    {"data" : "total"}
                ]
            });

            //To Reload The Ajax
            //See DataTables.net for more information about the reload method
            table_id.ajax.reload();
        }

        function calcTotal(id) {
            let valueProduct = $('#productValue-'+id).html();
            let taxProduct = $('#productTax-'+id).html();
            let amountProduct = $('#amount-'+id).val();
            let calc = (valueProduct * amountProduct) + ((valueProduct * amountProduct) * (taxProduct/100));
            $('#productTotal-'+id).html(calc);
        }

    </script>
@endsection