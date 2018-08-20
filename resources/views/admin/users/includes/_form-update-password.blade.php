<div class="form-group">
    {{Form::label('password', 'Nova senha')}}
    {{Form::password('password', ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('password_confirmation', 'Confirmar nova senha')}}
    {{Form::password('password_confirmation', ['class' => 'form-control'])}}
</div>