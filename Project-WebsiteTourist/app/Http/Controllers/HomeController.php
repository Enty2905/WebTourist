<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
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

        $stats = [
            ['label' => 'Số lượng khách đã truy cập', 'value' => 10000],
            ['label' => 'Đánh giá 5*', 'value' => 5000],
            ['label' => 'Số Tour Đã Được Đặt', 'value' => 2000],
            ['label' => 'Phản Hồi Tích Cực', 'value' => 8000],
        ];

        $reviews = [
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Anh Thái đẹp trai', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Concho Quang', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
            ['image' => 'assets/img/Ba_Na_Hill_DaNang.jpg', 'name' => 'Concho Nam', 'rating' => 5, 'desc' => 'Lorem ipsum...'],
        ];

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
