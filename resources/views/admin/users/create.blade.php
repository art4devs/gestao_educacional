@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo usuário</h1>
        @include('global_includes.form-errors-messages')
        {{ Form::open(['route' => 'admin.users.store']) }}
            @include('admin.users.includes._form')
            <div class="form-group">
                {{Form::label('send_mail', 'Enviar e-mail de boas vindas')}}
                {{Form::checkbox('send_mail', '', true, ['class' => 'pull-left'])}}
            </div>
            {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
            {{ link_to_route('admin.users.index', 'Voltar', [], ['class' => 'btn btn-warning pull-right']) }}
        {{ Form::close() }}
    </div>
@endsection
