<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
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
      'manager' => '1',
      'managed_shop_id' => '3',
    ];
    DB::table('roles')->insert($param);

    $param = [
      'user_id' => '2',
      'manager' => '0',
    ];
    DB::table('roles')->insert($param);

    $param = [
      'user_id' => '2',
      'manager' => '1',
      'managed_shop_id' => '6',
    ];
    DB::table('roles')->insert($param);

    $param = [
      'user_id' => '3',
      'manager' => '1',
      'managed_shop_id' => '8',
    ];
    DB::table('roles')->insert($param);

    }
}
