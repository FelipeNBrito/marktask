<div class="container">
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('description', null,  ['id' => 'description', 'class' => 'validate'] ) !!}
            {!! Form::label('description', 'Descrição') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'description'])
        <div class="input-field col s12 m12 l12">
            {!! Form::text('tax', null,  ['id' => 'tax', 'class' => 'validate', 'placeholder' => '$,$$'] ) !!}
            {!! Form::label('tax', 'Taxa (%)') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'tax'])
        @include('layouts.buttons.form.previous', [
            'href' => route('productTypes.show'),
        ])
        @include('layouts.buttons.form.save')
    </div>
</div>

@section('script')
    <script type="application/javascript">
        $(document).ready(function(){
            $('#tax').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endsection