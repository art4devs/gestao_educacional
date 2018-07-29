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
        $data['enrolment'] = $this->makeEnrolment(3);
        $data['password']  = $this->makePassword();
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

    private function makeEnrolment(int $type)
    {
        $enrolment = date('Y');
        $enrolment .= $this->defineIntervalEnrolments($type);
        $enrolment .= User::orderBy('id', 'DESC')->value("id") + 1;
        return $enrolment;
    }

    private function defineIntervalEnrolments(int $type)
    {
        $intervals = [
            User::ROLE_ADMIN   => 10,
            User::ROLE_TEACHER => 20,
            User::ROLE_STUDENT => 30
        ];
        return $intervals[$type];
    }
}