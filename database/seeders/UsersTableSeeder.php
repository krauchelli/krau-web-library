<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fabian',
                'email' => 'fabian@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tenzara',
                'email' => 'tenzara@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Chiko Arisu',
                'email' => 'chiko@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Ushio Noa',
                'email' => 'noa@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Momoi Haruko',
                'email' => 'momoi@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Adomindo',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'is_admin' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}