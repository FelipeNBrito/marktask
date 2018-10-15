<div class="container">
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('name', null,  ['id' => 'name', 'class' => 'validate'] ) !!}
            {!! Form::label('name', 'Nome') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'name'])
        <div class="input-field col s12 m12 l12">
            {!! Form::text('email', null,  ['id' => 'email', 'class' => 'validate'] ) !!}
            {!! Form::label('email', 'E-mail') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'email'])
        <div class="input-field col s12 m12 l12">
            {!! Form::password('password', null,  ['id' => 'password', 'class' => 'validate'] ) !!}
            {!! Form::label('password', 'Senha') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'password'])
        <div class="input-field col s12">
            {!! Form::select('categories_id', $data['categories']) !!}
            {!! Form::label('categories_id', 'Categoria') !!}
        </div>
        @include('layouts.components.error-message.error-message', ['key' => 'categories_id'])
        @include('layouts.buttons.form.previous', [
            'href' => route('users.show'),
        ])
        @include('layouts.buttons.form.save')
    </div>
</div>

@section('script')
@endsection