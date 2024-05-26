<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
      'area' => '東京',
    ];
    DB::table('areas')->insert($param);
        $param = [
      'area' => '大阪',
    ];
    DB::table('areas')->insert($param);
        $param = [
      'area' => '福岡',
    ];
    DB::table('areas')->insert($param);
    }
}
