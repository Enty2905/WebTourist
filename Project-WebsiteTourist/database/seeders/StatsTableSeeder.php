<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('stats')->insert([
            ['label' => 'Số lượng khách đã truy cập', 'value' => 10000],
            ['label' => 'Đánh giá trung bình', 'value' => 5000],
            ['label' => 'Số Tour Đã Được Đặt', 'value' => 2000],
            ['label' => 'Phản Hồi Tích Cực', 'value' => 8000],
        ]);
    }
}