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
        $data['password']  = bcrypt($data['password']);
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
}