<div class="form-group">
    {{Form::label('name', 'Nome')}}
    {{Form::text('name', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-mail')}}
    {{Form::email('email', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('user_choices', 'Tipos de usuário')}}
    {{Form::select('user_choices',[
        \Educacional\Models\User::ROLE_ADMIN => 'Administrador',
        \Educacional\Models\User::ROLE_TEACHER => 'Professor',
        \Educacional\Models\User::ROLE_STUDENT => 'Estudante'
        ],
        null,
        ['class' => 'form-control']
    )}}
</div>