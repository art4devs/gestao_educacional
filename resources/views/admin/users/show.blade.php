@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td>{{ $user->email }}</td>
                </tr>
                    <th scope="row">Ações</th>
                    <td>
                        <a href="{{route('admin.users.show', ['user' => $user->id])}}">Visualizar</a> |
                        <a href="{{route('admin.users.edit', ['user' => $user->id])}}">Editar</a> |
                        <a data-toggle="modal" data-target="#modal-destroy-{{$user->id}}" style="cursor: pointer;">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
        {{ link_to_route('admin.users.index', 'Voltar', [], ['class' => 'btn btn-warning']) }}
    </div>
    @include('admin.users.includes.modal-destroy')
    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id], 'id' => "form-destroy-{$user->id}"]) }}
    {{Form::close()}}
@endsection
