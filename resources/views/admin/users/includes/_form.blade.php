<div class="form-group">
    {{Form::label('name', 'Nome')}}
    {{Form::text('name', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-mail')}}
    {{Form::email('email', '', ['class' => 'form-control'])}}
</div>