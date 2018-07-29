<div class="form-group">
    {{Form::label('name', 'Nome')}}
    {{Form::text('name', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-mail')}}
    {{Form::email('email', null, ['class' => 'form-control'])}}
</div>