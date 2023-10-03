<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'level' => 1
            ],
            [
                'name' => 'Kasir 1',
                'email' => 'kasir1@gmail.com',
                'password' => bcrypt('123'),
                'level' => 2
            ],
            [
                'name' => 'Kasir 2',
                'email' => 'kasir2@gmail.com',
                'password' => bcrypt('123'),
                'level' => 2
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
