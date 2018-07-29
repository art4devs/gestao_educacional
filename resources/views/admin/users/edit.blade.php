@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo usuário</h1>
        @include('global_includes.form-errors-messages')
        {{ Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user]]) }}
        @include('admin.users.includes._form')
        {{ link_to_route('admin.users.index', 'Voltar', [], ['class' => 'btn btn-warning pull-right']) }}
        {{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

    </div>
@endsection