<?php

namespace Educacional\Models;

class Userable
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function defineUserable($type)
    {
        $types = [
            User::ROLE_ADMIN   => Admin::class,
            User::ROLE_TEACHER => Teacher::class,
            User::ROLE_STUDENT => Student::class
        ];
        $model = $types[$type];
        $model = $model::create([]);

        return $this->user->userable()->associate($model);
    }
}