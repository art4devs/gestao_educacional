@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alterar senha</h1>
        @include('global_includes.form-errors-messages')
        @include('global_includes.flash-messages')
        {{ Form::open(['method' => 'PUT', 'route' => 'admin.users.password.update']) }}
            @include('admin.users.includes._form-update-password')
            {{ Form::submit('Alterar senha', ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
    </div>
@endsection
