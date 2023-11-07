<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'password' => bcrypt('mese123'),
                'foto' => '/img/20231101040225.jpg
                ',
                'level' => 1
            ],
            [
                'name' => 'Berto',
                'email' => 'admin@mail.com',
                'password' => bcrypt('mese1234'),
                'foto' => '/img/20231101040225.jpg                ',
                'level' => 2
            ]
        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
