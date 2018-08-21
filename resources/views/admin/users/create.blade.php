@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo usuário</h1>
        @include('global_includes.form-errors-messages')

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user_data">Dados</a></li>
            <li><a data-toggle="tab" href="#user_address">Endereço</a></li>
        </ul>

        {{ Form::open(['route' => 'admin.users.store']) }}

            <div class="tab-content">
                <div id="user_data" class="tab-pane fade in active">
                    @include('admin.users.includes._form')
                    <div class="form-group">
                        {{Form::label('send_mail', 'Enviar e-mail de boas vindas')}}
                        {{Form::checkbox('send_mail', true, true, ['class' => 'pull-left'])}}
                    </div>
                </div>
                <div id="user_address" class="tab-pane fade">
                    @include('admin.users.includes._form-address')
                </div>
            </div>
            {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
            {{ link_to_route('admin.users.index', 'Voltar', [], ['class' => 'btn btn-warning pull-right']) }}
        {{ Form::close() }}
    </div>
@endsection
