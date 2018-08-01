@extends('layouts.app')

@section('content')
    <div class="container">
        @include('global_includes.flash-messages')
        <h2>Dados do novo usuário criado</h2>
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
            <tr>
                <th scope="row">Senha gerada</th>
                <td span class="badge">{{ $cleanPassword }}</td>
            </tr>
            </tr>
            </tbody>
        </table>
        {{ link_to_route('admin.users.index', 'OK, voltar', [], ['class' => 'btn btn-success hiddenPrint']) }}
    </div>
@endsection
