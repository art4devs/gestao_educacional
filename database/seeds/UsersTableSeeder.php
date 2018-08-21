<?php

use Educacional\Repositories\UsersRepository;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    private $faker;
    private $qtdUsers;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
        $this->qtdUsers = 30;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRepository = new UsersRepository();

        $admin = [
            'name'  => 'Admin',
            'enrolment' => date('Y') . 10 . 0,
            'email' => 'programacao.desenvolvimento@gmail.com',
            'password' => '123456',
            'user_choices' => 1
        ];
        $userRepository->store($admin);

        for ($i = $this->qtdUsers; $i > 0; $i--) {
            $choice = rand(1,3);

            $user = [
                'name'  => $this->faker->name,
                'enrolment' => date('Y') . $choice . 0 . $i,
                'email' => $this->faker->email,
                'password' => '123456',
                'user_choices' => $choice
            ];
            $userRepository->store($user);
        }
    }
}
