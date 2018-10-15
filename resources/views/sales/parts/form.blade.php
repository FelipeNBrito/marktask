<div class="container">
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('name', null,  ['id' => 'name', 'class' => 'validate'] ) !!}
            {!! Form::label('name', 'Nome') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'name'])
        <div class="input-field col s12">
            {!! Form::select('product_types_id', $data['productTypesSelect']) !!}
            {!! Form::label('product_types_id', 'Tipos de Produtos') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'product_types_id'])
        @include('layouts.buttons.form.previous', [
            'href' => route('products.show'),
        ])
        @include('layouts.buttons.form.save')
    </div>
</div>

@section('script')
    <script type="application/javascript">
        $(document).ready(function(){
            //Add proprieties to first option
            $("[name='product_types_id']").find('option:first').prop('disabled', 'disabled').prop('value', '').prop('selected', 'selected');
        });
    </script>
@endsection