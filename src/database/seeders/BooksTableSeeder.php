<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
    'user_id' => '1',
    'shop_id' => '1',
    'date' => '2024-04-20',
    'time' => '18:00:00',
    'number' => '3',
    ];
    DB::table('books')->insert($param);

    $param = [
    'user_id' => '3',
    'shop_id' => '1',
    'date' => '2024-05-20',
    'time' => '18:00:00',
    'number' => '6',
    ];
    DB::table('books')->insert($param);

    $param = [
    'user_id' => '4',
    'shop_id' => '5',
    'date' => '2024-06-20',
    'time' => '17:00:00',
    'number' => '5',
    ];
    DB::table('books')->insert($param); 

    $param = [
    'user_id' => '3',
    'shop_id' => '6',
    'date' => '2024-08-20',
    'time' => '18:00:00',
    'number' => '3',
    ];
    DB::table('books')->insert($param);
    }
}
