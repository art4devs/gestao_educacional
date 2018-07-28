<?php

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
        factory(\Educacional\Models\User::class)->create([
            'name'  => 'Admin',
            'email' => 'programacao.desenvolvimento@gmail.com'
        ]);
    }
}
