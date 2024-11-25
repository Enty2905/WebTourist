<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Stat;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        // $tours = Tour::inRandomOrder()->limit(6)->get();
        $tours = Tour::skip(10)->take(6)->get();

        return view('index', compact('reviews', 'tours'));
    }
    public function about()
    {
        $reviews = Review::all();
        $stats = Stat::all();
        return view('about', compact('stats' , 'reviews'));
    }
    public function destinations()
    {
        $destinations = [
            ['class' => 'destinations__box--large', 'image' => 'assets/img/Quang_Binh1.jpg', 'name' => 'Động Thiên Đường'],
            ['class' => 'destinations__box--small', 'image' => 'assets/img/Truong_Quoc_Hoc_Hue.jpg', 'name' => 'Trường Quốc Học Huế'],
            ['class' => 'destinations__box--small', 'image' => 'assets/img/Suoi_Bang_QuangBinh.jpg', 'name' => 'Suối Bang'],
            ['class' => 'destinations__box--high', 'image' => 'assets/img/Tuong_Dai_Me_Suot_QuangBinh.jpg', 'name' => 'Tượng Đài Mẹ Suốt'],
            ['class' => 'destinations__box--medium', 'image' => 'assets/img/Vuon_Quoc_Gia_Bach_Ma_Hue.jpg', 'name' => 'Vườn Quốc Gia Bạch Mã'],
            ['class' => 'destinations__box--large', 'image' => 'assets/img/Song_Han_DaNang.jpg', 'name' => 'Sông Hàn Đà Nẵng'],
        ];
        $stats = Stat::all();
        $reviews = Review::all();

        return view('destinations', compact('destinations', 'stats', 'reviews'));
    }


    public function blog()
    {
        return view('blog');
    }
    public function contact()
    {
        return view('contact');
    }
}
