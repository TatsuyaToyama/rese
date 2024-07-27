<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
    'name' => 'a',
    'email' => 'a@email.com',
    'password' => Hash::make('testtest'),
    'email_verified_at' => '2024-06-29 18:19:45'
    ];
    DB::table('users')->insert($param);

    $param = [
    'name' => 'b',
    'email' => 'b@email.com',
    'password' => Hash::make('testtest'),
    'email_verified_at' => '2024-06-29 18:19:45'
    ];
    DB::table('users')->insert($param);

    $param = [
    'name' => 'c',
    'email' => 'c@email.com',
    'password' => Hash::make('testtest'),
    'email_verified_at' => '2024-06-29 18:19:45'
    ];
    DB::table('users')->insert($param);

    $param = [
    'name' => 'd',
    'email' => 'd@email.com',
    'password' => Hash::make('testtest'),
    'email_verified_at' => '2024-06-29 18:19:45'
    ];
    DB::table('users')->insert($param);

    $param = [
    'name' => 'e',
    'email' => 'e@email.com',
    'password' => Hash::make('testtest'),
    'email_verified_at' => '2024-06-29 18:19:45'
    ];
    DB::table('users')->insert($param);

    }
}
