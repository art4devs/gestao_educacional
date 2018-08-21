@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Editar usuário</h1>
        @include('global_includes.form-errors-messages')

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user_data">Dados</a></li>
            <li><a data-toggle="tab" href="#user_address">Endereço</a></li>
        </ul>

        {{ Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user]]) }}
            <div class="tab-content">
                <div id="user_data" class="tab-pane fade in active">
                    @include('admin.users.includes._form')
                </div>
                <div id="user_address" class="tab-pane fade">
                    @include('admin.users.includes._form-address')
                </div>
            </div>

            {{ link_to_route('admin.users.index', 'Voltar', [], ['class' => 'btn btn-warning pull-right']) }}
            {{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

    </div>
@endsection