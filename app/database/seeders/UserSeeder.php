<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('admin@mail.ru'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Email',
                'email' => 'email@mail.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('admin@mail.ru'),
                'remember_token' => Str::random(10),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
