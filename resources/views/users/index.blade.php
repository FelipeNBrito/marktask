@extends('layouts.master')

@section('content')
    <span class="page-title">Usuários</span>
    <table id="table_id" class="display table-pattern">
        <thead>
        <tr>
            <th>Opções</th>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Categoria</th>
        </tr>
        </thead>
        <tbody>
        @if($data['users']->count() == 0)
            <tr>
                <td colspan="5">Sem registros para mostrar</td>
            </tr>
        @else
            @foreach($data['users'] as $user)
                <tr>
                    <td>
                        @include('layouts.buttons.grid.edit', [
                            'href' => route('users.edit', ['user' => $user]),
                        ])
                        @include('layouts.buttons.grid.delete', [
                            'href' => route('users.delete', ['user' => $user]),
                            'id'   => 'form-delete-' . $user->id
                        ])
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->category->name }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @include('layouts.buttons.form.create', [
        'href' => route('users.create')
    ])
@endsection

@section('script')
    <script type="application/javascript" src="{{ URL::asset('js/data-tables-initialization.js') }}"></script>
@endsection
