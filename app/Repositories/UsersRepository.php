<?php

namespace Educacional\Repositories;

use Educacional\Models\User;

class UsersRepository
{
    public function all()
    {
        return User::orderBy('id', 'DESC')->get();
    }

    public function get($id)
    {
        return User::where('id', $id)->first();
    }

    public function store(array $data)
    {
        $data['password'] = $this->makePassword();
        return User::create($data);
    }

    public function update(array $data, int $id)
    {
        $user = $this->get($id);
        return $user->update($data);
    }

    public function destroy(int $id)
    {
        $user = $this->get($id);
        return $user->delete();
    }

    private function makePassword()
    {
        // gera uma senha numerica de 6 digitos
        return bcrypt(rand(100000, 999999));
    }
}