<?php

namespace Educacional\Repositories;

use Educacional\Models\User;
use Educacional\Models\Userable;

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

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'enrolment'=> $data['enrolment'],
            'password' => $data['password'],
            'zipcode' => $data['zipcode'],
            'address' => $data['address'],
            'number' => $data['number'],
            'complement' => $data['complement'],
            'neighborhood' => $data['neighborhood'],
            'city' => $data['city'],
            'state' => $data['state']
        ]);

        $userable = new Userable($user);
        $user = $userable->defineUserable($data['user_choices']);
        $user->save();
        return $user;
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