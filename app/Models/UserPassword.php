<?php

namespace Educacional\Models;


class UserPassword
{
    public static function makePassword()
    {
        // gera uma senha numerica de 6 digitos
        return rand(100000, 999999);
    }
}