@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo usuário</h1>

        {{ Form::model($user, ['route' => ['admin.users.update', $user]]) }}
        @include('admin.users.includes._form')
        {{ Form::close() }}

    </div>
@endsection