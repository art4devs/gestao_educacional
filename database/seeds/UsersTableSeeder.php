<?php

use Educacional\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'  => 'Admin',
            'enrolment' => date('Y') . 10 . 1,
            'email' => 'programacao.desenvolvimento@gmail.com'
        ]);
    }
}
