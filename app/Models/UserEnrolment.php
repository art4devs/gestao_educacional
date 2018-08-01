<?php
namespace Educacional\Models;

class UserEnrolment
{
    public static function makeEnrolment(int $userRole)
    {
        $enrolment = date('Y');
        $enrolment .= self::defineIntervalEnrolments($userRole);
        $enrolment .= User::orderBy('id', 'DESC')->value("id") + 1;
        return $enrolment;
    }

    private static function defineIntervalEnrolments(int $type)
    {
        $intervals = [
            User::ROLE_ADMIN   => 10,
            User::ROLE_TEACHER => 20,
            User::ROLE_STUDENT => 30
        ];
        return $intervals[$type];
    }
}