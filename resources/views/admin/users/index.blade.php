@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Usuários</h1>
        {{ link_to_route('admin.users.create', 'Cadastrar usuário', [], ['class' => 'btn btn-primary']) }}
        @include('global_includes.flash-messages')

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{route('admin.users.show', ['user' => $user->id])}}">Visualizar</a> |
                        <a href="{{route('admin.users.edit', ['user' => $user->id])}}">Editar</a> |
                        <a data-toggle="modal" data-target="#modal-destroy-{{$user->id}}" style="cursor: pointer;">Excluir</a>
                        @include('admin.users.includes.modal-destroy')
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id], 'id' => "form-destroy-{$user->id}"]) }}
                        {{Form::close()}}
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
