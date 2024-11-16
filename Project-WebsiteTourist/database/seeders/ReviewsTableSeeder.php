<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('reviews')->insert([
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Anh Thái đẹp trai', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Concho Quang', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Concho Nam', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
        ]);
    }
}
