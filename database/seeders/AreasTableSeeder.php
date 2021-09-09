<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'name' => '北海道'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 2,
            'name' => '宮城県'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 3,
            'name' => '東京都'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 4,
            'name' => '神奈川県'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 5,
            'name' => '名古屋'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 6,
            'name' => '大阪府'
        ];
        DB::table('areas')->insert($param);
        $param = [
            'id' => 7,
            'name' => '兵庫県'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 8,
            'name' => '広島県'
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 9,
            'name' => '福岡県'
        ];
        DB::table('areas')->insert($param);
    }
}
