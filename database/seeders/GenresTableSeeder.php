<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => '観葉植物'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'id' => 2,
            'name' => '切り花'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'id' => 3,
            'name' => '雑貨'
        ];
        DB::table('genres')->insert($param);
    }
}
