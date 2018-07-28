<?php

namespace Educacional\Repositories;

use Educacional\Models\User;

class UsersRepository
{
    public function store(array $data)
    {
        $data['password'] = $this->makePassword();
        return User::create($data);
    }

    private function makePassword()
    {
        // gera uma senha numerica de 6 digitos
        return bcrypt(rand(100000, 999999));
    }
}